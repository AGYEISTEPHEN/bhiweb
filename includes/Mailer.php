<?php
// ============================================================
// includes/Mailer.php
// Simple mailer wrapper — uses PHP mail() for XAMPP dev,
// swap with PHPMailer/SMTP for production.
// ============================================================

require_once __DIR__ . '/config.php';

class Mailer {

    // ── Send a plain/HTML email ───────────────────────────────
    public static function send(
        string $to,
        string $subject,
        string $html_body,
        string $plain_body = ''
    ): bool {
        $from      = 'noreply@bonoheartinitiative.org';
        $from_name = SITE_NAME;

        $plain_body = $plain_body ?: strip_tags($html_body);

        $boundary  = md5(uniqid());
        $headers   = implode("\r\n", [
            'MIME-Version: 1.0',
            "From: {$from_name} <{$from}>",
            "Reply-To: " . CONTACT_EMAIL,
            "Content-Type: multipart/alternative; boundary=\"{$boundary}\"",
            'X-Mailer: BHI-Mailer/1.0',
        ]);

        $body  = "--{$boundary}\r\n";
        $body .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n{$plain_body}\r\n\r\n";
        $body .= "--{$boundary}\r\n";
        $body .= "Content-Type: text/html; charset=UTF-8\r\n\r\n{$html_body}\r\n\r\n";
        $body .= "--{$boundary}--";

        return @mail($to, $subject, $body, $headers);
    }

