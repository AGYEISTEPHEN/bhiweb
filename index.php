<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bono Heart Initiative | Cardio-Metabolic-Renal Care — Bono Region Ghana</title>
<link rel="icon" type="image/png" sizes="512x512" href="assets/img/bhi-logo.jpeg"/>
<meta name="description" content="BHI brings free cardio-metabolic-renal screening, echocardiography, and specialist referral to underserved communities across the Bono Region. Get screened. Support the mission.">
<meta property="og:title" content="Bono Heart Initiative — Cardio-Metabolic-Renal Care for All">
<meta property="og:description" content="Heart care should not depend on where you live. BHI addresses the full cardio-metabolic-renal continuum — heart, diabetes, kidneys — across the Bono Region, Ghana.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&family=Source+Sans+3:ital,wght@0,300;0,400;0,600;1,400&display=swap" rel="stylesheet">
<style>

  :root {
    --navy: #1B2F6E;
    --navy-dark: #0f1d47;
    --navy-light: #243d8a;
    --red: #C8102E;
    --red-dark: #a00d25;
    --white: #FFFFFF;
    --light-bg: #F7F9FC;
    --text-dark: #1E293B;
    --text-mid: #475569;
    --text-light: #94a3b8;
    --success: #2E8B57;
    --gold: #E6A817;
    --border: #e2e8f0;
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  html { scroll-behavior: smooth; }

  body {
    font-family: 'Source Sans 3', sans-serif;
    color: var(--text-dark);
    line-height: 1.6;
    overflow-x: hidden;
  }

  h1, h2, h3, h4, h5 {
    font-family: 'Montserrat', sans-serif;
    font-weight: 800;
    line-height: 1.15;
  }

  /* ── NAVBAR ── */
  nav {
    position: fixed;
    top: 0; left: 0; right: 0;
    z-index: 1000;
    background: rgba(27, 47, 110, 0.97);
    backdrop-filter: blur(10px);
    border-bottom: 2px solid var(--red);
    padding: 0 2rem;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .nav-logo {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    text-decoration: none;
  }

  .nav-logo-icon {
    width: 42px;
    height: 42px;
    background: var(--red);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
  }

  .nav-logo-text {
    color: white;
    font-family: 'Montserrat', sans-serif;
    font-weight: 800;
    font-size: 1rem;
    line-height: 1.2;
  }

  .nav-logo-text span {
    display: block;
    font-size: 0.65rem;
    font-weight: 400;
    color: rgba(255,255,255,0.7);
    letter-spacing: 0.05em;
  }

  .nav-links {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    list-style: none;
  }

  .nav-links a {
    color: rgba(255,255,255,0.85);
    text-decoration: none;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.78rem;
    font-weight: 600;
    padding: 0.4rem 0.6rem;
    border-radius: 4px;
    transition: all 0.2s;
    letter-spacing: 0.02em;
  }

  .nav-links a:hover { color: white; background: rgba(255,255,255,0.1); }

  .nav-cta {
    background: var(--red) !important;
    color: white !important;
    padding: 0.5rem 1.2rem !important;
    border-radius: 6px !important;
    transition: background 0.2s !important;
  }

  .nav-cta:hover { background: var(--red-dark) !important; }

  /* ── HERO ── */
  .hero {
    min-height: 100vh;
    background: 
      linear-gradient(135deg, rgba(27,47,110,0.92) 0%, rgba(27,47,110,0.75) 60%, rgba(200,16,46,0.4) 100%),
      url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=1600&q=80') center/cover no-repeat;
    display: flex;
    align-items: center;
    padding: 100px 2rem 4rem;
    position: relative;
    overflow: hidden;
  }

  .hero::before {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 120px;
    background: linear-gradient(to bottom, transparent, var(--white));
  }

  .hero-content {
    max-width: 780px;
    margin: 0 auto;
    text-align: center;
    color: white;
    animation: fadeUp 0.9s ease both;
  }

  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.25);
    padding: 0.4rem 1rem;
    border-radius: 50px;
    font-size: 0.8rem;
    font-family: 'Montserrat', sans-serif;
    font-weight: 600;
    letter-spacing: 0.05em;
    margin-bottom: 1.5rem;
    animation: fadeUp 0.9s ease 0.1s both;
  }

  .hero-badge::before { content: '🫀'; }

  .hero h1 {
    font-size: clamp(2.2rem, 5vw, 3.8rem);
    font-weight: 900;
    color: white;
    margin-bottom: 1.25rem;
    animation: fadeUp 0.9s ease 0.2s both;
  }

  .hero h1 em {
    font-style: normal;
    color: var(--gold);
  }

  .hero-sub {
    font-size: 1.15rem;
    color: rgba(255,255,255,0.88);
    max-width: 580px;
    margin: 0 auto 2.5rem;
    line-height: 1.7;
    animation: fadeUp 0.9s ease 0.3s both;
  }

  .hero-ctas {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    justify-content: center;
    margin-bottom: 1.5rem;
    animation: fadeUp 0.9s ease 0.4s both;
  }

  .btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--red);
    color: white;
    padding: 0.875rem 2rem;
    border-radius: 8px;
    text-decoration: none;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 0.95rem;
    letter-spacing: 0.02em;
    transition: all 0.2s;
    border: 2px solid var(--red);
  }

  .btn-primary:hover {
    background: var(--red-dark);
    border-color: var(--red-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(200,16,46,0.4);
  }

  .btn-secondary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: transparent;
    color: white;
    padding: 0.875rem 2rem;
    border-radius: 8px;
    text-decoration: none;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 0.95rem;
    border: 2px solid rgba(255,255,255,0.6);
    transition: all 0.2s;
  }

  .btn-secondary:hover {
    background: rgba(255,255,255,0.12);
    border-color: white;
    transform: translateY(-2px);
  }

  .hero-link {
    color: rgba(255,255,255,0.7);
    font-size: 0.875rem;
    animation: fadeUp 0.9s ease 0.5s both;
  }

  .hero-link a { color: white; font-weight: 600; text-decoration: underline; }

  .hero-trust {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1.5rem;
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid rgba(255,255,255,0.15);
    animation: fadeUp 0.9s ease 0.6s both;
  }

  .trust-item {
    display: flex;
    align-items: center;
    gap: 0.4rem;
    color: rgba(255,255,255,0.8);
    font-size: 0.82rem;
    font-family: 'Montserrat', sans-serif;
    font-weight: 600;
  }

  .trust-item::before {
    content: '✓';
    color: var(--success);
    font-weight: 900;
  }

  /* ── SECTIONS ── */
  section { padding: 5rem 2rem; }

  .container {
    max-width: 1100px;
    margin: 0 auto;
  }

  .section-tag {
    display: inline-block;
    background: rgba(200,16,46,0.1);
    color: var(--red);
    padding: 0.3rem 0.9rem;
    border-radius: 50px;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: 1rem;
  }

  .section-tag.navy {
    background: rgba(27,47,110,0.1);
    color: var(--navy);
  }

  .section-title {
    font-size: clamp(1.8rem, 3.5vw, 2.6rem);
    color: var(--navy);
    margin-bottom: 1rem;
  }

  .section-sub {
    font-size: 1.05rem;
    color: var(--text-mid);
    max-width: 600px;
    line-height: 1.7;
  }

  .text-center { text-align: center; }
  .text-center .section-sub { margin: 0 auto; }

  /* ── PROBLEM SECTION ── */
  .problem-section { background: var(--white); }

  .stat-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
    margin-top: 3rem;
  }

  .stat-card {
    background: var(--light-bg);
    border-radius: 12px;
    padding: 2rem;
    border-left: 4px solid var(--red);
    transition: transform 0.2s, box-shadow 0.2s;
  }

  .stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 35px rgba(27,47,110,0.12);
  }

  .stat-number {
    font-family: 'Montserrat', sans-serif;
    font-size: 2.8rem;
    font-weight: 900;
    color: var(--red);
    line-height: 1;
    margin-bottom: 0.5rem;
  }

  .stat-label {
    font-size: 0.95rem;
    color: var(--text-mid);
    line-height: 1.5;
  }

  .stat-label strong {
    display: block;
    color: var(--navy);
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 1rem;
    margin-bottom: 0.25rem;
  }

  /* ── WHY BONO ── */
  .why-bono { background: var(--navy); color: white; }

  .why-bono .section-tag { background: rgba(255,255,255,0.1); color: rgba(255,255,255,0.8); }
  .why-bono .section-title { color: white; }
  .why-bono .section-sub { color: rgba(255,255,255,0.75); }

  .bono-facts {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-top: 3rem;
  }

  .bono-fact {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 10px;
    padding: 1.5rem;
    transition: background 0.2s;
  }

  .bono-fact:hover { background: rgba(255,255,255,0.12); }

  .bono-fact-value {
    font-family: 'Montserrat', sans-serif;
    font-size: 1.6rem;
    font-weight: 900;
    color: var(--gold);
    margin-bottom: 0.4rem;
  }

  .bono-fact-label {
    font-size: 0.875rem;
    color: rgba(255,255,255,0.75);
    line-height: 1.4;
  }

  .bono-closing {
    margin-top: 3rem;
    padding: 2rem;
    background: rgba(200,16,46,0.2);
    border-left: 4px solid var(--red);
    border-radius: 0 10px 10px 0;
    font-family: 'Montserrat', sans-serif;
    font-size: 1.1rem;
    font-weight: 700;
    font-style: italic;
    color: white;
  }

  /* ── TRUST SECTION ── */
  .trust-section { background: var(--light-bg); }

  /* CMR Core Philosophy */
  .cmr-philosophy {
    background: var(--navy);
    border-radius: 14px;
    padding: 2.5rem 3rem;
    margin: 2rem 0 3rem;
    position: relative;
    overflow: hidden;
  }

  .cmr-philosophy::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 6px; height: 100%;
    background: var(--red);
    border-radius: 14px 0 0 14px;
  }

  .cmr-philosophy-label {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.68rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    color: var(--gold);
    margin-bottom: 1.1rem;
  }

  .cmr-philosophy-statement {
    font-family: 'Montserrat', sans-serif;
    font-size: clamp(1rem, 1.8vw, 1.2rem);
    font-weight: 800;
    color: white;
    line-height: 1.5;
    margin-bottom: 1.1rem;
    max-width: 820px;
  }

  .cmr-philosophy-body {
    font-size: 0.975rem;
    color: rgba(255,255,255,0.78);
    line-height: 1.75;
    max-width: 820px;
    margin-bottom: 1.5rem;
  }

  .cmr-philosophy-divider {
    width: 50px;
    height: 3px;
    background: var(--red);
    border-radius: 2px;
    margin-bottom: 1.5rem;
  }

  .cmr-philosophy-core {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.92rem;
    font-weight: 700;
    color: rgba(255,255,255,0.95);
    line-height: 1.65;
    max-width: 820px;
    font-style: italic;
  }

  @media (max-width: 600px) {
    .cmr-philosophy { padding: 2rem 1.5rem; }
  }

  .trust-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 1.5rem;
    margin-top: 3rem;
  }

  .trust-card {
    background: white;
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 2px 12px rgba(27,47,110,0.08);
    transition: transform 0.2s, box-shadow 0.2s;
    border-top: 3px solid var(--navy);
  }

  .trust-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 35px rgba(27,47,110,0.15);
  }

  .trust-icon {
    width: 48px; height: 48px;
    background: rgba(27,47,110,0.08);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    margin-bottom: 1rem;
  }

  .trust-card h3 {
    font-size: 1rem;
    color: var(--navy);
    margin-bottom: 0.5rem;
    font-weight: 700;
  }

  .trust-card p {
    font-size: 0.9rem;
    color: var(--text-mid);
    line-height: 1.6;
  }

  /* ── HOW IT WORKS ── */
  .how-section { background: white; }

  .two-tier {
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    gap: 1.5rem;
    align-items: center;
    margin-top: 3rem;
  }

  .tier-card {
    background: var(--light-bg);
    border-radius: 14px;
    padding: 2.5rem;
    border: 2px solid transparent;
    transition: all 0.3s;
  }

  .tier-card.tier1 { border-color: var(--navy); }
  .tier-card.tier2 { border-color: var(--red); }

  .tier-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 40px rgba(27,47,110,0.12);
  }

  .tier-label {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 50px;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    margin-bottom: 1rem;
  }

  .tier1 .tier-label { background: var(--navy); color: white; }
  .tier2 .tier-label { background: var(--red); color: white; }

  .tier-card h3 {
    font-size: 1.3rem;
    color: var(--navy);
    margin-bottom: 0.75rem;
  }

  .tier-card p {
    font-size: 0.9rem;
    color: var(--text-mid);
    margin-bottom: 1.25rem;
    line-height: 1.6;
  }

  .tier-list {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
  }

  .tier-list li {
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
    font-size: 0.875rem;
    color: var(--text-dark);
  }

  .tier-list li::before {
    content: '→';
    color: var(--red);
    font-weight: 700;
    flex-shrink: 0;
    margin-top: 1px;
  }

  .tier-arrow {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    color: var(--red);
    font-size: 0.72rem;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }

  .tier-arrow svg { color: var(--red); }

  .how-closing {
    text-align: center;
    margin-top: 3rem;
    padding: 1.5rem 2rem;
    background: var(--navy);
    border-radius: 10px;
    color: white;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 1.05rem;
    letter-spacing: 0.01em;
  }

  /* ── SERVICES ── */
  .services-section { background: var(--light-bg); }

  .pillars {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.25rem;
    margin-top: 3rem;
  }

  .pillar {
    background: white;
    border-radius: 12px;
    padding: 1.75rem 1.5rem;
    text-align: center;
    transition: all 0.25s;
    box-shadow: 0 2px 10px rgba(27,47,110,0.06);
  }

  .pillar:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(27,47,110,0.14);
  }

  .pillar-icon {
    font-size: 2.2rem;
    margin-bottom: 1rem;
  }

  .pillar h3 {
    font-size: 0.95rem;
    color: var(--navy);
    margin-bottom: 0.6rem;
  }

  .pillar p {
    font-size: 0.825rem;
    color: var(--text-mid);
    line-height: 1.5;
  }

  /* ── REGISTRY ── */
  .registry-section { background: var(--navy); color: white; }
  .registry-section .section-tag { background: rgba(255,255,255,0.1); color: rgba(255,255,255,0.8); }
  .registry-section .section-title { color: white; }
  .registry-section .section-sub { color: rgba(255,255,255,0.75); max-width: 680px; }

  .registry-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.25rem;
    margin-top: 3rem;
  }

  .registry-card {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 12px;
    padding: 1.75rem 1.5rem;
    transition: background 0.2s;
  }

  .registry-card:hover { background: rgba(255,255,255,0.12); }

  .registry-card-icon { font-size: 1.8rem; margin-bottom: 0.75rem; }

  .registry-card h3 {
    font-size: 0.9rem;
    color: white;
    margin-bottom: 0.5rem;
    font-weight: 700;
  }

  .registry-card p {
    font-size: 0.825rem;
    color: rgba(255,255,255,0.65);
    line-height: 1.5;
  }

  .registry-chain {
    margin-top: 3rem;
    padding: 2rem;
    background: rgba(255,255,255,0.05);
    border-radius: 12px;
    text-align: center;
  }

  .registry-chain-title {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.8rem;
    font-weight: 700;
    color: rgba(255,255,255,0.5);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 1.5rem;
  }

  .chain-steps {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
  }

  .chain-step {
    background: rgba(255,255,255,0.1);
    padding: 0.5rem 1.2rem;
    border-radius: 6px;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.85rem;
    font-weight: 700;
    color: white;
  }

  .chain-arrow {
    color: var(--gold);
    font-size: 1.1rem;
    font-weight: 900;
  }

  /* ── IMPACT ── */
  .impact-section { background: white; }

  .impact-numbers {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 1.5rem;
    margin-top: 3rem;
  }

  .impact-number {
    text-align: center;
    padding: 2rem 1rem;
    border-radius: 12px;
    background: var(--light-bg);
    border-bottom: 3px solid var(--navy);
    transition: transform 0.2s;
  }

  .impact-number:hover { transform: translateY(-4px); }

  .impact-value {
    font-family: 'Montserrat', sans-serif;
    font-size: 2.5rem;
    font-weight: 900;
    color: var(--navy);
    line-height: 1;
    margin-bottom: 0.4rem;
  }

  .impact-label {
    font-size: 0.825rem;
    color: var(--text-mid);
    font-weight: 600;
  }

  .impact-note {
    text-align: center;
    margin-top: 2rem;
    font-size: 0.85rem;
    color: var(--text-light);
    font-style: italic;
  }

  /* ── PARTNERSHIP ── */
  .partnership-section { background: var(--light-bg); }

  .tiers-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
    gap: 1.25rem;
    margin-top: 3rem;
  }

  .tier-invest {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(27,47,110,0.1);
    transition: transform 0.2s, box-shadow 0.2s;
    background: white;
  }

  .tier-invest:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 40px rgba(27,47,110,0.18);
  }

  .tier-invest-header {
    padding: 1.5rem 1.25rem;
    text-align: center;
  }

  .tier-invest-header.bronze { background: #7D7D7D; }
  .tier-invest-header.silver { background: #4A90D9; }
  .tier-invest-header.gold { background: #E6A817; }
  .tier-invest-header.platinum { background: var(--red); }
  .tier-invest-header.corporate { background: var(--navy); }

  .tier-name {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: rgba(255,255,255,0.85);
    margin-bottom: 0.4rem;
  }

  .tier-amount {
    font-family: 'Montserrat', sans-serif;
    font-size: 1.6rem;
    font-weight: 900;
    color: white;
    margin-bottom: 0.2rem;
  }

  .tier-usd {
    font-size: 0.75rem;
    color: rgba(255,255,255,0.7);
  }

  .tier-invest-body {
    padding: 1.25rem;
  }

  .tier-suited {
    font-size: 0.78rem;
    color: var(--text-mid);
    margin-bottom: 0.75rem;
    line-height: 1.4;
  }

  .tier-suited strong {
    display: block;
    color: var(--navy);
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 0.72rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 0.2rem;
  }

  .tier-benefits {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 0.35rem;
  }

  .tier-benefits li {
    font-size: 0.78rem;
    color: var(--text-mid);
    display: flex;
    gap: 0.4rem;
    align-items: flex-start;
    line-height: 1.4;
  }

  .tier-benefits li::before {
    content: '✓';
    color: var(--success);
    font-weight: 900;
    flex-shrink: 0;
    margin-top: 1px;
  }

  .partner-cta-block {
    margin-top: 3rem;
    text-align: center;
  }

  .partner-cta-block p {
    font-size: 1rem;
    color: var(--text-mid);
    margin-bottom: 1.5rem;
    font-style: italic;
  }

  /* ── CLOSING CTA ── */
  .closing-section {
    background: 
      linear-gradient(135deg, rgba(27,47,110,0.95) 0%, rgba(27,47,110,0.88) 100%),
      url('https://images.unsplash.com/photo-1559757175-5700dde675bc?w=1600&q=80') center/cover;
    color: white;
    text-align: center;
    padding: 6rem 2rem;
  }

  .closing-section h2 {
    font-size: clamp(2rem, 4vw, 3rem);
    color: white;
    margin-bottom: 1.25rem;
    line-height: 1.2;
  }

  .closing-section h2 em {
    font-style: normal;
    color: var(--gold);
  }

  .closing-section p {
    font-size: 1.05rem;
    color: rgba(255,255,255,0.8);
    max-width: 600px;
    margin: 0 auto 2.5rem;
    line-height: 1.7;
  }

  .closing-ctas {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    justify-content: center;
  }

  .btn-outline-white {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: transparent;
    color: white;
    padding: 0.875rem 2rem;
    border-radius: 8px;
    text-decoration: none;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 0.95rem;
    border: 2px solid rgba(255,255,255,0.5);
    transition: all 0.2s;
  }

  .btn-outline-white:hover {
    background: rgba(255,255,255,0.1);
    border-color: white;
    transform: translateY(-2px);
  }

  /* ── FOOTER ── */
  footer {
    background: var(--navy-dark);
    color: rgba(255,255,255,0.7);
    padding: 4rem 2rem 2rem;
  }

  .footer-grid {
    max-width: 1100px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1.5fr;
    gap: 3rem;
    padding-bottom: 3rem;
    border-bottom: 1px solid rgba(255,255,255,0.1);
  }

  .footer-brand {}

  .footer-logo {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
  }

  .footer-logo-icon {
    width: 38px; height: 38px;
    background: var(--red);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
  }

  .footer-logo-text {
    color: white;
    font-family: 'Montserrat', sans-serif;
    font-weight: 800;
    font-size: 0.9rem;
    line-height: 1.2;
  }

  .footer-logo-text span {
    display: block;
    font-size: 0.6rem;
    font-weight: 400;
    color: rgba(255,255,255,0.5);
    letter-spacing: 0.05em;
  }

  .footer-desc {
    font-size: 0.875rem;
    line-height: 1.6;
    margin-bottom: 1.25rem;
    color: rgba(255,255,255,0.6);
  }

  .footer-contact a {
    color: rgba(255,255,255,0.75);
    text-decoration: none;
    font-size: 0.85rem;
    display: block;
    margin-bottom: 0.35rem;
    transition: color 0.2s;
  }

  .footer-contact a:hover { color: white; }

  .footer-col h4 {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: white;
    margin-bottom: 1rem;
  }

  .footer-col a {
    display: block;
    color: rgba(255,255,255,0.6);
    text-decoration: none;
    font-size: 0.875rem;
    margin-bottom: 0.5rem;
    transition: color 0.2s;
  }

  .footer-col a:hover { color: white; }

  .footer-newsletter input {
    width: 100%;
    padding: 0.65rem 1rem;
    border-radius: 6px;
    border: 1px solid rgba(255,255,255,0.2);
    background: rgba(255,255,255,0.08);
    color: white;
    font-size: 0.875rem;
    margin-bottom: 0.5rem;
    outline: none;
    transition: border-color 0.2s;
  }

  .footer-newsletter input::placeholder { color: rgba(255,255,255,0.4); }
  .footer-newsletter input:focus { border-color: rgba(255,255,255,0.5); }

  .footer-newsletter button {
    width: 100%;
    padding: 0.65rem 1rem;
    background: var(--red);
    color: white;
    border: none;
    border-radius: 6px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 0.85rem;
    cursor: pointer;
    transition: background 0.2s;
  }

  .footer-newsletter button:hover { background: var(--red-dark); }

  .footer-bottom {
    max-width: 1100px;
    margin: 2rem auto 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    font-size: 0.8rem;
    color: rgba(255,255,255,0.4);
  }

  .footer-bottom a { color: rgba(255,255,255,0.5); text-decoration: none; }
  .footer-bottom a:hover { color: white; }

  /* ── WHATSAPP FLOAT ── */
  .whatsapp-float {
    position: fixed;
    bottom: 1.5rem;
    right: 1.5rem;
    z-index: 999;
    width: 56px; height: 56px;
    background: #25D366;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 20px rgba(37,211,102,0.4);
    text-decoration: none;
    transition: transform 0.2s, box-shadow 0.2s;
    animation: pulse 2s infinite;
  }

  .whatsapp-float:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 28px rgba(37,211,102,0.5);
    animation: none;
  }

  @keyframes pulse {
    0%, 100% { box-shadow: 0 4px 20px rgba(37,211,102,0.4); }
    50% { box-shadow: 0 4px 30px rgba(37,211,102,0.7); }
  }

  .whatsapp-float svg { width: 28px; height: 28px; fill: white; }

  /* ── SCROLL INDICATOR ── */
  .scroll-indicator {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    color: rgba(255,255,255,0.5);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.3rem;
    font-size: 0.7rem;
    font-family: 'Montserrat', sans-serif;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    animation: bounce 2s infinite;
  }

  @keyframes bounce {
    0%, 100% { transform: translateX(-50%) translateY(0); }
    50% { transform: translateX(-50%) translateY(6px); }
  }

  /* ── DIVIDER ── */
  .section-divider {
    width: 60px;
    height: 4px;
    background: var(--red);
    margin: 1.25rem 0;
    border-radius: 2px;
  }

  .text-center .section-divider { margin: 1.25rem auto; }

  /* ── RESPONSIVE ── */
  @media (max-width: 900px) {
    .two-tier {
      grid-template-columns: 1fr;
    }
    .tier-arrow {
      transform: rotate(90deg);
      margin: 0.5rem auto;
    }
    .footer-grid {
      grid-template-columns: 1fr 1fr;
    }
  }

  @media (max-width: 600px) {
    .hero h1 { font-size: 2rem; }
    .nav-links { display: none; }
    .footer-grid { grid-template-columns: 1fr; gap: 2rem; }
    .hero-trust { gap: 0.75rem; }
    section { padding: 3.5rem 1.25rem; }
  }

  /* ── SCROLL REVEAL ── */
  .reveal {
    opacity: 0;
    transform: translateY(25px);
    transition: opacity 0.7s ease, transform 0.7s ease;
  }

  .reveal.visible {
    opacity: 1;
    transform: none;
  }

  /* ── FOUNDER SECTION ── */
  .founder-section { background: var(--white); }

  .founder-grid {
    display: grid;
    grid-template-columns: 320px 1fr;
    gap: 4rem;
    align-items: flex-start;
    margin-top: 1rem;
  }

  .founder-photo-wrap { position: sticky; top: 90px; }

  .founder-photo-placeholder {
    width: 100%;
    aspect-ratio: 3/4;
    background: linear-gradient(145deg, var(--light-bg) 0%, #dde6f0 100%);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px dashed var(--border);
    margin-bottom: 1.25rem;
    overflow: hidden;
    position: relative;
  }

  .founder-photo-placeholder::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 40%;
    background: linear-gradient(to top, rgba(27,47,110,0.15), transparent);
  }

  .founder-photo-inner {
    text-align: center;
  }

  .founder-initials {
    font-family: 'Montserrat', sans-serif;
    font-size: 3.5rem;
    font-weight: 900;
    color: var(--navy);
    opacity: 0.25;
    line-height: 1;
    margin-bottom: 0.5rem;
  }

  .founder-photo-label {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.72rem;
    font-weight: 600;
    color: var(--text-light);
    text-align: center;
    line-height: 1.4;
    letter-spacing: 0.04em;
  }

  .founder-nameplate {
    background: var(--navy);
    border-radius: 10px;
    padding: 1.25rem 1.5rem;
  }

  .founder-name {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.9rem;
    font-weight: 800;
    color: white;
    margin-bottom: 0.25rem;
  }

  .founder-title {
    font-size: 0.8rem;
    color: var(--gold);
    font-weight: 600;
    margin-bottom: 0.2rem;
  }

  .founder-institution {
    font-size: 0.75rem;
    color: rgba(255,255,255,0.6);
  }

  .founder-body {
    font-size: 1rem;
    color: var(--text-mid);
    line-height: 1.8;
    margin-bottom: 1.1rem;
  }

  .founder-quote {
    border-left: 4px solid var(--red);
    padding: 1rem 1.5rem;
    margin: 1.5rem 0;
    font-family: 'Montserrat', sans-serif;
    font-size: 1.15rem;
    font-weight: 800;
    font-style: italic;
    color: var(--navy);
    background: var(--light-bg);
    border-radius: 0 10px 10px 0;
  }

  .founder-link {
    display: inline-flex;
    align-items: center;
    margin-top: 1.25rem;
    color: var(--red);
    font-family: 'Montserrat', sans-serif;
    font-size: 0.9rem;
    font-weight: 700;
    text-decoration: none;
    border-bottom: 2px solid transparent;
    transition: border-color 0.2s;
  }

  .founder-link:hover { border-color: var(--red); }

  @media (max-width: 900px) {
    .founder-grid { grid-template-columns: 1fr; gap: 2.5rem; }
    .founder-photo-placeholder { aspect-ratio: 4/3; max-width: 380px; }
    .founder-photo-wrap { position: static; }
  }

  /* ── ROADMAP ── */
  .roadmap-section { background: var(--navy); color: white; }
  .roadmap-section .section-tag { background: rgba(255,255,255,0.1); color: rgba(255,255,255,0.85); }
  .roadmap-section .section-title { color: white; }
  .roadmap-section .section-sub { color: rgba(255,255,255,0.75); margin: 0 auto; }

  .roadmap-timeline {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
    margin-top: 3rem;
    position: relative;
  }

  .roadmap-timeline::before {
    content: '';
    position: absolute;
    top: 38px;
    left: 0; right: 0;
    height: 3px;
    background: linear-gradient(to right, rgba(255,255,255,0.15), var(--gold), rgba(255,255,255,0.15));
    z-index: 0;
  }

  .roadmap-item {
    position: relative;
    z-index: 1;
  }

  .roadmap-year {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 76px;
    height: 76px;
    border-radius: 50%;
    background: rgba(255,255,255,0.08);
    border: 3px solid rgba(255,255,255,0.25);
    font-family: 'Montserrat', sans-serif;
    font-size: 1rem;
    font-weight: 900;
    color: var(--gold);
    margin-bottom: 1.25rem;
    transition: background 0.2s, border-color 0.2s;
  }

  .roadmap-item--vision .roadmap-year {
    background: var(--red);
    border-color: var(--red);
    color: white;
  }

  .roadmap-item:hover .roadmap-year {
    background: rgba(255,255,255,0.15);
    border-color: var(--gold);
  }

  .roadmap-content h3 {
    font-size: 1rem;
    color: white;
    margin-bottom: 0.6rem;
    font-weight: 800;
  }

  .roadmap-content p {
    font-size: 0.865rem;
    color: rgba(255,255,255,0.7);
    line-height: 1.65;
  }

  .roadmap-item--vision .roadmap-content h3 { color: var(--gold); }
  .roadmap-item--vision .roadmap-content p { color: rgba(255,255,255,0.85); }

  @media (max-width: 800px) {
    .roadmap-timeline { grid-template-columns: 1fr 1fr; }
    .roadmap-timeline::before { display: none; }
  }
  @media (max-width: 500px) {
    .roadmap-timeline { grid-template-columns: 1fr; }
  }

  /* ── FROM THE FIELD ── */
  .field-section { background: var(--light-bg); }

  .field-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: auto auto;
    gap: 1.25rem;
    margin-top: 3rem;
  }

  .field-placeholder {
    background: white;
    border-radius: 12px;
    padding: 2.5rem 1.5rem;
    text-align: center;
    border: 2px dashed var(--border);
    transition: border-color 0.2s, background 0.2s;
    min-height: 180px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
  }

  .field-placeholder:hover {
    border-color: var(--navy);
    background: var(--light-bg);
  }

  .field-placeholder--wide {
    grid-column: span 2;
  }

  .field-placeholder-icon {
    font-size: 2.2rem;
    opacity: 0.4;
  }

  .field-placeholder-label {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.78rem;
    font-weight: 700;
    color: var(--text-light);
    text-transform: uppercase;
    letter-spacing: 0.06em;
  }

  .field-coming-soon {
    text-align: center;
    margin-top: 2rem;
    font-size: 0.875rem;
    color: var(--text-light);
    font-style: italic;
    font-family: 'Montserrat', sans-serif;
    font-weight: 600;
  }

  @media (max-width: 700px) {
    .field-grid { grid-template-columns: 1fr 1fr; }
    .field-placeholder--wide { grid-column: span 2; }
  }

  /* ── YOUR SUPPORT IN ACTION ── */
  .support-section { background: white; }

  .support-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.25rem;
    margin-top: 3rem;
  }

  .support-card {
    background: var(--light-bg);
    border-radius: 12px;
    padding: 1.75rem 1.5rem;
    border-top: 3px solid var(--border);
    transition: transform 0.2s, box-shadow 0.2s;
  }

  .support-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 35px rgba(27,47,110,0.1);
  }

  .support-card--highlight {
    background: var(--navy);
    border-top-color: var(--gold);
  }

  .support-card--highlight .support-amount { color: var(--gold); }
  .support-card--highlight .support-desc { color: rgba(255,255,255,0.8); }

  .support-amount {
    font-family: 'Montserrat', sans-serif;
    font-size: 1.5rem;
    font-weight: 900;
    color: var(--navy);
    margin-bottom: 0.75rem;
    line-height: 1;
  }

  .support-desc {
    font-size: 0.875rem;
    color: var(--text-mid);
    line-height: 1.6;
  }

  .support-cta {
    text-align: center;
    margin-top: 2.5rem;
  }

  .cmr-section { background: var(--navy); color: white; }
  .cmr-section .section-tag { background: rgba(255,255,255,0.1); color: rgba(255,255,255,0.85); }
  .cmr-section .section-title { color: white; }

  .cmr-continuum {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 0;
    margin-top: 3rem;
    border-radius: 14px;
    overflow: hidden;
  }

  .cmr-node {
    padding: 1.75rem 1.25rem;
    text-align: center;
    position: relative;
    transition: background 0.2s;
  }

  .cmr-node:nth-child(1) { background: rgba(200,16,46,0.25); }
  .cmr-node:nth-child(2) { background: rgba(200,16,46,0.35); }
  .cmr-node:nth-child(3) { background: rgba(200,16,46,0.45); }
  .cmr-node:nth-child(4) { background: rgba(200,16,46,0.55); }
  .cmr-node:nth-child(5) { background: rgba(200,16,46,0.65); }
  .cmr-node:nth-child(6) { background: rgba(200,16,46,0.78); }
  .cmr-node:nth-child(7) { background: rgba(200,16,46,0.92); }

  .cmr-node:hover { filter: brightness(1.15); }

  .cmr-node-icon { font-size: 1.8rem; margin-bottom: 0.6rem; }
  .cmr-node-name {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.78rem;
    font-weight: 800;
    color: white;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    line-height: 1.3;
  }
  .cmr-node-arrow {
    position: absolute;
    right: -10px;
    top: 50%;
    transform: translateY(-50%);
    color: rgba(255,255,255,0.5);
    font-size: 1.1rem;
    z-index: 2;
    display: none;
  }

  .cmr-tagline {
    margin-top: 2.5rem;
    text-align: center;
    font-family: 'Montserrat', sans-serif;
    font-size: 1.05rem;
    font-weight: 700;
    color: rgba(255,255,255,0.9);
    font-style: italic;
    padding: 1.5rem 2rem;
    border-top: 1px solid rgba(255,255,255,0.15);
  }

  .cmr-three-pillars {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
    margin-top: 2.5rem;
  }

  .cmr-pillar {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 12px;
    padding: 1.75rem;
    text-align: center;
    transition: background 0.2s;
  }

  .cmr-pillar:hover { background: rgba(255,255,255,0.12); }

  .cmr-pillar-letter {
    font-family: 'Montserrat', sans-serif;
    font-size: 2.5rem;
    font-weight: 900;
    color: var(--gold);
    line-height: 1;
    margin-bottom: 0.4rem;
  }

  .cmr-pillar-title {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.85rem;
    font-weight: 700;
    color: white;
    margin-bottom: 0.6rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }

  .cmr-pillar-items {
    font-size: 0.82rem;
    color: rgba(255,255,255,0.7);
    line-height: 1.6;
  }

  @media (max-width: 700px) {
    .cmr-three-pillars { grid-template-columns: 1fr; }
  }

  /* ── OVERWORKED AC ── */
  .ac-section { background: var(--light-bg); }

  .ac-card {
    background: white;
    border-radius: 16px;
    padding: 2.5rem;
    box-shadow: 0 4px 24px rgba(27,47,110,0.1);
    margin-top: 3rem;
    border-top: 4px solid var(--gold);
  }

  .ac-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(230,168,23,0.12);
    color: #8a6200;
    padding: 0.3rem 0.9rem;
    border-radius: 50px;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    margin-bottom: 1.25rem;
  }

  .ac-headline {
    font-family: 'Montserrat', sans-serif;
    font-size: clamp(1.4rem, 2.5vw, 2rem);
    font-weight: 900;
    color: var(--navy);
    margin-bottom: 1rem;
    line-height: 1.2;
  }

  .ac-body {
    font-size: 1rem;
    color: var(--text-mid);
    line-height: 1.75;
    max-width: 780px;
  }

  .ac-stages {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 1rem;
    margin-top: 2rem;
  }

  .ac-stage {
    border-radius: 10px;
    padding: 1.25rem;
    border-left: 3px solid var(--gold);
    background: var(--light-bg);
  }

  .ac-stage-num {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.68rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--text-light);
    margin-bottom: 0.3rem;
  }

  .ac-stage-title {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.88rem;
    font-weight: 800;
    color: var(--navy);
    margin-bottom: 0.3rem;
  }

  .ac-stage-desc {
    font-size: 0.8rem;
    color: var(--text-mid);
    line-height: 1.5;
  }

  .ac-cta-line {
    margin-top: 2rem;
    padding-top: 1.5rem;
    border-top: 1px solid var(--border);
    font-family: 'Montserrat', sans-serif;
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--navy);
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
  }

  .ac-cta-line a {
    color: var(--red);
    text-decoration: underline;
    font-weight: 700;
  }


  :root {
    --/* ── NAVBAR (identical to main site) ── */
  nav {
    position: fixed;
    top: 0; left: 0; right: 0;
    z-index: 1000;
    background: rgba(27,47,110,0.97);
    backdrop-filter: blur(10px);
    border-bottom: 2px solid var(--red);
    padding: 0 2rem;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .nav-logo {
    display: flex; align-items: center; gap: 0.75rem; text-decoration: none;
  }
  .nav-logo-icon {
    width: 42px; height: 42px;
    background: var(--red); border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.2rem;
  }
  .nav-logo-text {
    color: white; font-family: 'Montserrat', sans-serif;
    font-weight: 800; font-size: 1rem; line-height: 1.2;
  }
  .nav-logo-text span {
    display: block; font-size: 0.65rem; font-weight: 400;
    color: rgba(255,255,255,0.7); letter-spacing: 0.05em;
  }
  .nav-links {
    display: flex; align-items: center; gap: 0.25rem; list-style: none;
  }
  .nav-links a {
    color: rgba(255,255,255,0.85); text-decoration: none;
    font-family: 'Montserrat', sans-serif; font-size: 0.78rem;
    font-weight: 600; padding: 0.4rem 0.6rem; border-radius: 4px;
    transition: all 0.2s; letter-spacing: 0.02em;
  }
  .nav-links a:hover { color: white; background: rgba(255,255,255,0.1); }
  .nav-links a.active { color: var(--gold); }
  .nav-cta {
    background: var(--red) !important; color: white !important;
    padding: 0.5rem 1.2rem !important; border-radius: 6px !important;
  }
  .nav-cta:hover { background: var(--red-dark) !important; }

  /* ── PAGE HERO ── */
  .edu-hero {
    min-height: 50vh;
    background:
      linear-gradient(135deg, rgba(27,47,110,0.95) 0%, rgba(27,47,110,0.80) 60%, rgba(200,16,46,0.45) 100%),
      url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=1600&q=80') center/cover no-repeat;
    display: flex;
    align-items: center;
    padding: 110px 2rem 4rem;
    position: relative;
  }
  .edu-hero::before {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 80px;
    background: linear-gradient(to bottom, transparent, var(--light-bg));
  }
  .edu-hero-content {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
    color: white;
    animation: fadeUp 0.9s ease both;
  }
  
    to { opacity: 1; transform: translateY(0); }
  }
  .edu-badge {
    display: inline-flex; align-items: center; gap: 0.5rem;
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.25);
    padding: 0.4rem 1rem; border-radius: 50px;
    font-size: 0.8rem; font-family: 'Montserrat', sans-serif;
    font-weight: 600; letter-spacing: 0.05em; margin-bottom: 1.5rem;
  }
  .edu-hero h1 {
    font-size: clamp(2rem, 4.5vw, 3.4rem);
    font-weight: 900; color: white; margin-bottom: 1.25rem;
  }
  .edu-hero h1 em { font-style: normal; color: var(--gold); }
  .edu-hero p {
    font-size: 1.1rem; color: rgba(255,255,255,0.85);
    max-width: 580px; margin: 0 auto; line-height: 1.7;
  }

  /* ── CMR OVERVIEW STRIP ── */
  .cmr-overview { background: var(--navy); color: white; }
  .cmr-overview 
  .cmr-overview 

  .cmr-three {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
    margin-top: 2.5rem;
  }
  .cmr-three-card {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.14);
    border-radius: 14px;
    padding: 2rem 1.5rem;
    text-align: center;
    transition: background 0.2s;
  }
  .cmr-three-card:hover { background: rgba(255,255,255,0.12); }
  .cmr-letter {
    font-family: 'Montserrat', sans-serif;
    font-size: 3.5rem; font-weight: 900;
    color: var(--gold); line-height: 1; margin-bottom: 0.5rem;
  }
  .cmr-three-card h3 {
    font-size: 1rem; color: white; font-weight: 800;
    text-transform: uppercase; letter-spacing: 0.06em;
    margin-bottom: 0.75rem;
  }
  .cmr-three-card p { font-size: 0.875rem; color: rgba(255,255,255,0.7); line-height: 1.6; }

  .cmr-link-statement {
    margin-top: 2.5rem;
    text-align: center;
    font-family: 'Montserrat', sans-serif;
    font-size: 1.05rem; font-weight: 700; font-style: italic;
    color: rgba(255,255,255,0.88);
    padding: 1.5rem 2rem;
    border-top: 1px solid rgba(255,255,255,0.15);
  }

  /* ── PATHWAY SECTION ── */
  .pathway-

  .pathway-steps {
    display: flex;
    flex-direction: column;
    gap: 0;
    margin-top: 3rem;
    position: relative;
  }
  .pathway-steps::before {
    content: '';
    position: absolute;
    left: 40px;
    top: 0; bottom: 0;
    width: 3px;
    background: linear-gradient(to bottom, var(--navy), var(--red));
    z-index: 0;
  }

  .pathway-step {
    display: grid;
    grid-template-columns: 80px 1fr;
    gap: 1.5rem;
    align-items: flex-start;
    padding-bottom: 2.5rem;
    position: relative;
  }
  .pathway-step:last-child { padding-bottom: 0; }

  .step-circle {
    width: 80px; height: 80px;
    border-radius: 50%;
    display: flex; flex-direction: column;
    align-items: center; justify-content: center;
    z-index: 1;
    position: relative;
    flex-shrink: 0;
    transition: transform 0.2s;
  }
  .step-circle:hover { transform: scale(1.05); }

  .step-circle.s1 { background: #f0f4ff; border: 3px solid #c7d2f8; }
  .step-circle.s2 { background: #fff7e6; border: 3px solid var(--gold); }
  .step-circle.s3 { background: #fff0f0; border: 3px solid #f9a8a8; }
  .step-circle.s4 { background: #fde8ec; border: 3px solid #f48a9a; }
  .step-circle.s5 { background: #fcdce2; border: 3px solid #e97088; }
  .step-circle.s6 { background: #f8c8d0; border: 3px solid #d94060; }
  .step-circle.s7 { background: var(--red); border: 3px solid var(--red-dark); }

  .step-icon { font-size: 1.7rem; line-height: 1; }
  .step-num {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.6rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: 0.06em;
    color: var(--text-light); margin-top: 0.2rem;
  }
  .step-circle.s7 .step-num { color: rgba(255,255,255,0.7); }

  .step-content {
    background: white;
    border-radius: 12px;
    padding: 1.75rem 2rem;
    box-shadow: 0 2px 12px rgba(27,47,110,0.07);
    transition: box-shadow 0.2s;
  }
  .step-content:hover { box-shadow: 0 8px 28px rgba(27,47,110,0.12); }

  .step-content h3 {
    font-size: 1.1rem; color: var(--navy); margin-bottom: 0.5rem;
  }
  .step-content p {
    font-size: 0.925rem; color: var(--text-mid); line-height: 1.7;
    margin-bottom: 0.75rem;
  }
  .step-content p:last-child { margin-bottom: 0; }

  .step-tags {
    display: flex; flex-wrap: wrap; gap: 0.4rem; margin-top: 0.75rem;
  }
  .step-tag {
    background: var(--light-bg);
    color: var(--navy);
    font-family: 'Montserrat', sans-serif;
    font-size: 0.7rem; font-weight: 700;
    padding: 0.2rem 0.6rem; border-radius: 50px;
    border: 1px solid var(--border);
  }
  .step-tag.danger { background: rgba(200,16,46,0.08); color: var(--red); border-color: rgba(200,16,46,0.2); }
  .step-tag.warning { background: rgba(230,168,23,0.12); color: #7a5c00; border-color: rgba(230,168,23,0.3); }
  .step-tag.safe { background: rgba(46,139,87,0.1); color: var(--success); border-color: rgba(46,139,87,0.2); }

  .step-bhi-note {
    display: flex; align-items: flex-start; gap: 0.6rem;
    background: rgba(27,47,110,0.05);
    border-left: 3px solid var(--navy);
    border-radius: 0 8px 8px 0;
    padding: 0.75rem 1rem;
    margin-top: 0.75rem;
    font-size: 0.85rem; color: var(--navy); font-weight: 600;
  }
  .step-bhi-note::before { content: '🩺'; flex-shrink: 0; }

  /* ── OVERWORKED AC ── */
  .ac-

  .ac-hero-card {
    background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 100%);
    border-radius: 18px;
    padding: 3rem;
    color: white;
    margin-top: 3rem;
    position: relative;
    overflow: hidden;
  }
  .ac-hero-card::after {
    content: '🌡️';
    position: absolute;
    right: 2rem; top: 2rem;
    font-size: 5rem;
    opacity: 0.12;
  }
  .ac-hero-card h3 {
    font-size: clamp(1.4rem, 2.5vw, 2rem);
    color: white; margin-bottom: 1rem; max-width: 600px;
  }
  .ac-hero-card h3 em { font-style: normal; color: var(--gold); }
  .ac-hero-card p {
    font-size: 1rem; color: rgba(255,255,255,0.85);
    line-height: 1.8; max-width: 680px;
  }

  .ac-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.25rem;
    margin-top: 2.5rem;
  }
  .ac-card {
    background: var(--light-bg);
    border-radius: 12px;
    padding: 1.5rem;
    border-left: 4px solid var(--gold);
    transition: transform 0.2s, box-shadow 0.2s;
  }
  .ac-card:hover { transform: translateY(-3px); box-shadow: 0 10px 30px rgba(27,47,110,0.1); }
  .ac-card-stage {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.65rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: 0.1em; color: var(--text-light); margin-bottom: 0.35rem;
  }
  .ac-card h4 { font-size: 0.95rem; color: var(--navy); margin-bottom: 0.4rem; }
  .ac-card p { font-size: 0.82rem; color: var(--text-mid); line-height: 1.55; }

  .ac-punchline {
    margin-top: 2rem;
    padding: 1.5rem 2rem;
    background: var(--navy);
    border-radius: 10px;
    text-align: center;
    font-family: 'Montserrat', sans-serif;
    font-size: 1rem; font-weight: 700;
    color: white; letter-spacing: 0.01em;
  }
  .ac-punchline em { color: var(--gold); font-style: normal; }

  /* ── FAQ ── */
  .faq-

  .faq-list { margin-top: 2.5rem; display: flex; flex-direction: column; gap: 1rem; }
  .faq-item {
    background: white; border-radius: 10px;
    padding: 1.5rem 1.75rem;
    box-shadow: 0 2px 8px rgba(27,47,110,0.06);
    border-left: 3px solid var(--red);
  }
  .faq-q {
    font-family: 'Montserrat', sans-serif;
    font-size: 1rem; font-weight: 800; color: var(--navy);
    margin-bottom: 0.6rem;
  }
  .faq-a { font-size: 0.925rem; color: var(--text-mid); line-height: 1.7; }

  /* ── CTA ── */
  .edu-cta {
    background:
      linear-gradient(135deg, rgba(27,47,110,0.95) 0%, rgba(27,47,110,0.88) 100%),
      url('https://images.unsplash.com/photo-1559757175-5700dde675bc?w=1600&q=80') center/cover;
    color: white; text-align: center; padding: 5rem 2rem;
  }
  .edu-cta h2 { font-size: clamp(1.8rem, 3.5vw, 2.8rem); color: white; margin-bottom: 1rem; }
  .edu-cta h2 em { font-style: normal; color: var(--gold); }
  .edu-cta p { font-size: 1.05rem; color: rgba(255,255,255,0.82); max-width: 560px; margin: 0 auto 2.5rem; line-height: 1.7; }
  
  
  .btn-outline-white {
    display: inline-flex; align-items: center; gap: 0.5rem;
    background: transparent; color: white;
    padding: 0.875rem 2rem; border-radius: 8px;
    text-decoration: none; font-family: 'Montserrat', sans-serif;
    font-weight: 700; font-size: 0.95rem;
    border: 2px solid rgba(255,255,255,0.5); transition: all 0.2s;
  }
  .btn-outline-white:hover { background: rgba(255,255,255,0.1); border-color: white; transform: translateY(-2px); }
  .cta-btns { display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center; }

  /* ── FOOTER (same as main) ── */
  
  
  .footer-bottom a { color: rgba(255,255,255,0.55); text-decoration: none; }
  .footer-bottom a:hover { color: white; }

  /* ── WHATSAPP FLOAT ── */
  .whatsapp-float {
    position: fixed; bottom: 1.5rem; right: 1.5rem; z-index: 999;
    width: 56px; height: 56px; background: #25D366;
    border-radius: 50%; display: flex; align-items: center; justify-content: center;
    box-shadow: 0 4px 20px rgba(37,211,102,0.4);
    text-decoration: none; transition: transform 0.2s;
    animation: pulse 2s infinite;
  }
  .whatsapp-float:hover { transform: scale(1.1); animation: none; }
  @keyframes pulse {
    0%, 100% { box-shadow: 0 4px 20px rgba(37,211,102,0.4); }
    50% { box-shadow: 0 4px 30px rgba(37,211,102,0.7); }
  }
  .whatsapp-float svg { width: 28px; height: 28px; fill: white; }

  /* ── RESPONSIVE ── */
  @media (max-width: 700px) {
    .cmr-three { grid-template-columns: 1fr; }
    .pathway-steps::before { left: 35px; }
    .pathway-step { grid-template-columns: 70px 1fr; gap: 1rem; }
    .step-circle { width: 70px; height: 70px; }
    .ac-hero-card { padding: 2rem 1.5rem; }
    .nav-links { display: none; }
    
  }

  :root {
    --navy: #1B2F6E;
    --navy-dark: #0f1d47;
    --navy-light: #243d8a;
    --red: #C8102E;
    --red-dark: #a00d25;
    --white: #FFFFFF;
    --light-bg: #F7F9FC;
    --text-dark: #1E293B;
    --text-mid: #475569;
    --text-light: #94a3b8;
    --success: #2E8B57;
    --gold: #E6A817;
    --border: #e2e8f0;
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  html { scroll-behavior: smooth; }
  body { font-family: 'Source Sans 3', sans-serif; color: var(--text-dark); line-height: 1.6; overflow-x: hidden; }
  h1, h2, h3, h4 { font-family: 'Montserrat', sans-serif; font-weight: 800; line-height: 1.15; }

  /* NAVBAR */
  nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
    background: rgba(27,47,110,0.97); backdrop-filter: blur(10px);
    border-bottom: 2px solid var(--red);
    padding: 0 2rem; height: 70px;
    display: flex; align-items: center; justify-content: space-between;
  }
  .nav-logo { display: flex; align-items: center; gap: 0.75rem; text-decoration: none; }
  .nav-logo-icon { width: 42px; height: 42px; background: var(--red); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; }
  .nav-logo-text { color: white; font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1rem; line-height: 1.2; }
  .nav-logo-text span { display: block; font-size: 0.65rem; font-weight: 400; color: rgba(255,255,255,0.7); letter-spacing: 0.05em; }
  .nav-links { display: flex; align-items: center; gap: 0.25rem; list-style: none; }
  .nav-links a { color: rgba(255,255,255,0.85); text-decoration: none; font-family: 'Montserrat', sans-serif; font-size: 0.78rem; font-weight: 600; padding: 0.4rem 0.6rem; border-radius: 4px; transition: all 0.2s; letter-spacing: 0.02em; }
  .nav-links a:hover { color: white; background: rgba(255,255,255,0.1); }
  .nav-links a.active { color: var(--gold); }
  .nav-cta { background: var(--red) !important; color: white !important; padding: 0.5rem 1.2rem !important; border-radius: 6px !important; }

  /* HERO */
  .founder-hero {
    min-height: 55vh;
    background:
      linear-gradient(135deg, rgba(27,47,110,0.96) 0%, rgba(27,47,110,0.82) 55%, rgba(200,16,46,0.4) 100%),
      url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=1600&q=80') center/cover no-repeat;
    display: flex; align-items: center;
    padding: 110px 2rem 4rem;
    position: relative;
  }
  .founder-hero::before {
    content: ''; position: absolute; bottom: 0; left: 0; right: 0;
    height: 80px; background: linear-gradient(to bottom, transparent, var(--light-bg));
  }
  .founder-hero-content { max-width: 820px; margin: 0 auto; color: white; animation: fadeUp 0.9s ease both; }
   to { opacity: 1; transform: translateY(0); } }

  .hero-eyebrow {
    display: inline-flex; align-items: center; gap: 0.5rem;
    background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.25);
    padding: 0.4rem 1rem; border-radius: 50px;
    font-size: 0.8rem; font-family: 'Montserrat', sans-serif;
    font-weight: 600; letter-spacing: 0.05em; margin-bottom: 1.5rem;
  }
  .founder-hero h1 { font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 900; color: white; margin-bottom: 0.5rem; }
  .founder-hero h1 em { font-style: normal; color: var(--gold); }
  .founder-hero-title { font-family: 'Montserrat', sans-serif; font-size: 1rem; font-weight: 600; color: rgba(255,255,255,0.7); margin-bottom: 1.5rem; letter-spacing: 0.03em; }
  .founder-hero p { font-size: 1.1rem; color: rgba(255,255,255,0.85); max-width: 620px; line-height: 1.75; }

  /* PROFILE SECTION */
  .profile-

  .profile-grid {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 3.5rem;
    align-items: flex-start;
  }

  .profile-photo-wrap { position: sticky; top: 90px; }

  .profile-photo {
    width: 100%;
    aspect-ratio: 3/4;
    background: linear-gradient(145deg, #dde6f5 0%, #c8d8ec 100%);
    border-radius: 16px;
    display: flex; align-items: center; justify-content: center;
    border: 2px dashed var(--border);
    margin-bottom: 1.25rem;
    position: relative;
    overflow: hidden;
  }

  .profile-photo-inner { text-align: center; }
  .profile-initials { font-family: 'Montserrat', sans-serif; font-size: 4rem; font-weight: 900; color: var(--navy); opacity: 0.2; line-height: 1; }
  .profile-photo-note { font-size: 0.72rem; color: var(--text-light); font-family: 'Montserrat', sans-serif; font-weight: 600; margin-top: 0.5rem; letter-spacing: 0.04em; }
  .profile-portrait { width: 100%; height: 100%; object-fit: cover; object-position: center top; border-radius: 14px; display: block; }

  .profile-card {
    background: var(--navy);
    border-radius: 12px;
    padding: 1.5rem;
  }
  .profile-card-name { font-family: 'Montserrat', sans-serif; font-size: 1rem; font-weight: 900; color: white; margin-bottom: 0.4rem; line-height: 1.3; }
  .profile-card-role { font-size: 0.82rem; color: var(--gold); font-weight: 600; margin-bottom: 0.3rem; }
  .profile-card-inst { font-size: 0.78rem; color: rgba(255,255,255,0.6); margin-bottom: 1rem; }
  .profile-card-tags { display: flex; flex-wrap: wrap; gap: 0.4rem; }
  .profile-tag { background: rgba(255,255,255,0.1); color: rgba(255,255,255,0.8); font-family: 'Montserrat', sans-serif; font-size: 0.65rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; padding: 0.25rem 0.65rem; border-radius: 50px; }

  /* CONTENT */
  .story-body { font-size: 1.02rem; color: var(--text-mid); line-height: 1.82; margin-bottom: 1.25rem; }
  .story-body strong { color: var(--navy); }
  .story-body--personal {
    color: var(--text-dark);
    background: var(--light-bg);
    border-left: 3px solid var(--gold);
    border-radius: 0 8px 8px 0;
    padding: 1rem 1.25rem;
    font-style: italic;
  }
  .story-quote {
    border-left: 4px solid var(--red);
    padding: 1rem 1.75rem;
    margin: 2rem 0;
    font-family: 'Montserrat', sans-serif;
    font-size: 1.1rem; font-weight: 800; font-style: italic;
    color: var(--navy);
    background: var(--white);
    border-radius: 0 10px 10px 0;
    box-shadow: 0 2px 12px rgba(27,47,110,0.06);
  }

  .story-h3 { font-size: 1.15rem; color: var(--navy); margin: 2rem 0 0.6rem; }

  /* PCHF evidence photo */
  .pchf-photo-block {
    margin: 2rem 0;
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid var(--border);
  }

  .pchf-photo-block img {
    width: 100%;
    display: block;
    object-fit: cover;
    object-position: center 30%;
    max-height: 320px;
    transition: transform 0.4s ease;
  }

  .pchf-photo-block:hover img { transform: scale(1.015); }

  .pchf-photo-caption {
    background: var(--light-bg);
    border-top: 1px solid var(--border);
    padding: 0.85rem 1.25rem;
    display: flex;
    align-items: flex-start;
    gap: 0.65rem;
  }

  .pchf-caption-icon {
    font-size: 0.85rem;
    flex-shrink: 0;
    margin-top: 0.05rem;
    color: var(--navy);
    opacity: 0.5;
  }

  .pchf-caption-text {
    font-size: 0.78rem;
    color: var(--text-mid);
    line-height: 1.55;
    font-style: italic;
  }

  .pchf-caption-text strong {
    font-style: normal;
    color: var(--navy);
    font-weight: 600;
  }

  @media (max-width: 800px) {
    .profile-grid { grid-template-columns: 1fr; gap: 2rem; }
    .profile-photo { aspect-ratio: 4/3; max-width: 320px; }
    .profile-photo-wrap { position: static; }
  }

  /* JOURNEY SECTION */
  .journey-

  .journey-steps {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.5rem;
    margin-top: 3rem;
  }

  .journey-step {
    background: var(--light-bg);
    border-radius: 12px;
    padding: 1.75rem 1.5rem;
    border-top: 3px solid var(--navy);
    transition: transform 0.2s, box-shadow 0.2s;
  }

  .journey-step:hover { transform: translateY(-3px); box-shadow: 0 10px 30px rgba(27,47,110,0.1); }

  .journey-step-period {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.7rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: 0.08em; color: var(--text-light); margin-bottom: 0.5rem;
  }

  .journey-step h3 { font-size: 1rem; color: var(--navy); margin-bottom: 0.5rem; }
  .journey-step p { font-size: 0.875rem; color: var(--text-mid); line-height: 1.6; }

  /* VISION SECTION */
  .vision-
  .vision-section 
  .vision-section 
  .vision-section 

  .vision-points {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 1.5rem;
    margin-top: 3rem;
  }

  .vision-point {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 12px;
    padding: 1.75rem;
    transition: background 0.2s;
  }
  .vision-point:hover { background: rgba(255,255,255,0.12); }
  .vision-point-icon { font-size: 1.8rem; margin-bottom: 0.75rem; }
  .vision-point h3 { font-size: 0.9rem; color: white; margin-bottom: 0.5rem; font-weight: 700; }
  .vision-point p { font-size: 0.855rem; color: rgba(255,255,255,0.7); line-height: 1.6; }

  .vision-closing {
    margin-top: 3rem;
    text-align: center;
    font-family: 'Montserrat', sans-serif;
    font-size: 1.05rem; font-weight: 700; font-style: italic;
    color: rgba(255,255,255,0.9);
    padding: 1.5rem 2rem;
    border-top: 1px solid rgba(255,255,255,0.15);
  }

  /* CTA */
  .founder-cta { background: var(--light-bg); text-align: center; padding: 4rem 2rem; }
  .founder-cta h2 { font-size: clamp(1.5rem, 2.5vw, 2rem); color: var(--navy); margin-bottom: 1rem; }
  .founder-cta h2 em { font-style: normal; color: var(--red); }
  .founder-cta p { font-size: 1rem; color: var(--text-mid); max-width: 520px; margin: 0 auto 2rem; line-height: 1.7; }
  .cta-row { display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center; }

  .btn-primary { display: inline-flex; align-items: center; gap: 0.5rem; background: var(--red); color: white; padding: 0.875rem 2rem; border-radius: 8px; text-decoration: none; font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 0.95rem; border: 2px solid var(--red); transition: all 0.2s; }
  .btn-primary:hover { background: var(--red-dark); transform: translateY(-2px); }
  .btn-secondary-outline { display: inline-flex; align-items: center; gap: 0.5rem; background: transparent; color: var(--navy); padding: 0.875rem 2rem; border-radius: 8px; text-decoration: none; font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 0.95rem; border: 2px solid var(--navy); transition: all 0.2s; }
  .btn-secondary-outline:hover { background: var(--navy); color: white; transform: translateY(-2px); }

  
  /* ── PAGE SWITCHER ── */
  .page { display: none; }
  .page.active { display: block; }
  
  .nav-page-tabs {
    display: flex;
    align-items: center;
    gap: 0;
    background: rgba(255,255,255,0.07);
    border-radius: 6px;
    padding: 3px;
  }
  .nav-page-tab {
    color: rgba(255,255,255,0.7);
    text-decoration: none;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.7rem;
    font-weight: 700;
    padding: 0.3rem 0.7rem;
    border-radius: 4px;
    transition: all 0.2s;
    letter-spacing: 0.03em;
    border: none;
    background: transparent;
    cursor: pointer;
  }
  .nav-page-tab:hover { color: white; background: rgba(255,255,255,0.12); }
  .nav-page-tab.active { background: var(--red); color: white; }

</style>
<link rel="stylesheet" href="assets/css/bhi-dynamic.css">
</head>
<body>

<nav id="main-nav">
  <a href="#" class="nav-logo" onclick="switchPage('home'); return false;">
    <div class="nav-logo-icon">🫀</div>
    <div class="nav-logo-text">
      Bono Heart Initiative
      <span>Cardio-Metabolic-Renal Care for All</span>
    </div>
  </a>
  <ul class="nav-links">
    <li><a href="#about">About</a></li>
    <li><a href="#cmr">CMR Disease</a></li>
    <li><a href="#services">Services</a></li>
    <li><a href="#impact">Impact</a></li>
    <li><a href="#outreach">Outreach</a></li>
    <li><a href="#field">Gallery</a></li>
    <li><a href="#partners">Partners</a></li>
    <li>
      <div class="nav-page-tabs">
        <button class="nav-page-tab active" id="tab-home" onclick="switchPage('home')">Home</button>
        <button class="nav-page-tab" id="tab-education" onclick="switchPage('education')">CMR Education</button>
        <button class="nav-page-tab" id="tab-founder" onclick="switchPage('founder')">Meet the Founder</button>
      </div>
    </li>
    <li><a href="#outreach" class="nav-cta" onclick="document.getElementById('outreach')?.scrollIntoView({behavior:'smooth'});">Get Screened</a></li>
  </ul>
</nav>

<div class="page active" id="page-home">
<!-- NAVBAR -->


<!-- HERO -->
<section class="hero" id="home">
  <div class="hero-content">
    <div class="hero-badge">Bono Region, Ghana · Founded 2026</div>
    <h1>Heart Care Should Not Depend<br>on <em>Where You Live.</em></h1>
    <p class="hero-sub">
      Bono Heart Initiative addresses the full Cardio-Metabolic-Renal continuum —
      heart disease, diabetes, obesity, and kidney disease — bringing specialist
      detection closer to every community across the Bono Region of Ghana.
    </p>
    <div class="hero-ctas">
      <a href="#outreach" class="btn-primary" onclick="document.getElementById('outreach').scrollIntoView({behavior:'smooth'}); return false;">🩺 Get Screened</a>
      <a href="#partners" class="btn-secondary">Support the Mission</a>
    </div>
    <p class="hero-link">
      Are you a health professional?
      <a href="#refer">Refer a Patient →</a>
    </p>
    <div class="hero-trust">
      <div class="trust-item">Led by a qualified cardiologist</div>
      <div class="trust-item">Sunyani Teaching Hospital</div>
      <div class="trust-item">CMR Strategic Plan 2026–2028</div>
      <div class="trust-item">Longitudinal CMR registry</div>
    </div>
  </div>
  <div class="scroll-indicator">↓ scroll</div>
</section>

<!-- PROBLEM SECTION -->
<section class="problem-section" id="problem">
  <div class="container">
    <div class="text-center">
      <div class="section-tag">The Problem</div>
      <h2 class="section-title">Cardio-Metabolic-Renal disease is Ghana's silent crisis.</h2>
      <div class="section-divider"></div>
      <p class="section-sub">
        Hypertension. Diabetes. Obesity. Heart failure. Chronic kidney disease. These conditions do not
        arrive separately — they form one interconnected disease continuum, and most people do not know
        they are on it until it is too late.
      </p>
    </div>
    <div class="stat-cards reveal">
      <div class="stat-card">
        <div class="stat-number">30–40%</div>
        <div class="stat-label">
          <strong>of Ghanaian adults have hypertension</strong>
          Most undiagnosed. The single biggest driver of heart failure, stroke, and chronic kidney disease in the region.
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-number">1 in 8</div>
        <div class="stat-label">
          <strong>Ghanaian adults live with diabetes</strong>
          Uncontrolled blood sugar damages the heart, blood vessels, and kidneys simultaneously — accelerating the CMR cascade.
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-number">#1</div>
        <div class="stat-label">
          <strong>Heart failure leads cardiac admissions</strong>
          Presenting when structural damage is already irreversible — almost always the endpoint of years of unmanaged CMR disease.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- WHY BONO -->
<section class="why-bono" id="why-bono">
  <div class="container">
    <div class="section-tag">Why Bono Region</div>
    <h2 class="section-title">The Bono Region carries a full CMR burden — with none of the infrastructure.</h2>
    <div class="section-divider" style="background:rgba(255,255,255,0.3)"></div>
    <p class="section-sub">
      1.2 million people. 12 districts. No dedicated cardiovascular diagnostic centre.
      No structured region-wide CMR screening programme of any kind.
    </p>
    <div class="bono-facts reveal">
      <div class="bono-fact">
        <div class="bono-fact-value">1.2M</div>
        <div class="bono-fact-label">People across 12 districts with no cardiac or metabolic diagnostic centre</div>
      </div>
      <div class="bono-fact">
        <div class="bono-fact-value">~35%</div>
        <div class="bono-fact-label">Estimated hypertension prevalence — most undiagnosed, untreated, and progressing</div>
      </div>
      <div class="bono-fact">
        <div class="bono-fact-value">Rising</div>
        <div class="bono-fact-label">Diabetes and obesity burden — driven by dietary transition and sedentary urbanisation in district capitals</div>
      </div>
      <div class="bono-fact">
        <div class="bono-fact-value">2–3 hrs</div>
        <div class="bono-fact-label">To the nearest specialist cardiac diagnostic centre — leaving most Bono Region residents without access to timely cardiovascular investigation.</div>
      </div>
      <div class="bono-fact">
        <div class="bono-fact-value">GHS 300</div>
        <div class="bono-fact-label">Transport cost per referral — prohibitive for most farming and trading families</div>
      </div>
      <div class="bono-fact">
        <div class="bono-fact-value">Zero</div>
        <div class="bono-fact-label">Structured CKD or metabolic syndrome screening programmes across all 12 districts</div>
      </div>
    </div>
    <div class="bono-closing reveal">
      "BHI is not filling a gap. It is building a Cardio-Metabolic-Renal system that has never existed in this region."
    </div>
  </div>
</section>

<!-- FOUNDER STORY -->
<section class="founder-section" id="founder">
  <div class="container">
    <div class="founder-grid reveal">
      <div class="founder-image-col">
        <div class="founder-photo-wrap">
          <div class="founder-photo-placeholder" style="border:none; background:none; padding:0;">
            <img
              src="dr-bediako-mensah.jpg"
              alt="Dr. Edward Bediako Mensah — Consulting Cardiologist, Founder of Bono Heart Initiative"
              style="width:100%; height:100%; object-fit:cover; object-position:center top; border-radius:16px; display:block;"
            >
          </div>
          <div class="founder-nameplate">
            <div class="founder-name">Dr. Edward Bediako Mensah, MD</div>
            <div class="founder-title">Consulting Cardiologist · Founder, Bono Heart Initiative</div>
            <div class="founder-institution">Sunyani Teaching Hospital</div>
          </div>
        </div>
      </div>
      <div class="founder-content-col">
        <div class="section-tag navy">Why BHI Was Created</div>
        <h2 class="section-title">"Every community deserves access to heart care."</h2>
        <div class="section-divider"></div>
        <p class="founder-body">
          Bono Heart Initiative was born from a journey that crossed communities, countries, and healthcare systems — but always returned to one central question: why should access to specialist care depend on geography?
        </p>
        <p class="founder-body">
          Its founder, Dr. Edward Bediako Mensah, began his medical training at the <strong>Latin American School of Medicine (ELAM) in Cuba</strong> — a globally recognised institution founded on the principles of equity, prevention, and service to underserved communities. At ELAM, physicians were taught to engage communities directly, identify disease early, and bring care closer to those who needed it most.
        </p>
        <p class="founder-body">
          He then pursued specialist cardiology training at the <strong>Cardiocentro Ernesto Che Guevara in Santa Clara, Cuba</strong> — one of the country's leading cardiovascular centres — gaining advanced experience in echocardiography, heart failure, structural heart disease, and preventive cardiology. There, a pattern became clear: many patients presenting with advanced cardiovascular disease could have been identified far earlier if effective detection systems had existed closer to home.
        </p>
        <blockquote class="founder-quote">
          "Many of the patients presenting with advanced cardiovascular disease could have been identified much earlier — if effective systems for detection and follow-up had existed closer to where they lived."
        </blockquote>
        <p class="founder-body">
          His training is currently being further deepened through the <strong>Postgraduate Course in Heart Failure (PCHF) at University Hospital Zurich</strong> — with the Certificate of Advanced Studies (CAS) expected in 2027 — where he is learning how sustainable cardiovascular systems are built through registries, outcomes measurement, and implementation science.
        </p>
        <p class="founder-body">
          Bono Heart Initiative is the convergence of all three experiences: the community philosophy of ELAM, the specialist expertise of Cardiocentro, and the systems thinking of Zurich. Together, one mission.
        </p>
        <p class="founder-body" style="font-weight:600; color:var(--navy);">
          BHI exists because specialist heart care should not be a privilege reserved for major cities. It should be accessible to every community.
        </p>
        <a href="#" onclick="switchPage('founder'); return false;" class="founder-link">
          Meet Dr. Bediako Mensah — Full Story →
        </a>
      </div>
    </div>
  </div>
</section>

<!-- CMR EXPLAINER -->
<section class="cmr-section" id="cmr">
  <div class="container">
    <div class="text-center">
      <div class="section-tag">What Is CMR Disease?</div>
      <h2 class="section-title">Cardio-Metabolic-Renal Disease.<br>One continuum. One patient. One system.</h2>
      <div class="section-divider" style="background:rgba(255,255,255,0.3); margin:1.25rem auto"></div>
      <p class="section-sub" style="color:rgba(255,255,255,0.78); margin:0 auto;">
        Cardio-Metabolic-Renal (CMR) disease is not three separate problems. It is a single
        interconnected continuum in which the heart, metabolism, and kidneys fail together —
        each accelerating the damage in the others.
      </p>
    </div>

    <div class="cmr-three-pillars reveal">
      <div class="cmr-pillar">
        <div class="cmr-pillar-letter">C</div>
        <div class="cmr-pillar-title">Cardio</div>
        <div class="cmr-pillar-items">Hypertension · Heart failure · Stroke · Coronary artery disease · Congenital heart disease</div>
      </div>
      <div class="cmr-pillar">
        <div class="cmr-pillar-letter">M</div>
        <div class="cmr-pillar-title">Metabolic</div>
        <div class="cmr-pillar-items">Obesity · Insulin resistance · Type 2 diabetes · Metabolic syndrome · Dyslipidaemia</div>
      </div>
      <div class="cmr-pillar">
        <div class="cmr-pillar-letter">R</div>
        <div class="cmr-pillar-title">Renal</div>
        <div class="cmr-pillar-items">Chronic kidney disease · Cardiorenal syndrome · Proteinuria · Renal hypertension</div>
      </div>
    </div>

    <div class="cmr-continuum reveal" style="margin-top:2.5rem;">
      <div class="cmr-node">
        <div class="cmr-node-icon">⚖️</div>
        <div class="cmr-node-name">Obesity</div>
      </div>
      <div class="cmr-node">
        <div class="cmr-node-icon">🔋</div>
        <div class="cmr-node-name">Insulin Resistance</div>
      </div>
      <div class="cmr-node">
        <div class="cmr-node-icon">💉</div>
        <div class="cmr-node-name">Diabetes</div>
      </div>
      <div class="cmr-node">
        <div class="cmr-node-icon">🩸</div>
        <div class="cmr-node-name">Hypertension</div>
      </div>
      <div class="cmr-node">
        <div class="cmr-node-icon">🫘</div>
        <div class="cmr-node-name">Kidney Disease</div>
      </div>
      <div class="cmr-node">
        <div class="cmr-node-icon">🫀</div>
        <div class="cmr-node-name">Heart Failure</div>
      </div>
      <div class="cmr-node">
        <div class="cmr-node-icon">⚡</div>
        <div class="cmr-node-name">Stroke</div>
      </div>
    </div>

    <div class="cmr-tagline reveal">
      BHI screens for the whole continuum — because treating the heart alone is not enough.
      <span style="display:block; margin-top:0.75rem;">
        <a href="#" onclick="switchPage('education'); return false;" style="color:var(--gold); font-weight:700; text-decoration:underline;">Learn more about the CMR continuum →</a>
      </span>
    </div>
  </div>
</section>

<!-- TRUST -->
<section class="trust-section" id="about">
  <div class="container">
    <div class="text-center">
      <div class="section-tag navy">Why Trust BHI</div>
      <h2 class="section-title">Built on credibility. Driven by purpose.</h2>
      <div class="section-divider"></div>
    </div>

    <!-- CMR CORE PHILOSOPHY STATEMENT -->
    <div class="cmr-philosophy reveal">
      <div class="cmr-philosophy-label">Our Clinical Philosophy</div>
      <p class="cmr-philosophy-statement">
        BHI was founded on a single conviction: that Cardio-Metabolic-Renal disease is the greatest
        non-communicable disease challenge facing the Bono Region — and that it has never been
        addressed as the unified continuum it truly is.
      </p>
      <p class="cmr-philosophy-body">
        Hypertension, diabetes, obesity, chronic kidney disease, heart failure, and stroke are
        routinely treated as separate conditions — by separate specialists, in separate clinics,
        with separate funding streams. BHI recognises them as what they actually are: manifestations
        of one interconnected disease process, in which each condition accelerates the others.
      </p>
      <div class="cmr-philosophy-divider"></div>
      <p class="cmr-philosophy-core">
        The Cardio-Metabolic-Renal continuum is not one of BHI's programme areas.
        It is the clinical framework upon which every BHI activity is built — screening,
        education, outreach, registry development, referral pathways, research, and policy advocacy.
        Everything BHI does begins and ends with CMR.
      </p>
    </div>

    <div class="trust-cards reveal">
      <div class="trust-card">
        <div class="trust-icon">👨‍⚕️</div>
        <h3>Cardiologist-Led</h3>
        <p>Founded and led by Dr. Edward Bediako Mensah, MD — Consulting Cardiologist, Sunyani Teaching Hospital. Every clinical decision made at specialist level.</p>
      </div>
      <div class="trust-card">
        <div class="trust-icon">📋</div>
        <h3>Strategic Plan Completed</h3>
        <p>BHI operates a formal CMR Strategic Plan 2026–2028. Targets, timelines, and milestones are set. Outcomes are tracked every quarter across the full cardio-metabolic-renal continuum.</p>
      </div>
      <div class="trust-card">
        <div class="trust-icon">🏛️</div>
        <h3>Governance Structure Established</h3>
        <p>BHI has defined its governance framework — with board-level oversight, clinical advisory input, and financial accountability structures in place from the outset.</p>
      </div>
      <div class="trust-card">
        <div class="trust-icon">🗄️</div>
        <h3>Registry Framework Developed</h3>
        <p>A longitudinal CMR registry architecture is established before the first patient is screened — tracking every individual from first contact to final outcome across cardiac, metabolic, and renal parameters.</p>
      </div>
      <div class="trust-card">
        <div class="trust-icon">🏘️</div>
        <h3>Community-Focused Delivery</h3>
        <p>BHI's clinical model is built around the community — not the clinic. Care comes to the patient. Screening happens in villages, markets, and schools, not waiting rooms.</p>
      </div>
      <div class="trust-card">
        <div class="trust-icon">🔁</div>
        <h3>Long-Term Sustainability Roadmap</h3>
        <p>BHI is designed to outlast its founders. The registry generates research. Research generates grants. Grants sustain the programme. Outcomes drive policy. Policy changes the system permanently.</p>
      </div>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="how-section" id="how">
  <div class="container">
    <div class="text-center">
      <div class="section-tag">How BHI Works</div>
      <h2 class="section-title">Two Tiers. One Mission.</h2>
      <div class="section-divider"></div>
      <p class="section-sub">
        BHI's clinical model was designed for one purpose: reaching the people who need
        cardio-metabolic-renal care the most — in the communities where they live.
      </p>
    </div>
    <div class="two-tier reveal">
      <div class="tier-card tier1">
        <div class="tier-label">Tier 1</div>
        <h3>Community CMR Screening</h3>
        <p>BHI comes to your village, market, school, or community centre. No hospital. No appointment. No cost.</p>
        <ul class="tier-list">
          <li>Blood pressure measurement</li>
          <li>Blood glucose &amp; HbA1c (diabetes screen)</li>
          <li>12-lead portable ECG</li>
          <li>BMI, waist circumference &amp; obesity scoring</li>
          <li>Urine dipstick (kidney protein screen)</li>
          <li>CMR risk questionnaire</li>
        </ul>
      </div>
      <div class="tier-arrow">
        <span>Flagged</span>
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <path d="M5 12h14M12 5l7 7-7 7"/>
        </svg>
        <span>Referred</span>
      </div>
      <div class="tier-card tier2">
        <div class="tier-label">Tier 2</div>
        <h3>CMR Diagnostic Hub</h3>
        <p>Flagged patients attend a structured CMR diagnostic session. Specialist tools. Specialist interpretation. Closer to home.</p>
        <ul class="tier-list">
          <li>Portable echocardiography</li>
          <li>24-hour ABPM monitoring</li>
          <li>24–48hr Holter ECG</li>
          <li>Metabolic &amp; renal blood panel</li>
          <li>Full CMR clinical assessment</li>
          <li>Tertiary referral coordination</li>
        </ul>
      </div>
    </div>
    <div class="how-closing reveal">
      CMR detection begins in the community. Definitive diagnosis and management planning happens at the hub.
    </div>
  </div>
</section>

<!-- SERVICES -->
<section class="services-section" id="services">
  <div class="container">
    <div class="text-center">
      <div class="section-tag">What We Do</div>
      <h2 class="section-title">Five pillars. One CMR system.</h2>
      <div class="section-divider"></div>
    </div>
    <div class="pillars reveal">
      <div class="pillar">
        <div class="pillar-icon">🩺</div>
        <h3>CMR Community Screening</h3>
        <p>Free cardio-metabolic-renal screening in villages, markets, and schools — heart, blood sugar, blood pressure, and kidney markers. No hospital visit required.</p>
      </div>
      <div class="pillar">
        <div class="pillar-icon">❤️</div>
        <h3>Precision Diagnostics</h3>
        <p>Echocardiography, ABPM, Holter monitoring, and metabolic panels at our Tier 2 hub — for every flagged patient across the CMR spectrum.</p>
      </div>
      <div class="pillar">
        <div class="pillar-icon">🫘</div>
        <h3>Renal &amp; Metabolic Detection</h3>
        <p>Identifying chronic kidney disease, insulin resistance, and metabolic syndrome early — before they progress to heart failure or stroke.</p>
      </div>
      <div class="pillar">
        <div class="pillar-icon">🔗</div>
        <h3>Referral Coordination</h3>
        <p>Structured CMR pathway from community screening to tertiary care. We follow up. We close the loop.</p>
      </div>
      <div class="pillar">
        <div class="pillar-icon">📢</div>
        <h3>Advocacy &amp; Education</h3>
        <p>Radio, schools, community campaigns — building CMR health literacy across the Bono Region so communities recognise the warning signs early.</p>
      </div>
    </div>
  </div>
</section>

<!-- OVERWORKED AC -->
<section class="ac-section" id="ac-education">
  <div class="container">
    <div class="text-center">
      <div class="section-tag">Community Education</div>
      <h2 class="section-title">Understanding CMR Disease.</h2>
      <div class="section-divider"></div>
      <p class="section-sub">
        Science that speaks to everyone — in a language that makes sense in every community.
      </p>
    </div>
    <div class="ac-card reveal">
      <div class="ac-badge">🌡️ The Overworked AC Concept</div>
      <div class="ac-headline">Your body is like an air conditioner.<br>If you overwork it long enough, it will break down.</div>
      <p class="ac-body">
        An AC unit works hardest when the rooms are too full, the filters are blocked, and the power supply is unstable.
        Your heart, metabolism, and kidneys work exactly the same way.
        <br><br>
        When you carry excess weight, your heart pumps harder — like an AC cooling a room that is too large.
        When your blood sugar is uncontrolled, your blood vessels thicken — like a clogged filter.
        When your kidneys are stressed, they can no longer remove waste efficiently — and the pressure backs up through the whole system.
        Eventually, the unit overheats. That is heart failure. That is stroke. That is end-stage kidney disease.
        <br><br>
        <strong>The good news:</strong> you can service the system before it breaks. That is exactly what BHI is here to do.
      </p>
      <div class="ac-stages">
        <div class="ac-stage">
          <div class="ac-stage-num">Stage 1</div>
          <div class="ac-stage-title">Overloaded Filter</div>
          <div class="ac-stage-desc">Excess weight &amp; poor diet → insulin resistance begins. No symptoms. Easily reversible.</div>
        </div>
        <div class="ac-stage">
          <div class="ac-stage-num">Stage 2</div>
          <div class="ac-stage-title">Rising Pressure</div>
          <div class="ac-stage-desc">Blood pressure climbs. Blood sugar rises. The system is straining — but still silent.</div>
        </div>
        <div class="ac-stage">
          <div class="ac-stage-num">Stage 3</div>
          <div class="ac-stage-title">Pipe Damage</div>
          <div class="ac-stage-desc">Diabetes and hypertension scar blood vessels. Kidneys begin to leak protein. Heart enlarges.</div>
        </div>
        <div class="ac-stage">
          <div class="ac-stage-num">Stage 4</div>
          <div class="ac-stage-title">System Failure</div>
          <div class="ac-stage-desc">Heart failure. Stroke. Kidney failure. The AC has broken down. This is the stage most patients first present.</div>
        </div>
      </div>
      <div class="ac-cta-line">
        BHI catches you at Stage 1 and Stage 2 — before the breakdown.
        <a href="#" onclick="switchPage('education'); return false;">Read the full CMR education resource →</a>
      </div>
    </div>
  </div>
</section>

<!-- REGISTRY -->
<section class="registry-section" id="registry">
  <div class="container">
    <div class="text-center">
      <div class="section-tag">The BHI Registry</div>
      <h2 class="section-title">We Don't Just Screen. We Remember.</h2>
      <div class="section-divider" style="background:rgba(255,255,255,0.3); margin:1.25rem auto"></div>
      <p class="section-sub">
        Most outreach programmes screen on the day and disappear. BHI maintains a
        longitudinal CMR registry — tracking every patient from first contact to final outcome
        across the full cardio-metabolic-renal continuum.
      </p>
    </div>
    <div class="registry-cards reveal">
      <div class="registry-card">
        <div class="registry-card-icon">🫀</div>
        <h3>Echo Registry</h3>
        <p>All echo studies — findings, impression, referral outcome, follow-up. BHI's primary cardiac research platform.</p>
      </div>
      <div class="registry-card">
        <div class="registry-card-icon">📈</div>
        <h3>ABPM Registry</h3>
        <p>24-hr BP profiles, circadian phenotype, dipping pattern — connecting hypertension to its cardiac and renal consequences.</p>
      </div>
      <div class="registry-card">
        <div class="registry-card-icon">💉</div>
        <h3>Metabolic Registry</h3>
        <p>HbA1c, fasting glucose, BMI, waist circumference — a longitudinal metabolic burden map of the Bono Region.</p>
      </div>
      <div class="registry-card">
        <div class="registry-card-icon">🫘</div>
        <h3>Renal Registry</h3>
        <p>Urine protein, eGFR trends, CKD staging — linking metabolic and cardiac risk to kidney outcomes. First of its kind in the region.</p>
      </div>
      <div class="registry-card">
        <div class="registry-card-icon">🔄</div>
        <h3>Referral Tracking</h3>
        <p>Every referral — initiated, completed, outcome recorded. Accountability data for donors and the Ghana Health Service.</p>
      </div>
    </div>
    <div class="registry-chain reveal">
      <div class="registry-chain-title">The Registry Value Chain</div>
      <div class="chain-steps">
        <div class="chain-step">Registries</div>
        <div class="chain-arrow">→</div>
        <div class="chain-step">Publications</div>
        <div class="chain-arrow">→</div>
        <div class="chain-step">Credibility</div>
        <div class="chain-arrow">→</div>
        <div class="chain-step">Grants</div>
        <div class="chain-arrow">→</div>
        <div class="chain-step">Sustainability</div>
        <div class="chain-arrow">→</div>
        <div class="chain-step">Policy Change</div>
      </div>
    </div>
  </div>
</section>

<!-- ROADMAP -->
<section class="roadmap-section" id="roadmap">
  <div class="container">
    <div class="text-center">
      <div class="section-tag">The Road Ahead</div>
      <h2 class="section-title">Building a cardiovascular system<br>for the Bono Region.</h2>
      <div class="section-divider"></div>
      <p class="section-sub">
        BHI is not a one-off outreach programme. It is a structured, long-term regional health system
        — being built one district, one registry entry, and one referral at a time.
      </p>
    </div>
    <div class="roadmap-timeline reveal">
      <div class="roadmap-item">
        <div class="roadmap-year">2026</div>
        <div class="roadmap-content">
          <h3>Launch</h3>
          <p>Launch community CMR screening programme and registry. Establish Tier 1 outreach cycles and Tier 2 diagnostic hub. First 1,000 patients screened. Registry live.</p>
        </div>
      </div>
      <div class="roadmap-item">
        <div class="roadmap-year">2027</div>
        <div class="roadmap-content">
          <h3>Expand</h3>
          <p>Extend structured screening and referral services across additional districts. Grow registry database. Publish first outcomes data. Strengthen institutional partnerships.</p>
        </div>
      </div>
      <div class="roadmap-item">
        <div class="roadmap-year">2028</div>
        <div class="roadmap-content">
          <h3>Strengthen</h3>
          <p>Deepen regional partnerships and scale diagnostic access. Develop grant funding streams from registry publications. Formalise policy advocacy position with Ghana Health Service.</p>
        </div>
      </div>
      <div class="roadmap-item roadmap-item--vision">
        <div class="roadmap-year">2030</div>
        <div class="roadmap-content">
          <h3>Sustain</h3>
          <p>Establish a self-sustaining regional CMR network — supporting early detection, referral coordination, outcomes tracking, and evidence-based policy development across the Bono Region.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- IMPACT -->
<section class="impact-section" id="impact">
  <div class="container">
    <div class="text-center">
      <div class="section-tag navy">Our Impact</div>
      <h2 class="section-title">Year 1 Targets — 2026</h2>
      <div class="section-divider"></div>
      <p class="section-sub">
        Every number represents a life reached, a diagnosis made, a referral completed.
        Live data will update this dashboard as our first outreach cycles are completed.
      </p>
    </div>
    <div class="impact-numbers reveal">
      <div class="impact-number">
        <div class="impact-value">1,000</div>
        <div class="impact-label">Individuals screened at community level</div>
      </div>
      <div class="impact-number">
        <div class="impact-value">100</div>
        <div class="impact-label">Echocardiograms at Tier 2 hub</div>
      </div>
      <div class="impact-number">
        <div class="impact-value">50</div>
        <div class="impact-label">ABPM studies completed</div>
      </div>
      <div class="impact-number">
        <div class="impact-value">10</div>
        <div class="impact-label">CHD cases identified & referred</div>
      </div>
      <div class="impact-number">
        <div class="impact-value">2</div>
        <div class="impact-label">Institutional partnerships</div>
      </div>
    </div>
    <p class="impact-note">
      These are Year 1 targets from the BHI Strategic Plan 2026–2028.
      Real outcomes will be published after each outreach cycle.
    </p>

    <div style="margin-top:3rem;padding-top:3rem;border-top:1px solid rgba(27,47,110,.1)">
      <p style="text-align:center;font-family:'Montserrat',sans-serif;font-size:.78rem;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--red);margin-bottom:1.5rem">🔴 Live Progress — Updated in Real Time</p>
      <div id="impact-stats-grid">
        <div class="bhi-loading">Loading live statistics…</div>
      </div>
    </div>
  </div>
</section>

<!-- OUTREACH PROGRAMS -->
<section class="bhi-section alt reveal" id="outreach">
  <div class="bhi-container">
    <div class="text-center">
      <div class="section-tag">📍 In The Field</div>
      <h2 class="section-title">Outreach Programs</h2>
      <div class="section-divider"></div>
      <p class="section-sub">
        From market squares to school compounds, BHI brings free cardio-metabolic-renal
        screening directly to the communities of the Bono Region. Browse upcoming, ongoing,
        and completed outreach programs below.
      </p>
    </div>

    <div class="outreach-filters">
      <button data-outreach-filter="all" class="active">All Programs</button>
      <button data-outreach-filter="upcoming">Upcoming</button>
      <button data-outreach-filter="ongoing">Ongoing</button>
      <button data-outreach-filter="completed">Completed</button>
    </div>

    <div id="outreach-programs-grid">
      <div class="bhi-loading">Loading outreach programs…</div>
    </div>
  </div>
</section>

<!-- FROM THE FIELD / GALLERY -->
<section class="bhi-section reveal" id="field">
  <div class="bhi-container">
    <div class="text-center">
      <div class="section-tag">📸 From the Field</div>
      <h2 class="section-title">BHI in the community.</h2>
      <div class="section-divider"></div>
      <p class="section-sub">
        Real impact. Real communities. Real people. A look into BHI's screening sessions,
        outreach days, diagnostic work, and the volunteers who make it all possible.
      </p>
    </div>

    <div class="gallery-filter-tabs" id="gallery-filter-tabs"></div>

    <div id="gallery-grid">
      <div class="bhi-loading">Loading gallery…</div>
    </div>
    <div class="gallery-pagination" id="gallery-grid-pagination"></div>
  </div>
</section>

<!-- PARTNERSHIP -->
<section class="partnership-section" id="partners">
  <div class="container">
    <div class="text-center">
      <div class="section-tag">Partner With BHI</div>
      <h2 class="section-title">Invest in the Bono Region's CMR Health.</h2>
      <div class="section-divider"></div>
      <p class="section-sub">
        BHI is not asking for charity. We are offering a structured investment in the
        cardio-metabolic-renal health of 1.2 million people — with transparent reporting,
        named impact, and quarterly accountability.
      </p>
    </div>
    <div class="tiers-grid reveal">
      <div class="tier-invest">
        <div class="tier-invest-header bronze">
          <div class="tier-name">Bronze Partner</div>
          <div class="tier-amount">GHS 5,000</div>
          <div class="tier-usd">≈ USD 320</div>
        </div>
        <div class="tier-invest-body">
          <div class="tier-suited">
            <strong>Suited for</strong>
            Individuals, community leaders, faith organisations
          </div>
          <ul class="tier-benefits">
            <li>Certificate of partnership</li>
            <li>Name in annual report</li>
            <li>Impact update letters</li>
          </ul>
        </div>
      </div>
      <div class="tier-invest">
        <div class="tier-invest-header silver">
          <div class="tier-name">Silver Partner</div>
          <div class="tier-amount">GHS 10,000</div>
          <div class="tier-usd">≈ USD 645</div>
        </div>
        <div class="tier-invest-body">
          <div class="tier-suited">
            <strong>Suited for</strong>
            Professionals, Rotary clubs, associations
          </div>
          <ul class="tier-benefits">
            <li>All Bronze benefits</li>
            <li>Logo on outreach materials</li>
            <li>Outreach event invitation</li>
          </ul>
        </div>
      </div>
      <div class="tier-invest">
        <div class="tier-invest-header gold">
          <div class="tier-name">Gold Partner</div>
          <div class="tier-amount">GHS 25,000</div>
          <div class="tier-usd">≈ USD 1,600</div>
        </div>
        <div class="tier-invest-body">
          <div class="tier-suited">
            <strong>Suited for</strong>
            Banks, large businesses, diaspora donors
          </div>
          <ul class="tier-benefits">
            <li>Named outreach session</li>
            <li>Quarterly impact reports</li>
            <li>Social media recognition</li>
          </ul>
        </div>
      </div>
      <div class="tier-invest">
        <div class="tier-invest-header platinum">
          <div class="tier-name">Platinum Partner</div>
          <div class="tier-amount">GHS 50,000</div>
          <div class="tier-usd">≈ USD 3,200</div>
        </div>
        <div class="tier-invest-body">
          <div class="tier-suited">
            <strong>Suited for</strong>
            Mining, telecoms, pharmaceuticals
          </div>
          <ul class="tier-benefits">
            <li>Named diagnostic hub session</li>
            <li>Board presentation</li>
            <li>Annual outcomes meeting</li>
          </ul>
        </div>
      </div>
      <div class="tier-invest">
        <div class="tier-invest-header corporate">
          <div class="tier-name">Corporate Strategic</div>
          <div class="tier-amount">GHS 100,000+</div>
          <div class="tier-usd">≈ USD 6,450+</div>
        </div>
        <div class="tier-invest-body">
          <div class="tier-suited">
            <strong>Suited for</strong>
            Corporations, international CSR programmes
          </div>
          <ul class="tier-benefits">
            <li>Co-branding on all materials</li>
            <li>Strategic planning seat</li>
            <li>Annual publication credit</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="partner-cta-block reveal">
      <p>All partner contributions are acknowledged in writing. BHI commits to annual impact reporting — showing exactly what your investment achieved.</p>
      <div style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
        <a href="#partner-form" class="btn-primary" onclick="document.getElementById('partner-form').scrollIntoView({behavior:'smooth'})">Partner With BHI</a>
        <a href="/strategic-plan" class="btn-secondary" style="color:var(--navy); border-color:var(--navy);">Download Partnership Prospectus</a>
      </div>
    </div>

    <!-- PARTNERSHIP ENQUIRY FORM -->
    <div id="partner-form" style="max-width:640px;margin:3rem auto 0;background:#fff;border-radius:16px;padding:2.5rem;box-shadow:0 8px 32px rgba(27,47,110,.08)">
      <h3 style="font-family:'Montserrat',sans-serif;font-weight:800;color:var(--navy);margin-bottom:.5rem;font-size:1.2rem">Start a Partnership Conversation</h3>
      <p style="color:var(--text-mid);font-size:.9rem;margin-bottom:1.5rem">Tell us about your organisation and we'll follow up within 3 business days.</p>
      <form data-bhi-form="partner">
        <input type="text" name="website" style="position:absolute;left:-9999px" tabindex="-1" autocomplete="off">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
          <div style="margin-bottom:1rem">
            <label style="display:block;font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem">Organisation *</label>
            <input name="organisation" required style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
          </div>
          <div style="margin-bottom:1rem">
            <label style="display:block;font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem">Contact Name *</label>
            <input name="contact_name" required style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
          </div>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
          <div style="margin-bottom:1rem">
            <label style="display:block;font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem">Email *</label>
            <input type="email" name="email" required style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
          </div>
          <div style="margin-bottom:1rem">
            <label style="display:block;font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem">Phone</label>
            <input type="tel" name="phone" style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
          </div>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
          <div style="margin-bottom:1rem">
            <label style="display:block;font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem">Partnership Tier</label>
            <select name="tier" style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
              <option value="bronze">Bronze — GHS 5,000</option>
              <option value="silver">Silver — GHS 10,000</option>
              <option value="gold">Gold — GHS 25,000</option>
              <option value="platinum">Platinum — GHS 50,000</option>
              <option value="corporate">Corporate Strategic — GHS 100,000+</option>
              <option value="individual">Individual Donor</option>
              <option value="in_kind">In-Kind Support</option>
              <option value="other">Other / Not Sure Yet</option>
            </select>
          </div>
          <div style="margin-bottom:1rem">
            <label style="display:block;font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem">Indicative Amount (GHS)</label>
            <input type="number" name="amount_ghs" min="0" style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
          </div>
        </div>
        <div style="margin-bottom:1.25rem">
          <label style="display:block;font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem">Message</label>
          <textarea name="message" rows="3" style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem;resize:vertical"></textarea>
        </div>
        <button type="submit" style="width:100%;background:#C8102E;color:#fff;border:none;padding:.9rem;border-radius:8px;font-family:'Montserrat',sans-serif;font-weight:700;font-size:.95rem;cursor:pointer">Send Partnership Enquiry →</button>
      </form>
    </div>
  </div>
</section>

<!-- YOUR SUPPORT IN ACTION -->
<section class="support-section" id="support">
  <div class="container">
    <div class="text-center">
      <div class="section-tag navy">Your Support in Action</div>
      <h2 class="section-title">Every contribution has a name.<br>Every name has an impact.</h2>
      <div class="section-divider"></div>
      <p class="section-sub">
        BHI is built on transparency. Here is what your support actually does in the Bono Region.
      </p>
    </div>
    <div class="support-grid reveal">
      <div class="support-card">
        <div class="support-amount">GHS 500</div>
        <div class="support-desc">Supports the screening supplies for a full community outreach day — blood pressure cuffs, glucose strips, ECG electrodes, and consumables.</div>
      </div>
      <div class="support-card">
        <div class="support-amount">GHS 2,000</div>
        <div class="support-desc">Supports community mobilisation — logistics, transport, and communications to bring a screening session to a remote village or market.</div>
      </div>
      <div class="support-card support-card--highlight">
        <div class="support-amount">GHS 5,000</div>
        <div class="support-desc">Supports a complete community outreach session — from arrival in the village to final triage, education, and referral for every flagged patient.</div>
      </div>
      <div class="support-card">
        <div class="support-amount">GHS 25,000</div>
        <div class="support-desc">Supports a district-scale screening programme — reaching multiple communities across one district with full CMR screening and diagnostic follow-up.</div>
      </div>
      <div class="support-card">
        <div class="support-amount">GHS 100,000+</div>
        <div class="support-desc">Supports strategic regional expansion — enabling BHI to establish a permanent presence, trained staff, and structured outreach cycles across multiple districts.</div>
      </div>
    </div>
    <div class="support-cta reveal">
      <a href="#partners" class="btn-primary">Support BHI Today</a>
    </div>
  </div>
</section>

<!-- CLOSING CTA -->
<section class="closing-section" id="screening">
  <div class="container">
    <h2>Every heartbeat matters.<br><em>Every community deserves a fighting chance.</em></h2>
    <p>
      Whether you are a farmer in Dormaa, a teacher in Berekum, or a child growing up in Jaman North —
      your heart deserves the same care as anyone in Accra or Kumasi.
      The doctor should be willing to come to you. Prevention should happen before disease becomes irreversible.
      Distance should not determine diagnosis.
    </p>
    <div class="closing-ctas">
      <a href="#outreach" class="btn-primary" onclick="document.getElementById('outreach').scrollIntoView({behavior:'smooth'}); return false;">🩺 Get Screened</a>
      <a href="#partners" class="btn-outline-white">Support the Mission</a>
      <a href="#partner-form" class="btn-outline-white" onclick="document.getElementById('partner-form')?.scrollIntoView({behavior:'smooth'})">Partner With BHI</a>
    </div>
  </div>
</section>

<!-- CONTACT FORM -->
<section class="bhi-section alt" id="contact-form-section">
  <div class="bhi-container" style="max-width:680px">
    <div class="text-center" style="margin-bottom:2.5rem">
      <div class="section-tag">Get In Touch</div>
      <h2 class="section-title">Send Us a Message</h2>
      <div class="section-divider"></div>
      <p class="section-sub">
        Questions about screening, partnerships, volunteering, or media enquiries —
        we typically respond within 2 business days.
      </p>
    </div>
    <div style="background:#fff;border-radius:16px;padding:2.5rem;box-shadow:0 8px 32px rgba(27,47,110,.08)">
      <form data-bhi-form="contact">
        <input type="text" name="website" style="position:absolute;left:-9999px" tabindex="-1" autocomplete="off">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
          <div style="margin-bottom:1rem">
            <label style="display:block;font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem">Full Name *</label>
            <input name="full_name" required style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
          </div>
          <div style="margin-bottom:1rem">
            <label style="display:block;font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem">Email *</label>
            <input type="email" name="email" required style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
          </div>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
          <div style="margin-bottom:1rem">
            <label style="display:block;font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem">Phone</label>
            <input type="tel" name="phone" style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
          </div>
          <div style="margin-bottom:1rem">
            <label style="display:block;font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem">Enquiry Type</label>
            <select name="enquiry_type" style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
              <option value="general">General</option>
              <option value="partnership">Partnership</option>
              <option value="volunteer">Volunteer</option>
              <option value="media">Media</option>
              <option value="referral">Patient Referral</option>
              <option value="other">Other</option>
            </select>
          </div>
        </div>
        <div style="margin-bottom:1rem">
          <label style="display:block;font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem">Organisation (optional)</label>
          <input name="organisation" style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
        </div>
        <div style="margin-bottom:1rem">
          <label style="display:block;font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem">Subject *</label>
          <input name="subject" required style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
        </div>
        <div style="margin-bottom:1.25rem">
          <label style="display:block;font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem">Message * (min. 20 characters)</label>
          <textarea name="message" rows="4" required minlength="20" style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem;resize:vertical"></textarea>
        </div>
        <button type="submit" style="width:100%;background:#C8102E;color:#fff;border:none;padding:.9rem;border-radius:8px;font-family:'Montserrat',sans-serif;font-weight:700;font-size:.95rem;cursor:pointer">Send Message →</button>
      </form>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer id="contact">
  <div class="footer-grid">
    <div class="footer-brand">
      <div class="footer-logo">
        <div class="footer-logo-icon">🫀</div>
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
      <a href="#about">About BHI</a>
      <a href="#founder">Why BHI Was Created</a>
      <a href="#how">How It Works</a>
      <a href="#cmr">CMR Disease</a>
      <a href="#services">Services</a>
      <a href="#registry">Registry</a>
      <a href="#roadmap">Road Ahead</a>
      <a href="#impact">Impact</a>
      <a href="#" onclick="switchPage('education'); return false;">CMR Education</a>
      <a href="#" onclick="switchPage('founder'); return false;">Meet the Founder</a>
    </div>
    <div class="footer-col">
      <h4>Get Involved</h4>
      <a href="#outreach">Get Screened</a>
      <a href="#partners">Partner With Us</a>
      <a href="/volunteer">Volunteer</a>
      <a href="/refer">Refer a Patient</a>
      <a href="/strategic-plan">Strategic Plan</a>
    </div>
    <div class="footer-col">
      <h4>Stay Informed</h4>
      <p style="font-size:0.8rem; color:rgba(255,255,255,0.5); margin-bottom:0.75rem; line-height:1.5;">
        Receive screening dates and impact updates.
      </p>
      <form class="footer-newsletter" data-bhi-form="newsletter" data-source="footer" style="display:flex">
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
</div>

<div class="page" id="page-education">
<!-- NAVBAR -->


<!-- HERO -->
<section class="edu-hero">
  <div class="edu-hero-content">
    <div class="edu-badge">🫀 Cardio-Metabolic-Renal Health Education</div>
    <h1>One Body.<br><em>One Disease Continuum.</em></h1>
    <p>
      Obesity, diabetes, high blood pressure, kidney disease, heart failure, and stroke
      are not separate conditions. They are one story — and BHI is here to help you
      understand it before it reaches the final chapter.
    </p>
  </div>
</section>

<!-- CMR OVERVIEW -->
<section class="cmr-overview" id="cmr-overview">
  <div class="container">
    <div class="text-center">
      <div class="section-tag">What Is CMR Disease?</div>
      <h2 class="section-title">Three systems. One shared fate.</h2>
      <div class="section-divider" style="background:rgba(255,255,255,0.3); margin:1.25rem auto;"></div>
      <p class="section-sub" style="color:rgba(255,255,255,0.78); margin:0 auto;">
        Cardio-Metabolic-Renal (CMR) disease describes the way the heart, metabolism,
        and kidneys damage each other in a vicious cycle — each organ's failure accelerating
        the collapse of the others.
      </p>
    </div>
    <div class="cmr-three reveal">
      <div class="cmr-three-card">
        <div class="cmr-letter">C</div>
        <h3>Cardio</h3>
        <p>The heart and blood vessels. Hypertension strains the heart muscle. Damaged vessels cannot deliver oxygen. The heart enlarges, weakens, and eventually fails. Stroke occurs when vessels in the brain are blocked or burst.</p>
      </div>
      <div class="cmr-three-card">
        <div class="cmr-letter">M</div>
        <h3>Metabolic</h3>
        <p>How the body processes energy. Obesity and insulin resistance lead to diabetes. Excess sugar and fat inflame blood vessels, damage the heart muscle directly, and overload the kidneys with glucose filtration.</p>
      </div>
      <div class="cmr-three-card">
        <div class="cmr-letter">R</div>
        <h3>Renal</h3>
        <p>The kidneys filter the blood. High blood pressure and diabetes scar the kidney filters. Scarred kidneys raise blood pressure further, retain fluid, and accelerate heart failure. The cycle is self-reinforcing.</p>
      </div>
    </div>
    <div class="cmr-link-statement reveal">
      "You cannot treat the heart and ignore the kidneys. You cannot treat the kidneys and ignore the blood sugar.
      CMR disease demands one integrated approach — and that is exactly what BHI delivers."
    </div>
  </div>
</section>

<!-- THE PATHWAY -->
<section class="pathway-section" id="pathway">
  <div class="container">
    <div class="section-tag">The CMR Disease Pathway</div>
    <h2 class="section-title">How it starts. How it progresses. Where BHI intervenes.</h2>
    <div class="section-divider"></div>
    <p class="section-sub">
      Most people reach hospital at Stage 6 or 7. BHI is designed to find you at Stage 1 or 2 —
      when the damage is still reversible and the cost of intervention is low.
    </p>

    <div class="pathway-steps reveal">

      <div class="pathway-step">
        <div class="step-circle s1">
          <div class="step-icon">⚖️</div>
          <div class="step-num">Stage 1</div>
        </div>
        <div class="step-content">
          <h3>Obesity &amp; Excess Weight</h3>
          <p>When the body carries more fat than it can manage — especially around the abdomen — it begins to produce inflammatory signals that affect every organ. The heart works harder to pump blood through a larger body. Fat tissue becomes metabolically active in damaging ways.</p>
          <p>At this stage there are usually <strong>no symptoms</strong>. Most people feel well. The disease is silent.</p>
          <div class="step-tags">
            <span class="step-tag safe">Fully reversible at this stage</span>
            <span class="step-tag">Lifestyle + diet</span>
            <span class="step-tag warning">Often missed</span>
          </div>
          <div class="step-bhi-note">BHI screens: BMI, waist circumference, weight-height ratio — at every community outreach.</div>
        </div>
      </div>

      <div class="pathway-step">
        <div class="step-circle s2">
          <div class="step-icon">🔋</div>
          <div class="step-num">Stage 2</div>
        </div>
        <div class="step-content">
          <h3>Insulin Resistance &amp; Metabolic Syndrome</h3>
          <p>The body's cells stop responding to insulin properly. The pancreas compensates by producing more — but eventually it cannot keep up. Blood sugar begins to rise. Blood pressure creeps upward. Cholesterol patterns become dangerous.</p>
          <p>Metabolic syndrome — the cluster of high blood sugar, high blood pressure, abnormal lipids, and abdominal obesity — multiplies the risk of heart disease and kidney damage five-fold.</p>
          <div class="step-tags">
            <span class="step-tag safe">Reversible with structured intervention</span>
            <span class="step-tag warning">Blood sugar rising</span>
            <span class="step-tag">Medications may help</span>
          </div>
          <div class="step-bhi-note">BHI screens: fasting glucose, HbA1c, blood pressure, lipid profile.</div>
        </div>
      </div>

      <div class="pathway-step">
        <div class="step-circle s3">
          <div class="step-icon">💉</div>
          <div class="step-num">Stage 3</div>
        </div>
        <div class="step-content">
          <h3>Type 2 Diabetes</h3>
          <p>Blood sugar is persistently elevated. Glucose damages blood vessel walls throughout the body — in the eyes, the nerves, the kidneys, and the heart. The kidneys begin to leak protein (a sign of damage). The heart muscle itself becomes stiffer and less efficient.</p>
          <p>In Ghana, most people with diabetes are diagnosed at this stage — or later. In the Bono Region, most are never diagnosed at all.</p>
          <div class="step-tags">
            <span class="step-tag warning">Manageable but not curable</span>
            <span class="step-tag danger">Organ damage begins</span>
            <span class="step-tag">Medication essential</span>
          </div>
          <div class="step-bhi-note">BHI screens: HbA1c at community level; full metabolic panel at Tier 2 hub for flagged patients.</div>
        </div>
      </div>

      <div class="pathway-step">
        <div class="step-circle s4">
          <div class="step-icon">🩸</div>
          <div class="step-num">Stage 4</div>
        </div>
        <div class="step-content">
          <h3>Hypertension &amp; Vascular Damage</h3>
          <p>Elevated blood pressure over years thickens and stiffens artery walls. The heart must pump against greater resistance, and enlarges as a result. Blood vessels supplying the kidneys narrow, reducing blood flow and triggering the kidneys to raise blood pressure further — a damaging feedback loop.</p>
          <p>Uncontrolled hypertension is the single most common cause of stroke, heart failure, and kidney failure in Ghana.</p>
          <div class="step-tags">
            <span class="step-tag danger">High stroke risk</span>
            <span class="step-tag danger">Heart enlargement</span>
            <span class="step-tag warning">Kidney pressure rising</span>
          </div>
          <div class="step-bhi-note">BHI screens: blood pressure at every community visit. ABPM monitoring available at Tier 2 hub.</div>
        </div>
      </div>

      <div class="pathway-step">
        <div class="step-circle s5">
          <div class="step-icon">🫘</div>
          <div class="step-num">Stage 5</div>
        </div>
        <div class="step-content">
          <h3>Chronic Kidney Disease (CKD)</h3>
          <p>Years of high blood pressure and high blood sugar scar the kidney filters permanently. The kidneys lose their ability to remove waste products and regulate fluid. Toxins accumulate. Fluid builds up in the lungs and legs — placing enormous strain on the heart.</p>
          <p>CKD and heart failure accelerate each other. This is called <strong>cardiorenal syndrome</strong> — and it is far more common in the Bono Region than anyone currently knows, because it has never been screened for.</p>
          <div class="step-tags">
            <span class="step-tag danger">Irreversible scarring</span>
            <span class="step-tag danger">Cardiorenal syndrome risk</span>
            <span class="step-tag">Specialist management required</span>
          </div>
          <div class="step-bhi-note">BHI screens: urine dipstick (protein) at Tier 1. Urine ACR, eGFR at Tier 2 hub.</div>
        </div>
      </div>

      <div class="pathway-step">
        <div class="step-circle s6">
          <div class="step-icon">🫀</div>
          <div class="step-num">Stage 6</div>
        </div>
        <div class="step-content">
          <h3>Heart Failure</h3>
          <p>The heart can no longer pump enough blood to meet the body's needs. Fluid collects in the lungs (causing breathlessness) and the legs (causing swelling). Energy levels collapse. The kidneys fail further, creating a downward spiral between heart and kidney.</p>
          <p>Heart failure is Ghana's number one cause of cardiac hospital admission. In the Bono Region, most patients arrive in crisis — because no earlier intervention ever occurred.</p>
          <div class="step-tags">
            <span class="step-tag danger">Life-threatening</span>
            <span class="step-tag danger">Hospital admission required</span>
            <span class="step-tag">Expensive to manage</span>
          </div>
          <div class="step-bhi-note">BHI's echocardiography detects heart enlargement and dysfunction before heart failure develops — at Tier 2 hub.</div>
        </div>
      </div>

      <div class="pathway-step">
        <div class="step-circle s7">
          <div class="step-icon">⚡</div>
          <div class="step-num">Stage 7</div>
        </div>
        <div class="step-content">
          <h3>Stroke</h3>
          <p>Years of hypertension, diabetes, and inflammation weaken blood vessels in the brain. When one bursts or becomes blocked, a stroke occurs within minutes. The damage can be permanent: paralysis, speech loss, cognitive impairment, or death.</p>
          <p>In Ghana, stroke kills or disables in its prime. Most victims had elevated blood pressure for years before the event — and had never been told.</p>
          <div class="step-tags">
            <span class="step-tag danger">Emergency. Often fatal.</span>
            <span class="step-tag danger">Permanent disability risk</span>
            <span class="step-tag">Entirely preventable at Stage 1–4</span>
          </div>
          <div class="step-bhi-note">Every BHI community screening is stroke prevention. Catch the blood pressure before the stroke — not after.</div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- OVERWORKED AC -->
<section class="ac-section" id="overworked-ac">
  <div class="container">
    <div class="section-tag gold">🌡️ The Overworked AC</div>
    <h2 class="section-title">A story your community will understand.</h2>
    <div class="section-divider"></div>
    <p class="section-sub">
      Medical language should never be a barrier to understanding your own health.
      Here is the CMR disease story — told in a way that works everywhere.
    </p>

    <div class="ac-hero-card reveal">
      <h3>Your body is like an air conditioner.<br><em>Overwork it long enough, and it will break down.</em></h3>
      <p>
        Think of your heart as an air-conditioning unit. It runs day and night to keep everything cool and comfortable.
        When the system is healthy — the filters are clean, the power supply is stable, the rooms are not too big — the AC runs easily.
        <br><br>
        But when you carry excess weight, your heart must cool a bigger space. It works harder just to keep up.
        When your blood sugar is uncontrolled, the internal filters (your kidneys) become clogged — blocked with sugar deposits that damage the fine mesh that cleans your blood.
        When your blood pressure is high, it is like running the AC at maximum power, constantly, with no rest.
        <br><br>
        What happens to an AC that runs too hard, with dirty filters, on an unstable power supply?
        <br><br>
        <strong>It overheats. It breaks down. And by the time the failure is obvious — the damage is already done.</strong>
        <br><br>
        Heart failure. Kidney failure. Stroke. These are not sudden events. They are the predictable end of a long overload.
        And the extraordinary truth is: <strong>every stage before breakdown is detectable, manageable, and often reversible</strong> — if you catch it in time.
      </p>
    </div>

    <div class="ac-grid reveal">
      <div class="ac-card">
        <div class="ac-card-stage">The Overload</div>
        <h4>Too much weight, too little movement</h4>
        <p>The AC is cooling a space that is too large. It can manage — but it is running harder than it should be every single day.</p>
      </div>
      <div class="ac-card">
        <div class="ac-card-stage">The Blocked Filter</div>
        <h4>Insulin resistance &amp; rising blood sugar</h4>
        <p>The internal filters are getting clogged. Airflow is reduced. The system compensates — but efficiency is dropping.</p>
      </div>
      <div class="ac-card">
        <div class="ac-card-stage">The Unstable Power</div>
        <h4>High blood pressure — persistent, relentless</h4>
        <p>Voltage surges and drops all day. The compressor strains. Components begin to degrade from the inside.</p>
      </div>
      <div class="ac-card">
        <div class="ac-card-stage">The Pipe Damage</div>
        <h4>Kidneys scarring, vessels thickening</h4>
        <p>The coolant pipes are corroded. Fluid backs up. The whole system is under pressure — and leaking.</p>
      </div>
      <div class="ac-card">
        <div class="ac-card-stage">The Breakdown</div>
        <h4>Heart failure. Stroke. Kidney failure.</h4>
        <p>The AC has failed. No amount of repair will restore it to what it was. The cost of waiting was everything.</p>
      </div>
      <div class="ac-card" style="border-left-color: var(--success); background: rgba(46,139,87,0.05);">
        <div class="ac-card-stage" style="color: var(--success);">BHI's Role</div>
        <h4 style="color: var(--success);">Service it before it breaks.</h4>
        <p>BHI comes to your community and checks the system — blood pressure, blood sugar, heart, kidneys — before a breakdown becomes inevitable.</p>
      </div>
    </div>

    <div class="ac-punchline reveal">
      You service your vehicle before it breaks down on the road. <em>Your heart deserves the same care.</em>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="faq-section" id="faq">
  <div class="container">
    <div class="text-center">
      <div class="section-tag navy">Common Questions</div>
      <h2 class="section-title">What people ask BHI.</h2>
      <div class="section-divider"></div>
    </div>
    <div class="faq-list reveal">
      <div class="faq-item">
        <div class="faq-q">I feel fine. Do I still need to be screened?</div>
        <div class="faq-a">Yes — and this is the most important message BHI carries. CMR disease is silent for years. High blood pressure has no symptoms until a stroke occurs. Diabetes damages kidneys for a decade before pain begins. Heart failure announces itself only when the heart has already failed. Feeling fine means you are in the stage where intervention works best.</div>
      </div>
      <div class="faq-item">
        <div class="faq-q">Is this only for older people?</div>
        <div class="faq-a">No. Hypertension is increasingly common in Ghanaians in their 30s. Obesity and insulin resistance are rising in young adults. BHI screens from age 18 upward — and conducts congenital heart disease screening in children. CMR disease does not wait for age.</div>
      </div>
      <div class="faq-item">
        <div class="faq-q">My mother has diabetes. Does that mean I will get it too?</div>
        <div class="faq-a">Family history increases your risk — but it does not determine your outcome. Lifestyle, diet, activity, and early screening can dramatically reduce the probability of developing diabetes even with a strong family history. BHI's screening gives you the information to act before the condition develops.</div>
      </div>
      <div class="faq-item">
        <div class="faq-q">What does BHI actually do when you come to screen me?</div>
        <div class="faq-a">At Tier 1 (community screening), BHI measures your blood pressure, blood glucose, BMI, and performs an ECG. If anything is flagged, you are invited to a Tier 2 session at our hub — where echocardiography, 24-hour BP monitoring, metabolic blood tests, and kidney function tests are performed. Everything is explained to you clearly. Nothing costs you anything.</div>
      </div>
      <div class="faq-item">
        <div class="faq-q">Can CMR disease be treated or reversed?</div>
        <div class="faq-a">At early stages — absolutely. Obesity and insulin resistance can be reversed with lifestyle intervention. Blood pressure can be normalised with medication and lifestyle changes. Early kidney damage can be slowed or halted. The key is catching the disease in Stage 1, 2, or 3 — not Stage 6 or 7. That is the entire rationale for BHI's existence.</div>
      </div>
    </div>
  </div>
</section>

<!-- CLOSING CTA -->
<section class="edu-cta">
  <div class="container">
    <h2>Now you know the story.<br><em>Let BHI check your system.</em></h2>
    <p>
      Free. No hospital visit required. We come to you. One screening could change the
      direction of your health — and protect everyone who depends on you.
    </p>
    <div class="cta-btns">
      <a href="#outreach" onclick="switchPage('home'); setTimeout(()=>document.getElementById('outreach').scrollIntoView({behavior:'smooth'}), 150); return false;" class="btn-primary">🩺 Get Screened</a>
      <a href="#partners" onclick="switchPage('home'); return true;" class="btn-outline-white">Support the Mission</a>
      <a href="#" onclick="switchPage('home'); return false;" class="btn-outline-white">← Back to BHI Homepage</a>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-bottom">
    <span>© 2026 Bono Heart Initiative. Bono Region, Ghana. All rights reserved.</span>
    <span>
      <a href="mailto:info@bonoheartinitiative.org">info@bonoheartinitiative.org</a> ·
      <a href="mailto:partner@bonoheartinitiative.org">partner@bonoheartinitiative.org</a> ·
      Founded by Dr. Edward Bediako Mensah, MD · Sunyani Teaching Hospital ·
      <a href="/privacy">Privacy Policy</a>
    </span>
  </div>
</footer>
</div>

<div class="page" id="page-founder">
<!-- HERO -->
<section class="founder-hero">
  <div class="founder-hero-content">
    <div class="hero-eyebrow">👨‍⚕️ Meet the Founder</div>
    <h1>Dr. <em>Edward Bediako Mensah</em></h1>
    <p class="founder-hero-title">Consulting Cardiologist · Sunyani Teaching Hospital · Founder, Bono Heart Initiative</p>
    <p>
      Trained in community-centred medicine. Committed to cardiometabolic renal equity.
      Building the cardiovascular system the Bono Region has always deserved.
    </p>
  </div>
</section>

<!-- PROFILE + STORY -->
<section class="profile-section" id="story">
  <div class="container">
    <div class="profile-grid reveal">
      <div class="profile-photo-wrap">
        <div class="profile-photo" style="border:none; background:none;">
          <img
            src="dr-bediako-mensah.jpg"
            alt="Dr. Edward Bediako Mensah — Consulting Cardiologist and Founder of the Bono Heart Initiative"
            class="profile-portrait"
          >
        </div>
        <div class="profile-card">
          <div class="profile-card-name">Dr. Edward Bediako Mensah, MD</div>
          <div class="profile-card-role">Consulting Cardiologist</div>
          <div class="profile-card-inst">Sunyani Teaching Hospital, Ghana</div>
          <div class="profile-card-tags">
            <span class="profile-tag">ELAM Cuba</span>
            <span class="profile-tag">Cardiocentro SCU</span>
            <span class="profile-tag">PCHF Zurich (2027)</span>
            <span class="profile-tag">CMR Medicine</span>
          </div>
        </div>
      </div>

      <div class="profile-content">
        <div class="section-tag">The Story Behind BHI</div>
        <h2 class="section-title">Service before status.<br>Community before clinic.</h2>
        <div class="section-divider"></div>

        <p class="story-body">
          Bono Heart Initiative was born from a journey that crossed communities, countries, and healthcare systems — but always returned to one central question: why should access to specialist care depend on geography?
        </p>

        <h3 class="story-h3">ELAM Cuba — Where It Began</h3>
        <p class="story-body">
          Dr. Bediako Mensah began his medical training at the <strong>Latin American School of Medicine (ELAM) in Cuba</strong> — a globally recognised institution founded on the principles of equity, prevention, and service to underserved communities.
        </p>
        <p class="story-body">
          At ELAM, healthcare was not viewed as something confined to hospitals. Physicians were taught to engage communities directly, identify disease early, and bring care closer to those who needed it most. This philosophy profoundly shaped his understanding of medicine — and never left him.
        </p>

        <p class="story-body story-body--personal">
          But this commitment to equity was not shaped by training alone. Growing up in Ghana, Dr. Bediako Mensah experienced first-hand the realities faced by people in underserved communities — the distances travelled to reach care, the costs that made specialist appointments impossible, the diagnoses that came too late because no system had ever reached the patient first. ELAM did not create this conviction. It gave it a framework, a language, and a path forward.
        </p>

        <h3 class="story-h3">Cardiocentro Ernesto Che Guevara — Specialist Training</h3>
        <p class="story-body">
          Following medical school, he pursued specialist cardiology training at the <strong>Cardiocentro Ernesto Che Guevara in Santa Clara, Cuba</strong> — one of the country's leading cardiovascular centres. There he gained advanced experience in cardiovascular diagnostics, heart failure management, structural heart disease, echocardiography, preventive cardiology, and the complexities of specialist cardiac care.
        </p>

        <blockquote class="story-quote">
          "Many of the patients presenting with advanced cardiovascular disease could have been identified much earlier — if effective systems for detection and follow-up had existed closer to where they lived."
        </blockquote>

        <p class="story-body">
          That experience revealed an important reality: the clinical problems were rarely the result of poor medicine. They were the result of late presentation — driven by distance, cost, and the absence of structured detection systems in communities.
        </p>

        <h3 class="story-h3">Returning to Ghana — The Observation That Could Not Be Ignored</h3>
        <p class="story-body">
          Returning to Ghana and working within the Bono Region reinforced this observation. Patients frequently travelled long distances for specialist evaluation — often presenting late, after years of undetected hypertension, diabetes, heart failure, congenital heart disease, or kidney disease. The need was clear. The system to address it did not yet exist.
        </p>

        <h3 class="story-h3">University Hospital Zurich — Building Systems That Last</h3>
        <p class="story-body">
          Years later, this vision was further deepened through advanced postgraduate cardiovascular systems training at the <strong>University Hospital Zurich</strong> — one of Europe's foremost academic medical centres — through the internationally recognised <strong>Postgraduate Course in Heart Failure (PCHF)</strong>. Dr. Bediako Mensah is currently enrolled in the programme and is expected to complete the <strong>Certificate of Advanced Studies (CAS)</strong> in 2027.
        </p>
        <p class="story-body">
          The PCHF programme brought together cardiovascular clinicians and health system leaders from across the world to examine how sustainable, high-quality heart failure care is designed, implemented, and measured at scale. The curriculum was rigorous: heart failure systems design, longitudinal patient registries, multidisciplinary care models, implementation science, outcomes measurement, and the principles of continuous quality improvement in cardiovascular programmes.
        </p>
        <p class="story-body">
          While Cuba taught the importance of equity and community engagement, and Cardiocentro provided deep specialist clinical expertise, Zurich answered the question that had been forming for years: how do you build a cardiovascular system that does not just serve patients today — but continues to serve them, improves over time, and generates the evidence to change policy permanently?
        </p>

        <div class="pchf-photo-block reveal">
          <img
            src="pchf-zurich-group.jpg"
            alt="Participants and faculty of the Postgraduate Course in Heart Failure (PCHF), University Hospital Zurich, Switzerland"
          >
          <div class="pchf-photo-caption">
            <div class="pchf-caption-icon">📍</div>
            <div class="pchf-caption-text">
              <strong>Global Learning. Local Impact.</strong><br>
              Participants and faculty of the Postgraduate Course in Heart Failure (PCHF),
              University Hospital Zurich, Switzerland. Dr. Bediako Mensah trained alongside
              cardiovascular clinicians and health system leaders from across the world —
              bringing the knowledge and frameworks of international cardiovascular medicine
              back to the communities of the Bono Region.
            </div>
          </div>
        </div>

        <p class="story-body story-body--personal">
          Engaging on international cardiovascular platforms brought a further and important realisation. Global cardiovascular leadership is not reserved for large institutions or wealthy countries. The experiences of African clinicians working in under-resourced settings — the patterns of late presentation, the disease burden carried silently by communities without access to diagnostics, the solutions developed out of necessity — these are not peripheral to the global conversation. African experiences and African data deserve a central place in it. BHI's registry is, in part, a contribution to that conversation.
        </p>

        <h3 class="story-h3">The Convergence</h3>
        <p class="story-body">
          Bono Heart Initiative represents the convergence of these three experiences.
        </p>
        <p class="story-body">
          The <strong>community-centred philosophy of ELAM</strong>. The <strong>specialist cardiovascular expertise of Cardiocentro Ernesto Che Guevara</strong>. The <strong>systems-based cardiovascular framework of the University Hospital Zurich</strong>.
        </p>
        <p class="story-body" style="font-weight:600; color:var(--navy);">
          Together they form a single mission: to bring specialist cardiovascular detection, structured referral pathways, evidence-based care, and long-term health system strengthening closer to the communities that need them most.
        </p>
        <p class="story-body" style="font-weight:600; color:var(--navy);">
          BHI exists because specialist heart care should not be a privilege reserved for major cities. It should be accessible to every community.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- JOURNEY -->
<section class="journey-section" id="journey">
  <div class="container">
    <div class="section-tag navy">Educational Journey</div>
    <h2 class="section-title">Three institutions. One mission.</h2>
    <div class="section-divider"></div>
    <div class="journey-steps reveal">
      <div class="journey-step">
        <div class="journey-step-period">Medical School</div>
        <h3>Latin American School of Medicine (ELAM), Cuba</h3>
        <p>A globally recognised institution founded on equity, prevention, and service to underserved communities. ELAM shaped the conviction that the doctor must go to the patient — not the other way around.</p>
      </div>
      <div class="journey-step">
        <div class="journey-step-period">Specialist Cardiology Training</div>
        <h3>Cardiocentro Ernesto Che Guevara, Santa Clara, Cuba</h3>
        <p>One of Cuba's leading cardiovascular centres. Advanced training in echocardiography, heart failure, structural heart disease, preventive cardiology, and cardiovascular diagnostics. Where the pattern of late presentation became impossible to ignore.</p>
      </div>
      <div class="journey-step">
        <div class="journey-step-period">Postgraduate Training — Ongoing</div>
        <h3>University Hospital Zurich — PCHF (CAS expected 2027)</h3>
        <p>Advanced postgraduate cardiovascular systems training through the internationally recognised Postgraduate Course in Heart Failure (PCHF), University Hospital Zurich. Currently enrolled — Certificate of Advanced Studies (CAS) expected 2027. Focused on heart failure systems, registries, implementation science, multidisciplinary care, outcomes measurement, and sustainable cardiovascular programme development.</p>
      </div>
      <div class="journey-step">
        <div class="journey-step-period">Current Role</div>
        <h3>Consulting Cardiologist, Sunyani Teaching Hospital</h3>
        <p>Providing specialist cardiac care, echocardiography, ABPM monitoring, and cardiology inpatient management at the Bono Region's primary teaching hospital — while building BHI to serve the communities beyond its walls.</p>
      </div>
      <div class="journey-step">
        <div class="journey-step-period">2026 — Present</div>
        <h3>Founder, Bono Heart Initiative</h3>
        <p>The convergence of ELAM's community philosophy, Cardiocentro's specialist expertise, and Zurich's systems thinking — applied to one region, one mission, and 1.2 million people who deserve better.</p>
      </div>
    </div>
  </div>
</section>

<!-- VISION -->
<section class="vision-section" id="vision">
  <div class="container">
    <div class="section-tag">Long-Term Vision</div>
    <h2 class="section-title">What Dr. Bediako Mensah is building.</h2>
    <div class="section-divider"></div>
    <div class="vision-points reveal">
      <div class="vision-point">
        <div class="vision-point-icon">🌍</div>
        <h3>A Regional CMR System</h3>
        <p>Not a one-off screening event. A permanent, structured, self-sustaining cardiovascular health system embedded in the Bono Region's health infrastructure.</p>
      </div>
      <div class="vision-point">
        <div class="vision-point-icon">📊</div>
        <h3>Research That Drives Policy</h3>
        <p>The BHI registry will generate publications. Publications will generate grants. Grants will sustain the programme. Evidence will change national health policy on CMR disease.</p>
      </div>
      <div class="vision-point">
        <div class="vision-point-icon">🏘️</div>
        <h3>Prevention Before Crisis</h3>
        <p>A Bono Region where hypertension is caught at the village market, not in the emergency ward. Where diabetes is managed at Stage 2, not at dialysis.</p>
      </div>
      <div class="vision-point">
        <div class="vision-point-icon">⚖️</div>
        <h3>Cardiovascular Equity</h3>
        <p>The same standard of specialist cardiac detection available in Accra, available in Dormaa, Berekum, and Jaman North. Distance should not determine diagnosis.</p>
      </div>
      <div class="vision-point">
        <div class="vision-point-icon">🤝</div>
        <h3>A Model for Ghana</h3>
        <p>BHI is designed to be replicable. If it works in the Bono Region, the model — community screening, CMR registries, structured referral — can be adopted across Ghana's underserved regions.</p>
      </div>
      <div class="vision-point">
        <div class="vision-point-icon">👶</div>
        <h3>The Next Generation</h3>
        <p>Training community health workers in CMR literacy. Building a generation of Bono Region residents who understand their heart, their metabolism, and their kidneys — before disease takes hold.</p>
      </div>
    </div>
    <div class="vision-closing reveal">
      "I did not build this for recognition. I built it because the Bono Region deserves a doctor who shows up — and a system that stays."
      <br><span style="font-size:0.85rem; color:rgba(255,255,255,0.55); font-style:normal; font-weight:400; display:block; margin-top:0.5rem;">— Dr. Edward Bediako Mensah, MD</span>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="founder-cta">
  <div class="container">
    <h2>Support the vision.<br><em>Back the movement.</em></h2>
    <p>BHI is built on one person's conviction and one region's need. Help make it the system the Bono Region deserves.</p>
    <div class="cta-row">
      <a href="#outreach" onclick="switchPage('home'); setTimeout(()=>document.getElementById('outreach').scrollIntoView({behavior:'smooth'}), 150); return false;" class="btn-primary">🩺 Get Screened</a>
      <a href="#partners" onclick="switchPage('home'); return true;" class="btn-secondary-outline">Partner With BHI</a>
      <a href="#" onclick="switchPage('home'); return false;" class="btn-secondary-outline">← Back to Homepage</a>
    </div>
  </div>
</section>

<footer>
  <div class="footer-bottom">
    <span>© 2026 Bono Heart Initiative. Bono Region, Ghana. All rights reserved.</span>
    <span>
      <a href="mailto:info@bonoheartinitiative.org">info@bonoheartinitiative.org</a> ·
      <a href="mailto:partner@bonoheartinitiative.org">partner@bonoheartinitiative.org</a> ·
      Founded by Dr. Edward Bediako Mensah, MD · Sunyani Teaching Hospital ·
      <a href="/privacy">Privacy Policy</a>
    </span>
  </div>
</footer>

<a href="https://wa.me/233243255462" class="whatsapp-float" target="_blank" aria-label="WhatsApp BHI">
  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
  </svg>
</a>

<!-- SCREENING REGISTRATION MODAL (dynamic, fed by outreach sessions) -->
<div id="bhi-screening-modal">
  <div class="bhi-modal-box">
    <div class="bhi-modal-header">
      <span class="bhi-modal-title">Register for Screening</span>
      <button class="bhi-modal-close" onclick="BHI.closeScreeningModal()">×</button>
    </div>
    <div class="bhi-modal-body">
      <form data-bhi-form="screening">
        <div class="form-group" style="margin-bottom:1rem">
          <label style="display:block;font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.05em;color:#475569;margin-bottom:.4rem">Choose a Session *</label>
          <select name="session_id" required style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem"></select>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
          <div class="form-group" style="margin-bottom:1rem">
            <label style="display:block;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem;font-family:'Montserrat',sans-serif">Full Name *</label>
            <input name="full_name" required style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
          </div>
          <div class="form-group" style="margin-bottom:1rem">
            <label style="display:block;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem;font-family:'Montserrat',sans-serif">Phone Number *</label>
            <input name="phone" type="tel" required style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
          </div>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
          <div class="form-group" style="margin-bottom:1rem">
            <label style="display:block;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem;font-family:'Montserrat',sans-serif">Age</label>
            <input name="age" type="number" min="1" max="120" style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
          </div>
          <div class="form-group" style="margin-bottom:1rem">
            <label style="display:block;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem;font-family:'Montserrat',sans-serif">Gender</label>
            <select name="gender" style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
              <option value="">Prefer not to say</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
          </div>
        </div>
        <div class="form-group" style="margin-bottom:1rem">
          <label style="display:block;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem;font-family:'Montserrat',sans-serif">Email (optional, for confirmation)</label>
          <input name="email" type="email" style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
          <div class="form-group" style="margin-bottom:1rem">
            <label style="display:block;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem;font-family:'Montserrat',sans-serif">District *</label>
            <input name="district" required style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
          </div>
          <div class="form-group" style="margin-bottom:1rem">
            <label style="display:block;font-size:.72rem;font-weight:700;text-transform:uppercase;color:#475569;margin-bottom:.4rem;font-family:'Montserrat',sans-serif">Community *</label>
            <input name="community" required style="width:100%;padding:.7rem .9rem;border:1.5px solid #e2e8f0;border-radius:7px;font-size:.9rem">
          </div>
        </div>
        <div style="background:#F7F9FC;border-radius:8px;padding:1rem 1.25rem;margin-bottom:1.25rem">
          <p style="font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:700;color:#475569;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.6rem">Do you have any of the following?</p>
          <label style="display:flex;align-items:center;gap:.5rem;font-size:.86rem;margin-bottom:.5rem;cursor:pointer"><input type="checkbox" name="has_hypertension" value="1"> High blood pressure / Hypertension</label>
          <label style="display:flex;align-items:center;gap:.5rem;font-size:.86rem;margin-bottom:.5rem;cursor:pointer"><input type="checkbox" name="has_diabetes" value="1"> Diabetes</label>
          <label style="display:flex;align-items:center;gap:.5rem;font-size:.86rem;margin-bottom:.5rem;cursor:pointer"><input type="checkbox" name="has_kidney_disease" value="1"> Kidney disease</label>
          <label style="display:flex;align-items:center;gap:.5rem;font-size:.86rem;cursor:pointer"><input type="checkbox" name="family_history" value="1"> Family history of heart/kidney disease</label>
        </div>
        <button type="submit" style="width:100%;background:#C8102E;color:#fff;border:none;padding:.9rem;border-radius:8px;font-family:'Montserrat',sans-serif;font-weight:700;font-size:.95rem;cursor:pointer">Confirm Registration →</button>
      </form>
    </div>
  </div>
</div>

<script src="assets/js/bhi-main.js"></script>
<script>
  // Page switching
  const pages = ['home', 'education', 'founder'];
  
  function switchPage(name) {
    pages.forEach(p => {
      const el = document.getElementById('page-' + p);
      const tab = document.getElementById('tab-' + p);
      if (el) el.classList.toggle('active', p === name);
      if (tab) tab.classList.toggle('active', p === name);
    });
    window.scrollTo({ top: 0, behavior: 'smooth' });
    // Re-run reveal on new page
    setTimeout(initReveal, 100);
  }

  function initReveal() {
    const reveals = document.querySelectorAll('.page.active .reveal:not(.visible)');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry, i) => {
        if (entry.isIntersecting) {
          setTimeout(() => entry.target.classList.add('visible'), i * 80);
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
    reveals.forEach(el => observer.observe(el));
  }

  // Init
  document.addEventListener('DOMContentLoaded', () => {
    switchPage('home');
    initReveal();
  });

  // Navbar scroll effect
  const nav = document.querySelector('nav');
  window.addEventListener('scroll', () => {
    nav.style.boxShadow = window.scrollY > 60 ? '0 4px 20px rgba(0,0,0,0.3)' : 'none';
  });
</script>

</body>
</html>