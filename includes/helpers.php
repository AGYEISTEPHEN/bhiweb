<?php
// ============================================================
// includes/helpers.php
// Security, validation, AJAX response, file upload helpers
// ============================================================

require_once __DIR__ . '/config.php';

// ── Session ───────────────────────────────────────────────────
function bhi_session_start(): void {
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params([
            'lifetime' => SESSION_LIFETIME,
            'path'     => '/',
            'secure'   => false,   // set true on HTTPS
            'httponly' => true,
            'samesite' => 'Strict',
        ]);
        session_start();
    }
}

// ── CSRF ──────────────────────────────────────────────────────
function csrf_token(): string {
    bhi_session_start();
    if (empty($_SESSION[CSRF_TOKEN_NAME])) {
        $_SESSION[CSRF_TOKEN_NAME] = bin2hex(random_bytes(32));
    }
    return $_SESSION[CSRF_TOKEN_NAME];
}

function csrf_verify(string $token): bool {
    bhi_session_start();
    $valid = isset($_SESSION[CSRF_TOKEN_NAME])
          && hash_equals($_SESSION[CSRF_TOKEN_NAME], $token);
    return $valid;
}

/**
 * True when POST/FILES arrived empty because the request body exceeded
 * post_max_size — PHP clears both superglobals silently in that case,
 * which otherwise gets misread downstream as a CSRF failure.
 */
function post_size_exceeded(): bool {
    return $_SERVER['REQUEST_METHOD'] === 'POST'
        && empty($_POST) && empty($_FILES)
        && (int) ($_SERVER['CONTENT_LENGTH'] ?? 0) > 0;
}

// ── Auth ──────────────────────────────────────────────────────
function is_logged_in(): bool {
    bhi_session_start();
    return !empty($_SESSION['admin_id']);
}

function require_login(): void {
    if (!is_logged_in()) {
        if (is_ajax()) {
            json_response(false, 'Authentication required.', [], 401);
        }
        header('Location: ' . SITE_URL . '/admin/login');
        exit;
    }
}

function current_admin(): ?array {
    bhi_session_start();
    if (!is_logged_in()) return null;
    return [
        'id'   => $_SESSION['admin_id'],
        'name' => $_SESSION['admin_name'] ?? '',
        'role' => $_SESSION['admin_role'] ?? 'editor',
    ];
}

// ── AJAX ──────────────────────────────────────────────────────
function is_ajax(): bool {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH'])
        && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}

function json_response(bool $success, string $message = '', array $data = [], int $code = 200): void {
    http_response_code($code);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data'    => $data,
    ]);
    exit;
}

// ── Input sanitisation ────────────────────────────────────────
function clean(string $val): string {
    return htmlspecialchars(trim($val), ENT_QUOTES, 'UTF-8');
}

function post(string $key, string $default = ''): string {
    return isset($_POST[$key]) ? trim($_POST[$key]) : $default;
}

function get_param(string $key, string $default = ''): string {
    return isset($_GET[$key]) ? trim($_GET[$key]) : $default;
}

// ── Validation ────────────────────────────────────────────────
function validate_email(string $email): bool {
    return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validate_phone(string $phone): bool {
    return (bool) preg_match('/^\+?[\d\s\-\(\)]{7,20}$/', $phone);
}

function validate_required(array $fields, array $data): array {
    $errors = [];
    foreach ($fields as $field) {
        if (empty($data[$field])) {
            $errors[$field] = ucfirst(str_replace('_', ' ', $field)) . ' is required.';
        }
    }
    return $errors;
}

// ── Slug generator ────────────────────────────────────────────
function slugify(string $text): string {
    $text = strtolower(trim($text));
    $text = preg_replace('/[^a-z0-9\s\-]/', '', $text);
    $text = preg_replace('/[\s\-]+/', '-', $text);
    return trim($text, '-');
}

// ── Pagination ────────────────────────────────────────────────
function paginate(int $total, int $page, int $per_page = 12): array {
    $total_pages = max(1, (int) ceil($total / $per_page));
    $page        = max(1, min($page, $total_pages));
    $offset      = ($page - 1) * $per_page;
    return compact('total', 'page', 'per_page', 'total_pages', 'offset');
}

// ── Image upload ──────────────────────────────────────────────
/**
 * @param  array  $file     $_FILES['field']
 * @param  string $dest_dir Absolute path to destination directory
 * @param  string $prefix   Optional filename prefix
 * @return array  ['success'=>bool, 'filename'=>string, 'message'=>string]
 */
function upload_image(array $file, string $dest_dir, string $prefix = 'img'): array {
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'filename' => '', 'message' => 'Upload error code: ' . $file['error']];
    }

    if ($file['size'] > MAX_FILE_SIZE) {
        return ['success' => false, 'filename' => '', 'message' => 'File exceeds 5 MB limit.'];
    }

    $finfo    = finfo_open(FILEINFO_MIME_TYPE);
    $mime     = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mime, ALLOWED_IMG_TYPES, true)) {
        return ['success' => false, 'filename' => '', 'message' => 'Only JPEG, PNG, WebP and GIF are allowed.'];
    }

    $ext      = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = $prefix . '_' . bin2hex(random_bytes(8)) . '.' . strtolower($ext);
    $dest     = rtrim($dest_dir, '/') . '/' . $filename;

    if (!is_dir($dest_dir)) {
        mkdir($dest_dir, 0755, true);
    }

    if (!move_uploaded_file($file['tmp_name'], $dest)) {
        return ['success' => false, 'filename' => '', 'message' => 'Could not save file.'];
    }

    // Get dimensions
    $dims = @getimagesize($dest);
    return [
        'success'  => true,
        'filename' => $filename,
        'width'    => $dims[0] ?? null,
        'height'   => $dims[1] ?? null,
        'message'  => 'Upload successful.',
    ];
}