    // ── Email templates ───────────────────────────────────────
    private static function wrap(string $content, string $title): string {
        return <<<HTML
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
<style>
  body{font-family:Arial,sans-serif;background:#F7F9FC;margin:0;padding:0}
  .wrap{max-width:600px;margin:30px auto;background:#fff;border-radius:10px;overflow:hidden;box-shadow:0 2px 12px rgba(0,0,0,.08)}
  .hdr{background:#1B2F6E;padding:28px 32px;text-align:center}
  .hdr h1{color:#fff;font-size:1.2rem;margin:0}
  .hdr p{color:rgba(255,255,255,.7);font-size:.8rem;margin:4px 0 0}
  .body{padding:32px}
  .body h2{color:#1B2F6E;font-size:1.1rem;margin:0 0 12px}
  .body p{color:#475569;line-height:1.7;margin:0 0 14px;font-size:.95rem}
  .btn{display:inline-block;background:#C8102E;color:#fff;padding:12px 28px;border-radius:6px;text-decoration:none;font-weight:700;font-size:.9rem;margin:8px 0}
  .ftr{background:#0f1d47;padding:20px 32px;text-align:center;color:rgba(255,255,255,.5);font-size:.75rem}
  .ftr a{color:rgba(255,255,255,.6)}
  .divider{width:50px;height:3px;background:#C8102E;margin:0 0 20px;border-radius:2px}
</style>
</head>
<body>
<div class="wrap">
  <div class="hdr">
    <h1>🫀 Bono Heart Initiative</h1>
    <p>Cardio-Metabolic-Renal Care for All</p>
  </div>
  <div class="body">
    <h2>{$title}</h2>
    <div class="divider"></div>
    {$content}
  </div>
  <div class="ftr">
    © 2026 Bono Heart Initiative · Bono Region, Ghana<br>
    <a href="mailto:info@bonoheartinitiative.org">info@bonoheartinitiative.org</a>
  </div>
</div>
</body></html>
HTML;
    }

    // ── Specific email types ──────────────────────────────────
    public static function sendSubscriberWelcome(string $to, string $name, string $token): bool {
        $unsubscribe = SITE_URL . '/api/unsubscribe.php?token=' . urlencode($token);
        $content = "<p>Dear " . htmlspecialchars($name ?: 'Friend') . ",</p>
        <p>Thank you for subscribing to BHI updates. You'll receive screening dates, outreach announcements, and impact reports from the Bono Region.</p>
        <p>Every heartbeat matters — thank you for staying connected to the mission.</p>
        <p><a class='btn' href='{$unsubscribe}'>Unsubscribe any time</a></p>";
        return self::send($to, 'Welcome to BHI — You\'re subscribed', self::wrap($content, 'Thank you for subscribing'));
    }

    public static function sendContactAck(string $to, string $name): bool {
        $content = "<p>Dear " . htmlspecialchars($name) . ",</p>
        <p>Thank you for reaching out to the Bono Heart Initiative. We have received your message and will respond within 2 business days.</p>
        <p>For urgent matters, please call us directly: <strong>+233 243 255 462</strong></p>";
        return self::send($to, 'BHI received your message', self::wrap($content, 'We\'ve received your message'));
    }

    public static function sendScreeningConfirmation(string $to, string $name, array $session): bool {
        $date    = format_date($session['session_date'] ?? '', 'l, j F Y');
        $time    = $session['session_time'] ? date('g:i A', strtotime($session['session_time'])) : 'TBC';
        $venue   = htmlspecialchars($session['venue'] ?? 'Venue to be announced');
        $content = "<p>Dear " . htmlspecialchars($name) . ",</p>
        <p>Your registration for a BHI screening session has been confirmed.</p>
        <table style='width:100%;border-collapse:collapse;font-size:.9rem'>
          <tr><td style='padding:8px;border-bottom:1px solid #e2e8f0;color:#94a3b8'>Date</td><td style='padding:8px;border-bottom:1px solid #e2e8f0;font-weight:700'>{$date}</td></tr>
          <tr><td style='padding:8px;border-bottom:1px solid #e2e8f0;color:#94a3b8'>Time</td><td style='padding:8px;border-bottom:1px solid #e2e8f0;font-weight:700'>{$time}</td></tr>
          <tr><td style='padding:8px;color:#94a3b8'>Venue</td><td style='padding:8px;font-weight:700'>{$venue}</td></tr>
        </table>
        <p style='margin-top:16px'>Screening is <strong>free</strong>. No hospital visit required. Please fast for at least 8 hours before your appointment for accurate blood glucose results.</p>";
        return self::send($to, 'BHI Screening Confirmed — ' . $date, self::wrap($content, 'Screening Registration Confirmed'));
    }

    public static function sendAdminNewContact(array $msg): bool {
        $name  = htmlspecialchars($msg['full_name']);
        $email = htmlspecialchars($msg['email']);
        $type  = htmlspecialchars($msg['enquiry_type']);
        $body  = htmlspecialchars($msg['message']);
        $content = "<p>A new contact form submission has been received:</p>
        <table style='width:100%;border-collapse:collapse;font-size:.9rem'>
          <tr><td style='padding:8px 0;color:#94a3b8;width:30%'>From</td><td style='padding:8px 0;font-weight:700'>{$name}</td></tr>
          <tr><td style='padding:8px 0;color:#94a3b8'>Email</td><td style='padding:8px 0'>{$email}</td></tr>
          <tr><td style='padding:8px 0;color:#94a3b8'>Type</td><td style='padding:8px 0'>{$type}</td></tr>
          <tr><td style='padding:8px 0;color:#94a3b8'>Message</td><td style='padding:8px 0'>" . nl2br($body) . "</td></tr>
        </table>
        <p><a class='btn' href='" . SITE_URL . "/admin/messages.php'>View in Admin Panel</a></p>";
        return self::send(ADMIN_EMAIL, 'New contact: ' . $msg['subject'], self::wrap($content, 'New Contact Enquiry'));
    }

    public static function sendPartnershipAck(string $to, string $name, string $tier): bool {
        $content = "<p>Dear " . htmlspecialchars($name) . ",</p>
        <p>Thank you for your interest in partnering with the Bono Heart Initiative at the <strong>" . ucfirst($tier) . " level</strong>.</p>
        <p>Our team will review your enquiry and reach out within 3 business days to discuss how we can work together to bring cardiovascular care to every community in the Bono Region.</p>
        <p>Together, we can ensure that distance does not determine diagnosis.</p>";
        return self::send($to, 'BHI Partnership Enquiry Received', self::wrap($content, 'Thank you for your partnership interest'));
    }
}
