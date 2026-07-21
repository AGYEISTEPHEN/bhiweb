<?php
// ============================================================
// admin/outreach.php — Manage Outreach Programs
// ============================================================
define('BHI_ADMIN', true);
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/Database.php';
require_once dirname(__DIR__) . '/includes/helpers.php';

$page_title = 'Outreach Programs';
$msg = $err = '';

// ── Handle POST actions ───────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_login();
    $action = post('action');

    if ($action === 'save_program') {
        $id    = (int) post('id');
        $title = clean(post('title'));
        $desc  = clean(post('description'));
        $summary = clean(post('summary'));
        $district = clean(post('district'));
        $community = clean(post('community'));
        $type  = clean(post('program_type', 'community_screening'));
        $status= clean(post('status', 'upcoming'));
        $date  = clean(post('scheduled_date'));
        $end_date = clean(post('end_date')) ?: null;
        $time  = clean(post('scheduled_time')) ?: null;
        $venue = clean(post('venue'));
        $target = (int) post('screening_target') ?: null;
        $reg_open = post('registration_open') ? 1 : 0;
        $featured = post('is_featured') ? 1 : 0;
        $published = post('is_published') ? 1 : 0;
        $slug = slugify($title);

        // Cover image upload
        $cover = '';
        if (!empty($_FILES['cover_image']['name'])) {
            $upload = upload_image($_FILES['cover_image'], OUTREACH_PATH, 'prog');
            if ($upload['success']) {
                $cover = $upload['filename'];
            } else {
                $err = $upload['message'];
            }
        }

        if (!$err) {
            if ($id) {
                // Update
                $sql = "UPDATE outreach_programs SET
                  title=:t, slug=:sl, description=:d, summary=:su,
                  district=:di, community=:co, program_type=:pt, status=:st,
                  scheduled_date=:sd, end_date=:ed, scheduled_time=:stm,
                  venue=:v, screening_target=:tg,
                  registration_open=:ro, is_featured=:fe, is_published=:pu,
                  updated_at=NOW()
                  " . ($cover ? ", cover_image=:ci" : "") . "
                  WHERE id=:id";
                $params = ['t'=>$title,'sl'=>$slug,'d'=>$desc,'su'=>$summary,
                  'di'=>$district,'co'=>$community,'pt'=>$type,'st'=>$status,
                  'sd'=>$date,'ed'=>$end_date,'stm'=>$time,'v'=>$venue,'tg'=>$target,
                  'ro'=>$reg_open,'fe'=>$featured,'pu'=>$published,'id'=>$id];
                if ($cover) $params['ci'] = $cover;
                Database::execute($sql, $params);
                log_activity('update_program', 'outreach_programs', $id);
                $msg = 'Program updated successfully.';
            } else {
                // Insert
                Database::execute(
                  "INSERT INTO outreach_programs
                   (title,slug,description,summary,district,community,program_type,status,
                    scheduled_date,end_date,scheduled_time,venue,cover_image,screening_target,
                    registration_open,is_featured,is_published,created_by)
                   VALUES(:t,:sl,:d,:su,:di,:co,:pt,:st,:sd,:ed,:stm,:v,:ci,:tg,:ro,:fe,:pu,:cb)",
                  ['t'=>$title,'sl'=>$slug,'d'=>$desc,'su'=>$summary,
                   'di'=>$district,'co'=>$community,'pt'=>$type,'st'=>$status,
                   'sd'=>$date,'ed'=>$end_date,'stm'=>$time,'v'=>$venue,'ci'=>$cover,'tg'=>$target,
                   'ro'=>$reg_open,'fe'=>$featured,'pu'=>$published,'cb'=>current_admin()['id']]
                );
                $new_id = Database::lastId();
                log_activity('create_program', 'outreach_programs', $new_id);
                $msg = 'Program created successfully.';
            }
        }
    }

    if ($action === 'delete_program') {
        $id = (int) post('id');
        Database::execute("DELETE FROM outreach_programs WHERE id=?", [$id]);
        log_activity('delete_program', 'outreach_programs', $id);
        $msg = 'Program deleted.';
    }

    if ($action === 'add_session') {
        $prog_id = (int) post('program_id');
        $s_date  = clean(post('session_date'));
        $s_time  = clean(post('session_time')) ?: null;
        $s_venue = clean(post('session_venue'));
        $slots   = (int) post('slots_total', '100');
        Database::execute(
          "INSERT INTO outreach_sessions (program_id,session_date,session_time,venue,slots_total)
           VALUES (?,?,?,?,?)",
          [$prog_id, $s_date, $s_time, $s_venue, $slots]
        );
        $msg = 'Session added.';
    }
}

require_login();
$page  = max(1,(int)get_param('page','1'));
$pag   = paginate((int)(Database::fetchOne("SELECT COUNT(*) AS n FROM outreach_programs")['n']??0), $page, 10);
$progs = Database::fetchAll(
    "SELECT p.*,
     (SELECT COUNT(*) FROM outreach_sessions s WHERE s.program_id=p.id) AS session_count,
     (SELECT COUNT(*) FROM screening_registrations r
      JOIN outreach_sessions s2 ON s2.id=r.session_id
      WHERE s2.program_id=p.id) AS reg_count
     FROM outreach_programs p
     ORDER BY p.scheduled_date DESC
     LIMIT ? OFFSET ?",
    [$pag['per_page'], $pag['offset']]
);

