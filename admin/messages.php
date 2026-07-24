<?php
// ============================================================
// admin/messages.php — Manage Contact Messages
// ============================================================
define('BHI_ADMIN', true);
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/Database.php';
require_once dirname(__DIR__) . '/includes/helpers.php';

$page_title = 'Contact Messages';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_login();
    if (!csrf_verify(post('csrf_token'))) {
        die('Invalid session token. Please go back and refresh the page, then try again.');
    }
    if (post('action') === 'update_status') {
        Database::execute("UPDATE contact_messages SET status=? WHERE id=?", [clean(post('status')), (int)post('id')]);
        $msg = 'Status updated.';
    }
    if (post('action') === 'delete') {
        Database::execute("DELETE FROM contact_messages WHERE id=?", [(int)post('id')]);
        $msg = 'Message deleted.';
    }
}

require_login();

$status_filter = get_param('status', 'all');
$page = max(1,(int)get_param('page','1'));
$where = "WHERE 1=1"; $params = [];
if (in_array($status_filter, ['new','read','replied','archived'], true)) {
    $where .= " AND status = ?"; $params[] = $status_filter;
}
$total = Database::fetchOne("SELECT COUNT(*) AS n FROM contact_messages $where", $params)['n'] ?? 0;
$pag = paginate((int)$total, $page, 12);
$qparams = array_merge($params, [$pag['per_page'], $pag['offset']]);

$messages = Database::fetchAll(
    "SELECT * FROM contact_messages $where ORDER BY created_at DESC LIMIT ? OFFSET ?",
    $qparams
);

require_once 'partials/header.php';
?>
<?php if ($msg): ?><div class="alert alert-success"><?= htmlspecialchars($msg) ?></div><?php endif; ?>

<div style="display:flex;gap:.5rem;margin-bottom:1.25rem">
  <a href="?" class="btn <?= $status_filter==='all'?'btn-primary':'btn-secondary' ?>">All</a>
  <?php foreach (['new','read','replied','archived'] as $s): ?>
    <a href="?status=<?=$s?>" class="btn <?= $status_filter===$s?'btn-primary':'btn-secondary' ?>"><?= ucfirst($s) ?></a>
  <?php endforeach; ?>
</div>

<?php foreach ($messages as $m): ?>
  <div class="card" style="margin-bottom:1rem">
    <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:.75rem">
      <div>
        <strong style="font-family:'Montserrat',sans-serif"><?= htmlspecialchars($m['full_name']) ?></strong>
        <span class="badge badge-new" style="margin-left:.5rem"><?= $m['enquiry_type'] ?></span>
        <div style="font-size:.8rem;color:#94a3b8;margin-top:.25rem">
          <?= htmlspecialchars($m['email']) ?><?php if($m['phone']): ?> · <?= htmlspecialchars($m['phone']) ?><?php endif; ?>
          <?php if($m['organisation']): ?> · <?= htmlspecialchars($m['organisation']) ?><?php endif; ?>
        </div>
      </div>
      <span style="font-size:.78rem;color:#94a3b8"><?= format_date($m['created_at'],'j M Y, g:i A') ?></span>
    </div>
    <p style="font-weight:700;margin-bottom:.4rem"><?= htmlspecialchars($m['subject']) ?></p>
    <p style="color:var(--mid);font-size:.92rem;line-height:1.6;margin-bottom:1rem"><?= nl2br(htmlspecialchars($m['message'])) ?></p>
    <div style="display:flex;gap:.5rem;align-items:center">
      <a href="mailto:<?= htmlspecialchars($m['email']) ?>?subject=Re: <?= urlencode($m['subject']) ?>" class="btn btn-primary" style="font-size:.75rem">↩ Reply by Email</a>
      <form method="POST" style="display:inline">
        <input type="hidden" name="action" value="update_status">
        <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
        <input type="hidden" name="id" value="<?= $m['id'] ?>">
        <select name="status" class="form-control" style="font-size:.75rem;padding:.4rem .6rem" onchange="this.form.submit()">
          <?php foreach (['new','read','replied','archived'] as $s): ?>
            <option value="<?= $s ?>" <?= $m['status']===$s?'selected':'' ?>><?= ucfirst($s) ?></option>
          <?php endforeach; ?>
        </select>
      </form>
      <form method="POST" style="display:inline" onsubmit="return confirm('Delete this message?')">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
        <input type="hidden" name="id" value="<?= $m['id'] ?>">
        <button type="submit" class="btn" style="background:#fee2e2;color:#991b1b;font-size:.75rem">Delete</button>
      </form>
    </div>
  </div>
<?php endforeach; ?>
<?php if (!$messages): ?><div class="card"><p style="color:#94a3b8;text-align:center;padding:2rem">No messages found.</p></div><?php endif; ?>

<?php if ($pag['total_pages'] > 1): ?>
<div style="display:flex;gap:.5rem;justify-content:center;padding:1rem 0">
  <?php for($i=1;$i<=$pag['total_pages'];$i++): ?>
    <a href="?page=<?=$i?>&status=<?=$status_filter?>" class="btn <?=$i===$pag['page']?'btn-primary':'btn-secondary'?>" style="min-width:36px;justify-content:center"><?=$i?></a>
  <?php endfor; ?>
</div>
<?php endif; ?>

<?php require_once 'partials/footer.php'; ?>