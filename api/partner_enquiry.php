<?php
// ============================================================
// api/partner_enquiry.php
// POST: organisation, contact_name, email, phone, tier,
//       amount_ghs, message
// ============================================================
require_once __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(false, 'Method not allowed.', [], 405);
}

$data = [
    'organisation' => clean(post('organisation')),
    'contact_name' => clean(post('contact_name')),
    'email'        => filter_var(post('email'), FILTER_SANITIZE_EMAIL),
    'phone'        => clean(post('phone')),
    'tier'         => clean(post('tier', 'other')),
    'amount_ghs'   => floatval(post('amount_ghs')),
    'message'      => clean(post('message')),
];

$errors = validate_required(['organisation','contact_name','email'], $data);
if (!validate_email($data['email'])) $errors['email'] = 'Valid email required.';

$valid_tiers = ['bronze','silver','gold','platinum','corporate','individual','in_kind','other'];
if (!in_array($data['tier'], $valid_tiers, true)) $data['tier'] = 'other';

if ($errors) {
    json_response(false, 'Please fix the errors.', ['errors' => $errors], 422);
}

// Honeypot
if (!empty(post('website'))) json_response(true, 'Thank you for your interest.');

Database::execute(
    "INSERT INTO partnership_enquiries
     (organisation, contact_name, email, phone, tier, amount_ghs, message)
     VALUES (:o,:cn,:e,:p,:t,:a,:m)",
    [
        'o'  => $data['organisation'],
        'cn' => $data['contact_name'],
        'e'  => $data['email'],
        'p'  => $data['phone']   ?: null,
        't'  => $data['tier'],
        'a'  => $data['amount_ghs'] > 0 ? $data['amount_ghs'] : null,
        'm'  => $data['message'] ?: null,
    ]
);

Mailer::sendPartnershipAck($data['email'], $data['contact_name'], $data['tier']);

// Notify admin
$subject = 'New Partnership Enquiry — ' . ucfirst($data['tier']) . ' — ' . $data['organisation'];
$body    = "<p>New partnership enquiry from <strong>" . htmlspecialchars($data['organisation']) . "</strong></p>
<p>Contact: " . htmlspecialchars($data['contact_name']) . " | Tier: " . htmlspecialchars($data['tier']) . "</p>
<p><a href='" . SITE_URL . "/admin/partnerships.php'>View in Admin</a></p>";
Mailer::send(ADMIN_EMAIL, $subject, $body);

json_response(true, 'Thank you for your interest in partnering with BHI. We will be in touch within 3 business days.');
