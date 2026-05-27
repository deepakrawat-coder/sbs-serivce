<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Our Services — SRG · SBS · Lord Krishna</title>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Clash+Display:wght@400;500;600;700&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&family=Rajdhani:wght@400;500;600;700&family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<style>
/* ============================================================
   ROOT & RESET
   ============================================================ */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --srg-orange:   #E8650A;
  --srg-warm:     #FFF5EC;
  --srg-dark:     #1C0A00;
  --srg-mid:      #7A3A10;

  --sbs-cyan:     #00E5FF;
  --sbs-blue:     #0A1628;
  --sbs-mid:      #0D2347;
  --sbs-accent:   #1565FF;
  --sbs-grey:     #8EACC8;

  --lk-gold:      #C8890A;
  --lk-saffron:   #F4821F;
  --lk-maroon:    #6B0F1A;
  --lk-cream:     #FDF8EF;
  --lk-dark:      #2A1000;
}

html { scroll-behavior: smooth; }

body {
  font-family: 'DM Sans', sans-serif;
  background: #111;
  overflow-x: hidden;
}

img { max-width: 100%; display: block; }

/* ============================================================
   PAGE HERO
   ============================================================ */
.page-hero {
  background: #0A0A0F;
  padding: 70px 0 0;
  position: relative;
  overflow: hidden;
}
.page-hero::before {
  content: '';
  position: absolute;
  width: 700px; height: 700px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(232,101,10,.18) 0%, transparent 70%);
  top: -300px; right: -200px;
  pointer-events: none;
}
.page-hero .breadcrumb-item a { color: var(--srg-orange); text-decoration: none; font-size: 13px; }
.page-hero .breadcrumb-item.active { color: #666; font-size: 13px; }
.page-hero .breadcrumb-item + .breadcrumb-item::before { color: #444; }

.hero-title {
  font-family: 'Bebas Neue', sans-serif;
  font-size: clamp(48px, 8vw, 90px);
  color: #fff;
  letter-spacing: .04em;
  line-height: .95;
}
.hero-title span {
  -webkit-text-stroke: 2px var(--srg-orange);
  color: transparent;
}
.hero-sub {
  color: #777;
  font-size: 15px;
  max-width: 460px;
  line-height: 1.8;
  font-weight: 300;
}

/* ============================================================
   BRAND SWITCHER TABS
   ============================================================ */
.brand-switcher-wrap {
  margin-top: 48px;
  position: relative;
  z-index: 10;
}

.brand-tabs {
  display: flex;
  align-items: stretch;
  gap: 0;
  background: #0A0A0F;
  border-top: 1px solid rgba(255,255,255,.06);
}

.brand-tab {
  flex: 1;
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 22px 28px;
  cursor: pointer;
  border: none;
  background: transparent;
  text-align: left;
  transition: background .3s;
  border-top: 3px solid transparent;
  position: relative;
  min-width: 0;
}
.brand-tab .tab-icon {
  width: 46px; height: 46px;
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  font-size: 20px;
  flex-shrink: 0;
  transition: transform .3s;
}
.brand-tab .tab-texts { min-width: 0; }
.brand-tab .tab-name {
  font-size: 15px;
  font-weight: 600;
  color: #aaa;
  display: block;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  transition: color .3s;
}
.brand-tab .tab-tagline {
  font-size: 12px;
  color: #555;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  transition: color .3s;
}

/* SRG tab */
.brand-tab[data-tab="srg"] { border-right: 1px solid rgba(255,255,255,.06); }
.brand-tab[data-tab="srg"] .tab-icon { background: rgba(232,101,10,.12); color: var(--srg-orange); }
.brand-tab[data-tab="srg"].active {
  background: rgba(232,101,10,.05);
  border-top-color: var(--srg-orange);
}
.brand-tab[data-tab="srg"].active .tab-name,
.brand-tab[data-tab="srg"]:hover .tab-name { color: var(--srg-orange); }
.brand-tab[data-tab="srg"]:hover .tab-tagline,
.brand-tab[data-tab="srg"].active .tab-tagline { color: #aaa; }

/* SBS tab */
.brand-tab[data-tab="sbs"] { border-right: 1px solid rgba(255,255,255,.06); }
.brand-tab[data-tab="sbs"] .tab-icon { background: rgba(0,229,255,.1); color: var(--sbs-cyan); }
.brand-tab[data-tab="sbs"].active {
  background: rgba(0,229,255,.04);
  border-top-color: var(--sbs-cyan);
}
.brand-tab[data-tab="sbs"].active .tab-name,
.brand-tab[data-tab="sbs"]:hover .tab-name { color: var(--sbs-cyan); }
.brand-tab[data-tab="sbs"]:hover .tab-tagline,
.brand-tab[data-tab="sbs"].active .tab-tagline { color: #aaa; }

/* LK tab */
.brand-tab[data-tab="lk"] .tab-icon { background: rgba(200,137,10,.12); color: var(--lk-gold); }
.brand-tab[data-tab="lk"].active {
  background: rgba(200,137,10,.05);
  border-top-color: var(--lk-gold);
}
.brand-tab[data-tab="lk"].active .tab-name,
.brand-tab[data-tab="lk"]:hover .tab-name { color: var(--lk-gold); }
.brand-tab[data-tab="lk"]:hover .tab-tagline,
.brand-tab[data-tab="lk"].active .tab-tagline { color: #aaa; }

.brand-tab:hover .tab-icon { transform: scale(1.1); }

/* ============================================================
   SECTION PANELS
   ============================================================ */
.service-panel { display: none; }
.service-panel.active { display: block; }

/* ===========================================================
   PANEL 1 — SRG HOME SERVICES
   Aesthetic: Warm editorial magazine grid. Bold asymmetric.
   =========================================================== */
#panel-srg {
  background: var(--srg-warm);
  padding: 80px 0 100px;
  position: relative;
  overflow: hidden;
}
#panel-srg::before {
  content: 'SRG';
  position: absolute;
  font-family: 'Bebas Neue', sans-serif;
  font-size: 300px;
  color: rgba(232,101,10,.04);
  right: -20px;
  top: -30px;
  line-height: 1;
  pointer-events: none;
  user-select: none;
}

.srg-section-head {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  margin-bottom: 60px;
  flex-wrap: wrap;
  gap: 20px;
}
.srg-section-head .eyebrow {
  font-family: 'Space Mono', monospace;
  font-size: 11px;
  color: var(--srg-orange);
  letter-spacing: .18em;
  text-transform: uppercase;
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 12px;
}
.srg-section-head .eyebrow::before {
  content: '';
  width: 28px; height: 2px;
  background: var(--srg-orange);
}
.srg-section-head h2 {
  font-family: 'Bebas Neue', sans-serif;
  font-size: clamp(36px, 5vw, 64px);
  color: var(--srg-dark);
  letter-spacing: .04em;
  line-height: 1;
}
.srg-cta-btn {
  background: var(--srg-orange);
  color: #fff;
  font-family: 'Space Mono', monospace;
  font-size: 12px;
  letter-spacing: .12em;
  text-transform: uppercase;
  padding: 14px 28px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  transition: background .2s, transform .2s;
  white-space: nowrap;
}
.srg-cta-btn:hover { background: #c8550a; transform: translateY(-2px); color: #fff; }

/* SRG grid: featured big left + stack right */
.srg-grid {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  grid-template-rows: auto auto;
  gap: 20px;
}

/* Each SRG card */
.srg-svc-card {
  background: #fff;
  border-radius: 4px;
  overflow: hidden;
  position: relative;
  cursor: pointer;
  transition: transform .3s, box-shadow .3s;
}
.srg-svc-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 24px 48px rgba(232,101,10,.15);
}
.srg-svc-card.featured {
  grid-column: 1 / 3;
  grid-row: 1 / 3;
}
.srg-svc-card .img-block {
  position: relative;
  overflow: hidden;
}
.srg-svc-card.featured .img-block { height: 340px; }
.srg-svc-card:not(.featured) .img-block { height: 160px; }
.srg-svc-card .img-block img {
  width: 100%; height: 100%;
  object-fit: cover;
  transition: transform .6s ease;
}
.srg-svc-card:hover .img-block img { transform: scale(1.07); }
.srg-svc-card .img-block .tag-pill {
  position: absolute;
  top: 14px; left: 14px;
  background: var(--srg-orange);
  color: #fff;
  font-size: 10px;
  font-weight: 700;
  letter-spacing: .1em;
  text-transform: uppercase;
  padding: 4px 12px;
  border-radius: 2px;
}
.srg-svc-card .card-body-srg {
  padding: 20px 22px 18px;
}
.srg-svc-card.featured .card-body-srg { padding: 28px 30px 24px; }

.srg-svc-card .icon-num {
  font-family: 'Bebas Neue', sans-serif;
  font-size: 13px;
  color: var(--srg-orange);
  letter-spacing: .1em;
  margin-bottom: 6px;
}
.srg-svc-card h3 {
  font-family: 'Bebas Neue', sans-serif;
  color: var(--srg-dark);
  letter-spacing: .04em;
  line-height: 1.1;
  margin-bottom: 8px;
}
.srg-svc-card.featured h3 { font-size: 32px; }
.srg-svc-card:not(.featured) h3 { font-size: 18px; }
.srg-svc-card p {
  font-size: 13px;
  color: #888;
  line-height: 1.7;
  margin-bottom: 0;
}
.srg-svc-card.featured p { font-size: 14px; margin-bottom: 20px; }
.srg-svc-card .price-row {
  display: flex; align-items: center; justify-content: space-between;
  padding-top: 14px;
  border-top: 1px solid #f0ebe3;
  margin-top: 12px;
}
.srg-svc-card .price {
  font-family: 'Space Mono', monospace;
  font-size: 13px;
  color: var(--srg-orange);
  font-weight: 700;
}
.srg-svc-card .arrow-btn {
  width: 32px; height: 32px;
  background: var(--srg-orange);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  color: #fff;
  font-size: 13px;
  text-decoration: none;
  transition: background .2s;
}
.srg-svc-card .arrow-btn:hover { background: #c8550a; }

/* Second row of smaller cards */
.srg-grid-row2 {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  margin-top: 0;
}
.srg-mini-card {
  background: #fff;
  border-radius: 4px;
  padding: 22px;
  display: flex;
  align-items: flex-start;
  gap: 16px;
  cursor: pointer;
  transition: transform .3s, box-shadow .3s;
  border-left: 3px solid transparent;
}
.srg-mini-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 16px 32px rgba(232,101,10,.12);
  border-left-color: var(--srg-orange);
}
.srg-mini-card .mini-icon {
  width: 42px; height: 42px;
  background: rgba(232,101,10,.1);
  border-radius: 8px;
  display: flex; align-items: center; justify-content: center;
  color: var(--srg-orange);
  font-size: 18px;
  flex-shrink: 0;
}
.srg-mini-card h5 {
  font-size: 14px;
  font-weight: 600;
  color: var(--srg-dark);
  margin-bottom: 4px;
  font-family: 'DM Sans', sans-serif;
}
.srg-mini-card p { font-size: 12px; color: #999; margin: 0; line-height: 1.5; }
.srg-mini-card .mini-price {
  font-family: 'Space Mono', monospace;
  font-size: 11px;
  color: var(--srg-orange);
  margin-top: 6px;
  font-weight: 700;
}

/* ===========================================================
   PANEL 2 — SBS SECURITY
   Aesthetic: Dark cyber-tactical. Diagonal lines. Neon.
   =========================================================== */
#panel-sbs {
  background: var(--sbs-blue);
  padding: 80px 0 100px;
  position: relative;
  overflow: hidden;
}
/* Diagonal grid lines bg */
#panel-sbs::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image:
    linear-gradient(135deg, rgba(0,229,255,.025) 1px, transparent 1px),
    linear-gradient(45deg, rgba(0,229,255,.025) 1px, transparent 1px);
  background-size: 60px 60px;
  pointer-events: none;
}
#panel-sbs::after {
  content: '';
  position: absolute;
  width: 600px; height: 600px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(21,101,255,.12) 0%, transparent 65%);
  bottom: -200px; right: -200px;
  pointer-events: none;
}

