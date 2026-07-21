<?php
// ============================================================
// admin/login.php
// ============================================================
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/Database.php';
require_once dirname(__DIR__) . '/includes/helpers.php';

bhi_session_start();

// Already logged in
if (is_logged_in()) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = filter_var(post('email'), FILTER_SANITIZE_EMAIL);
    $password = post('password');

    if (!$email || !$password) {
        $error = 'Email and password are required.';
    } else {
        $admin = Database::fetchOne(
            "SELECT * FROM admin_users WHERE email = ? AND is_active = 1",
            [$email]
        );

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_id']   = $admin['id'];
            $_SESSION['admin_name'] = $admin['name'];
            $_SESSION['admin_role'] = $admin['role'];
            session_regenerate_id(true);

            Database::execute(
                "UPDATE admin_users SET last_login = NOW() WHERE id = ?",
                [$admin['id']]
            );
            log_activity('login', 'admin_users', $admin['id']);

            header('Location: index.php');
            exit;
        }
        $error = 'Invalid email or password.';
    }
}
$csrf = csrf_token();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login — Bono Heart Initiative</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
<style>
  :root{--navy:#1B2F6E;--red:#C8102E;--gold:#E6A817}
  *{box-sizing:border-box;margin:0;padding:0}
  body{font-family:'Source Sans 3',sans-serif;min-height:100vh;display:flex;align-items:center;justify-content:center;
    background:linear-gradient(135deg,var(--navy) 0%,#0f1d47 100%)}
  .card{background:#fff;border-radius:16px;padding:3rem 2.5rem;width:100%;max-width:420px;box-shadow:0 20px 60px rgba(0,0,0,.3)}
  .logo{text-align:center;margin-bottom:2rem}
  .logo-icon{width:56px;height:56px;background:var(--red);border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:1.6rem;margin-bottom:.75rem}
  .logo h1{font-family:'Montserrat',sans-serif;font-size:1.1rem;font-weight:800;color:var(--navy)}
  .logo p{font-size:.78rem;color:#94a3b8;margin-top:.2rem}
  label{display:block;font-family:'Montserrat',sans-serif;font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:#475569;margin-bottom:.4rem}
  input{width:100%;padding:.75rem 1rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.95rem;outline:none;transition:border-color .2s;margin-bottom:1.25rem}
  input:focus{border-color:var(--navy)}
  .btn{width:100%;background:var(--red);color:#fff;border:none;padding:.9rem;border-radius:8px;font-family:'Montserrat',sans-serif;font-weight:700;font-size:.95rem;cursor:pointer;transition:background .2s}
  .btn:hover{background:#a00d25}
  .error{background:#fef2f2;color:#c00;border-left:3px solid #c00;padding:.75rem 1rem;border-radius:0 6px 6px 0;font-size:.88rem;margin-bottom:1.25rem}
  .divider{width:40px;height:3px;background:var(--red);border-radius:2px;margin:.75rem auto 1.75rem}
</style>
</head>
<body>
<div class="card">
  <div class="logo">
    <div class="logo-icon">🫀</div>
    <h1>Bono Heart Initiative</h1>
    <p>Admin Portal</p>
  </div>
  <div class="divider"></div>
  <?php if ($error): ?>
  <div class="error"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
  <form method="POST" action="login.php">
    <input type="hidden" name="csrf_token" value="<?= $csrf ?>">
    <label>Email Address</label>
    <input type="email" name="email" placeholder="admin@bonoheartinitiative.org"
           value="<?= htmlspecialchars(post('email')) ?>" required>
    <label>Password</label>
    <input type="password" name="password" placeholder="••••••••••" required>
    <button type="submit" class="btn">Sign In →</button>
  </form>
</div>
</body>
</html>
