<?php
// ============================================================
// refer.php
// Bono Heart Initiative — Patient referral
// ============================================================
require_once __DIR__ . '/includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Refer a Patient — Bono Heart Initiative</title>
<meta name="description" content="Refer a patient showing cardio-metabolic-renal warning signs into the Bono Heart Initiative pathway.">
<link rel="icon" type="image/png" sizes="512x512" href="assets/img/bhi-logo.png"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&family=Source+Sans+3:ital,wght@0,300;0,400;0,600;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/bhi-index.css">
<link rel="stylesheet" href="assets/css/bhi-dynamic.css">
<style>
  .sub-hero{background:linear-gradient(135deg,var(--navy) 0%,#0f1d47 100%);padding:9rem 2rem 5rem;text-align:center}
  .sub-hero .section-tag{background:rgba(200,16,46,.15);color:#ff8fa3}
  .sub-hero h1{font-family:'Montserrat',sans-serif;font-weight:900;font-size:clamp(2rem,5vw,3.2rem);color:#fff;margin:1rem 0}
  .sub-hero p{color:rgba(255,255,255,.8);max-width:640px;margin:0 auto;line-height:1.7;font-size:1.05rem}

  .urgent-banner{background:#fef2f2;border-left:4px solid var(--red);border-radius:0 10px 10px 0;
    padding:1.1rem 1.5rem;max-width:900px;margin:0 auto 3rem;display:flex;align-items:center;gap:1rem;flex-wrap:wrap}
  .urgent-banner strong{color:var(--red);font-family:'Montserrat',sans-serif}
  .urgent-banner a{color:var(--red);font-weight:700;text-decoration:none}

  .flag-strip{display:flex;flex-wrap:wrap;justify-content:center;gap:.75rem;margin:2.5rem 0}
  .flag-chip{display:flex;align-items:center;gap:.5rem;background:#fff;border:1.5px solid var(--border);
    border-radius:50px;padding:.55rem 1.1rem;font-size:.85rem;font-weight:600;color:var(--text-dark)}
  .flag-chip .ico{font-size:1.1rem}

  .refer-form-wrap{max-width:680px;margin:0 auto;background:#fff;border-radius:16px;padding:2.5rem;box-shadow:0 10px 40px rgba(27,47,110,.08)}
  .refer-form-wrap .form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
  .refer-form-wrap .fg{margin-bottom:1.25rem}
  .refer-form-wrap label{display:block;font-family:'Montserrat',sans-serif;font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.05em;color:var(--text-mid);margin-bottom:.4rem}
  .refer-form-wrap input,.refer-form-wrap select,.refer-form-wrap textarea{
    width:100%;padding:.75rem .9rem;border:1.5px solid var(--border);border-radius:8px;font-size:.92rem;
    font-family:'Source Sans 3',sans-serif;outline:none;transition:border-color .2s
  }
  .refer-form-wrap input:focus,.refer-form-wrap select:focus,.refer-form-wrap textarea:focus{border-color:var(--navy)}
  .refer-form-wrap textarea{resize:vertical;min-height:100px}
  .refer-form-wrap .divider-label{font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:700;text-transform:uppercase;
    letter-spacing:.08em;color:var(--navy);margin:1.75rem 0 1rem;padding-top:1.25rem;border-top:1px solid var(--border)}
  .refer-submit{width:100%;background:var(--red);color:#fff;border:none;padding:.9rem;border-radius:8px;
    font-family:'Montserrat',sans-serif;font-weight:700;font-size:.95rem;cursor:pointer;transition:background .2s}
  .refer-submit:hover{background:var(--red-dark)}
  @media(max-width:600px){.refer-form-wrap .form-row{grid-template-columns:1fr}}
</style>
</head>
<body>

<nav id="main-nav">
  <a href="/" class="nav-logo">
    <div class="nav-logo-icon"><img src="assets/img/bhi-logo.png" alt="BHI logo" style="width:100%;height:100%;object-fit:cover;border-radius:50%"></div>
    <div class="nav-logo-text">Bono Heart Initiative<span>Cardio-Metabolic-Renal Care for All</span></div>
  </a>
  <ul class="nav-links">
    <li><a href="/#about">About</a></li>
    <li><a href="/#services">Services</a></li>
    <li><a href="/#outreach">Outreach</a></li>
    <li><a href="/#partners">Partners</a></li>
    <li><a href="/#outreach" class="nav-cta">Get Screened</a></li>
  </ul>
</nav>

<section class="sub-hero">
  <div class="section-tag">Clinical Pathway</div>
  <h1>Refer a patient into<br>CMR care.</h1>
  <p>If you're a community health worker, nurse, clinician, or community member who has seen someone
     showing early cardio-metabolic-renal warning signs, refer them here — our team will follow up
     directly and connect them to the nearest screening or diagnostic pathway.</p>
</section>

<div class="urgent-banner">
  <span style="font-size:1.4rem">⚠️</span>
  <span><strong>For an urgent or emergency case</strong>, don't wait for a form response —
  call or WhatsApp us directly at <a href="tel:+233243255462">+233 243 255 462</a>.</span>
</div>

<section class="bhi-section" style="padding-top:0">
  <div class="bhi-container">
    <div class="text-center">
      <div class="section-tag">When to Refer</div>
      <h2 class="section-title">Any of these warning signs is reason enough.</h2>
      <div class="section-divider"></div>
      <p class="section-sub">BHI screens across the full cardio-metabolic-renal continuum — a patient doesn't need a confirmed diagnosis to be referred, only a reasonable concern.</p>
    </div>
    <div class="flag-strip">
      <div class="flag-chip"><span class="ico">🫀</span> Obesity / high BMI</div>
      <div class="flag-chip"><span class="ico">🩸</span> Insulin resistance</div>
      <div class="flag-chip"><span class="ico">💉</span> Diabetes symptoms</div>
      <div class="flag-chip"><span class="ico">📈</span> High blood pressure</div>
      <div class="flag-chip"><span class="ico">🫘</span> Signs of kidney disease</div>
      <div class="flag-chip"><span class="ico">💔</span> Heart failure symptoms</div>
      <div class="flag-chip"><span class="ico">🧠</span> Stroke history / risk</div>
    </div>
  </div>
</section>

<section class="bhi-section alt">
  <div class="bhi-container">
    <div class="text-center" style="margin-bottom:2.5rem">
      <div class="section-tag">Referral Form</div>
      <h2 class="section-title">Tell us about the patient.</h2>
      <div class="section-divider"></div>
      <p class="section-sub">A member of our team will reach out to arrange screening or a specialist appointment.</p>
    </div>

    <div class="refer-form-wrap">
      <form id="refer-form">
        <div class="form-row">
          <div class="fg">
            <label>Your Name</label>
            <input type="text" name="full_name" required>
          </div>
          <div class="fg">
            <label>Your Role</label>
            <select name="referrer_role" required>
              <option value="">Select role</option>
              <option value="Community Health Worker">Community Health Worker</option>
              <option value="Nurse">Nurse</option>
              <option value="Doctor / Clinician">Doctor / Clinician</option>
              <option value="Community Member">Community Member</option>
              <option value="Other">Other</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="fg">
            <label>Your Phone Number</label>
            <input type="tel" name="phone" required>
          </div>
          <div class="fg">
            <label>Your Email (optional)</label>
            <input type="email" name="email">
          </div>
        </div>

        <div class="divider-label">Patient Details</div>
        <div class="form-row">
          <div class="fg">
            <label>Patient's Name</label>
            <input type="text" name="patient_name" required>
          </div>
          <div class="fg">
            <label>Patient's Phone Number</label>
            <input type="tel" name="patient_phone" required>
          </div>
        </div>
        <div class="fg">
          <label>Patient's District / Community</label>
          <input type="text" name="patient_community" required>
        </div>
        <div class="fg">
          <label>Reason for Referral</label>
          <textarea name="reason" required minlength="20" placeholder="Describe the symptoms or concern that prompted this referral."></textarea>
        </div>
        <button type="submit" class="refer-submit">Submit Referral →</button>
      </form>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/site-footer.php'; ?>

<a href="https://wa.me/233243255462" class="whatsapp-float" target="_blank" aria-label="WhatsApp BHI"></a>

<script src="assets/js/bhi-main.js"></script>
<script>
document.getElementById('refer-form').addEventListener('submit', async (e) => {
  e.preventDefault();
  const form = e.target;
  const btn  = form.querySelector('button[type="submit"]');
  const raw  = new FormData(form);

  const fd = new FormData();
  fd.set('full_name', raw.get('full_name'));
  fd.set('email', raw.get('email') || '');
  fd.set('phone', raw.get('phone'));
  fd.set('enquiry_type', 'referral');
  fd.set('subject', 'Patient Referral — ' + raw.get('patient_name'));
  fd.set('message',
    'Referring person role: ' + raw.get('referrer_role') + '\n\n' +
    'Patient name: ' + raw.get('patient_name') + '\n' +
    'Patient phone: ' + raw.get('patient_phone') + '\n' +
    'Patient district/community: ' + raw.get('patient_community') + '\n\n' +
    'Reason for referral:\n' + raw.get('reason')
  );

  BHI.setLoading(btn, true, 'Submitting...');
  const res = await BHI.post('contact.php', fd);
  BHI.setLoading(btn, false);
  BHI.toast(res.message, res.success ? 'success' : 'error');
  if (res.success) form.reset();
  else if (res.data && res.data.errors) BHI.showFieldErrors(form, res.data.errors);
});
</script>
</body>
</html>