.sbs-section-head {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  margin-bottom: 60px;
  flex-wrap: wrap;
  gap: 20px;
  position: relative;
}
.sbs-eyebrow {
  font-family: 'Rajdhani', sans-serif;
  font-size: 12px;
  color: var(--sbs-cyan);
  letter-spacing: .22em;
  text-transform: uppercase;
  display: flex; align-items: center; gap: 10px;
  margin-bottom: 12px;
}
.sbs-eyebrow .dot {
  width: 6px; height: 6px;
  background: var(--sbs-cyan);
  border-radius: 50%;
  animation: blink 1.5s infinite;
}
@keyframes blink { 0%,100%{opacity:1} 50%{opacity:.2} }

.sbs-section-head h2 {
  font-family: 'Rajdhani', sans-serif;
  font-size: clamp(32px, 5vw, 60px);
  font-weight: 700;
  color: #fff;
  letter-spacing: .06em;
  line-height: 1;
  text-transform: uppercase;
}
.sbs-section-head h2 span { color: var(--sbs-cyan); }

.sbs-cta-btn {
  background: transparent;
  color: var(--sbs-cyan);
  font-family: 'Rajdhani', sans-serif;
  font-size: 14px;
  font-weight: 700;
  letter-spacing: .15em;
  text-transform: uppercase;
  padding: 12px 28px;
  border: 1px solid rgba(0,229,255,.4);
  border-radius: 2px;
  cursor: pointer;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  transition: background .2s, border-color .2s, color .2s;
  white-space: nowrap;
}
.sbs-cta-btn:hover {
  background: rgba(0,229,255,.08);
  border-color: var(--sbs-cyan);
  color: #fff;
}

