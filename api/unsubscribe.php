<?php
// ============================================================
// api/unsubscribe.php
// GET: ?token=xxxx
// ============================================================
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/Database.php';
require_once dirname(__DIR__) . '/includes/helpers.php';

$token = get_param('token');
$done  = false;
$email = '';

if ($token) {
    $sub = Database::fetchOne("SELECT * FROM subscribers WHERE token = ?", [$token]);
    if ($sub) {
        Database::execute("UPDATE subscribers SET status='unsubscribed' WHERE id=?", [$sub['id']]);
        $done  = true;
        $email = $sub['email'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Unsubscribe — Bono Heart Initiative</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&family=Source+Sans+3&display=swap" rel="stylesheet">
<style>
  *{box-sizing:border-box;margin:0;padding:0}
  body{font-family:'Source Sans 3',sans-serif;min-height:100vh;display:flex;align-items:center;justify-content:center;background:#F7F9FC}
  .card{background:#fff;padding:3rem;border-radius:14px;max-width:440px;text-align:center;box-shadow:0 10px 40px rgba(0,0,0,.08)}
  h1{font-family:'Montserrat',sans-serif;color:#1B2F6E;font-size:1.3rem;margin-bottom:1rem}
  p{color:#475569;line-height:1.6;margin-bottom:1.5rem}
  a{color:#C8102E;font-weight:700;text-decoration:none}
</style>
</head>
<body>
<div class="card">
  <div style="font-size:2.5rem;margin-bottom:1rem">🫀</div>
  <?php if ($done): ?>
    <h1>You've been unsubscribed</h1>
    <p><?= htmlspecialchars($email) ?> will no longer receive BHI updates. We're sad to see you go — you can resubscribe any time from our website.</p>
  <?php else: ?>
    <h1>Link not recognised</h1>
    <p>This unsubscribe link is invalid or has already been used.</p>
  <?php endif; ?>
  <a href="<?= SITE_URL ?>">← Return to Bono Heart Initiative</a>
</div>
</body>
</html>