/**
 * Like upload_image(), but also accepts video files (mp4/webm/mov).
 * Returns an additional 'media_type' key: 'image' or 'video'.
 * Videos skip getimagesize() (not applicable) and use MAX_VIDEO_SIZE
 * as their size ceiling instead of MAX_FILE_SIZE.
 *
 * @param  array  $file     $_FILES['field']
 * @param  string $dest_dir Absolute path to destination directory
 * @param  string $prefix   Optional filename prefix
 * @return array  ['success'=>bool, 'filename'=>string, 'media_type'=>string, 'message'=>string]
 */
function upload_media(array $file, string $dest_dir, string $prefix = 'gal'): array {
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'filename' => '', 'media_type' => '', 'message' => 'Upload error code: ' . $file['error']];
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime  = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    $is_image = in_array($mime, ALLOWED_IMG_TYPES, true);
    $is_video = in_array($mime, ALLOWED_VIDEO_TYPES, true);

    if (!$is_image && !$is_video) {
        return ['success' => false, 'filename' => '', 'media_type' => '', 'message' => 'Only JPEG, PNG, WebP, GIF images or MP4, WebM, MOV videos are allowed.'];
    }

    $size_limit = $is_video ? MAX_VIDEO_SIZE : MAX_FILE_SIZE;
    if ($file['size'] > $size_limit) {
        $limit_mb = round($size_limit / (1024 * 1024));
        return ['success' => false, 'filename' => '', 'media_type' => '', 'message' => "File exceeds {$limit_mb} MB limit."];
    }

    $ext      = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = $prefix . '_' . bin2hex(random_bytes(8)) . '.' . strtolower($ext);
    $dest     = rtrim($dest_dir, '/') . '/' . $filename;

    if (!is_dir($dest_dir)) {
        mkdir($dest_dir, 0755, true);
    }

    if (!move_uploaded_file($file['tmp_name'], $dest)) {
        return ['success' => false, 'filename' => '', 'media_type' => '', 'message' => 'Could not save file.'];
    }

    $width = $height = null;
    if ($is_image) {
        $dims   = @getimagesize($dest);
        $width  = $dims[0] ?? null;
        $height = $dims[1] ?? null;
    }

    return [
        'success'    => true,
        'filename'   => $filename,
        'media_type' => $is_video ? 'video' : 'image',
        'width'      => $width,
        'height'     => $height,
        'message'    => 'Upload successful.',
    ];
}

// ── Token generator ──────────────────────────────────────────
function generate_token(int $length = 32): string {
    return bin2hex(random_bytes($length));
}

// ── IP address ───────────────────────────────────────────────
function get_ip(): string {
    foreach (['HTTP_CLIENT_IP','HTTP_X_FORWARDED_FOR','REMOTE_ADDR'] as $key) {
        if (!empty($_SERVER[$key])) {
            $ip = explode(',', $_SERVER[$key])[0];
            if (filter_var(trim($ip), FILTER_VALIDATE_IP)) {
                return trim($ip);
            }
        }
    }
    return '0.0.0.0';
}

// ── Date helpers ─────────────────────────────────────────────
function format_date(string $date, string $format = 'j M Y'): string {
    return $date ? date($format, strtotime($date)) : '';
}

function is_future(string $date): bool {
    return strtotime($date) > time();
}

// ── Log admin activity ───────────────────────────────────────
function log_activity(string $action, string $entity = '', int $entity_id = 0, string $detail = ''): void {
    try {
        $admin = current_admin();
        Database::execute(
            "INSERT INTO admin_activity_log (admin_id, action, entity, entity_id, detail, ip_address)
             VALUES (:aid, :action, :entity, :eid, :detail, :ip)",
            [
                'aid'    => $admin['id'] ?? null,
                'action' => $action,
                'entity' => $entity ?: null,
                'eid'    => $entity_id ?: null,
                'detail' => $detail ?: null,
                'ip'     => get_ip(),
            ]
        );
    } catch (Exception $e) {
        // Never fail silently on logging errors in production — just swallow here
    }
}