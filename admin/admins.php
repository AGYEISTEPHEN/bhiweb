<?php
// ============================================================
// admin/admins.php — Manage Admin Users (superadmin only)
// ============================================================
define('BHI_ADMIN', true);
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/Database.php';
require_once dirname(__DIR__) . '/includes/helpers.php';

$page_title = 'Admin Users';
$msg = $err = '';

require_login();
if (current_admin()['role'] !== 'superadmin') {
    die('Access denied. Superadmin privileges required.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_verify(post('csrf_token'))) {
        die('Invalid session token. Please go back and refresh the page, then try again.');
    }
    $action = post('action');

    if ($action === 'save_admin') {
        $id    = (int) post('id');
        $name  = clean(post('name'));
        $email = filter_var(post('email'), FILTER_SANITIZE_EMAIL);
        $role  = clean(post('role', 'editor'));
        $pass  = post('password');

        if (!validate_email($email)) {
            $err = 'Invalid email address.';
        } else {
            if ($id) {
                if ($pass) {
                    Database::execute(
                        "UPDATE admin_users SET name=?, email=?, role=?, password=? WHERE id=?",
                        [$name, $email, $role, password_hash($pass, PASSWORD_BCRYPT), $id]
                    );
                } else {
                    Database::execute(
                        "UPDATE admin_users SET name=?, email=?, role=? WHERE id=?",
                        [$name, $email, $role, $id]
                    );
                }
                $msg = 'Admin updated.';
            } else {
                if (!$pass) {
                    $err = 'Password is required for new admin.';
                } else {
                    Database::execute(
                        "INSERT INTO admin_users (name,email,password,role) VALUES (?,?,?,?)",
                        [$name, $email, password_hash($pass, PASSWORD_BCRYPT), $role]
                    );
                    $msg = 'Admin created.';
                }
            }
        }
    }

    if ($action === 'toggle_active') {
        Database::execute("UPDATE admin_users SET is_active = 1 - is_active WHERE id=?", [(int)post('id')]);
        $msg = 'Status toggled.';
    }
}

$admins = Database::fetchAll("SELECT * FROM admin_users ORDER BY created_at DESC");

require_once 'partials/header.php';
?>
<?php if ($msg): ?><div class="alert alert-success"><?= htmlspecialchars($msg) ?></div><?php endif; ?>
<?php if ($err): ?><div class="alert alert-error"><?= htmlspecialchars($err) ?></div><?php endif; ?>

<div style="display:flex;justify-content:flex-end;margin-bottom:1.25rem">
  <button class="btn btn-primary" onclick="openModal('modal-admin')">+ Add Admin</button>
</div>

<div class="card">
  <table>
    <thead><tr><th>Name</th><th>Email</th><th>Role</th><th>Last Login</th><th>Status</th><th></th></tr></thead>
    <tbody>
    <?php foreach ($admins as $a): ?>
      <tr>
        <td><strong><?= htmlspecialchars($a['name']) ?></strong></td>
        <td><?= htmlspecialchars($a['email']) ?></td>
        <td><span class="badge badge-upcoming"><?= ucfirst($a['role']) ?></span></td>
        <td style="font-size:.8rem;color:#94a3b8"><?= $a['last_login'] ? format_date($a['last_login'],'j M Y, g:i A') : 'Never' ?></td>
        <td><span class="badge badge-<?= $a['is_active']?'completed':'cancelled' ?>"><?= $a['is_active']?'Active':'Disabled' ?></span></td>
        <td>
          <button class="btn btn-secondary" style="font-size:.72rem" onclick='editAdmin(<?= json_encode(["id"=>$a["id"],"name"=>$a["name"],"email"=>$a["email"],"role"=>$a["role"]]) ?>)'>Edit</button>
          <form method="POST" style="display:inline">
            <input type="hidden" name="action" value="toggle_active">
            <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
            <input type="hidden" name="id" value="<?= $a['id'] ?>">
            <button type="submit" class="btn btn-secondary" style="font-size:.72rem"><?= $a['is_active']?'Disable':'Enable' ?></button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

<div id="modal-admin" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:9000">
  <div style="background:#fff;max-width:440px;margin:5rem auto;border-radius:14px;overflow:hidden">
    <div style="background:var(--navy);padding:1.25rem 1.5rem;display:flex;justify-content:space-between;align-items:center">
      <span id="admin-modal-title" style="color:#fff;font-family:'Montserrat',sans-serif;font-weight:800">Add Admin</span>
      <button onclick="document.getElementById('modal-admin').style.display='none'" style="background:none;border:none;color:#fff;font-size:1.4rem;cursor:pointer">×</button>
    </div>
    <form method="POST" style="padding:1.5rem">
      <input type="hidden" name="action" value="save_admin">
      <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
      <input type="hidden" name="id" id="a-id">
      <div class="form-group"><label class="form-label">Full Name</label><input name="name" id="a-name" class="form-control" required></div>
      <div class="form-group"><label class="form-label">Email</label><input type="email" name="email" id="a-email" class="form-control" required></div>
      <div class="form-group"><label class="form-label">Role</label>
        <select name="role" id="a-role" class="form-control">
          <option value="editor">Editor</option>
          <option value="admin">Admin</option>
          <option value="superadmin">Superadmin</option>
        </select>
      </div>
      <div class="form-group"><label class="form-label">Password <span id="a-pass-hint" style="color:#94a3b8;text-transform:none">(leave blank to keep current)</span></label><input type="password" name="password" class="form-control"></div>
      <button type="submit" class="btn btn-primary" style="width:100%">Save Admin</button>
    </form>
  </div>
</div>

<script>
function openModal(id) { document.getElementById(id).style.display='block'; }
function editAdmin(a) {
  document.getElementById('admin-modal-title').textContent = 'Edit Admin';
  document.getElementById('a-id').value = a.id;
  document.getElementById('a-name').value = a.name;
  document.getElementById('a-email').value = a.email;
  document.getElementById('a-role').value = a.role;
  openModal('modal-admin');
}
window.addEventListener('click', e => {
  const el = document.getElementById('modal-admin');
  if (e.target === el) el.style.display = 'none';
});
</script>

<?php require_once 'partials/footer.php'; ?>