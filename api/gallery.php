<?php
// ============================================================
// api/gallery.php
// GET actions:
//   ?action=list&category_id=&page=1&per_page=12
//   ?action=categories
//   ?action=featured
// ============================================================
require_once __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    json_response(false, 'Method not allowed.', [], 405);
}

$action = get_param('action', 'list');

// Build public URL for a gallery image
function img_url(string $filename): string {
    return SITE_URL . '/uploads/gallery/' . rawurlencode($filename);
}

switch ($action) {

    // ── Fetch gallery images ──────────────────────────────────
    case 'list':
        $cat_id   = (int) get_param('category_id');
        $page     = max(1, (int) get_param('page', '1'));
        $per_page = max(6, min(48, (int) get_param('per_page', '12')));

        $where  = "WHERE gi.is_published = 1";
        $params = [];

        if ($cat_id > 0) {
            $where   .= " AND gi.category_id = ?";
            $params[] = $cat_id;
        }

        $total = Database::fetchOne(
            "SELECT COUNT(*) AS n FROM gallery_images gi {$where}", $params
        )['n'] ?? 0;

        $pag = paginate((int)$total, $page, $per_page);
        $params[] = $pag['per_page'];
        $params[] = $pag['offset'];

        $images = Database::fetchAll(
            "SELECT gi.id, gi.filename, gi.alt_text, gi.caption,
                    gi.width, gi.height, gi.taken_at, gi.is_featured,
                    gc.name AS category_name, gc.slug AS category_slug,
                    op.title AS program_title, op.slug AS program_slug
             FROM gallery_images gi
             JOIN gallery_categories gc ON gc.id = gi.category_id
             LEFT JOIN outreach_programs op ON op.id = gi.program_id
             {$where}
             ORDER BY gi.sort_order ASC, gi.created_at DESC
             LIMIT ? OFFSET ?",
            $params
        );

        // Add public URL to each image
        foreach ($images as &$img) {
            $img['url']       = img_url($img['filename']);
            $img['thumb_url'] = img_url($img['filename']); // same for now; add thumbs in prod
        }

        json_response(true, '', [
            'images'     => $images,
            'pagination' => $pag,
        ]);
        break;

    // ── Categories ────────────────────────────────────────────
    case 'categories':
        $cats = Database::fetchAll(
            "SELECT gc.id, gc.name, gc.slug,
                    COUNT(gi.id) AS image_count
             FROM gallery_categories gc
             LEFT JOIN gallery_images gi
               ON gi.category_id = gc.id AND gi.is_published = 1
             GROUP BY gc.id
             ORDER BY gc.sort_order"
        );
        json_response(true, '', ['categories' => $cats]);
        break;

    // ── Featured (homepage gallery strip) ─────────────────────
    case 'featured':
        $limit  = max(4, min(20, (int) get_param('limit', '8')));
        $images = Database::fetchAll(
            "SELECT gi.id, gi.filename, gi.alt_text, gi.caption,
                    gc.name AS category_name
             FROM gallery_images gi
             JOIN gallery_categories gc ON gc.id = gi.category_id
             WHERE gi.is_featured = 1 AND gi.is_published = 1
             ORDER BY gi.sort_order ASC, gi.created_at DESC
             LIMIT ?",
            [$limit]
        );
        foreach ($images as &$img) {
            $img['url'] = img_url($img['filename']);
        }
        json_response(true, '', ['images' => $images]);
        break;

    default:
        json_response(false, 'Unknown action.', [], 400);
}
