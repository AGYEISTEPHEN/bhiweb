<?php
// ============================================================
// volunteer.php
// Bono Heart Initiative — Volunteer signup
// ============================================================
require_once __DIR__ . '/includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Volunteer — Bono Heart Initiative</title>
<meta name="description" content="Volunteer with the Bono Heart Initiative at community screening days across the Bono Region.">
<link rel="icon" type="image/png" sizes="512x512" href="assets/img/bhi-logo.png"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&family=Source+Sans+3:ital,wght@0,300;0,400;0,600;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/bhi-index.css">
<link rel="stylesheet" href="assets/css/bhi-dynamic.css">
<style>
  .sub-hero{background:linear-gradient(135deg,var(--navy) 0%,#0f1d47 100%);padding:9rem 2rem 5rem;text-align:center}
  .sub-hero .section-tag{background:rgba(230,168,23,.15);color:var(--gold)}
  .sub-hero h1{font-family:'Montserrat',sans-serif;font-weight:900;font-size:clamp(2rem,5vw,3.2rem);color:#fff;margin:1rem 0}
  .sub-hero p{color:rgba(255,255,255,.8);max-width:620px;margin:0 auto;line-height:1.7;font-size:1.05rem}

  .role-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:1.5rem;margin-top:3rem}
  .role-card{background:#fff;border-radius:14px;padding:1.75rem;border:1.5px solid var(--border);transition:transform .2s,box-shadow .2s}
  .role-card:hover{transform:translateY(-4px);box-shadow:0 12px 32px rgba(27,47,110,.1)}
  .role-card .ico{font-size:1.8rem;margin-bottom:.75rem}
  .role-card h3{font-family:'Montserrat',sans-serif;font-size:1.05rem;font-weight:800;color:var(--navy);margin-bottom:.5rem}
  .role-card p{font-size:.9rem;color:var(--text-mid);line-height:1.6}

  .vol-form-wrap{max-width:640px;margin:0 auto;background:#fff;border-radius:16px;padding:2.5rem;box-shadow:0 10px 40px rgba(27,47,110,.08)}
  .vol-form-wrap .form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
  .vol-form-wrap label{display:block;font-family:'Montserrat',sans-serif;font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.05em;color:var(--text-mid);margin-bottom:.4rem}
  .vol-form-wrap .fg{margin-bottom:1.25rem}
  .vol-form-wrap input,.vol-form-wrap select,.vol-form-wrap textarea{
    width:100%;padding:.75rem .9rem;border:1.5px solid var(--border);border-radius:8px;font-size:.92rem;
    font-family:'Source Sans 3',sans-serif;outline:none;transition:border-color .2s
  }
  .vol-form-wrap input:focus,.vol-form-wrap select:focus,.vol-form-wrap textarea:focus{border-color:var(--navy)}
  .vol-form-wrap textarea{resize:vertical;min-height:100px}
  .vol-submit{width:100%;background:var(--red);color:#fff;border:none;padding:.9rem;border-radius:8px;
    font-family:'Montserrat',sans-serif;font-weight:700;font-size:.95rem;cursor:pointer;transition:background .2s}
  .vol-submit:hover{background:var(--red-dark)}
  @media(max-width:600px){.vol-form-wrap .form-row{grid-template-columns:1fr}}
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
    <li><a href="/#outreach">Outreach</a></li>
    <li><a href="/#field">Gallery</a></li>
    <li><a href="/#partners">Partners</a></li>
    <li><a href="/#outreach" class="nav-cta">Get Screened</a></li>
  </ul>
</nav>

<section class="sub-hero">
  <div class="section-tag">Get Involved</div>
  <h1>Give a Saturday.<br>Help save a heart.</h1>
  <p>BHI's screening days run on volunteers — registering families, guiding them through the process,
     and keeping the day organised so our clinical team can focus on care. No medical background required
     for most roles; just time, reliability, and a heart for your community.</p>
</section>

<section class="bhi-section">
  <div class="bhi-container">
    <div class="text-center">
      <div class="section-tag">Where You Fit</div>
      <h2 class="section-title">Four ways to help on screening day.</h2>
      <div class="section-divider"></div>
      <p class="section-sub">Pick the role that matches your skills and availability — most volunteers work a single outreach day at a time, no long-term commitment required.</p>
    </div>

    <div class="role-grid">
      <div class="role-card">
        <div class="ico">📋</div>
        <h3>Registration &amp; Language Support</h3>
        <p>Welcome community members, help them complete registration forms, and translate between English, Twi, and local dialects where needed.</p>
      </div>
      <div class="role-card">
        <div class="ico">📣</div>
        <h3>Community Mobilization</h3>
        <p>Work with local leaders and community information centres in the days before an outreach to spread the word and answer questions.</p>
      </div>
      <div class="role-card">
        <div class="ico">🗂️</div>
        <h3>Data &amp; Records</h3>
        <p>Support the team entering screening results into the registry accurately, and help track referrals through to follow-up.</p>
      </div>
      <div class="role-card">
        <div class="ico">🩺</div>
        <h3>Clinical Support</h3>
        <p>For nurses, clinical students, and allied health workers — assist with vitals, echo setup, and patient flow under supervision.</p>
      </div>
    </div>
  </div>
</section>

<section class="bhi-section alt">
  <div class="bhi-container">
    <div class="text-center" style="margin-bottom:2.5rem">
      <div class="section-tag">Sign Up</div>
      <h2 class="section-title">Tell us about yourself.</h2>
      <div class="section-divider"></div>
      <p class="section-sub">We'll be in touch about upcoming outreach dates that match your role and location.</p>
    </div>

    <div class="vol-form-wrap">
      <form id="volunteer-form">
        <div class="form-row">
          <div class="fg">
            <label>Full Name</label>
            <input type="text" name="full_name" required>
          </div>
          <div class="fg">
            <label>Phone Number</label>
            <input type="tel" name="phone" required>
          </div>
        </div>
        <div class="form-row">
          <div class="fg">
            <label>Email Address</label>
            <input type="email" name="email" required>
          </div>
          <div class="fg">
            <label>District / Community</label>
            <input type="text" name="community" required>
          </div>
        </div>
        <div class="fg">
          <label>Preferred Role</label>
          <select name="role" required>
            <option value="">Select a role</option>
            <option value="Registration & Language Support">Registration &amp; Language Support</option>
            <option value="Community Mobilization">Community Mobilization</option>
            <option value="Data & Records">Data &amp; Records</option>
            <option value="Clinical Support">Clinical Support (health workers &amp; students)</option>
          </select>
        </div>
        <div class="fg">
          <label>Why would you like to volunteer with BHI?</label>
          <textarea name="note" required minlength="20" placeholder="A sentence or two is fine."></textarea>
        </div>
        <button type="submit" class="vol-submit">Submit Application →</button>
      </form>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/site-footer.php'; ?>

<a href="https://wa.me/233243255462" class="whatsapp-float" target="_blank" aria-label="WhatsApp BHI"></a>

<script src="assets/js/bhi-main.js"></script>
<script>
document.getElementById('volunteer-form').addEventListener('submit', async (e) => {
  e.preventDefault();
  const form = e.target;
  const btn  = form.querySelector('button[type="submit"]');
  const raw  = new FormData(form);

  const fd = new FormData();
  fd.set('full_name', raw.get('full_name'));
  fd.set('email', raw.get('email'));
  fd.set('phone', raw.get('phone'));
  fd.set('enquiry_type', 'volunteer');
  fd.set('subject', 'Volunteer Application — ' + raw.get('role'));
  fd.set('message',
    'Preferred role: ' + raw.get('role') + '\n' +
    'District/Community: ' + raw.get('community') + '\n\n' +
    raw.get('note')
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