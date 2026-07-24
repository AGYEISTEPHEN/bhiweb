<?php
// ============================================================
// admin/logout.php
// ============================================================
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/Database.php';
require_once dirname(__DIR__) . '/includes/helpers.php';

bhi_session_start();
log_activity('logout');
$_SESSION = [];
session_destroy();
header('Location: login');
exit;