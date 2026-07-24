<?php
// ============================================================
// admin/index.php  — Dashboard
// ============================================================
define('BHI_ADMIN', true);
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/Database.php';
require_once dirname(__DIR__) . '/includes/helpers.php';

$page_title = 'Dashboard';
require_once 'partials/header.php';

// ── Fetch summary counts ──────────────────────────────────────
$counts = Database::fetchOne(
    "SELECT
      (SELECT COUNT(*) FROM contact_messages   WHERE status='new')       AS new_messages,
      (SELECT COUNT(*) FROM screening_registrations WHERE status='pending') AS pending_regs,
      (SELECT COUNT(*) FROM subscribers        WHERE status='active')    AS subscribers,
      (SELECT COUNT(*) FROM outreach_programs  WHERE status='upcoming')  AS upcoming_programs,
      (SELECT COUNT(*) FROM gallery_images     WHERE is_published=1)     AS gallery_count,
      (SELECT COUNT(*) FROM partnership_enquiries WHERE status='new')    AS new_partners"
);

$recent_msgs = Database::fetchAll(
    "SELECT full_name, email, enquiry_type, subject, created_at
     FROM contact_messages ORDER BY created_at DESC LIMIT 5"
);

$recent_regs = Database::fetchAll(
    "SELECT r.full_name, r.phone, r.district, r.community, r.registered_at,
            p.title AS program_title
     FROM screening_registrations r
     LEFT JOIN outreach_sessions s ON s.id = r.session_id
     LEFT JOIN outreach_programs p ON p.id = s.program_id
     ORDER BY r.registered_at DESC LIMIT 5"
);

$upcoming = Database::fetchAll(
    "SELECT title, district, scheduled_date, screened_count, screening_target
     FROM outreach_programs WHERE status='upcoming' AND is_published=1
     ORDER BY scheduled_date ASC LIMIT 5"
);
?>

<!-- Stats -->
<div class="stats-grid">
  <div class="stat-box red">
    <div class="stat-num"><?= $counts['new_messages'] ?></div>
    <div class="stat-lbl">New Messages</div>
  </div>
  <div class="stat-box">
    <div class="stat-num"><?= $counts['pending_regs'] ?></div>
    <div class="stat-lbl">Pending Registrations</div>
  </div>
  <div class="stat-box gold">
    <div class="stat-num"><?= $counts['upcoming_programs'] ?></div>
    <div class="stat-lbl">Upcoming Programs</div>
  </div>
  <div class="stat-box green">
    <div class="stat-num"><?= number_format($counts['subscribers']) ?></div>
    <div class="stat-lbl">Newsletter Subscribers</div>
  </div>
  <div class="stat-box">
    <div class="stat-num"><?= $counts['gallery_count'] ?></div>
    <div class="stat-lbl">Gallery Images</div>
  </div>
  <div class="stat-box red">
    <div class="stat-num"><?= $counts['new_partners'] ?></div>
    <div class="stat-lbl">New Partner Enquiries</div>
  </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem">

  <!-- Recent Messages -->
  <div class="card">
    <div class="card-header">
      <span class="card-title">✉️ Recent Messages</span>
      <a href="messages" class="btn btn-secondary" style="font-size:.72rem">View All</a>
    </div>
    <?php if ($recent_msgs): ?>
    <table>
      <thead><tr><th>Name</th><th>Type</th><th>Date</th></tr></thead>
      <tbody>
      <?php foreach ($recent_msgs as $m): ?>
        <tr>
          <td><strong><?= htmlspecialchars($m['full_name']) ?></strong><br><small style="color:#94a3b8"><?= htmlspecialchars($m['email']) ?></small></td>
          <td><span class="badge badge-new"><?= $m['enquiry_type'] ?></span></td>
          <td style="font-size:.78rem;color:#94a3b8"><?= format_date($m['created_at'], 'j M') ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <?php else: ?><p style="color:#94a3b8;font-size:.9rem">No messages yet.</p><?php endif; ?>
  </div>

  <!-- Upcoming Outreach -->
  <div class="card">
    <div class="card-header">
      <span class="card-title">📍 Upcoming Outreach</span>
      <a href="outreach" class="btn btn-secondary" style="font-size:.72rem">View All</a>
    </div>
    <?php if ($upcoming): ?>
    <table>
      <thead><tr><th>Program</th><th>District</th><th>Date</th></tr></thead>
      <tbody>
      <?php foreach ($upcoming as $u): ?>
        <tr>
          <td><strong><?= htmlspecialchars($u['title']) ?></strong></td>
          <td style="font-size:.82rem"><?= htmlspecialchars($u['district']) ?></td>
          <td style="font-size:.78rem;color:#94a3b8"><?= format_date($u['scheduled_date'], 'j M Y') ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <?php else: ?><p style="color:#94a3b8;font-size:.9rem">No upcoming programs.</p><?php endif; ?>
  </div>

</div>

<!-- Recent Registrations -->
<div class="card" style="margin-top:1.5rem">
  <div class="card-header">
    <span class="card-title">🩺 Recent Screening Registrations</span>
    <a href="registrations" class="btn btn-secondary" style="font-size:.72rem">View All</a>
  </div>
  <?php if ($recent_regs): ?>
  <table>
    <thead><tr><th>Name</th><th>Phone</th><th>District / Community</th><th>Program</th><th>Date</th></tr></thead>
    <tbody>
    <?php foreach ($recent_regs as $r): ?>
      <tr>
        <td><strong><?= htmlspecialchars($r['full_name']) ?></strong></td>
        <td><?= htmlspecialchars($r['phone']) ?></td>
        <td><?= htmlspecialchars($r['district']) ?> · <?= htmlspecialchars($r['community']) ?></td>
        <td style="font-size:.8rem;color:#94a3b8"><?= htmlspecialchars($r['program_title'] ?? '—') ?></td>
        <td style="font-size:.78rem;color:#94a3b8"><?= format_date($r['registered_at'], 'j M') ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <?php else: ?><p style="color:#94a3b8;font-size:.9rem">No registrations yet.</p><?php endif; ?>
</div>

<?php require_once 'partials/footer.php'; ?>
