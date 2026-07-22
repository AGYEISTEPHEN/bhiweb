<?php
// ============================================================
// includes/config.php
// Bono Heart Initiative — Central configuration
// ============================================================

define('BHI_VERSION', '1.0.0');

// ── Database ─────────────────────────────────────────────────
define('DB_HOST',     'localhost');
define('DB_PORT',     '3306');
define('DB_NAME',     'bhi_db');
define('DB_USER',     'bonohear_bhiapp');          // Change for production
define('DB_PASS',     'BHI@2026');              // Change for production
define('DB_CHARSET',  'utf8mb4');

// ── Site ─────────────────────────────────────────────────────
define('SITE_NAME',   'Bono Heart Initiative');
define('SITE_URL',    'http://bonoheartinitiative.org/index');   // No trailing slash
define('ADMIN_EMAIL', 'admin@bonoheartinitiative.org');
define('CONTACT_EMAIL','info@bonoheartinitiative.org');

// ── Paths ─────────────────────────────────────────────────────
define('ROOT_PATH',     dirname(__DIR__));
define('UPLOAD_PATH',   ROOT_PATH . '/uploads');
define('GALLERY_PATH',  UPLOAD_PATH . '/gallery');
define('OUTREACH_PATH', UPLOAD_PATH . '/outreach');

// ── Upload limits ─────────────────────────────────────────────
define('MAX_FILE_SIZE',     5 * 1024 * 1024);   // 5 MB
define('ALLOWED_IMG_TYPES', ['image/jpeg','image/png','image/webp','image/gif']);

// ── Session ───────────────────────────────────────────────────
define('SESSION_LIFETIME', 3600 * 8);  // 8 hours

// ── Security ──────────────────────────────────────────────────
define('CSRF_TOKEN_NAME', 'bhi_csrf_token');

// ── Error reporting (set to 0 in production) ─────────────────
ini_set('display_errors', 1);
error_reporting(E_ALL);

// ── Timezone ──────────────────────────────────────────────────
date_default_timezone_set('Africa/Accra');
