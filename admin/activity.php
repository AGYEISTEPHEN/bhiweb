<?php
// ============================================================
// admin/activity.php — System Activity Log (superadmin only)
// ============================================================
define('BHI_ADMIN', true);
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/Database.php';
require_once dirname(__DIR__) . '/includes/helpers.php';

$page_title = 'Activity Log';
require_login();
if (current_admin()['role'] !== 'superadmin') {
    die('Access denied. Superadmin privileges required.');
}

$page = max(1,(int)get_param('page','1'));
$total = Database::fetchOne("SELECT COUNT(*) AS n FROM admin_activity_log")['n'] ?? 0;
$pag = paginate((int)$total, $page, 30);

$logs = Database::fetchAll(
    "SELECT l.*, a.name AS admin_name
     FROM admin_activity_log l
     LEFT JOIN admin_users a ON a.id = l.admin_id
     ORDER BY l.created_at DESC LIMIT ? OFFSET ?",
    [$pag['per_page'], $pag['offset']]
);

require_once 'partials/header.php';
?>
<div class="card">
  <table>
    <thead><tr><th>Admin</th><th>Action</th><th>Entity</th><th>Detail</th><th>IP</th><th>Date</th></tr></thead>
    <tbody>
    <?php foreach ($logs as $l): ?>
      <tr>
        <td><?= htmlspecialchars($l['admin_name'] ?? 'System') ?></td>
        <td><span class="badge badge-new"><?= htmlspecialchars($l['action']) ?></span></td>
        <td style="font-size:.8rem"><?= htmlspecialchars($l['entity'] ?? '—') ?><?= $l['entity_id'] ? ' #'.$l['entity_id'] : '' ?></td>
        <td style="font-size:.8rem;color:#94a3b8"><?= htmlspecialchars($l['detail'] ?? '') ?></td>
        <td style="font-size:.78rem;color:#94a3b8"><?= htmlspecialchars($l['ip_address']) ?></td>
        <td style="font-size:.78rem;color:#94a3b8"><?= format_date($l['created_at'],'j M Y, g:i A') ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <?php if (!$logs): ?><p style="color:#94a3b8;text-align:center;padding:2rem">No activity recorded yet.</p><?php endif; ?>
  <?php if ($pag['total_pages'] > 1): ?>
  <div style="display:flex;gap:.5rem;justify-content:center;padding:1.25rem 0 0">
    <?php for($i=1;$i<=min($pag['total_pages'],10);$i++): ?>
      <a href="?page=<?=$i?>" class="btn <?=$i===$pag['page']?'btn-primary':'btn-secondary'?>" style="min-width:36px;justify-content:center"><?=$i?></a>
    <?php endfor; ?>
  </div>
  <?php endif; ?>
</div>
<?php require_once 'partials/footer.php'; ?>
