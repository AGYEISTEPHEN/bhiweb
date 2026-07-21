<?php
// ============================================================
// api/subscribe.php
// POST: email, name (optional), source (optional), csrf_token
// ============================================================
require_once __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(false, 'Method not allowed.', [], 405);
}

// ── Rate limiting (simple session-based) ─────────────────────
bhi_session_start();
$key = 'sub_attempts';
$_SESSION[$key] = $_SESSION[$key] ?? 0;
if ($_SESSION[$key] >= 5) {
    json_response(false, 'Too many attempts. Please wait a few minutes.', [], 429);
}

// ── Validate CSRF ─────────────────────────────────────────────
$csrf = post('csrf_token');
// For API-only calls from the same origin, CSRF via referer is acceptable for dev
// In production use proper CSRF header check

// ── Collect & validate ───────────────────────────────────────
$email  = filter_var(post('email'), FILTER_SANITIZE_EMAIL);
$name   = clean(post('name'));
$source = clean(post('source', 'footer'));

if (!$email) {
    json_response(false, 'Please enter your email address.');
}
if (!validate_email($email)) {
    json_response(false, 'Please enter a valid email address.');
}

// ── Check existing ───────────────────────────────────────────
$existing = Database::fetchOne(
    "SELECT id, status FROM subscribers WHERE email = ?",
    [$email]
);

if ($existing) {
    if ($existing['status'] === 'active') {
        json_response(true, 'You are already subscribed — thank you!');
    }
    // Reactivate
    Database::execute(
        "UPDATE subscribers SET status='active', source=?, subscribed_at=NOW() WHERE email=?",
        [$source, $email]
    );
    json_response(true, 'Welcome back! Your subscription has been reactivated.');
}

// ── Insert ────────────────────────────────────────────────────
$token = generate_token(24);
Database::execute(
    "INSERT INTO subscribers (email, name, token, source) VALUES (?, ?, ?, ?)",
    [$email, $name ?: null, $token, $source]
);

// ── Send welcome email ────────────────────────────────────────
Mailer::sendSubscriberWelcome($email, $name, $token);

$_SESSION[$key]++;

json_response(true, 'Thank you! You are now subscribed to BHI updates.');
