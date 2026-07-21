<?php
// ============================================================
// admin/stats.php — Edit Homepage Impact Stats
// ============================================================
define('BHI_ADMIN', true);
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/Database.php';
require_once dirname(__DIR__) . '/includes/helpers.php';

$page_title = 'Impact Stats';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_login();
    $ids = $_POST['id'] ?? [];
    foreach ($ids as $i => $id) {
        Database::execute(
            "UPDATE impact_stats SET label=?, value=?, icon=? WHERE id=?",
            [clean($_POST['label'][$i]), clean($_POST['value'][$i]), clean($_POST['icon'][$i]), (int)$id]
        );
    }
    log_activity('update_impact_stats');
    $msg = 'Impact statistics updated successfully.';
}

require_login();
$stats = Database::fetchAll("SELECT * FROM impact_stats ORDER BY sort_order");

require_once 'partials/header.php';
?>
<?php if ($msg): ?><div class="alert alert-success"><?= htmlspecialchars($msg) ?></div><?php endif; ?>

<div class="card">
  <p style="color:var(--mid);font-size:.9rem;margin-bottom:1.5rem">
    These numbers appear in the Impact section of the homepage. Update them as outreach programs progress.
  </p>
  <form method="POST">
    <div class="grid-3">
    <?php foreach ($stats as $s): ?>
      <div style="border:1px solid var(--border);border-radius:10px;padding:1.25rem">
        <input type="hidden" name="id[]" value="<?= $s['id'] ?>">
        <div class="form-group">
          <label class="form-label">Icon (emoji)</label>
          <input name="icon[]" class="form-control" value="<?= htmlspecialchars($s['icon']) ?>" style="font-size:1.3rem;text-align:center">
        </div>
        <div class="form-group">
          <label class="form-label">Label</label>
          <input name="label[]" class="form-control" value="<?= htmlspecialchars($s['label']) ?>">
        </div>
        <div class="form-group" style="margin-bottom:0">
          <label class="form-label">Value</label>
          <input name="value[]" class="form-control" value="<?= htmlspecialchars($s['value']) ?>" style="font-weight:800;font-size:1.1rem">
        </div>
      </div>
    <?php endforeach; ?>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-top:1.5rem">Save All Changes</button>
  </form>
</div>

<?php require_once 'partials/footer.php'; ?>
