<?php
// ============================================================
// admin/partials/header.php
// Include at top of every admin page:
//   $page_title = 'Dashboard';
//   require_once 'partials/header.php';
// ============================================================
if (!defined('BHI_ADMIN')) die('Direct access not allowed.');
require_login();
$admin = current_admin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($page_title ?? 'Admin') ?> — BHI Admin</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
<style>
  :root{--navy:#1B2F6E;--navy-dk:#0f1d47;--red:#C8102E;--gold:#E6A817;--bg:#F7F9FC;--border:#e2e8f0;--txt:#1E293B;--mid:#475569;--light:#94a3b8;--success:#2E8B57}
  *{box-sizing:border-box;margin:0;padding:0}
  body{font-family:'Source Sans 3',sans-serif;background:var(--bg);color:var(--txt);display:flex;min-height:100vh}
  /* Sidebar */
  .sidebar{width:240px;flex-shrink:0;background:var(--navy-dk);display:flex;flex-direction:column;min-height:100vh;position:fixed;top:0;left:0;bottom:0;z-index:100}
  .sb-logo{padding:1.5rem 1.25rem;border-bottom:1px solid rgba(255,255,255,.08);display:flex;align-items:center;gap:.75rem;text-decoration:none}
  .sb-logo-icon{width:36px;height:36px;background:none;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0;overflow:hidden}
  .sb-logo-icon img{width:100%;height:100%;object-fit:cover;border-radius:50%}
  .sb-logo-text{color:#fff;font-family:'Montserrat',sans-serif;font-weight:800;font-size:.85rem;line-height:1.2}
  .sb-logo-text span{display:block;font-size:.6rem;font-weight:400;color:rgba(255,255,255,.5)}
  nav.sb-nav{flex:1;padding:1rem 0;overflow-y:auto}
  .sb-section{font-family:'Montserrat',sans-serif;font-size:.62rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:rgba(255,255,255,.3);padding:.75rem 1.25rem .3rem}
  .sb-link{display:flex;align-items:center;gap:.65rem;padding:.65rem 1.25rem;color:rgba(255,255,255,.65);text-decoration:none;font-size:.88rem;transition:all .15s;border-left:3px solid transparent}
  .sb-link:hover{color:#fff;background:rgba(255,255,255,.06);border-left-color:rgba(255,255,255,.2)}
  .sb-link.active{color:#fff;background:rgba(200,16,46,.2);border-left-color:var(--red)}
  .sb-link .ico{font-size:1rem;width:20px;text-align:center}
  .sb-badge{margin-left:auto;background:var(--red);color:#fff;font-size:.62rem;font-weight:700;padding:.15rem .45rem;border-radius:50px}
  .sb-bottom{padding:1rem 1.25rem;border-top:1px solid rgba(255,255,255,.08);display:flex;align-items:center;gap:.6rem}
  .sb-avatar{width:32px;height:32px;background:var(--red);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-family:'Montserrat',sans-serif;font-size:.85rem;font-weight:800;flex-shrink:0}
  .sb-user-name{font-size:.82rem;font-weight:600;color:#fff;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
  .sb-logout{margin-left:auto;color:rgba(255,255,255,.4);font-size:.7rem;text-decoration:none;transition:color .15s}
  .sb-logout:hover{color:#fff}
  /* Main */
  .main{margin-left:240px;flex:1;display:flex;flex-direction:column;min-width:0}
  .topbar{background:#fff;border-bottom:1px solid var(--border);padding:.9rem 2rem;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:50}
  .topbar h1{font-family:'Montserrat',sans-serif;font-size:1.1rem;font-weight:800;color:var(--navy)}
  .topbar-actions{display:flex;gap:.75rem;align-items:center}
  .btn{display:inline-flex;align-items:center;gap:.4rem;padding:.55rem 1.1rem;border-radius:7px;font-family:'Montserrat',sans-serif;font-size:.78rem;font-weight:700;cursor:pointer;border:none;text-decoration:none;transition:all .15s}
  .btn-primary{background:var(--red);color:#fff}.btn-primary:hover{background:#a00d25}
  .btn-secondary{background:var(--bg);color:var(--navy);border:1.5px solid var(--border)}.btn-secondary:hover{background:#e8edf5}
  .btn-success{background:var(--success);color:#fff}
  .content{padding:2rem;flex:1}
  /* Cards */
  .card{background:#fff;border-radius:12px;padding:1.5rem;box-shadow:0 1px 8px rgba(27,47,110,.06)}
  .card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem;padding-bottom:1rem;border-bottom:1px solid var(--border)}
  .card-title{font-family:'Montserrat',sans-serif;font-size:.95rem;font-weight:800;color:var(--navy)}
  /* Table */
  table{width:100%;border-collapse:collapse;font-size:.875rem}
  th{font-family:'Montserrat',sans-serif;font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--light);padding:.75rem 1rem;text-align:left;border-bottom:1px solid var(--border);background:var(--bg)}
  td{padding:.75rem 1rem;border-bottom:1px solid var(--border);color:var(--txt);vertical-align:middle}
  tr:hover td{background:#fafbff}
  /* Badges */
  .badge{display:inline-block;padding:.2rem .65rem;border-radius:50px;font-family:'Montserrat',sans-serif;font-size:.66rem;font-weight:700;text-transform:uppercase;letter-spacing:.04em}
  .badge-new{background:#dbeafe;color:#1d4ed8}
  .badge-upcoming{background:#fef9c3;color:#854d0e}
  .badge-completed{background:#dcfce7;color:#166534}
  .badge-read{background:#f1f5f9;color:#475569}
  .badge-confirmed{background:#dcfce7;color:#166534}
  .badge-cancelled{background:#fee2e2;color:#991b1b}
  /* Stats grid */
  .stats-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:1.25rem;margin-bottom:2rem}
  .stat-box{background:#fff;border-radius:12px;padding:1.25rem 1.5rem;box-shadow:0 1px 8px rgba(27,47,110,.06);border-left:4px solid var(--navy)}
  .stat-box.red{border-left-color:var(--red)}
  .stat-box.gold{border-left-color:var(--gold)}
  .stat-box.green{border-left-color:var(--success)}
  .stat-num{font-family:'Montserrat',sans-serif;font-size:2rem;font-weight:900;color:var(--navy);line-height:1}
  .stat-lbl{font-size:.78rem;color:var(--mid);margin-top:.3rem}
  /* Alerts */
  .alert{padding:.9rem 1.25rem;border-radius:8px;font-size:.9rem;margin-bottom:1.25rem;border-left:3px solid}
  .alert-success{background:#f0fdf4;color:#166534;border-color:var(--success)}
  .alert-error{background:#fef2f2;color:#991b1b;border-color:var(--red)}
  /* Forms */
  .form-group{margin-bottom:1.25rem}
  .form-label{display:block;font-family:'Montserrat',sans-serif;font-size:.73rem;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--mid);margin-bottom:.4rem}
  .form-control{width:100%;padding:.7rem .9rem;border:1.5px solid var(--border);border-radius:7px;font-size:.9rem;outline:none;transition:border-color .2s;background:#fff}
  .form-control:focus{border-color:var(--navy)}
  select.form-control{cursor:pointer}
  textarea.form-control{resize:vertical;min-height:100px}
  .grid-2{display:grid;grid-template-columns:1fr 1fr;gap:1.25rem}
  .grid-3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:1.25rem}
  @media(max-width:900px){.sidebar{width:60px}.sb-logo-text,.sb-section,.sb-link span,.sb-user-name,.sb-logout{display:none}.main{margin-left:60px}}
</style>
</head>
<body>

<aside class="sidebar">
  <a href="index.php" class="sb-logo">
    <div class="sb-logo-icon">
      <img src="<?= SITE_URL ?>/assets/img/bhi-logo.jpeg" alt="BHI logo">
    </div>
    <div class="sb-logo-text">BHI Admin<span>Bono Heart Initiative</span></div>
  </a>
  <nav class="sb-nav">
    <div class="sb-section">Main</div>
    <a href="index.php"        class="sb-link <?= basename($_SERVER['PHP_SELF'])==='index.php'?'active':'' ?>"><span class="ico">📊</span> <span>Dashboard</span></a>

    <div class="sb-section">Content</div>
    <a href="outreach.php"     class="sb-link <?= basename($_SERVER['PHP_SELF'])==='outreach.php'?'active':'' ?>"><span class="ico">📍</span> <span>Outreach Programs</span></a>
    <a href="gallery.php"      class="sb-link <?= basename($_SERVER['PHP_SELF'])==='gallery.php'?'active':'' ?>"><span class="ico">🖼️</span> <span>Gallery</span></a>
    <a href="stats.php"        class="sb-link <?= basename($_SERVER['PHP_SELF'])==='stats.php'?'active':'' ?>"><span class="ico">📈</span> <span>Impact Stats</span></a>

    <div class="sb-section">Community</div>
    <a href="registrations.php" class="sb-link <?= basename($_SERVER['PHP_SELF'])==='registrations.php'?'active':'' ?>"><span class="ico">🩺</span> <span>Screening Registrations</span></a>
    <a href="messages.php"     class="sb-link <?= basename($_SERVER['PHP_SELF'])==='messages.php'?'active':'' ?>"><span class="ico">✉️</span> <span>Contact Messages</span></a>
    <a href="subscribers.php"  class="sb-link <?= basename($_SERVER['PHP_SELF'])==='subscribers.php'?'active':'' ?>"><span class="ico">📧</span> <span>Subscribers</span></a>
    <a href="partnerships.php" class="sb-link <?= basename($_SERVER['PHP_SELF'])==='partnerships.php'?'active':'' ?>"><span class="ico">🤝</span> <span>Partnerships</span></a>

    <?php if ($admin['role']==='superadmin'): ?>
    <div class="sb-section">System</div>
    <a href="admins.php" class="sb-link <?= basename($_SERVER['PHP_SELF'])==='admins.php'?'active':'' ?>"><span class="ico">👤</span> <span>Admin Users</span></a>
    <a href="activity.php" class="sb-link <?= basename($_SERVER['PHP_SELF'])==='activity.php'?'active':'' ?>"><span class="ico">📋</span> <span>Activity Log</span></a>
    <?php endif; ?>
  </nav>
  <div class="sb-bottom">
    <div class="sb-avatar"><?= strtoupper(substr($admin['name'],0,1)) ?></div>
    <span class="sb-user-name"><?= htmlspecialchars($admin['name']) ?></span>
    <a href="logout.php" class="sb-logout" title="Log out">⏏</a>
  </div>
</aside>

<div class="main">
  <div class="topbar">
    <h1><?= htmlspecialchars($page_title ?? 'Admin') ?></h1>
    <div class="topbar-actions">
      <a href="<?= SITE_URL ?>" target="_blank" class="btn btn-secondary">🌐 View Site</a>
    </div>
  </div>
  <div class="content">