/* SBS: Numbered diagonal-accent cards */
.sbs-services-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1px;
  background: rgba(255,255,255,.06);
  border: 1px solid rgba(255,255,255,.06);
  position: relative;
  z-index: 1;
}

.sbs-svc-card {
  background: rgba(10,22,40,.9);
  padding: 32px 28px;
  position: relative;
  overflow: hidden;
  cursor: pointer;
  transition: background .3s;
}
.sbs-svc-card::before {
  content: attr(data-num);
  position: absolute;
  top: 16px; right: 16px;
  font-family: 'Bebas Neue', sans-serif;
  font-size: 64px;
  color: rgba(0,229,255,.06);
  line-height: 1;
  transition: color .3s;
}
.sbs-svc-card::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0;
  width: 0; height: 2px;
  background: var(--sbs-cyan);
  transition: width .4s ease;
}
.sbs-svc-card:hover { background: rgba(0,229,255,.05); }
.sbs-svc-card:hover::before { color: rgba(0,229,255,.12); }
.sbs-svc-card:hover::after { width: 100%; }

.sbs-svc-card .sbs-icon-wrap {
  width: 52px; height: 52px;
  border: 1px solid rgba(0,229,255,.25);
  border-radius: 4px;
  display: flex; align-items: center; justify-content: center;
  font-size: 22px;
  color: var(--sbs-cyan);
  margin-bottom: 20px;
  background: rgba(0,229,255,.06);
  transition: border-color .3s, background .3s;
}
.sbs-svc-card:hover .sbs-icon-wrap {
  border-color: rgba(0,229,255,.6);
  background: rgba(0,229,255,.12);
}
.sbs-svc-card h4 {
  font-family: 'Rajdhani', sans-serif;
  font-size: 18px;
  font-weight: 700;
  color: #fff;
  letter-spacing: .08em;
  text-transform: uppercase;
  margin-bottom: 10px;
}
.sbs-svc-card p {
  font-size: 13px;
  color: var(--sbs-grey);
  line-height: 1.75;
  margin-bottom: 20px;
}
.sbs-svc-card .tag-row {
  display: flex; align-items: center; gap: 8px;
  flex-wrap: wrap;
}
.sbs-tag {
  font-family: 'Rajdhani', sans-serif;
  font-size: 11px;
  font-weight: 600;
  letter-spacing: .1em;
  text-transform: uppercase;
  padding: 3px 10px;
  border: 1px solid rgba(0,229,255,.2);
  color: rgba(0,229,255,.7);
  border-radius: 2px;
}
.sbs-tag.green {
  border-color: rgba(0,255,140,.2);
  color: rgba(0,255,140,.8);
}

/* SBS bottom: stats bar */
.sbs-stats-bar {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1px;
  margin-top: 1px;
  background: rgba(255,255,255,.06);
  border: 1px solid rgba(255,255,255,.06);
  border-top: none;
  position: relative;
  z-index: 1;
}
.sbs-stat {
  background: rgba(10,22,40,.9);
  padding: 24px 20px;
  text-align: center;
}
.sbs-stat .num {
  font-family: 'Bebas Neue', sans-serif;
  font-size: 36px;
  color: var(--sbs-cyan);
  letter-spacing: .04em;
  line-height: 1;
}
.sbs-stat .lbl {
  font-family: 'Rajdhani', sans-serif;
  font-size: 12px;
  color: var(--sbs-grey);
  letter-spacing: .12em;
  text-transform: uppercase;
  margin-top: 4px;
}

/* ===========================================================
   PANEL 3 — LORD KRISHNA MANPOWER
   Aesthetic: Warm editorial. Saffron + gold. Indian heritage.
              Bento-grid-style masonry.
   =========================================================== */
#panel-lk {
  background: var(--lk-cream);
  padding: 80px 0 100px;
  position: relative;
  overflow: hidden;
}
#panel-lk::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: radial-gradient(circle at 1px 1px, rgba(200,137,10,.08) 1px, transparent 0);
  background-size: 32px 32px;
  pointer-events: none;
}
#panel-lk::after {
  content: '✦';
  position: absolute;
  font-size: 400px;
  color: rgba(200,137,10,.04);
  right: -60px;
  top: -60px;
  line-height: 1;
  pointer-events: none;
}

