<?php
// ============================================================
// admin/partnerships.php — Manage Partnership Enquiries
// ============================================================
define('BHI_ADMIN', true);
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/Database.php';
require_once dirname(__DIR__) . '/includes/helpers.php';

$page_title = 'Partnership Enquiries';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_login();
    if (!csrf_verify(post('csrf_token'))) {
        die('Invalid session token. Please go back and refresh the page, then try again.');
    }
    if (post('action') === 'update_status') {
        Database::execute("UPDATE partnership_enquiries SET status=? WHERE id=?", [clean(post('status')), (int)post('id')]);
        $msg = 'Status updated.';
    }
}
require_login();

$page = max(1,(int)get_param('page','1'));
$total = Database::fetchOne("SELECT COUNT(*) AS n FROM partnership_enquiries")['n'] ?? 0;
$pag = paginate((int)$total, $page, 12);
$enquiries = Database::fetchAll(
    "SELECT * FROM partnership_enquiries ORDER BY created_at DESC LIMIT ? OFFSET ?",
    [$pag['per_page'], $pag['offset']]
);

require_once 'partials/header.php';
?>
<?php if ($msg): ?><div class="alert alert-success"><?= htmlspecialchars($msg) ?></div><?php endif; ?>

<div class="card">
  <table>
    <thead><tr><th>Organisation</th><th>Contact</th><th>Tier</th><th>Amount</th><th>Status</th><th>Date</th></tr></thead>
    <tbody>
    <?php foreach ($enquiries as $e): ?>
      <tr>
        <td><strong><?= htmlspecialchars($e['organisation']) ?></strong></td>
        <td><?= htmlspecialchars($e['contact_name']) ?><br><small style="color:#94a3b8"><?= htmlspecialchars($e['email']) ?></small></td>
        <td><span class="badge badge-upcoming"><?= ucfirst($e['tier']) ?></span></td>
        <td><?= $e['amount_ghs'] ? 'GHS ' . number_format($e['amount_ghs'],2) : '—' ?></td>
        <td>
          <form method="POST">
            <input type="hidden" name="action" value="update_status">
            <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
            <input type="hidden" name="id" value="<?= $e['id'] ?>">
            <select name="status" class="form-control" style="font-size:.75rem;padding:.3rem .5rem" onchange="this.form.submit()">
              <?php foreach (['new','contacted','negotiating','confirmed','declined'] as $s): ?>
                <option value="<?= $s ?>" <?= $e['status']===$s?'selected':'' ?>><?= ucfirst($s) ?></option>
              <?php endforeach; ?>
            </select>
          </form>
        </td>
        <td style="font-size:.78rem;color:#94a3b8"><?= format_date($e['created_at'],'j M Y') ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <?php if (!$enquiries): ?><p style="color:#94a3b8;text-align:center;padding:2rem">No partnership enquiries yet.</p><?php endif; ?>
  <?php if ($pag['total_pages'] > 1): ?>
  <div style="display:flex;gap:.5rem;justify-content:center;padding:1.25rem 0 0">
    <?php for($i=1;$i<=$pag['total_pages'];$i++): ?>
      <a href="?page=<?=$i?>" class="btn <?=$i===$pag['page']?'btn-primary':'btn-secondary'?>" style="min-width:36px;justify-content:center"><?=$i?></a>
    <?php endfor; ?>
  </div>
  <?php endif; ?>
</div>
<?php require_once 'partials/footer.php'; ?>