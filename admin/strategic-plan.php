<?php
// ============================================================
// strategic-plan.php
// Bono Heart Initiative — CMR Strategic Plan 2026–2028
// ============================================================
require_once __DIR__ . '/includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Strategic Plan 2026–2028 — Bono Heart Initiative</title>
<meta name="description" content="The Bono Heart Initiative's CMR Strategic Plan 2026–2028 — pillars, governance, and year-by-year milestones.">
<link rel="icon" type="image/png" sizes="512x512" href="assets/img/bhi-logo.png"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&family=Source+Sans+3:ital,wght@0,300;0,400;0,600;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/bhi-index.css">
<link rel="stylesheet" href="assets/css/bhi-dynamic.css">
<style>
  .sub-hero{background:linear-gradient(135deg,var(--navy) 0%,#0f1d47 100%);padding:9rem 2rem 5rem;text-align:center}
  .sub-hero .section-tag{background:rgba(230,168,23,.15);color:var(--gold)}
  .sub-hero h1{font-family:'Montserrat',sans-serif;font-weight:900;font-size:clamp(2rem,5vw,3.2rem);color:#fff;margin:1rem 0}
  .sub-hero p{color:rgba(255,255,255,.8);max-width:640px;margin:0 auto;line-height:1.7;font-size:1.05rem}

  .plan-timeline{max-width:900px;margin:3rem auto 0;position:relative}
  .plan-year{display:flex;gap:2rem;margin-bottom:2.5rem;position:relative}
  .plan-year:not(:last-child)::before{content:'';position:absolute;left:29px;top:64px;bottom:-2.5rem;width:2px;background:var(--border)}
  .plan-year-badge{flex-shrink:0;width:60px;height:60px;border-radius:50%;background:var(--navy);color:#fff;
    display:flex;align-items:center;justify-content:center;font-family:'Montserrat',sans-serif;font-weight:900;font-size:1.05rem}
  .plan-year-body h3{font-family:'Montserrat',sans-serif;font-size:1.15rem;font-weight:800;color:var(--navy);margin-bottom:.75rem}
  .plan-year-body ul{list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:.6rem}
  .plan-year-body li{font-size:.92rem;color:var(--text-mid);line-height:1.6;padding-left:1.4rem;position:relative}
  .plan-year-body li::before{content:'✓';position:absolute;left:0;color:var(--success);font-weight:700}

  .pillar-recap{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:1.25rem;margin-top:2.5rem}
  .pillar-recap-item{text-align:center;padding:1.5rem 1rem;background:#fff;border-radius:12px;border:1.5px solid var(--border)}
  .pillar-recap-item .ico{font-size:1.6rem;margin-bottom:.5rem}
  .pillar-recap-item span{display:block;font-family:'Montserrat',sans-serif;font-size:.82rem;font-weight:700;color:var(--navy)}

  .prospectus-cta{background:var(--navy);border-radius:16px;padding:2.5rem;text-align:center;max-width:760px;margin:0 auto}
  .prospectus-cta h3{font-family:'Montserrat',sans-serif;color:#fff;font-size:1.3rem;font-weight:800;margin-bottom:.75rem}
  .prospectus-cta p{color:rgba(255,255,255,.75);margin-bottom:1.5rem;line-height:1.6}
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
    <li><a href="/#impact">Impact</a></li>
    <li><a href="/#partners">Partners</a></li>
    <li><a href="/#outreach" class="nav-cta">Get Screened</a></li>
  </ul>
</nav>

<section class="sub-hero">
  <div class="section-tag">CMR Strategic Plan 2026–2028</div>
  <h1>Three years.<br>One system. Built to last.</h1>
  <p>BHI operates a formal, board-governed strategic plan — not a series of one-off outreach days.
     Here's what we've already put in place, and what the next two years are built to deliver.</p>
</section>

<section class="bhi-section">
  <div class="bhi-container">
    <div class="text-center">
      <div class="section-tag">Roadmap</div>
      <h2 class="section-title">Year by year.</h2>
      <div class="section-divider"></div>
    </div>

    <div class="plan-timeline">
      <div class="plan-year">
        <div class="plan-year-badge">'26</div>
        <div class="plan-year-body">
          <h3>Foundation Year</h3>
          <ul>
            <li>Formal governance structure established — board-level oversight, clinical advisory input, and financial accountability from the outset.</li>
            <li>Longitudinal CMR registry architecture developed, so every patient is tracked from first contact through final outcome.</li>
            <li>Community-focused delivery model built around outreach days, not fixed clinic visits.</li>
            <li>First community screening, diagnostic, and referral cycles run across the Bono Region.</li>
          </ul>
        </div>
      </div>
      <div class="plan-year">
        <div class="plan-year-badge">'27</div>
        <div class="plan-year-body">
          <h3>Scale &amp; Systematize</h3>
          <ul>
            <li>Expand screening coverage to additional districts and community partners across the region.</li>
            <li>Grow the referral network with district and regional health facilities to shorten time-to-treatment.</li>
            <li>Publish first registry-derived findings to inform regional CMR policy and planning.</li>
          </ul>
        </div>
      </div>
      <div class="plan-year">
        <div class="plan-year-badge">'28</div>
        <div class="plan-year-body">
          <h3>Long-Term Sustainability</h3>
          <ul>
            <li>Diversified, sustainable funding base spanning partnerships, grants, and community support.</li>
            <li>A documented, replicable CMR model other regions in Ghana can adopt.</li>
            <li>Local capacity built so the system continues to run independent of any single individual.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="bhi-section alt">
  <div class="bhi-container">
    <div class="text-center">
      <div class="section-tag">What We're Scaling</div>
      <h2 class="section-title">The five pillars this plan is built around.</h2>
      <div class="section-divider"></div>
    </div>
    <div class="pillar-recap">
      <div class="pillar-recap-item"><div class="ico">🩺</div><span>Community Screening</span></div>
      <div class="pillar-recap-item"><div class="ico">💙</div><span>Precision Diagnostics</span></div>
      <div class="pillar-recap-item"><div class="ico">🧪</div><span>Renal &amp; Metabolic Detection</span></div>
      <div class="pillar-recap-item"><div class="ico">🔄</div><span>Referral Coordination</span></div>
      <div class="pillar-recap-item"><div class="ico">📢</div><span>Advocacy &amp; Education</span></div>
    </div>
  </div>
</section>

<section class="bhi-section" style="text-align:center">
  <div class="bhi-container">
    <div class="prospectus-cta">
      <h3>Want the full plan and partnership terms?</h3>
      <p>Reach out to our partnerships team and we'll share the detailed strategic plan and prospectus directly.</p>
      <a href="/#partners" class="btn-primary">Get in Touch →</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/site-footer.php'; ?>

<a href="https://wa.me/233243255462" class="whatsapp-float" target="_blank" aria-label="WhatsApp BHI"></a>

<script src="assets/js/bhi-main.js"></script>
</body>
</html>