.lk-section-head {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  margin-bottom: 60px;
  flex-wrap: wrap;
  gap: 24px;
  position: relative;
  z-index: 1;
}
.lk-eyebrow {
  font-family: 'Cormorant Garamond', serif;
  font-size: 13px;
  font-style: italic;
  color: var(--lk-gold);
  letter-spacing: .12em;
  display: flex; align-items: center; gap: 10px;
  margin-bottom: 10px;
}
.lk-eyebrow::after {
  content: '';
  flex: 1;
  height: 1px;
  background: linear-gradient(90deg, var(--lk-gold), transparent);
  min-width: 40px;
  max-width: 80px;
}
.lk-section-head h2 {
  font-family: 'Cormorant Garamond', serif;
  font-size: clamp(32px, 5vw, 64px);
  font-weight: 700;
  color: var(--lk-dark);
  line-height: 1.05;
}
.lk-section-head h2 em {
  font-style: italic;
  color: var(--lk-gold);
}
.lk-cta-btn {
  background: var(--lk-saffron);
  color: #fff;
  font-family: 'Cormorant Garamond', serif;
  font-size: 15px;
  font-weight: 600;
  letter-spacing: .06em;
  padding: 14px 32px;
  border: none;
  border-radius: 2px;
  cursor: pointer;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  transition: background .2s, transform .2s;
  white-space: nowrap;
}
.lk-cta-btn:hover { background: #d4680e; transform: translateY(-2px); color: #fff; }

/* LK BENTO GRID */
.lk-bento {
  display: grid;
  grid-template-columns: repeat(12, 1fr);
  grid-auto-rows: 80px;
  gap: 16px;
  position: relative;
  z-index: 1;
}

.lk-card {
  background: #fff;
  border-radius: 6px;
  overflow: hidden;
  position: relative;
  cursor: pointer;
  transition: transform .3s, box-shadow .3s;
}
.lk-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 20px 40px rgba(200,137,10,.14);
}

/* Bento placements */
.lk-card.c1 { grid-column: 1 / 6; grid-row: 1 / 5; }
.lk-card.c2 { grid-column: 6 / 10; grid-row: 1 / 3; }
.lk-card.c3 { grid-column: 10 / 13; grid-row: 1 / 3; }
.lk-card.c4 { grid-column: 6 / 10; grid-row: 3 / 5; }
.lk-card.c5 { grid-column: 10 / 13; grid-row: 3 / 5; }
.lk-card.c6 { grid-column: 1 / 4; grid-row: 5 / 7; }
.lk-card.c7 { grid-column: 4 / 7; grid-row: 5 / 7; }
.lk-card.c8 { grid-column: 7 / 10; grid-row: 5 / 7; }
.lk-card.c9 { grid-column: 10 / 13; grid-row: 5 / 7; }

/* Photo card (full overlay) */
.lk-card .photo-fill {
  position: absolute;
  inset: 0;
}
.lk-card .photo-fill img {
  width: 100%; height: 100%;
  object-fit: cover;
  transition: transform .5s ease;
}
.lk-card:hover .photo-fill img { transform: scale(1.06); }
.lk-card .photo-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(20,8,0,.88) 0%, rgba(20,8,0,.2) 55%, transparent 100%);
}
.lk-card .photo-info {
  position: absolute;
  bottom: 0; left: 0; right: 0;
  padding: 20px 22px;
}
.lk-card .photo-info .cat-label {
  font-family: 'Cormorant Garamond', serif;
  font-size: 11px;
  font-style: italic;
  color: var(--lk-gold);
  letter-spacing: .1em;
  display: block;
  margin-bottom: 6px;
}
.lk-card .photo-info h3 {
  font-family: 'Cormorant Garamond', serif;
  color: #fff;
  font-weight: 700;
  line-height: 1.15;
}
.lk-card.c1 .photo-info h3 { font-size: 26px; }
.lk-card.c2 .photo-info h3,
.lk-card.c4 .photo-info h3 { font-size: 18px; }
.lk-card .photo-info p {
  font-size: 13px;
  color: rgba(255,255,255,.7);
  margin: 6px 0 0;
  line-height: 1.5;
}

