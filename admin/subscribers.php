<?php
// ============================================================
// admin/subscribers.php — Manage Newsletter Subscribers
// ============================================================
define('BHI_ADMIN', true);
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/Database.php';
require_once dirname(__DIR__) . '/includes/helpers.php';

$page_title = 'Subscribers';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_login();
    if (post('action') === 'delete') {
        Database::execute("DELETE FROM subscribers WHERE id=?", [(int)post('id')]);
    }
}
require_login();

if (get_param('export') === 'csv') {
    $rows = Database::fetchAll("SELECT email, name, status, source, subscribed_at FROM subscribers ORDER BY subscribed_at DESC");
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="bhi_subscribers_' . date('Y-m-d') . '.csv"');
    $out = fopen('php://output', 'w');
    fputcsv($out, ['Email','Name','Status','Source','Subscribed At']);
    foreach ($rows as $r) fputcsv($out, $r);
    fclose($out);
    exit;
}

$page = max(1,(int)get_param('page','1'));
$total = Database::fetchOne("SELECT COUNT(*) AS n FROM subscribers")['n'] ?? 0;
$pag = paginate((int)$total, $page, 20);
$subs = Database::fetchAll(
    "SELECT * FROM subscribers ORDER BY subscribed_at DESC LIMIT ? OFFSET ?",
    [$pag['per_page'], $pag['offset']]
);

require_once 'partials/header.php';
?>
<div style="display:flex;justify-content:flex-end;margin-bottom:1.25rem">
  <a href="?export=csv" class="btn btn-success">⬇ Export CSV</a>
</div>
<div class="card">
  <table>
    <thead><tr><th>Email</th><th>Name</th><th>Status</th><th>Source</th><th>Date</th><th></th></tr></thead>
    <tbody>
    <?php foreach ($subs as $s): ?>
      <tr>
        <td><?= htmlspecialchars($s['email']) ?></td>
        <td><?= htmlspecialchars($s['name'] ?: '—') ?></td>
        <td><span class="badge badge-<?= $s['status']==='active'?'completed':'cancelled' ?>"><?= $s['status'] ?></span></td>
        <td style="font-size:.8rem;color:#94a3b8"><?= htmlspecialchars($s['source']) ?></td>
        <td style="font-size:.78rem;color:#94a3b8"><?= format_date($s['subscribed_at'],'j M Y') ?></td>
        <td>
          <form method="POST" onsubmit="return confirm('Remove this subscriber?')">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?= $s['id'] ?>">
            <button type="submit" class="btn" style="background:#fee2e2;color:#991b1b;font-size:.7rem">Remove</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <?php if (!$subs): ?><p style="color:#94a3b8;text-align:center;padding:2rem">No subscribers yet.</p><?php endif; ?>
  <?php if ($pag['total_pages'] > 1): ?>
  <div style="display:flex;gap:.5rem;justify-content:center;padding:1.25rem 0 0">
    <?php for($i=1;$i<=$pag['total_pages'];$i++): ?>
      <a href="?page=<?=$i?>" class="btn <?=$i===$pag['page']?'btn-primary':'btn-secondary'?>" style="min-width:36px;justify-content:center"><?=$i?></a>
    <?php endfor; ?>
  </div>
  <?php endif; ?>
</div>
<?php require_once 'partials/footer.php'; ?>
