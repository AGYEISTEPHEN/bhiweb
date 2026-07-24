<?php
// ============================================================
// admin/registrations.php — Manage Screening Registrations
// ============================================================
define('BHI_ADMIN', true);
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/Database.php';
require_once dirname(__DIR__) . '/includes/helpers.php';

$page_title = 'Screening Registrations';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_login();
    if (!csrf_verify(post('csrf_token'))) {
        die('Invalid session token. Please go back and refresh the page, then try again.');
    }
    if (post('action') === 'update_status') {
        $id = (int) post('id');
        $status = clean(post('status'));
        Database::execute("UPDATE screening_registrations SET status=? WHERE id=?", [$status, $id]);
        log_activity('update_registration_status', 'screening_registrations', $id, $status);
        $msg = 'Status updated.';
    }
    if (post('action') === 'export') {
        // handled below before header output
    }
}

require_login();

// ── CSV Export ─────────────────────────────────────────────
if (get_param('export') === 'csv') {
    $rows = Database::fetchAll(
        "SELECT r.*, p.title AS program_title
         FROM screening_registrations r
         LEFT JOIN outreach_sessions s ON s.id = r.session_id
         LEFT JOIN outreach_programs p ON p.id = s.program_id
         ORDER BY r.registered_at DESC"
    );
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="bhi_registrations_' . date('Y-m-d') . '.csv"');
    $out = fopen('php://output', 'w');
    fputcsv($out, ['Name','Age','Gender','Phone','Email','District','Community','Program','Hypertension','Diabetes','Kidney Disease','Family History','Status','Registered At']);
    foreach ($rows as $r) {
        fputcsv($out, [
            $r['full_name'], $r['age'], $r['gender'], $r['phone'], $r['email'],
            $r['district'], $r['community'], $r['program_title'],
            $r['has_hypertension']?'Yes':'No', $r['has_diabetes']?'Yes':'No',
            $r['has_kidney_disease']?'Yes':'No', $r['family_history']?'Yes':'No',
            $r['status'], $r['registered_at']
        ]);
    }
    fclose($out);
    exit;
}

$status_filter = get_param('status', 'all');
$search        = get_param('q');
$page = max(1,(int)get_param('page','1'));

$where = "WHERE 1=1";
$params = [];
if (in_array($status_filter, ['pending','confirmed','screened','referred','no_show'], true)) {
    $where .= " AND r.status = ?";
    $params[] = $status_filter;
}
if ($search) {
    $where .= " AND (r.full_name LIKE ? OR r.phone LIKE ? OR r.community LIKE ?)";
    $params[] = "%$search%"; $params[] = "%$search%"; $params[] = "%$search%";
}

$total = Database::fetchOne("SELECT COUNT(*) AS n FROM screening_registrations r $where", $params)['n'] ?? 0;
$pag = paginate((int)$total, $page, 15);
$query_params = array_merge($params, [$pag['per_page'], $pag['offset']]);

$regs = Database::fetchAll(
    "SELECT r.*, p.title AS program_title
     FROM screening_registrations r
     LEFT JOIN outreach_sessions s ON s.id = r.session_id
     LEFT JOIN outreach_programs p ON p.id = s.program_id
     $where
     ORDER BY r.registered_at DESC
     LIMIT ? OFFSET ?",
    $query_params
);

require_once 'partials/header.php';
?>
<?php if ($msg): ?><div class="alert alert-success"><?= htmlspecialchars($msg) ?></div><?php endif; ?>

<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.25rem;flex-wrap:wrap;gap:.75rem">
  <form method="GET" style="display:flex;gap:.5rem">
    <input type="text" name="q" value="<?= htmlspecialchars($search) ?>" placeholder="Search name, phone, community..." class="form-control" style="width:260px">
    <select name="status" class="form-control" style="width:160px">
      <option value="all">All Status</option>
      <?php foreach (['pending','confirmed','screened','referred','no_show'] as $s): ?>
        <option value="<?= $s ?>" <?= $status_filter===$s?'selected':'' ?>><?= ucfirst(str_replace('_',' ',$s)) ?></option>
      <?php endforeach; ?>
    </select>
    <button class="btn btn-secondary" type="submit">Filter</button>
  </form>
  <a href="?export=csv" class="btn btn-success">⬇ Export CSV</a>
</div>

<div class="card">
  <table>
    <thead><tr>
      <th>Name</th><th>Phone</th><th>Location</th><th>Risk Factors</th>
      <th>Program</th><th>Status</th><th>Date</th><th>Action</th>
    </tr></thead>
    <tbody>
    <?php foreach ($regs as $r): ?>
      <tr>
        <td><strong><?= htmlspecialchars($r['full_name']) ?></strong>
          <?php if($r['age']): ?><br><small style="color:#94a3b8"><?= $r['age'] ?>y · <?= ucfirst($r['gender'] ?? '') ?></small><?php endif; ?>
        </td>
        <td><?= htmlspecialchars($r['phone']) ?></td>
        <td style="font-size:.82rem"><?= htmlspecialchars($r['district']) ?><br><small style="color:#94a3b8"><?= htmlspecialchars($r['community']) ?></small></td>
        <td style="font-size:.75rem">
          <?php
            $tags = [];
            if ($r['has_hypertension'])   $tags[] = 'BP';
            if ($r['has_diabetes'])       $tags[] = 'Diabetes';
            if ($r['has_kidney_disease']) $tags[] = 'Kidney';
            if ($r['family_history'])     $tags[] = 'Family Hx';
            echo $tags ? implode(', ', $tags) : '<span style="color:#94a3b8">None</span>';
          ?>
        </td>
        <td style="font-size:.78rem;color:#94a3b8"><?= htmlspecialchars($r['program_title'] ?? '—') ?></td>
        <td>
          <form method="POST" class="status-form">
            <input type="hidden" name="action" value="update_status">
            <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
            <input type="hidden" name="id" value="<?= $r['id'] ?>">
            <select name="status" class="form-control" style="font-size:.75rem;padding:.3rem .5rem" onchange="this.form.submit()">
              <?php foreach (['pending','confirmed','screened','referred','no_show'] as $s): ?>
                <option value="<?= $s ?>" <?= $r['status']===$s?'selected':'' ?>><?= ucfirst(str_replace('_',' ',$s)) ?></option>
              <?php endforeach; ?>
            </select>
          </form>
        </td>
        <td style="font-size:.78rem;color:#94a3b8"><?= format_date($r['registered_at'],'j M Y') ?></td>
        <td><a href="tel:<?= htmlspecialchars($r['phone']) ?>" class="btn btn-secondary" style="font-size:.7rem">📞 Call</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <?php if (!$regs): ?><p style="color:#94a3b8;text-align:center;padding:2rem">No registrations found.</p><?php endif; ?>

  <?php if ($pag['total_pages'] > 1): ?>
  <div style="display:flex;gap:.5rem;justify-content:center;padding:1.25rem 0 0">
    <?php for($i=1;$i<=$pag['total_pages'];$i++): ?>
      <a href="?page=<?=$i?>&status=<?=$status_filter?>&q=<?=urlencode($search)?>" class="btn <?=$i===$pag['page']?'btn-primary':'btn-secondary'?>" style="min-width:36px;justify-content:center"><?=$i?></a>
    <?php endfor; ?>
  </div>
  <?php endif; ?>
</div>

<?php require_once 'partials/footer.php'; ?>