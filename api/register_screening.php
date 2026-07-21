<?php
// ============================================================
// api/register_screening.php
// POST: full_name, age, gender, phone, email, district,
//       community, has_hypertension, has_diabetes,
//       has_kidney_disease, family_history, notes, session_id
// ============================================================
require_once __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(false, 'Method not allowed.', [], 405);
}

bhi_session_start();

// ── Collect ──────────────────────────────────────────────────
$data = [
    'full_name'          => clean(post('full_name')),
    'age'                => (int) post('age'),
    'gender'             => clean(post('gender')),
    'phone'              => clean(post('phone')),
    'email'              => filter_var(post('email'), FILTER_SANITIZE_EMAIL),
    'district'           => clean(post('district')),
    'community'          => clean(post('community')),
    'has_hypertension'   => post('has_hypertension')   ? 1 : 0,
    'has_diabetes'       => post('has_diabetes')       ? 1 : 0,
    'has_kidney_disease' => post('has_kidney_disease') ? 1 : 0,
    'family_history'     => post('family_history')     ? 1 : 0,
    'notes'              => clean(post('notes')),
    'session_id'         => (int) post('session_id') ?: null,
];

// ── Validate ─────────────────────────────────────────────────
$errors = validate_required(['full_name','phone','district','community'], $data);

if (!empty($data['email']) && !validate_email($data['email'])) {
    $errors['email'] = 'Please enter a valid email address.';
}
if (empty($data['phone'])) {
    $errors['phone'] = 'Phone number is required.';
} elseif (!validate_phone($data['phone'])) {
    $errors['phone'] = 'Please enter a valid phone number.';
}
if ($data['age'] && ($data['age'] < 1 || $data['age'] > 120)) {
    $errors['age'] = 'Please enter a valid age.';
}

$valid_genders = ['male','female','other','prefer_not'];
if ($data['gender'] && !in_array($data['gender'], $valid_genders, true)) {
    $data['gender'] = null;
}

if ($errors) {
    json_response(false, 'Please fix the highlighted errors.', ['errors' => $errors], 422);
}

// ── Check session capacity ───────────────────────────────────
if ($data['session_id']) {
    $session = Database::fetchOne(
        "SELECT * FROM outreach_sessions WHERE id = ? AND status = 'open'",
        [$data['session_id']]
    );
    if (!$session) {
        json_response(false, 'Selected session is not available.');
    }
    if ($session['slots_booked'] >= $session['slots_total']) {
        json_response(false, 'This session is fully booked. Please select another date.');
    }
}

// ── Check duplicate (same phone + session) ───────────────────
if ($data['session_id']) {
    $dup = Database::fetchOne(
        "SELECT id FROM screening_registrations
         WHERE phone = ? AND session_id = ?",
        [$data['phone'], $data['session_id']]
    );
    if ($dup) {
        json_response(false, 'You are already registered for this session.');
    }
}

// ── Insert registration ───────────────────────────────────────
Database::execute(
    "INSERT INTO screening_registrations
     (full_name, age, gender, phone, email, district, community,
      has_hypertension, has_diabetes, has_kidney_disease, family_history, notes, session_id)
     VALUES (:n,:a,:g,:p,:e,:d,:c,:hy,:di,:ki,:fh,:no,:si)",
    [
        'n'  => $data['full_name'],
        'a'  => $data['age']     ?: null,
        'g'  => $data['gender']  ?: null,
        'p'  => $data['phone'],
        'e'  => $data['email']   ?: null,
        'd'  => $data['district'],
        'c'  => $data['community'],
        'hy' => $data['has_hypertension'],
        'di' => $data['has_diabetes'],
        'ki' => $data['has_kidney_disease'],
        'fh' => $data['family_history'],
        'no' => $data['notes']   ?: null,
        'si' => $data['session_id'],
    ]
);

// ── Update session slot count ─────────────────────────────────
if ($data['session_id']) {
    Database::execute(
        "UPDATE outreach_sessions
         SET slots_booked = slots_booked + 1,
             status = CASE WHEN slots_booked + 1 >= slots_total THEN 'full' ELSE status END
         WHERE id = ?",
        [$data['session_id']]
    );
}

// ── Send confirmation email ───────────────────────────────────
if ($data['email'] && $data['session_id']) {
    $sessionRow = Database::fetchOne(
        "SELECT s.*, p.title, p.venue AS prog_venue
         FROM outreach_sessions s
         JOIN outreach_programs p ON p.id = s.program_id
         WHERE s.id = ?",
        [$data['session_id']]
    );
    if ($sessionRow) {
        $sessionRow['venue'] = $sessionRow['venue'] ?? $sessionRow['prog_venue'];
        Mailer::sendScreeningConfirmation($data['email'], $data['full_name'], $sessionRow);
    }
}

json_response(true, 'Registration successful! ' .
    ($data['email'] ? 'A confirmation has been sent to your email.' : 'Please note your registration.'),
    ['district' => $data['district'], 'community' => $data['community']]
);