/* Text-only card */
.lk-card.text-card {
  background: #fff;
  padding: 22px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.lk-card.text-card .tc-top .cat {
  font-family: 'Cormorant Garamond', serif;
  font-size: 11px;
  font-style: italic;
  color: var(--lk-gold);
  letter-spacing: .1em;
  display: block;
  margin-bottom: 6px;
}
.lk-card.text-card .tc-top h4 {
  font-family: 'Cormorant Garamond', serif;
  font-size: 17px;
  font-weight: 700;
  color: var(--lk-dark);
  line-height: 1.3;
  margin-bottom: 6px;
}
.lk-card.text-card .tc-top p {
  font-size: 12px;
  color: #9a8060;
  line-height: 1.6;
  margin: 0;
}
.lk-card.text-card .tc-bottom {
  display: flex; align-items: center; justify-content: space-between;
  padding-top: 10px;
  border-top: 1px solid #f5ead5;
  margin-top: 10px;
}
.lk-card.text-card .tc-icon {
  width: 34px; height: 34px;
  background: rgba(200,137,10,.1);
  border-radius: 8px;
  display: flex; align-items: center; justify-content: center;
  color: var(--lk-gold);
  font-size: 16px;
}
.lk-card.text-card .tc-link {
  font-family: 'Cormorant Garamond', serif;
  font-size: 13px;
  font-style: italic;
  color: var(--lk-gold);
  text-decoration: none;
  display: flex; align-items: center; gap: 5px;
}
.lk-card.text-card .tc-link:hover { text-decoration: underline; }

/* Accent card */
.lk-card.accent-card {
  background: var(--lk-saffron);
  padding: 22px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
}
.lk-card.accent-card .ac-num {
  font-family: 'Cormorant Garamond', serif;
  font-size: 44px;
  font-weight: 700;
  color: #fff;
  line-height: 1;
}
.lk-card.accent-card .ac-lbl {
  font-size: 12px;
  color: rgba(255,255,255,.8);
  margin-top: 4px;
  font-style: italic;
  font-family: 'Cormorant Garamond', serif;
}

/* ============================================================
   FLOATING ENQUIRY PILL  (global)
   ============================================================ */
.floating-enquiry {
  position: fixed;
  bottom: 32px; right: 32px;
  display: flex;
  flex-direction: column;
  gap: 10px;
  z-index: 999;
}
.enq-btn {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 12px 20px;
  border-radius: 100px;
  font-size: 13px;
  font-weight: 600;
  text-decoration: none;
  box-shadow: 0 8px 24px rgba(0,0,0,.3);
  transition: transform .2s, box-shadow .2s;
  border: none;
  cursor: pointer;
  white-space: nowrap;
}
.enq-btn:hover { transform: translateY(-3px); box-shadow: 0 14px 32px rgba(0,0,0,.4); }
.enq-srg  { background: var(--srg-orange); color: #fff; }
.enq-sbs  { background: #0D2347; color: var(--sbs-cyan); border: 1px solid rgba(0,229,255,.3); }
.enq-lk   { background: var(--lk-gold); color: #fff; }

/* ============================================================
   CTA STRIP
   ============================================================ */
.cta-strip {
  background: #0A0A0F;
  padding: 60px 0;
  border-top: 1px solid rgba(255,255,255,.06);
}
.cta-strip h3 {
  font-family: 'Bebas Neue', sans-serif;
  font-size: clamp(28px, 4vw, 52px);
  color: #fff;
  letter-spacing: .04em;
}
.cta-strip p { color: #777; font-size: 15px; font-weight: 300; }
.cta-contact-btn {
  background: #fff;
  color: #111;
  font-family: 'Space Mono', monospace;
  font-size: 12px;
  letter-spacing: .1em;
  text-transform: uppercase;
  padding: 16px 32px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  font-weight: 700;
  transition: background .2s, transform .2s;
}
.cta-contact-btn:hover { background: var(--srg-orange); color: #fff; transform: translateY(-2px); }

/* ============================================================
   ANIMATIONS
   ============================================================ */
.panel-fade-in {
  animation: panelIn .45s cubic-bezier(.22,.68,0,1.2) forwards;
}
@keyframes panelIn {
  from { opacity: 0; transform: translateY(24px); }
  to   { opacity: 1; transform: translateY(0); }
}

/* ============================================================
   RESPONSIVE
   ============================================================ */
@media (max-width: 991px) {
  .srg-grid {
    grid-template-columns: 1fr 1fr;
  }
  .srg-grid .srg-svc-card.featured {
    grid-column: 1 / 3;
    grid-row: auto;
  }
  .srg-grid-row2 { grid-template-columns: repeat(2, 1fr); }

  .sbs-services-grid { grid-template-columns: repeat(2, 1fr); }
  .sbs-stats-bar { grid-template-columns: repeat(4, 1fr); }

  .lk-bento {
    grid-template-columns: repeat(6, 1fr);
    grid-auto-rows: 90px;
  }
  .lk-card.c1 { grid-column: 1 / 7; grid-row: 1 / 4; }
  .lk-card.c2 { grid-column: 1 / 4; grid-row: 4 / 6; }
  .lk-card.c3 { grid-column: 4 / 7; grid-row: 4 / 6; }
  .lk-card.c4 { grid-column: 1 / 4; grid-row: 6 / 8; }
  .lk-card.c5 { grid-column: 4 / 7; grid-row: 6 / 8; }
  .lk-card.c6 { grid-column: 1 / 4; grid-row: 8 / 10; }
  .lk-card.c7 { grid-column: 4 / 7; grid-row: 8 / 10; }
  .lk-card.c8 { grid-column: 1 / 4; grid-row: 10 / 12; }
  .lk-card.c9 { grid-column: 4 / 7; grid-row: 10 / 12; }

  .brand-tab .tab-tagline { display: none; }
  .brand-tab { padding: 16px 14px; gap: 10px; }
}

@media (max-width: 767px) {
  .srg-grid { grid-template-columns: 1fr; }
  .srg-grid .srg-svc-card.featured { grid-column: 1; grid-row: auto; }
  .srg-grid .srg-svc-card.featured .img-block { height: 220px; }
  .srg-grid-row2 { grid-template-columns: 1fr 1fr; }

  .sbs-services-grid { grid-template-columns: 1fr; }
  .sbs-stats-bar { grid-template-columns: repeat(2, 1fr); }

  .lk-bento {
    grid-template-columns: 1fr 1fr;
    grid-auto-rows: 120px;
  }
  .lk-card.c1 { grid-column: 1 / 3; grid-row: 1 / 3; }
  .lk-card.c2 { grid-column: 1 / 2; grid-row: 3 / 5; }
  .lk-card.c3 { grid-column: 2 / 3; grid-row: 3 / 5; }
  .lk-card.c4 { grid-column: 1 / 2; grid-row: 5 / 7; }
  .lk-card.c5 { grid-column: 2 / 3; grid-row: 5 / 7; }
  .lk-card.c6 { grid-column: 1 / 2; grid-row: 7 / 9; }
  .lk-card.c7 { grid-column: 2 / 3; grid-row: 7 / 9; }
  .lk-card.c8 { grid-column: 1 / 2; grid-row: 9 / 11; }
  .lk-card.c9 { grid-column: 2 / 3; grid-row: 9 / 11; }

  .brand-tab .tab-name { font-size: 12px; }
  .brand-tab .tab-icon { width: 36px; height: 36px; font-size: 16px; }
  .brand-tab { padding: 14px 10px; gap: 8px; }

  .srg-section-head, .sbs-section-head, .lk-section-head {
    flex-direction: column;
    align-items: flex-start;
  }

  .floating-enquiry { display: none; }
}

@media (max-width: 480px) {
  .srg-grid-row2 { grid-template-columns: 1fr; }
  .sbs-stats-bar { grid-template-columns: repeat(2, 1fr); }
  .lk-bento { gap: 10px; }
}
</style>
</head>
<body>

<!-- =============== PAGE HERO =============== -->
<div class="page-hero">
  <div class="container">
    <nav aria-label="breadcrumb" class="mb-4">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Our Services</li>
      </ol>
    </nav>
    <div class="row align-items-end">
      <div class="col-lg-7">
        <div class="hero-title">
          OUR<br/><span>SERVICES</span>
        </div>
        <p class="hero-sub mt-3">Three specialized brands. One trusted group.<br/>Select a brand below to explore its services.</p>
      </div>
      <div class="col-lg-5 d-none d-lg-flex justify-content-end align-items-center">
        <div style="text-align:right;">
          <div style="font-family:'Space Mono',monospace;font-size:11px;color:#555;letter-spacing:.15em;text-transform:uppercase;margin-bottom:8px;">Explore by brand</div>
          <div style="display:flex;gap:8px;justify-content:flex-end;">
            <span style="width:10px;height:10px;border-radius:50%;background:var(--srg-orange);display:inline-block;"></span>
            <span style="width:10px;height:10px;border-radius:50%;background:var(--sbs-cyan);display:inline-block;"></span>
            <span style="width:10px;height:10px;border-radius:50%;background:var(--lk-gold);display:inline-block;"></span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Brand Switcher Tabs -->
  <div class="brand-switcher-wrap">
    <div class="container-fluid px-0">
      <div class="brand-tabs">

        <button class="brand-tab active" data-tab="srg">
          <div class="tab-icon"><i class="fas fa-home"></i></div>
          <div class="tab-texts">
            <span class="tab-name">SRG Home Services</span>
            <span class="tab-tagline">Plumbing · Electrical · Cleaning</span>
          </div>
        </button>

        <button class="brand-tab" data-tab="sbs">
          <div class="tab-icon"><i class="fas fa-shield-alt"></i></div>
          <div class="tab-texts">
            <span class="tab-name">SBS Security</span>
            <span class="tab-tagline">Guards · CCTV · Corporate</span>
          </div>
        </button>

        <button class="brand-tab" data-tab="lk">
          <div class="tab-icon"><i class="fas fa-users"></i></div>
          <div class="tab-texts">
            <span class="tab-name">Lord Krishna Manpower</span>
            <span class="tab-tagline">Staffing · Labour · Placement</span>
          </div>
        </button>

      </div>
    </div>
  </div>
</div><!-- /page-hero -->


<!-- ===============================================================
     PANEL 1 — SRG HOME SERVICES
     Layout: Editorial magazine grid — featured hero card + row cards
     =============================================================== -->
<section class="service-panel active panel-fade-in" id="panel-srg">
  <div class="container">

    <div class="srg-section-head">
      <div>
        <div class="eyebrow"><i class="fas fa-home"></i> SRG Home Services</div>
        <h2>EXPERT HOME<br/>CARE, 24 / 7</h2>
      </div>
      <a href="javascript:void(0)" class="srg-cta-btn">
        All SRG Services <i class="far fa-arrow-right"></i>
      </a>
    </div>

    <!-- Main grid: 4 col, featured card spans 2x2 -->
    <div class="srg-grid">

      <!-- FEATURED -->
      <div class="srg-svc-card featured">
        <div class="img-block">
          <img src="https://images.unsplash.com/photo-1585771724684-38269d6639fd?w=800&q=80" alt="Plumbing" loading="lazy"/>
          <span class="tag-pill">⚡ Popular</span>
        </div>
        <div class="card-body-srg">
          <div class="icon-num">01 — PLUMBING</div>
          <h3>Plumbing<br/>Repairs & Fitting</h3>
          <p>Leaks, burst pipes, drain blockages, bathroom plumbing and full pipeline work handled by ISI-certified plumbers — same day response guaranteed.</p>
          <div class="price-row">
            <span class="price">Starting ₹499</span>
            <a href="javascript:void(0)" class="arrow-btn"><i class="far fa-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="srg-svc-card">
        <div class="img-block">
          <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=600&q=80" alt="Electrical" loading="lazy"/>
          <span class="tag-pill">24/7</span>
        </div>
        <div class="card-body-srg">
          <div class="icon-num">02 — ELECTRICAL</div>
          <h3>Wiring & Electrical</h3>
          <p>Safe, certified wiring, panel upgrades and switchboard fixes.</p>
          <div class="price-row">
            <span class="price">From ₹699</span>
            <a href="javascript:void(0)" class="arrow-btn"><i class="far fa-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="srg-svc-card">
        <div class="img-block">
          <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=600&q=80" alt="Deep Cleaning" loading="lazy"/>
        </div>
        <div class="card-body-srg">
          <div class="icon-num">03 — CLEANING</div>
          <h3>Deep Cleaning</h3>
          <p>Full home sanitization, sofa & carpet steam cleaning, kitchen degreasing.</p>
          <div class="price-row">
            <span class="price">From ₹999</span>
            <a href="javascript:void(0)" class="arrow-btn"><i class="far fa-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="srg-svc-card">
        <div class="img-block">
          <img src="https://images.unsplash.com/photo-1635048424329-a9bfb146d7aa?w=600&q=80" alt="AC Service" loading="lazy"/>
          <span class="tag-pill">New</span>
        </div>
        <div class="card-body-srg">
          <div class="icon-num">04 — HVAC</div>
          <h3>AC & HVAC Service</h3>
          <p>Installation, gas refill, deep servicing for all major AC brands.</p>
          <div class="price-row">
            <span class="price">From ₹399</span>
            <a href="javascript:void(0)" class="arrow-btn"><i class="far fa-arrow-right"></i></a>
          </div>
        </div>
      </div>

    </div><!-- /srg-grid -->

    <!-- Second row: mini cards -->
    <div class="srg-grid-row2 mt-4">
      <div class="srg-mini-card">
        <div class="mini-icon"><i class="fas fa-leaf"></i></div>
        <div>
          <h5>Gardening & Landscaping</h5>
          <p>Trimming, planting and full residential garden maintenance.</p>
          <div class="mini-price">From ₹599</div>
        </div>
      </div>
      <div class="srg-mini-card">
        <div class="mini-icon"><i class="fas fa-tshirt"></i></div>
        <div>
          <h5>Laundry & Dry Cleaning</h5>
          <p>Pickup & drop laundry, steam iron and curtain washing.</p>
          <div class="mini-price">From ₹199</div>
        </div>
      </div>
      <div class="srg-mini-card">
        <div class="mini-icon"><i class="fas fa-bug"></i></div>
        <div>
          <h5>Pest Control</h5>
          <p>Safe, eco-friendly treatment for cockroaches, termites & rodents.</p>
          <div class="mini-price">From ₹799</div>
        </div>
      </div>
      <div class="srg-mini-card">
        <div class="mini-icon"><i class="fas fa-paint-roller"></i></div>
        <div>
          <h5>Painting Services</h5>
          <p>Interior & exterior painting with premium quality finish.</p>
          <div class="mini-price">From ₹1499</div>
        </div>
      </div>
    </div>

  </div>
</section>


<!-- ===============================================================
     PANEL 2 — SBS SECURITY SERVICES
     Layout: Dark cyber-tactical grid. Numbered cards. Neon accents.
     =============================================================== -->
<section class="service-panel" id="panel-sbs">
  <div class="container" style="position:relative;z-index:1;">

    <div class="sbs-section-head">
      <div>
        <div class="sbs-eyebrow">
          <span class="dot"></span>
          SBS Security Solutions — System Active
        </div>
        <h2>PROFESSIONAL<br/><span>SECURITY</span> SERVICES</h2>
      </div>
      <a href="javascript:void(0)" class="sbs-cta-btn">
        Deploy Security <i class="far fa-arrow-right"></i>
      </a>
    </div>

    <!-- Services grid 3x2 -->
    <div class="sbs-services-grid">

      <div class="sbs-svc-card" data-num="01">
        <div class="sbs-icon-wrap"><i class="fas fa-user-shield"></i></div>
        <h4>Armed Security Guards</h4>
        <p>Licensed, trained armed guards for banks, corporate offices, malls and high-value premises. Background verified, uniformed personnel.</p>
        <div class="tag-row">
          <span class="sbs-tag green">Available 24/7</span>
          <span class="sbs-tag">Armed</span>
        </div>
      </div>

      <div class="sbs-svc-card" data-num="02">
        <div class="sbs-icon-wrap"><i class="fas fa-camera"></i></div>
        <h4>CCTV Installation & Monitoring</h4>
        <p>HD / 4K CCTV setup with 24/7 remote monitoring, encrypted cloud storage and live mobile access from anywhere.</p>
        <div class="tag-row">
          <span class="sbs-tag">HD / 4K</span>
          <span class="sbs-tag green">Remote Access</span>
        </div>
      </div>

      <div class="sbs-svc-card" data-num="03">
        <div class="sbs-icon-wrap"><i class="fas fa-building"></i></div>
        <h4>Corporate Security Management</h4>
        <p>End-to-end security planning, biometric access control, threat assessment and incident response for enterprises.</p>
        <div class="tag-row">
          <span class="sbs-tag green">Available 24/7</span>
          <span class="sbs-tag">ISO Certified</span>
        </div>
      </div>

      <div class="sbs-svc-card" data-num="04">
        <div class="sbs-icon-wrap"><i class="fas fa-car"></i></div>
        <h4>Vehicle Patrol & VIP Escort</h4>
        <p>Mobile patrol units and personal escort for VIP clients, cash transit and high-value cargo movement across the city.</p>
        <div class="tag-row">
          <span class="sbs-tag">On Demand</span>
          <span class="sbs-tag green">GPS Tracked</span>
        </div>
      </div>

      <div class="sbs-svc-card" data-num="05">
        <div class="sbs-icon-wrap"><i class="fas fa-home"></i></div>
        <h4>Residential Society Security</h4>
        <p>Gate management, visitor digital log, boom barriers, intercom systems and dedicated society guard deployment.</p>
        <div class="tag-row">
          <span class="sbs-tag green">Available 24/7</span>
          <span class="sbs-tag">Smart Entry</span>
        </div>
      </div>

      <div class="sbs-svc-card" data-num="06">
        <div class="sbs-icon-wrap"><i class="fas fa-fire-extinguisher"></i></div>
        <h4>Fire Safety & Emergency Response</h4>
        <p>Fire safety audits, extinguisher installation, trained emergency response teams and statutory compliance documentation.</p>
        <div class="tag-row">
          <span class="sbs-tag">Compliance</span>
          <span class="sbs-tag green">Certified</span>
        </div>
      </div>

    </div><!-- /sbs-services-grid -->

    <!-- Stats bar -->
    <div class="sbs-stats-bar">
      <div class="sbs-stat">
        <div class="num">500+</div>
        <div class="lbl">Clients Protected</div>
      </div>
      <div class="sbs-stat">
        <div class="num">1200+</div>
        <div class="lbl">Guards Deployed</div>
      </div>
      <div class="sbs-stat">
        <div class="num">15 YRS</div>
        <div class="lbl">Field Experience</div>
      </div>
      <div class="sbs-stat">
        <div class="num">24/7</div>
        <div class="lbl">Command Centre</div>
      </div>
    </div>

  </div>
</section>


<!-- ===============================================================
     PANEL 3 — LORD KRISHNA MANPOWER
     Layout: Bento-grid editorial. Warm saffron & gold Indian aesthetic.
     =============================================================== -->
<section class="service-panel" id="panel-lk">
  <div class="container" style="position:relative;z-index:1;">

    <div class="lk-section-head">
      <div>
        <div class="lk-eyebrow">
          <i class="fas fa-om" style="font-size:16px;"></i>
          Lord Krishna Manpower
        </div>
        <h2>Skilled Manpower<br/>&amp; <em>Staffing</em> Solutions</h2>
      </div>
      <a href="javascript:void(0)" class="lk-cta-btn">
        Request Manpower <i class="far fa-arrow-right"></i>
      </a>
    </div>

    <!-- Bento grid -->
    <div class="lk-bento">

      <!-- C1: FEATURED — Construction (big) -->
      <div class="lk-card c1">
        <div class="photo-fill">
          <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=80" alt="Construction Labour" loading="lazy"/>
        </div>
        <div class="photo-overlay"></div>
        <div class="photo-info">
          <span class="cat-label">Most Demanded</span>
          <h3>Construction &amp;<br/>Civil Labour</h3>
          <p>Masons, carpenters, welders, painters supplied within 24 hrs for any project size.</p>
        </div>
      </div>

      <!-- C2: Hotel Staffing -->
      <div class="lk-card c2">
        <div class="photo-fill">
          <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=600&q=80" alt="Hotel Staffing" loading="lazy"/>
        </div>
        <div class="photo-overlay"></div>
        <div class="photo-info">
          <span class="cat-label">Hospitality</span>
          <h3>Hotel &amp; Restaurant Staffing</h3>
        </div>
      </div>

      <!-- C3: Accent stat -->
      <div class="lk-card c3 accent-card">
        <div class="ac-num">5000+</div>
        <div class="ac-lbl">Workers Placed This Year</div>
      </div>

      <!-- C4: Facility -->
      <div class="lk-card c4">
        <div class="photo-fill">
          <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80" alt="Facility Management" loading="lazy"/>
        </div>
        <div class="photo-overlay"></div>
        <div class="photo-info">
          <span class="cat-label">Facility</span>
          <h3>Facility Management Staff</h3>
        </div>
      </div>

      <!-- C5: Accent stat -->
      <div class="lk-card c5 accent-card" style="background:var(--lk-maroon);">
        <div class="ac-num">200+</div>
        <div class="ac-lbl">Corporate Clients Served</div>
      </div>

      <!-- C6: Drivers — text card -->
      <div class="lk-card c6 text-card">
        <div class="tc-top">
          <span class="cat">Transport</span>
          <h4>Drivers &amp; Vehicle Operators</h4>
          <p>Verified LMV/HMV drivers, forklift operators for daily or contract basis.</p>
        </div>
        <div class="tc-bottom">
          <div class="tc-icon"><i class="fas fa-car"></i></div>
          <a href="javascript:void(0)" class="tc-link">Know More <i class="far fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- C7: Events — text card -->
      <div class="lk-card c7 text-card">
        <div class="tc-top">
          <span class="cat">Events</span>
          <h4>Event &amp; Promotional Staff</h4>
          <p>Ushers, promoters and support staff for weddings, exhibitions, corporate events.</p>
        </div>
        <div class="tc-bottom">
          <div class="tc-icon"><i class="fas fa-star"></i></div>
          <a href="javascript:void(0)" class="tc-link">Know More <i class="far fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- C8: Domestic — text card -->
      <div class="lk-card c8 text-card">
        <div class="tc-top">
          <span class="cat">Domestic</span>
          <h4>Domestic Help &amp; Caretakers</h4>
          <p>Verified maids, cooks, babysitters and elderly care staff for families.</p>
        </div>
        <div class="tc-bottom">
          <div class="tc-icon"><i class="fas fa-hands-helping"></i></div>
          <a href="javascript:void(0)" class="tc-link">Know More <i class="far fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- C9: Industrial — text card -->
      <div class="lk-card c9 text-card">
        <div class="tc-top">
          <span class="cat">Industrial</span>
          <h4>Factory &amp; Industrial Labour</h4>
          <p>Production workers, machine operators and line staff for factories, warehouses.</p>
        </div>
        <div class="tc-bottom">
          <div class="tc-icon"><i class="fas fa-industry"></i></div>
          <a href="javascript:void(0)" class="tc-link">Know More <i class="far fa-arrow-right"></i></a>
        </div>
      </div>

    </div><!-- /lk-bento -->

  </div>
</section>


<!-- =============== CTA STRIP =============== -->
<div class="cta-strip">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8 mb-4 mb-lg-0">
        <h3>NEED A SERVICE?<br/>LET'S TALK.</h3>
        <p class="mt-2">One call connects you to SRG, SBS or Lord Krishna — whichever fits your need.</p>
      </div>
      <div class="col-lg-4 text-lg-end">
        <a href="javascript:void(0)" class="cta-contact-btn">
          Contact Us Now <i class="far fa-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
</div>


<!-- =============== FLOATING ENQUIRY =============== -->
<div class="floating-enquiry">
  <a href="javascript:void(0)" class="enq-btn enq-srg">
    <i class="fas fa-home"></i> SRG Enquiry
  </a>
  <a href="javascript:void(0)" class="enq-btn enq-sbs">
    <i class="fas fa-shield-alt"></i> SBS Security
  </a>
  <a href="javascript:void(0)" class="enq-btn enq-lk">
    <i class="fas fa-users"></i> LK Manpower
  </a>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
(function() {
  const tabs   = document.querySelectorAll('.brand-tab');
  const panels = document.querySelectorAll('.service-panel');

  tabs.forEach(tab => {
    tab.addEventListener('click', function() {
      const target = this.dataset.tab;

      // Update tabs
      tabs.forEach(t => t.classList.remove('active'));
      this.classList.add('active');

      // Update panels
      panels.forEach(p => {
        p.classList.remove('active', 'panel-fade-in');
        if (p.id === 'panel-' + target) {
          // Force reflow so animation replays
          void p.offsetWidth;
          p.classList.add('active', 'panel-fade-in');
          // Smooth scroll to panel
          p.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    });
  });
})();
</script>

</body>
</html>