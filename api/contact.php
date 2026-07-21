<?php
// ============================================================
// api/contact.php
// POST: full_name, email, phone, organisation, enquiry_type,
//       subject, message, csrf_token
// ============================================================
require_once __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(false, 'Method not allowed.', [], 405);
}

// ── Rate limiting ────────────────────────────────────────────
bhi_session_start();
$_SESSION['contact_attempts'] = ($_SESSION['contact_attempts'] ?? 0);
if ($_SESSION['contact_attempts'] >= 3) {
    json_response(false, 'Too many submissions. Please wait a few minutes.', [], 429);
}

// ── Collect ──────────────────────────────────────────────────
$data = [
    'full_name'    => clean(post('full_name')),
    'email'        => filter_var(post('email'), FILTER_SANITIZE_EMAIL),
    'phone'        => clean(post('phone')),
    'organisation' => clean(post('organisation')),
    'enquiry_type' => clean(post('enquiry_type', 'general')),
    'subject'      => clean(post('subject')),
    'message'      => clean(post('message')),
];

// ── Validate ─────────────────────────────────────────────────
$errors = validate_required(['full_name','email','subject','message'], $data);

if (!empty($data['email']) && !validate_email($data['email'])) {
    $errors['email'] = 'Please enter a valid email address.';
}
if (!empty($data['phone']) && !validate_phone($data['phone'])) {
    $errors['phone'] = 'Please enter a valid phone number.';
}
if (strlen($data['message']) < 20) {
    $errors['message'] = 'Message must be at least 20 characters.';
}

$allowed_types = ['general','partnership','volunteer','media','referral','other'];
if (!in_array($data['enquiry_type'], $allowed_types, true)) {
    $data['enquiry_type'] = 'general';
}

if ($errors) {
    json_response(false, 'Please fix the highlighted errors.', ['errors' => $errors], 422);
}

// ── Honeypot (spam trap) ──────────────────────────────────────
if (!empty(post('website'))) {
    json_response(true, 'Thank you for your message.'); // silently reject bots
}

// ── Insert ────────────────────────────────────────────────────
Database::execute(
    "INSERT INTO contact_messages
     (full_name, email, phone, organisation, enquiry_type, subject, message, ip_address)
     VALUES (:n, :e, :p, :o, :t, :s, :m, :ip)",
    [
        'n'  => $data['full_name'],
        'e'  => $data['email'],
        'p'  => $data['phone']        ?: null,
        'o'  => $data['organisation'] ?: null,
        't'  => $data['enquiry_type'],
        's'  => $data['subject'],
        'm'  => $data['message'],
        'ip' => get_ip(),
    ]
);

// ── Emails ───────────────────────────────────────────────────
Mailer::sendContactAck($data['email'], $data['full_name']);
Mailer::sendAdminNewContact($data);

$_SESSION['contact_attempts']++;

json_response(true, 'Your message has been received. We will respond within 2 business days.');
