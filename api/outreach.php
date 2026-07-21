<?php
// ============================================================
// api/outreach.php
// GET actions:
//   ?action=list&status=upcoming&page=1
//   ?action=get&id=5
//   ?action=sessions&program_id=5
//   ?action=stats
// ============================================================
require_once __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    json_response(false, 'Method not allowed.', [], 405);
}

$action = get_param('action', 'list');

switch ($action) {

    // ── List programs ─────────────────────────────────────────
    case 'list':
        $status    = get_param('status', 'all');
        $page      = max(1, (int) get_param('page', '1'));
        $per_page  = 9;

        $where  = "WHERE p.is_published = 1";
        $params = [];

        if (in_array($status, ['upcoming','ongoing','completed'], true)) {
            $where   .= " AND p.status = ?";
            $params[] = $status;
        }

        $total = Database::fetchOne(
            "SELECT COUNT(*) AS n FROM outreach_programs p {$where}", $params
        )['n'] ?? 0;

        $pag     = paginate((int)$total, $page, $per_page);
        $params[] = $pag['per_page'];
        $params[] = $pag['offset'];

        $programs = Database::fetchAll(
            "SELECT p.id, p.title, p.slug, p.summary, p.district, p.community,
                    p.program_type, p.status, p.scheduled_date, p.end_date,
                    p.scheduled_time, p.venue, p.cover_image,
                    p.screening_target, p.screened_count, p.referred_count,
                    p.registration_open, p.is_featured,
                    (SELECT COUNT(*) FROM outreach_sessions s
                     WHERE s.program_id = p.id AND s.status = 'open') AS open_sessions
             FROM outreach_programs p
             {$where}
             ORDER BY p.is_featured DESC, p.scheduled_date ASC
             LIMIT ? OFFSET ?",
            $params
        );

        json_response(true, '', [
            'programs'    => $programs,
            'pagination'  => $pag,
        ]);
        break;

    // ── Single program ────────────────────────────────────────
    case 'get':
        $id = (int) get_param('id');
        if (!$id) json_response(false, 'Invalid ID.', [], 400);

        $program = Database::fetchOne(
            "SELECT * FROM outreach_programs WHERE id = ? AND is_published = 1",
            [$id]
        );
        if (!$program) json_response(false, 'Program not found.', [], 404);

        // Fetch sessions
        $sessions = Database::fetchAll(
            "SELECT id, session_date, session_time, venue, slots_total, slots_booked, status
             FROM outreach_sessions
             WHERE program_id = ? AND status IN ('open','full')
             ORDER BY session_date ASC",
            [$id]
        );

        // Fetch gallery images for this program
        $images = Database::fetchAll(
            "SELECT filename, alt_text, caption FROM gallery_images
             WHERE program_id = ? AND is_published = 1
             ORDER BY sort_order ASC, created_at DESC LIMIT 12",
            [$id]
        );

        json_response(true, '', compact('program', 'sessions', 'images'));
        break;

    // ── Sessions for a program ────────────────────────────────
    case 'sessions':
        $program_id = (int) get_param('program_id');
        if (!$program_id) json_response(false, 'program_id required.', [], 400);

        $sessions = Database::fetchAll(
            "SELECT id, session_date, session_time, venue, slots_total, slots_booked, status, notes
             FROM outreach_sessions
             WHERE program_id = ? AND status IN ('open','full')
             ORDER BY session_date ASC",
            [$program_id]
        );
        json_response(true, '', ['sessions' => $sessions]);
        break;

    // ── Aggregate stats ───────────────────────────────────────
    case 'stats':
        $stats = Database::fetchAll(
            "SELECT stat_key, label, value, icon FROM impact_stats ORDER BY sort_order"
        );
        $counts = Database::fetchOne(
            "SELECT
               COUNT(*) AS total_programs,
               SUM(CASE WHEN status='completed' THEN 1 ELSE 0 END) AS completed,
               SUM(CASE WHEN status='upcoming'  THEN 1 ELSE 0 END) AS upcoming,
               SUM(screened_count)  AS total_screened,
               SUM(referred_count)  AS total_referred
             FROM outreach_programs WHERE is_published=1"
        );
        json_response(true, '', ['stats' => $stats, 'counts' => $counts]);
        break;

    default:
        json_response(false, 'Unknown action.', [], 400);
}
