<?php
// ============================================================
// includes/site-footer.php
// Shared footer for standalone pages (volunteer, refer, strategic-plan, etc.)
// Mirrors the footer in index.php — keep both in sync if editing.
// ============================================================
if (!defined('BHI_API')) { /* public page context, no-op guard for consistency */ }
?>
<footer id="contact">
  <div class="footer-grid">
    <div class="footer-brand">
      <div class="footer-logo">
        <div class="footer-logo-icon">
          <img src="assets/img/bhi-logo.png" alt="BHI logo" style="width:100%;height:100%;object-fit:cover;border-radius:50%">
        </div>
        <div class="footer-logo-text">
          Bono Heart Initiative
          <span>Cardio-Metabolic-Renal Care for All</span>
        </div>
      </div>
      <p class="footer-desc">
        A cardiologist-led cardio-metabolic-renal equity initiative bringing heart screening,
        diabetes detection, renal assessment, and specialist referral closer to communities
        across the Bono Region, Ghana.
      </p>
      <div class="footer-contact">
        <a href="mailto:info@bonoheartinitiative.org">📧 info@bonoheartinitiative.org</a>
        <a href="mailto:partner@bonoheartinitiative.org">🤝 partner@bonoheartinitiative.org</a>
        <a href="tel:+233243255462">📞 +233 243 255 462</a>
        <a href="https://wa.me/233243255462">💬 WhatsApp Dr. Bediako Mensah</a>
      </div>
    </div>
    <div class="footer-col">
      <h4>Quick Links</h4>
      <a href="/#about">About BHI</a>
      <a href="/#founder">Why BHI Was Created</a>
      <a href="/#how">How It Works</a>
      <a href="/#cmr">CMR Disease</a>
      <a href="/#services">Services</a>
      <a href="/#registry">Registry</a>
      <a href="/#roadmap">Road Ahead</a>
      <a href="/#impact">Impact</a>
      <a href="/admin/login">Admin Login</a>
    </div>
    <div class="footer-col">
      <h4>Get Involved</h4>
      <a href="/#outreach">Get Screened</a>
      <a href="/#partners">Partner With Us</a>
      <a href="/volunteer">Volunteer</a>
      <a href="/refer">Refer a Patient</a>
      <a href="/strategic-plan">Strategic Plan</a>
    </div>
    <div class="footer-col">
      <h4>Stay Informed</h4>
      <p style="font-size:0.8rem; color:rgba(255,255,255,0.5); margin-bottom:0.75rem; line-height:1.5;">
        Receive screening dates and impact updates.
      </p>
      <form class="footer-newsletter" data-bhi-form="newsletter" data-source="<?= htmlspecialchars(basename($_SERVER['SCRIPT_NAME'], '.php')) ?>" style="display:flex">
        <input type="email" name="email" placeholder="Your email address" required>
        <button type="submit">Subscribe</button>
      </form>
    </div>
  </div>
  <div class="footer-bottom">
    <span>© 2026 Bono Heart Initiative. Bono Region, Ghana. All rights reserved.</span>
    <span>
      Founded by Dr. Edward Bediako Mensah, MD · Sunyani Teaching Hospital ·
      <a href="/privacy">Privacy Policy</a>
    </span>
  </div>
</footer>