require_once 'partials/header.php';
?>
<?php if ($msg): ?><div class="alert alert-success"><?= htmlspecialchars($msg) ?></div><?php endif; ?>
<?php if ($err): ?><div class="alert alert-error"><?= htmlspecialchars($err) ?></div><?php endif; ?>

<div style="display:flex;justify-content:flex-end;margin-bottom:1.25rem">
  <button class="btn btn-primary" onclick="openModal('modal-add')">+ Add Program</button>
</div>

<div class="card">
  <table>
    <thead><tr>
      <th>Program</th><th>District</th><th>Type</th><th>Date</th>
      <th>Status</th><th>Sessions</th><th>Registered</th><th>Actions</th>
    </tr></thead>
    <tbody>
    <?php foreach ($progs as $p): ?>
      <tr>
        <td><strong><?= htmlspecialchars($p['title']) ?></strong>
          <?php if ($p['is_featured']): ?><span class="badge badge-confirmed" style="margin-left:.4rem">Featured</span><?php endif; ?>
        </td>
        <td><?= htmlspecialchars($p['district']) ?></td>
        <td style="font-size:.78rem"><?= str_replace('_',' ',ucfirst($p['program_type'])) ?></td>
        <td style="font-size:.82rem"><?= format_date($p['scheduled_date'],'j M Y') ?></td>
        <td><span class="badge badge-<?= $p['status'] ?>"><?= $p['status'] ?></span></td>
        <td style="text-align:center"><?= $p['session_count'] ?></td>
        <td style="text-align:center"><?= $p['reg_count'] ?></td>
        <td>
          <button class="btn btn-secondary" style="font-size:.72rem"
            onclick='editProgram(<?= json_encode($p) ?>)'>Edit</button>
          <button class="btn btn-secondary" style="font-size:.72rem"
            onclick="openSessionModal(<?= $p['id'] ?>)">+ Session</button>
          <form method="POST" style="display:inline" onsubmit="return confirm('Delete this program?')">
            <input type="hidden" name="action" value="delete_program">
            <input type="hidden" name="id" value="<?= $p['id'] ?>">
            <button type="submit" class="btn" style="background:#fee2e2;color:#991b1b;font-size:.72rem">Del</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <!-- Pagination -->
  <?php if ($pag['total_pages'] > 1): ?>
  <div style="display:flex;gap:.5rem;justify-content:center;padding:1rem 0">
    <?php for($i=1;$i<=$pag['total_pages'];$i++): ?>
      <a href="?page=<?=$i?>" class="btn <?=$i===$pag['page']?'btn-primary':'btn-secondary'?>" style="min-width:36px;justify-content:center"><?=$i?></a>
    <?php endfor; ?>
  </div>
  <?php endif; ?>
</div>

<!-- Add/Edit Modal -->
<div id="modal-add" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:9000;overflow-y:auto">
  <div style="background:#fff;max-width:700px;margin:2rem auto;border-radius:14px;overflow:hidden">
    <div style="background:var(--navy);padding:1.25rem 1.5rem;display:flex;align-items:center;justify-content:space-between">
      <span id="modal-title" style="color:#fff;font-family:'Montserrat',sans-serif;font-weight:800">Add Outreach Program</span>
      <button onclick="closeModal('modal-add')" style="background:none;border:none;color:#fff;font-size:1.4rem;cursor:pointer">×</button>
    </div>
    <form method="POST" enctype="multipart/form-data" style="padding:1.5rem">
      <input type="hidden" name="action" value="save_program">
      <input type="hidden" name="id" id="prog-id" value="">
      <div class="grid-2">
        <div class="form-group"><label class="form-label">Title *</label><input name="title" id="p-title" class="form-control" required></div>
        <div class="form-group"><label class="form-label">Program Type</label>
          <select name="program_type" id="p-type" class="form-control">
            <option value="community_screening">Community Screening</option>
            <option value="school_outreach">School Outreach</option>
            <option value="market_screening">Market Screening</option>
            <option value="church_outreach">Church Outreach</option>
            <option value="clinic_day">Clinic Day</option>
            <option value="awareness_campaign">Awareness Campaign</option>
            <option value="other">Other</option>
          </select>
        </div>
      </div>
      <div class="form-group"><label class="form-label">Summary (card text)</label><input name="summary" id="p-summary" class="form-control" maxlength="500"></div>
      <div class="form-group"><label class="form-label">Full Description</label><textarea name="description" id="p-desc" class="form-control" rows="4"></textarea></div>
      <div class="grid-2">
        <div class="form-group"><label class="form-label">District *</label><input name="district" id="p-district" class="form-control" required></div>
        <div class="form-group"><label class="form-label">Community / Venue Area *</label><input name="community" id="p-community" class="form-control" required></div>
      </div>
      <div class="grid-2">
        <div class="form-group"><label class="form-label">Scheduled Date *</label><input type="date" name="scheduled_date" id="p-date" class="form-control" required></div>
        <div class="form-group"><label class="form-label">End Date (multi-day)</label><input type="date" name="end_date" id="p-enddate" class="form-control"></div>
      </div>
      <div class="grid-2">
        <div class="form-group"><label class="form-label">Time</label><input type="time" name="scheduled_time" id="p-time" class="form-control"></div>
        <div class="form-group"><label class="form-label">Venue Name</label><input name="venue" id="p-venue" class="form-control"></div>
      </div>
      <div class="grid-2">
        <div class="form-group"><label class="form-label">Screening Target</label><input type="number" name="screening_target" id="p-target" class="form-control" min="1"></div>
        <div class="form-group"><label class="form-label">Status</label>
          <select name="status" id="p-status" class="form-control">
            <option value="upcoming">Upcoming</option>
            <option value="ongoing">Ongoing</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
          </select>
        </div>
      </div>
      <div class="form-group"><label class="form-label">Cover Image</label><input type="file" name="cover_image" class="form-control" accept="image/*"></div>
      <div style="display:flex;gap:1.5rem;margin-bottom:1.25rem;flex-wrap:wrap">
        <label style="display:flex;align-items:center;gap:.4rem;cursor:pointer;font-size:.88rem">
          <input type="checkbox" name="registration_open" id="p-regopen" value="1" checked> Open for registration
        </label>
        <label style="display:flex;align-items:center;gap:.4rem;cursor:pointer;font-size:.88rem">
          <input type="checkbox" name="is_featured" id="p-featured" value="1"> Featured on homepage
        </label>
        <label style="display:flex;align-items:center;gap:.4rem;cursor:pointer;font-size:.88rem">
          <input type="checkbox" name="is_published" id="p-published" value="1" checked> Published
        </label>
      </div>
      <button type="submit" class="btn btn-primary" style="width:100%">Save Program</button>
    </form>
  </div>
</div>

<!-- Add Session Modal -->
<div id="modal-session" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:9000">
  <div style="background:#fff;max-width:480px;margin:4rem auto;border-radius:14px;overflow:hidden">
    <div style="background:var(--navy);padding:1.25rem 1.5rem;display:flex;justify-content:space-between;align-items:center">
      <span style="color:#fff;font-family:'Montserrat',sans-serif;font-weight:800">Add Session</span>
      <button onclick="closeModal('modal-session')" style="background:none;border:none;color:#fff;font-size:1.4rem;cursor:pointer">×</button>
    </div>
    <form method="POST" style="padding:1.5rem">
      <input type="hidden" name="action" value="add_session">
      <input type="hidden" name="program_id" id="sess-prog-id">
      <div class="form-group"><label class="form-label">Session Date *</label><input type="date" name="session_date" class="form-control" required></div>
      <div class="form-group"><label class="form-label">Session Time</label><input type="time" name="session_time" class="form-control"></div>
      <div class="form-group"><label class="form-label">Venue</label><input name="session_venue" class="form-control"></div>
      <div class="form-group"><label class="form-label">Total Slots</label><input type="number" name="slots_total" class="form-control" value="100" min="1"></div>
      <button type="submit" class="btn btn-primary" style="width:100%">Add Session</button>
    </form>
  </div>
</div>

<script>
function openModal(id)  { document.getElementById(id).style.display='block'; }
function closeModal(id) { document.getElementById(id).style.display='none';  }

function editProgram(p) {
  document.getElementById('modal-title').textContent = 'Edit Program';
  document.getElementById('prog-id').value     = p.id;
  document.getElementById('p-title').value     = p.title;
  document.getElementById('p-type').value      = p.program_type;
  document.getElementById('p-summary').value   = p.summary || '';
  document.getElementById('p-desc').value      = p.description || '';
  document.getElementById('p-district').value  = p.district;
  document.getElementById('p-community').value = p.community;
  document.getElementById('p-date').value      = p.scheduled_date;
  document.getElementById('p-enddate').value   = p.end_date || '';
  document.getElementById('p-time').value      = p.scheduled_time || '';
  document.getElementById('p-venue').value     = p.venue || '';
  document.getElementById('p-target').value    = p.screening_target || '';
  document.getElementById('p-status').value    = p.status;
  document.getElementById('p-regopen').checked  = p.registration_open == 1;
  document.getElementById('p-featured').checked = p.is_featured == 1;
  document.getElementById('p-published').checked= p.is_published == 1;
  openModal('modal-add');
}

function openSessionModal(progId) {
  document.getElementById('sess-prog-id').value = progId;
  openModal('modal-session');
}

window.addEventListener('click', e => {
  ['modal-add','modal-session'].forEach(id => {
    const el = document.getElementById(id);
    if (e.target === el) el.style.display = 'none';
  });
});
</script>

<?php require_once 'partials/footer.php'; ?>
