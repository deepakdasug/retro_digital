@extends('layouts.app')

@section('title', 'IT & Digital Services | SEO, Web, Apps & CRM - Retrotech Digital')
@section('description', 'Grow with Retrotech Digital\'s SEO, digital marketing, web and app development, Salesforce, ERPNext, SaaS, API and WhatsApp integration services.')

@push('head')
<meta name="keywords" content="IT services, digital marketing services, SEO services, web development, mobile app development, Salesforce, ERPNext, SaaS development, API development, WhatsApp integration">
<link rel="canonical" href="{{ url('/services') }}">
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/services-index.css') }}?v={{ file_exists(public_path('css/services-index.css')) ? filemtime(public_path('css/services-index.css')) : '4.0' }}">
@endpush

@section('content')
<main class="srv-flagship-wrap">

  {{-- =========================================================================
       0. TOP TICKER RIBBON
       ========================================================================= --}}
  <div class="srv-top-ribbon" aria-hidden="true">
    <div class="ribbon-track">
      <span>CONSULTING</span><span class="divider">✦</span>
      <span>WEB DESIGN</span><span class="divider">✦</span>
      <span>DEVELOPMENT</span><span class="divider">✦</span>
      <span>MOBILE APPS</span><span class="divider">✦</span>
      <span>BRANDING</span><span class="divider">✦</span>
      <span>UI/UX DESIGN</span><span class="divider">✦</span>
      <span>DIGITAL MARKETING</span><span class="divider">✦</span>
      <span>SEO OPTIMIZATION</span><span class="divider">✦</span>
      <span>CONSULTING</span><span class="divider">✦</span>
      <span>WEB DESIGN</span><span class="divider">✦</span>
      <span>DEVELOPMENT</span><span class="divider">✦</span>
      <span>MOBILE APPS</span><span class="divider">✦</span>
      <span>BRANDING</span><span class="divider">✦</span>
      <span>UI/UX DESIGN</span><span class="divider">✦</span>
      <span>DIGITAL MARKETING</span><span class="divider">✦</span>
      <span>SEO OPTIMIZATION</span><span class="divider">✦</span>
    </div>
  </div>

  {{-- =========================================================================
       1. FLAGSHIP HERO: SPLIT EDITORIAL & DIRECT CONSULTATION TERMINAL
       ========================================================================= --}}
  <header class="srv-flagship-hero">
    <div class="srv-hero-container">
      <div class="srv-hero-split">

        {{-- Left: Editorial Narrative & Action Cluster --}}
        <div class="srv-hero-copy">
          <div class="srv-kicker-chip">
            <i class="fa-solid fa-sparkles" aria-hidden="true"></i>
            <span>Full-Cycle IT &amp; Digital Solutions</span>
          </div>

          <h1 class="srv-hero-heading">
            Our IT &amp; <span class="brand-mint">Digital Services</span>
          </h1>

          <p class="srv-hero-lead">
            From digital marketing to custom software development, we provide reliable and result-driven technology solutions for modern businesses.
          </p>

          <div class="srv-hero-actions">
            <a href="#servicesStudio" class="btn-hero-explore">
              <span>Explore All 15 Capabilities</span>
              <i class="fa-solid fa-arrow-down" aria-hidden="true"></i>
            </a>
            <a href="https://wa.me/919910836538" class="btn-hero-wa" target="_blank" rel="noopener noreferrer">
              <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
              <span>WhatsApp Direct</span>
            </a>
          </div>

          <div class="srv-hero-badges">
            <div class="srv-badge-item">
              <i class="fa-solid fa-cubes" aria-hidden="true"></i>
              <span>15 Core Capabilities</span>
            </div>
            <div class="srv-badge-item">
              <i class="fa-solid fa-star" aria-hidden="true"></i>
              <span>4.9 / 5.0 (5k+ Client Reviews)</span>
            </div>
            <div class="srv-badge-item">
              <i class="fa-solid fa-shield-halved" aria-hidden="true"></i>
              <span>R2V3 Certified Enterprise Standard</span>
            </div>
          </div>
        </div>

        {{-- Right: Direct Consultation & Quote Terminal --}}
        <div class="srv-hero-launcher">
          <div class="srv-hero-terminal">
            <div class="terminal-header">
              <h3 class="terminal-title">
                <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
                <span>Fast Project Consultation</span>
              </h3>
              <p class="terminal-sub">Speak directly with our technology architects and growth leads.</p>
            </div>

            <form action="{{ route('contact.submit') }}" method="POST" class="terminal-form">
              @csrf

              <div class="terminal-input-group">
                <input type="text" name="name" class="terminal-input" placeholder="Your Full Name *" required autocomplete="name">
              </div>

              <div class="terminal-row-2">
                <input type="email" name="email" class="terminal-input" placeholder="Work Email *" required autocomplete="email">
                <input type="tel" name="phone" class="terminal-input" placeholder="Phone Number *" required autocomplete="tel">
              </div>

              <div class="terminal-input-group">
                <select name="service" class="terminal-select" required>
                  <option value="" disabled selected>Select Primary Requirement *</option>
                  <option value="Search Engine Optimization">Search Engine Optimization (SEO)</option>
                  <option value="Social Media Marketing">Social Media Marketing</option>
                  <option value="Paid Marketing">Paid Marketing (PPC)</option>
                  <option value="Web Development">Web Development</option>
                  <option value="Mobile App Development">Mobile App Development</option>
                  <option value="Custom Application">Custom Application</option>
                  <option value="Salesforce & ERPNext Services">Salesforce &amp; ERPNext Services</option>
                  <option value="SaaS Application">SaaS Application</option>
                  <option value="API Development">API Development</option>
                  <option value="WhatsApp Integration">WhatsApp Integration</option>
                </select>
              </div>

              <button type="submit" class="btn-terminal-submit">
                <span>Request Project Proposal</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>

              <div class="terminal-guarantee">
                <span><i class="fa-solid fa-lock" style="color: var(--theme-green-brand, #2f6f46);"></i> Strict NDA Protected</span>
                <span><i class="fa-solid fa-bolt" style="color: var(--theme-green-brand, #2f6f46);"></i> 24h Response</span>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </header>

  {{-- =========================================================================
       2. THE 15 SERVICES: TWO FLAGSHIP THEMATIC STUDIOS
       ========================================================================= --}}
  <section class="srv-showcase-section" id="servicesStudio">
    <div class="srv-showcase-container">

      {{-- Quick Filter Dock & Instant Search --}}
      <div class="srv-filter-dock">
        <div class="srv-filter-pills" role="tablist">
          <button type="button" class="srv-pill-btn active" data-filter="all">All 15 Capabilities</button>
          <button type="button" class="srv-pill-btn" data-filter="marketing">Marketing Platform (7)</button>
          <button type="button" class="srv-pill-btn" data-filter="tech">Tech Development (8)</button>
        </div>
        <div class="srv-search-box">
          <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
          <input type="text" id="liveCapabilitiesSearch" class="srv-search-input" placeholder="Filter capabilities..." aria-label="Filter capabilities">
        </div>
      </div>

      {{-- STUDIO A: MARKETING PLATFORM SOLUTIONS --}}
      <div class="studio-block-group" id="studioMarketingGroup">
        <div class="studio-headline-block">
          <span class="studio-headline-chip">Traffic, Conversions &amp; Brand Authority</span>
          <h2 class="studio-headline-title">Marketing Platform Solutions</h2>
          <p class="studio-headline-sub">Increase conversions, amplify search presence, and drive sustainable revenue through data-backed multi-channel campaigns.</p>
        </div>

        <div class="marketing-bento-grid">

          {{-- Service 1: Search Engine Optimization (Wide Hero Bento) --}}
          <article class="flagship-card bento-card bento-card-wide" data-category="marketing" data-search="search engine optimization seo organic traffic rankings google technical audits keywords core web vitals">
            <div class="bento-badge-strip">
              <span class="card-metric-badge"><i class="fa-solid fa-bolt" aria-hidden="true"></i> Organic Growth</span>
              <span class="bento-serp-chip"><i class="fa-brands fa-google" aria-hidden="true"></i> #1 Rank Targets</span>
            </div>
            <div class="bento-hero-main">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
              <div class="bento-hero-text">
                <h3 class="flagship-card-title">Search Engine Optimization</h3>
                <p class="flagship-card-desc">Improve your website visibility, organic traffic and search rankings through effective and data-driven SEO strategies.</p>
              </div>
            </div>
            <div class="bento-seo-microtray">
              <div class="bento-micro-pill">
                <i class="fa-solid fa-arrow-trend-up" aria-hidden="true"></i>
                <span>+240% Organic Traffic</span>
              </div>
              <div class="bento-micro-pill">
                <i class="fa-solid fa-key" aria-hidden="true"></i>
                <span>Keyword Clusters</span>
              </div>
              <div class="bento-micro-pill">
                <i class="fa-solid fa-gauge-high" aria-hidden="true"></i>
                <span>Core Web Vitals</span>
              </div>
              <div class="bento-micro-pill">
                <i class="fa-solid fa-link" aria-hidden="true"></i>
                <span>Authority Backlinks</span>
              </div>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('services.show', 'search-engine-optimization') }}" class="card-explore-btn">
                <span>Explore Capability</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
              <span class="bento-footer-stat">Technical Audits Ready</span>
            </div>
          </article>

          {{-- Service 2: Paid Marketing (PPC & Ads with ROAS Micro-Card) --}}
          <article class="flagship-card bento-card" data-category="marketing" data-search="paid marketing ppc advertising google ads lead generation conversion roas meta">
            <div class="card-crest-row">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-bullseye"></i></div>
              <span class="card-metric-badge">Performance PPC</span>
            </div>
            <h3 class="flagship-card-title">Paid Marketing</h3>
            <p class="flagship-card-desc">Generate qualified leads and measurable results through well-optimized PPC and paid advertising campaigns.</p>
            <div class="bento-mini-stat-card">
              <div class="mini-stat-num">+350%</div>
              <div class="mini-stat-lbl">Average Campaign ROAS</div>
            </div>
            <div class="bento-tag-row">
              <span class="bento-mini-tag">Google Ads</span>
              <span class="bento-mini-tag">Meta Ads</span>
              <span class="bento-mini-tag">LinkedIn B2B</span>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('services.show', 'paid-marketing') }}" class="card-explore-btn">
                <span>Explore Capability</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </article>

          {{-- Service 3: Social Media Marketing --}}
          <article class="flagship-card bento-card" data-category="marketing" data-search="social media marketing smm campaigns instagram facebook linkedin branding reels">
            <div class="card-crest-row">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-hashtag"></i></div>
              <span class="card-metric-badge">Social Reach</span>
            </div>
            <h3 class="flagship-card-title">Social Media Marketing</h3>
            <p class="flagship-card-desc">Build brand awareness and customer engagement through targeted campaigns across leading social media platforms.</p>
            <div class="bento-tag-row">
              <span class="bento-mini-tag"><i class="fa-brands fa-instagram" aria-hidden="true"></i> Instagram</span>
              <span class="bento-mini-tag"><i class="fa-brands fa-linkedin-in" aria-hidden="true"></i> LinkedIn</span>
              <span class="bento-mini-tag"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i> X / Meta</span>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('services.show', 'social-media-marketing') }}" class="card-explore-btn">
                <span>Explore Capability</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </article>

          {{-- Service 4: Email Marketing --}}
          <article class="flagship-card bento-card" data-category="marketing" data-search="email marketing automated campaigns customer retention loyalty newsletters drip funnels">
            <div class="card-crest-row">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-envelope-open-text"></i></div>
              <span class="card-metric-badge">Retention &amp; Drip</span>
            </div>
            <h3 class="flagship-card-title">Email Marketing</h3>
            <p class="flagship-card-desc">Create personalized email campaigns that nurture leads, strengthen relationships and increase conversions.</p>
            <div class="bento-tag-row">
              <span class="bento-mini-tag"><i class="fa-solid fa-clock-rotate-left" aria-hidden="true"></i> Drip Funnels</span>
              <span class="bento-mini-tag"><i class="fa-solid fa-filter" aria-hidden="true"></i> Segmentation</span>
              <span class="bento-mini-tag"><i class="fa-solid fa-chart-pie" aria-hidden="true"></i> High Open Rate</span>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('services.show', 'email-marketing') }}" class="card-explore-btn">
                <span>Explore Capability</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </article>

          {{-- Service 5: Video Marketing --}}
          <article class="flagship-card bento-card" data-category="marketing" data-search="video marketing production storytelling youtube reels commercial brand motion">
            <div class="card-crest-row">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-video"></i></div>
              <span class="card-metric-badge">Visual Story</span>
            </div>
            <h3 class="flagship-card-title">Video Marketing</h3>
            <p class="flagship-card-desc">Produce engaging video content that communicates your brand message and connects with your target audience.</p>
            <div class="bento-tag-row">
              <span class="bento-mini-tag"><i class="fa-brands fa-youtube" aria-hidden="true"></i> YouTube</span>
              <span class="bento-mini-tag"><i class="fa-solid fa-clapperboard" aria-hidden="true"></i> 4K Commercials</span>
              <span class="bento-mini-tag"><i class="fa-solid fa-film" aria-hidden="true"></i> Short Reels</span>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('services.show', 'video-marketing') }}" class="card-explore-btn">
                <span>Explore Capability</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </article>

          {{-- Service 6: Content Marketing --}}
          <article class="flagship-card bento-card" data-category="marketing" data-search="content marketing editorial blogs thought leadership seo copy writing">
            <div class="card-crest-row">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-file-pen"></i></div>
              <span class="card-metric-badge">Authority Content</span>
            </div>
            <h3 class="flagship-card-title">Content Marketing</h3>
            <p class="flagship-card-desc">Develop valuable and relevant content that attracts customers, builds trust and supports long-term growth.</p>
            <div class="bento-tag-row">
              <span class="bento-mini-tag"><i class="fa-solid fa-book-open" aria-hidden="true"></i> Thought Leadership</span>
              <span class="bento-mini-tag"><i class="fa-solid fa-pen-nib" aria-hidden="true"></i> SEO Articles</span>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('services.show', 'content-marketing') }}" class="card-explore-btn">
                <span>Explore Capability</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </article>

          {{-- Service 7: ORM Services (Wide Shield Bento) --}}
          <article class="flagship-card bento-card bento-card-wide" data-category="marketing" data-search="orm services online reputation management brand trust reviews sentiment google rating">
            <div class="bento-badge-strip">
              <span class="card-metric-badge"><i class="fa-solid fa-shield-heart" aria-hidden="true"></i> Reputation Shield</span>
              <span class="bento-sentiment-chip"><i class="fa-solid fa-star" aria-hidden="true"></i> 5.0 Star Defense</span>
            </div>
            <div class="bento-hero-main">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-shield-halved"></i></div>
              <div class="bento-hero-text">
                <h3 class="flagship-card-title">ORM Services</h3>
                <p class="flagship-card-desc">Protect and improve your online reputation through review monitoring, management and positive brand positioning.</p>
              </div>
            </div>
            <div class="bento-seo-microtray">
              <div class="bento-micro-pill">
                <i class="fa-solid fa-star" style="color: #e5a93c;" aria-hidden="true"></i>
                <span>Review Protection</span>
              </div>
              <div class="bento-micro-pill">
                <i class="fa-solid fa-chart-line" aria-hidden="true"></i>
                <span>Sentiment Tracking</span>
              </div>
              <div class="bento-micro-pill">
                <i class="fa-solid fa-triangle-exclamation" aria-hidden="true"></i>
                <span>Crisis Mitigation</span>
              </div>
              <div class="bento-micro-pill">
                <i class="fa-solid fa-building-columns" aria-hidden="true"></i>
                <span>Corporate Trust</span>
              </div>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('services.show', 'orm-services') }}" class="card-explore-btn">
                <span>Explore Capability</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
              <span class="bento-footer-stat">24/7 Sentiment Monitor</span>
            </div>
          </article>

        </div>
      </div>

      {{-- STUDIO B: TECH DEVELOPMENT & CLOUD ENGINEERING --}}
      <div class="studio-block-group" id="studioTechGroup">
        <div class="studio-headline-block">
          <span class="studio-headline-chip">Engineering, Architecture &amp; Enterprise Cloud</span>
          <h2 class="studio-headline-title">Tech Development &amp; Engineering</h2>
          <p class="studio-headline-sub">Build resilient web architectures, scalable native mobile applications, robust SaaS platforms, and enterprise ERP integrations.</p>
        </div>

        <div class="tech-bento-grid">

          {{-- Service 8: Web Development (Wide Bento Hero) --}}
          <article class="flagship-card bento-card bento-card-wide" data-category="tech" data-search="web development fullstack responsive websites ecommerce web apps laravel react pwa">
            <div class="bento-badge-strip">
              <span class="card-metric-badge"><i class="fa-solid fa-code" aria-hidden="true"></i> Modern Web</span>
              <span class="bento-serp-chip"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i> Enterprise Grade</span>
            </div>
            <div class="bento-hero-main">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-code"></i></div>
              <div class="bento-hero-text">
                <h3 class="flagship-card-title">Web Development</h3>
                <p class="flagship-card-desc">Build responsive, secure and high-performing websites tailored to your brand and business requirements.</p>
              </div>
            </div>
            <div class="bento-seo-microtray">
              <div class="bento-micro-pill">
                <i class="fa-solid fa-gauge-high" aria-hidden="true"></i>
                <span>99+ Speed Score</span>
              </div>
              <div class="bento-micro-pill">
                <i class="fa-solid fa-layer-group" aria-hidden="true"></i>
                <span>Full-Stack Laravel &amp; React</span>
              </div>
              <div class="bento-micro-pill">
                <i class="fa-solid fa-mobile-screen" aria-hidden="true"></i>
                <span>PWA &amp; Responsive</span>
              </div>
              <div class="bento-micro-pill">
                <i class="fa-solid fa-lock" aria-hidden="true"></i>
                <span>Security Hardened</span>
              </div>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('tech-development.show', ['slug' => 'web-development']) }}" class="card-explore-btn">
                <span>Explore Capability</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
              <span class="bento-footer-stat">Engineered for Scale</span>
            </div>
          </article>

          {{-- Service 9: Mobile App Development --}}
          <article class="flagship-card bento-card" data-category="tech" data-search="mobile app development ios android flutter react native scalable apps mobile store">
            <div class="card-crest-row">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-mobile-screen-button"></i></div>
              <span class="card-metric-badge">iOS &amp; Android</span>
            </div>
            <h3 class="flagship-card-title">Mobile App Development</h3>
            <p class="flagship-card-desc">Create user-friendly, secure and scalable mobile applications for Android and iOS platforms.</p>
            <div class="bento-mini-stat-card">
              <div class="mini-stat-num">Cross-Platform</div>
              <div class="mini-stat-lbl">Flutter &amp; React Native</div>
            </div>
            <div class="bento-tag-row">
              <span class="bento-mini-tag"><i class="fa-brands fa-apple" aria-hidden="true"></i> iOS Store</span>
              <span class="bento-mini-tag"><i class="fa-brands fa-google-play" aria-hidden="true"></i> Google Play</span>
              <span class="bento-mini-tag">Biometric Auth</span>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('tech-development.show', ['slug' => 'mobile-app-development']) }}" class="card-explore-btn">
                <span>Explore Capability</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </article>

          {{-- Service 10: Custom Application --}}
          <article class="flagship-card bento-card" data-category="tech" data-search="custom application bespoke software internal tooling enterprise portals workflows">
            <div class="card-crest-row">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-laptop-code"></i></div>
              <span class="card-metric-badge">Custom Systems</span>
            </div>
            <h3 class="flagship-card-title">Custom Application</h3>
            <p class="flagship-card-desc">Develop customized applications designed around your unique workflows, requirements and operational challenges.</p>
            <div class="bento-tag-row">
              <span class="bento-mini-tag">Internal Portals</span>
              <span class="bento-mini-tag">Tailored Workflows</span>
              <span class="bento-mini-tag">RBAC Security</span>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('tech-development.show', ['slug' => 'custom-application']) }}" class="card-explore-btn">
                <span>Explore Capability</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </article>

          {{-- Service 11: Salesforce & ERPNext Services (Wide Enterprise Bento) --}}
          <article class="flagship-card bento-card bento-card-wide" data-category="tech" data-search="salesforce erpnext services crm erp pipeline integration enterprise automation doctypes">
            <div class="bento-badge-strip">
              <span class="card-metric-badge"><i class="fa-solid fa-cloud" aria-hidden="true"></i> CRM &amp; ERP Enterprise</span>
              <span class="bento-serp-chip"><i class="fa-solid fa-certificate" aria-hidden="true"></i> Certified Architects</span>
            </div>
            <div class="bento-hero-main">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-cloud"></i></div>
              <div class="bento-hero-text">
                <h3 class="flagship-card-title">Salesforce &amp; ERPNext Services</h3>
                <p class="flagship-card-desc">Implement and customize Salesforce and ERPNext solutions to improve CRM, ERP and daily business operations.</p>
              </div>
            </div>
            <div class="bento-seo-microtray">
              <div class="bento-micro-pill">
                <i class="fa-brands fa-salesforce" style="color: #00a1e0;" aria-hidden="true"></i>
                <span>Salesforce Cloud</span>
              </div>
              <div class="bento-micro-pill">
                <i class="fa-solid fa-cubes" aria-hidden="true"></i>
                <span>ERPNext Multi-Company</span>
              </div>
              <div class="bento-micro-pill">
                <i class="fa-solid fa-network-wired" aria-hidden="true"></i>
                <span>Pipeline Automation</span>
              </div>
              <div class="bento-micro-pill">
                <i class="fa-solid fa-database" aria-hidden="true"></i>
                <span>Custom DocTypes &amp; Workflows</span>
              </div>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('tech-development.show', ['slug' => 'crm-development']) }}" class="card-explore-btn">
                <span>Explore Capability</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
              <span class="bento-footer-stat">End-to-End Deployment</span>
            </div>
          </article>

          {{-- Service 12: SaaS Application --}}
          <article class="flagship-card bento-card" data-category="tech" data-search="saas application multitenant cloud software subscription platforms stripe cloud">
            <div class="card-crest-row">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-layer-group"></i></div>
              <span class="card-metric-badge">Cloud SaaS</span>
            </div>
            <h3 class="flagship-card-title">SaaS Application</h3>
            <p class="flagship-card-desc">Build secure, scalable and subscription-based cloud applications that support growing businesses.</p>
            <div class="bento-tag-row">
              <span class="bento-mini-tag">Multi-Tenant Core</span>
              <span class="bento-mini-tag">Stripe Billing Engine</span>
              <span class="bento-mini-tag">AWS Cloud Auto-Scale</span>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('tech-development.show', ['slug' => 'saas-application']) }}" class="card-explore-btn">
                <span>Explore Capability</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </article>

          {{-- Service 13: API Development --}}
          <article class="flagship-card bento-card" data-category="tech" data-search="api development integrations rest graphql webhooks backend microservices latency">
            <div class="card-crest-row">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-plug-circle-bolt"></i></div>
              <span class="card-metric-badge">API &amp; Webhooks</span>
            </div>
            <h3 class="flagship-card-title">API Development</h3>
            <p class="flagship-card-desc">Develop secure and reliable APIs for seamless communication between applications and third-party platforms.</p>
            <div class="bento-tag-row">
              <span class="bento-mini-tag">REST &amp; GraphQL</span>
              <span class="bento-mini-tag">Webhooks Gateway</span>
              <span class="bento-mini-tag">&lt;10ms Low Latency</span>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('tech-development.show', ['slug' => 'api-development']) }}" class="card-explore-btn">
                <span>Explore Capability</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </article>

          {{-- Service 14: Software Development --}}
          <article class="flagship-card bento-card" data-category="tech" data-search="software development backend architecture database automation engineering cicd">
            <div class="card-crest-row">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-gears"></i></div>
              <span class="card-metric-badge">Software Arch</span>
            </div>
            <h3 class="flagship-card-title">Software Development</h3>
            <p class="flagship-card-desc">Create reliable and scalable software solutions that automate processes and solve complex business requirements.</p>
            <div class="bento-tag-row">
              <span class="bento-mini-tag">Microservices</span>
              <span class="bento-mini-tag">Database Optimization</span>
              <span class="bento-mini-tag">CI/CD Automation</span>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('tech-development.show', ['slug' => 'software-development']) }}" class="card-explore-btn">
                <span>Explore Capability</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </article>

          {{-- Service 15: WhatsApp Integration (Panoramic Bento Card) --}}
          <article class="flagship-card bento-card bento-card-full" data-category="tech" data-search="whatsapp integration automation chatbot messaging customer engagement api meta cloud business crm">
            <div class="bento-badge-strip">
              <span class="card-metric-badge"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> Official Meta API</span>
              <span class="bento-serp-chip"><i class="fa-solid fa-bolt" aria-hidden="true"></i> Enterprise Automation</span>
            </div>
            <div class="bento-hero-main">
              <div class="card-icon-crest bento-crest-wa" aria-hidden="true"><i class="fa-brands fa-whatsapp"></i></div>
              <div class="bento-hero-text">
                <h3 class="flagship-card-title">WhatsApp Integration</h3>
                <p class="flagship-card-desc">Integrate WhatsApp with your CRM and business systems for automated messaging and real-time communication.</p>
              </div>
            </div>
            <div class="bento-seo-microtray">
              <div class="bento-micro-pill">
                <i class="fa-solid fa-robot" aria-hidden="true"></i>
                <span>Conversational AI Chatbots</span>
              </div>
              <div class="bento-micro-pill">
                <i class="fa-solid fa-arrows-rotate" aria-hidden="true"></i>
                <span>2-Way CRM Sync</span>
              </div>
              <div class="bento-micro-pill">
                <i class="fa-solid fa-bullhorn" aria-hidden="true"></i>
                <span>Broadcast Campaigns</span>
              </div>
              <div class="bento-micro-pill">
                <i class="fa-solid fa-circle-check" style="color: #25d366;" aria-hidden="true"></i>
                <span>Official Green Tick Ready</span>
              </div>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('tech-development.show', ['slug' => 'whatsapp-integration']) }}" class="card-explore-btn">
                <span>Explore Capability</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
              <span class="bento-footer-stat">Meta Cloud Verified Protocol</span>
            </div>
          </article>

        </div>
      </div>

    </div>
  </section>

  {{-- =========================================================================
       3. ENTERPRISE TRUST BENTO (Why Choose Us & R2V3 Certification Combined)
       ========================================================================= --}}
  <section class="srv-trust-showcase" id="trustShowcase">
    <div class="srv-trust-container">

      <div class="srv-trust-head">
        <span class="trust-kicker">Why Choose Us</span>
        <h2 class="trust-single-title">
          Top Six Reasons to Trust Our IT Expertise
        </h2>
        <p class="trust-subtext">
          Empower your business with reliable, secure, and scalable IT solutions tailored to your unique goals and requirements.
        </p>
      </div>

      <div class="bento-master-grid">

        {{-- Cell 1: R2V3 Certification Spotlight (Spans 2 columns) --}}
        <div class="bento-cert-showcase">
          <div class="cert-showcase-copy">
            <span class="cert-showcase-tag">
              <i class="fa-solid fa-certificate" aria-hidden="true"></i> Official Enterprise Standard
            </span>
            <h3 class="cert-showcase-title">Our Certification</h3>
            <p class="cert-showcase-p">
              As a swiftly advancing leader in comprehensive ITAD and managed solutions for reverse logistics, B2B Exports is R2V3 Certified.
            </p>
            <div class="cert-showcase-points">
              <div class="cert-point">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>R2V3 Global Standard Compliance</span>
              </div>
              <div class="cert-point">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>Zero-Data-Leakage Destruction Protocols</span>
              </div>
              <div class="cert-point">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>Environmentally Audited Sustainable Logistics</span>
              </div>
            </div>
          </div>
          <div class="cert-showcase-media">
            <div class="cert-preview-frame">
              <img src="https://www.retrotechdigital.com/frontend/img/certificate.png" alt="R2V3 Certification - Retrotech Digital & B2B Exports" loading="lazy">
            </div>
          </div>
        </div>

        {{-- Cell 2: Engineering Team Visual --}}
        <div class="bento-team-feature">
          <img src="https://www.retrotechdigital.com/frontend/img/why-choose-us-retrotech.webp" alt="Professional IT service team - Retrotech Digital" loading="lazy">
          <div class="bento-team-caption">
            <span class="team-badge-tag">Certified Engineers</span>
            <h4 class="team-caption-h4">Dedicated In-House Technical Bench</h4>
          </div>
        </div>

        {{-- Bento Reason 1 --}}
        <div class="bento-reason-unit">
          <div class="bento-reason-header">
            <span class="reason-num-crest">01</span>
            <i class="fa-solid fa-user-check" style="color: var(--theme-green-brand, #2f6f46); font-size: 16px;"></i>
          </div>
          <h4 class="reason-unit-title">Experienced IT Professionals</h4>
          <p class="reason-unit-desc">Our skilled developers, designers, and technology experts deliver reliable solutions using proven industry practices.</p>
        </div>

        {{-- Bento Reason 2 --}}
        <div class="bento-reason-unit">
          <div class="bento-reason-header">
            <span class="reason-num-crest">02</span>
            <i class="fa-solid fa-puzzle-piece" style="color: var(--theme-green-brand, #2f6f46); font-size: 16px;"></i>
          </div>
          <h4 class="reason-unit-title">Customised Business Solutions</h4>
          <p class="reason-unit-desc">We create tailored websites, applications, software, and digital solutions that match your business processes and objectives.</p>
        </div>

        {{-- Bento Reason 3 --}}
        <div class="bento-reason-unit">
          <div class="bento-reason-header">
            <span class="reason-num-crest">03</span>
            <i class="fa-solid fa-clock-check" style="color: var(--theme-green-brand, #2f6f46); font-size: 16px;"></i>
          </div>
          <h4 class="reason-unit-title">On-Time Project Delivery</h4>
          <p class="reason-unit-desc">We use the latest tools, frameworks, and technologies to build secure, high-performing, and future-ready digital products.</p>
        </div>

        {{-- Bento Reason 4 --}}
        <div class="bento-reason-unit">
          <div class="bento-reason-header">
            <span class="reason-num-crest">04</span>
            <i class="fa-solid fa-comments" style="color: var(--theme-green-brand, #2f6f46); font-size: 16px;"></i>
          </div>
          <h4 class="reason-unit-title">Transparent Communication</h4>
          <p class="reason-unit-desc">We maintain clear communication, transparent processes, and timely delivery throughout every stage of your project.</p>
        </div>

        {{-- Bento Reason 5 --}}
        <div class="bento-reason-unit">
          <div class="bento-reason-header">
            <span class="reason-num-crest">05</span>
            <i class="fa-solid fa-shield-halved" style="color: var(--theme-green-brand, #2f6f46); font-size: 16px;"></i>
          </div>
          <h4 class="reason-unit-title">Scalable &amp; Secure Technologies</h4>
          <p class="reason-unit-desc">Every solution is carefully designed, developed, tested, and optimized to provide an excellent user experience.</p>
        </div>

        {{-- Bento Reason 6 --}}
        <div class="bento-reason-unit">
          <div class="bento-reason-header">
            <span class="reason-num-crest">06</span>
            <i class="fa-solid fa-headset" style="color: var(--theme-green-brand, #2f6f46); font-size: 16px;"></i>
          </div>
          <h4 class="reason-unit-title">Dedicated Post-Launch Support</h4>
          <p class="reason-unit-desc">We provide cost-effective IT services that can easily scale and adapt as your business continues to grow.</p>
        </div>

      </div>

    </div>
  </section>

  {{-- =========================================================================
       4. CLIENT EXPERIENCE WALL (10 Client Reviews & Rating Summary)
       ========================================================================= --}}
  <section class="srv-experience-wall" id="experienceWall">
    <div class="srv-experience-container">
      <div class="experience-grid-split">

        {{-- Left: Social Proof Hub --}}
        <div class="experience-score-card">
          <div class="huge-score">4.9</div>
          <div class="stars-score-row" aria-label="5 stars rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>

          <div class="avatar-stack-hub">
            <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Priya Sharma">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael Thompson">
            <img src="https://randomuser.me/api/portraits/women/48.jpg" alt="Sophie Martin">
            <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Arjun Patel">
          </div>
          <div class="client-volume-title">Our Client (5k + Reviews)</div>
          <h3 class="client-quote-heading">Customer experiences that speak for themselves</h3>

          <div class="platform-badges-flex">
            <div class="platform-badge-unit">
              <img src="https://www.retrotechdigital.com/frontend/img/trustpilot.png" alt="Trustpilot">
              <div class="stars">
                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
              </div>
            </div>
            <div class="platform-badge-unit">
              <img src="https://www.retrotechdigital.com/frontend/img/google-icon.png" alt="Google">
              <div class="stars">
                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
              </div>
            </div>
          </div>
        </div>

        {{-- Right: Interactive Carousel with All 10 Reviews --}}
        <div class="experience-carousel-stage" id="experienceCarousel">

          {{-- Review 1 --}}
          <div class="review-slide-box active" data-slide="1">
            <div class="slide-author-bar">
              <div class="author-data-flex">
                <img src="https://randomuser.me/api/portraits/women/65.jpg" class="author-pic" alt="Priya Sharma">
                <div>
                  <h4 class="author-name-h4">Priya Sharma</h4>
                  <p class="author-role-p">Marketing Head, UrbanNest Interiors 🇮🇳</p>
                </div>
              </div>
              <div class="slide-quote-icon"><i class="fa-solid fa-quote-right"></i></div>
            </div>
            <div class="slide-rating-stars">
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <p class="slide-quote-narrative">
              “Retrotech helped us grow our online presence with a perfectly executed social media strategy. Our brand visibility and inquiries have increased dramatically within months!”
            </p>
          </div>

          {{-- Review 2 --}}
          <div class="review-slide-box" data-slide="2">
            <div class="slide-author-bar">
              <div class="author-data-flex">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" class="author-pic" alt="Michael Thompson">
                <div>
                  <h4 class="author-name-h4">Michael Thompson</h4>
                  <p class="author-role-p">CEO, TechNova Solutions 🇺🇸</p>
                </div>
              </div>
              <div class="slide-quote-icon"><i class="fa-solid fa-quote-right"></i></div>
            </div>
            <div class="slide-rating-stars">
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <p class="slide-quote-narrative">
              “The team built a robust and responsive web application for our company. Their communication, technical expertise, and timely delivery were top-notch.”
            </p>
          </div>

          {{-- Review 3 --}}
          <div class="review-slide-box" data-slide="3">
            <div class="slide-author-bar">
              <div class="author-data-flex">
                <img src="https://randomuser.me/api/portraits/men/45.jpg" class="author-pic" alt="Arjun Patel">
                <div>
                  <h4 class="author-name-h4">Arjun Patel</h4>
                  <p class="author-role-p">Founder, FitAura Gym Chain 🇮🇳</p>
                </div>
              </div>
              <div class="slide-quote-icon"><i class="fa-solid fa-quote-right"></i></div>
            </div>
            <div class="slide-rating-stars">
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <p class="slide-quote-narrative">
              “Our local SEO rankings improved tremendously! Thanks to Retrotech, we now receive 3x more customer inquiries from Google.”
            </p>
          </div>

          {{-- Review 4 --}}
          <div class="review-slide-box" data-slide="4">
            <div class="slide-author-bar">
              <div class="author-data-flex">
                <img src="https://randomuser.me/api/portraits/women/48.jpg" class="author-pic" alt="Sophie Martin">
                <div>
                  <h4 class="author-name-h4">Sophie Martin</h4>
                  <p class="author-role-p">Product Manager, HealthBridge App 🇬🇧</p>
                </div>
              </div>
              <div class="slide-quote-icon"><i class="fa-solid fa-quote-right"></i></div>
            </div>
            <div class="slide-rating-stars">
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <p class="slide-quote-narrative">
              “They developed a clean, user-friendly mobile app for our healthcare startup. The experience was seamless from design to deployment.”
            </p>
          </div>

          {{-- Review 5 --}}
          <div class="review-slide-box" data-slide="5">
            <div class="slide-author-bar">
              <div class="author-data-flex">
                <img src="https://randomuser.me/api/portraits/men/15.jpg" class="author-pic" alt="Rohit Mehta">
                <div>
                  <h4 class="author-name-h4">Rohit Mehta</h4>
                  <p class="author-role-p">Director, Mehta Enterprises 🇮🇳</p>
                </div>
              </div>
              <div class="slide-quote-icon"><i class="fa-solid fa-quote-right"></i></div>
            </div>
            <div class="slide-rating-stars">
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <p class="slide-quote-narrative">
              “From logo to Google Ads — Retrotech handled everything with creativity and professionalism. Our online sales jumped by 45%.”
            </p>
          </div>

          {{-- Review 6 --}}
          <div class="review-slide-box" data-slide="6">
            <div class="slide-author-bar">
              <div class="author-data-flex">
                <img src="https://randomuser.me/api/portraits/women/22.jpg" class="author-pic" alt="Emily Johnson">
                <div>
                  <h4 class="author-name-h4">Emily Johnson</h4>
                  <p class="author-role-p">Sales Head, Global Freight Co. 🇨🇦</p>
                </div>
              </div>
              <div class="slide-quote-icon"><i class="fa-solid fa-quote-right"></i></div>
            </div>
            <div class="slide-rating-stars">
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <p class="slide-quote-narrative">
              “They built a custom CRM for our logistics operations. It’s intuitive, fast, and integrates perfectly with our existing systems.”
            </p>
          </div>

          {{-- Review 7 --}}
          <div class="review-slide-box" data-slide="7">
            <div class="slide-author-bar">
              <div class="author-data-flex">
                <img src="https://randomuser.me/api/portraits/women/33.jpg" class="author-pic" alt="Neha Gupta">
                <div>
                  <h4 class="author-name-h4">Neha Gupta</h4>
                  <p class="author-role-p">Owner, StyleAura Boutique 🇮🇳</p>
                </div>
              </div>
              <div class="slide-quote-icon"><i class="fa-solid fa-quote-right"></i></div>
            </div>
            <div class="slide-rating-stars">
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <p class="slide-quote-narrative">
              “They redesigned our website and ran digital campaigns — the results were fantastic. My online orders doubled in just 2 months!”
            </p>
          </div>

          {{-- Review 8 --}}
          <div class="review-slide-box" data-slide="8">
            <div class="slide-author-bar">
              <div class="author-data-flex">
                <img src="https://randomuser.me/api/portraits/men/28.jpg" class="author-pic" alt="David Miller">
                <div>
                  <h4 class="author-name-h4">David Miller</h4>
                  <p class="author-role-p">Managing Director, EcoTrend Store 🇦🇺</p>
                </div>
              </div>
              <div class="slide-quote-icon"><i class="fa-solid fa-quote-right"></i></div>
            </div>
            <div class="slide-rating-stars">
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <p class="slide-quote-narrative">
              “Excellent eCommerce development support. Smooth functionality, fast speed, and an amazing UI that our customers love.”
            </p>
          </div>

          {{-- Review 9 --}}
          <div class="review-slide-box" data-slide="9">
            <div class="slide-author-bar">
              <div class="author-data-flex">
                <img src="https://randomuser.me/api/portraits/men/23.jpg" class="author-pic" alt="Karan Verma">
                <div>
                  <h4 class="author-name-h4">Karan Verma</h4>
                  <p class="author-role-p">Founder, Cafe Aroma 🇮🇳</p>
                </div>
              </div>
              <div class="slide-quote-icon"><i class="fa-solid fa-quote-right"></i></div>
            </div>
            <div class="slide-rating-stars">
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <p class="slide-quote-narrative">
              “Their social media team is brilliant — engaging content, great visuals, and consistent growth in followers and engagement.”
            </p>
          </div>

          {{-- Review 10 --}}
          <div class="review-slide-box" data-slide="10">
            <div class="slide-author-bar">
              <div class="author-data-flex">
                <img src="https://randomuser.me/api/portraits/women/26.jpg" class="author-pic" alt="Laura Rodriguez">
                <div>
                  <h4 class="author-name-h4">Laura Rodriguez</h4>
                  <p class="author-role-p">Marketing Consultant, BlueSky Digital 🇪🇸</p>
                </div>
              </div>
              <div class="slide-quote-icon"><i class="fa-solid fa-quote-right"></i></div>
            </div>
            <div class="slide-rating-stars">
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <p class="slide-quote-narrative">
              “Retrotech helped optimize our website and improve SEO performance. They’re reliable, transparent, and always deliver on time.”
            </p>
          </div>

          {{-- Slide Controls Bar --}}
          <div class="slide-controls-bar">
            <span class="slide-index-counter" id="slideCounterDisplay">Review 1 of 10</span>
            <div class="slide-nav-arrows">
              <button type="button" class="slide-nav-btn" id="prevReviewBtn" aria-label="Previous review"><i class="fa-solid fa-chevron-left"></i></button>
              <button type="button" class="slide-nav-btn" id="nextReviewBtn" aria-label="Next review"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

  {{-- =========================================================================
       5. CONSULTATION & BLOG TWIN TERMINALS
       ========================================================================= --}}
  <section class="srv-twin-terminals" id="twinTerminals">
    <div class="srv-twin-container">
      <div class="twin-terminals-split">

        {{-- Left: Free Consultation Action Card --}}
        <div class="terminal-action-card">
          <span class="action-card-tag">
            <i class="fa-solid fa-bolt" aria-hidden="true"></i> Free Consultation
          </span>
          <h2 class="action-card-title">Let's Build Your Next Digital Success Story</h2>
          <p class="action-card-desc">
            Whether you need a professional website, SEO, digital marketing, branding, or custom software development, our experts are ready to help your business grow.
          </p>

          <div class="action-card-pills">
            <div class="action-pill">
              <i class="fa-solid fa-globe" aria-hidden="true"></i>
              <span>Website Development</span>
            </div>
            <div class="action-pill">
              <i class="fa-solid fa-chart-line" aria-hidden="true"></i>
              <span>Digital Marketing</span>
            </div>
            <div class="action-pill">
              <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
              <span>SEO Optimization</span>
            </div>
            <div class="action-pill">
              <i class="fa-solid fa-code" aria-hidden="true"></i>
              <span>Custom Software</span>
            </div>
          </div>

          <div class="action-buttons-wrap">
            <a href="#contact" class="btn-act-call">
              <i class="fa-solid fa-phone" aria-hidden="true"></i>
              <span>Request A Call</span>
            </a>
            <a href="https://wa.me/919910836538" class="btn-act-wa" target="_blank" rel="noopener noreferrer">
              <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
              <span>WhatsApp Us</span>
            </a>
          </div>
        </div>

        {{-- Right: Blog Knowledge Deck --}}
        <div class="terminal-blog-deck">
          <div class="blog-deck-top">
            <h3 class="blog-deck-title">From the Blog</h3>
            <a href="{{ route('blog') }}" class="blog-view-all-link">
              <span>View All Blogs</span>
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>

          <div class="blog-deck-items">

            {{-- Article 1 --}}
            <a href="{{ url('/blog/mobile-app-development-guide-for-business-growth') }}" class="blog-deck-card">
              <div class="blog-card-thumb">
                <img src="https://images.unsplash.com/photo-1764664281860-c5725fafa634?auto=format&fit=crop&w=400&h=300&q=80" alt="Mobile App Development Guide for Business Growth" loading="lazy">
              </div>
              <div class="blog-card-content">
                <div class="blog-card-meta">
                  <span><i class="fa-regular fa-calendar"></i> 31 JAN</span>
                  <span><i class="fa-solid fa-lightbulb"></i> Strategy</span>
                </div>
                <h4 class="blog-card-h4">Mobile App Development Guide for Business Growth</h4>
                <span class="blog-card-read">Read Guide <i class="fa-solid fa-arrow-right"></i></span>
              </div>
            </a>

            {{-- Article 2 --}}
            <a href="{{ url('/blog/social-media-marketing-strategy-for-growing-brands') }}" class="blog-deck-card">
              <div class="blog-card-thumb">
                <img src="https://images.unsplash.com/photo-1777559542722-5301247fa3b8?auto=format&fit=crop&w=400&h=300&q=80" alt="Social Media Marketing Strategy for Growing Brands" loading="lazy">
              </div>
              <div class="blog-card-content">
                <div class="blog-card-meta">
                  <span><i class="fa-regular fa-calendar"></i> 31 JAN</span>
                  <span><i class="fa-solid fa-lightbulb"></i> Strategy</span>
                </div>
                <h4 class="blog-card-h4">Social Media Marketing Strategy for Growing Brands</h4>
                <span class="blog-card-read">Read Guide <i class="fa-solid fa-arrow-right"></i></span>
              </div>
            </a>

          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- =========================================================================
       6. AMBIENT TICKER STRIP
       ========================================================================= --}}
  <div class="srv-ambient-banner" aria-hidden="true">
    <div class="ambient-track">
      <span>CONSULTING</span><span class="divider">✦</span>
      <span>WEB DESIGN</span><span class="divider">✦</span>
      <span>DEVELOPMENT</span><span class="divider">✦</span>
      <span>MOBILE APPS</span><span class="divider">✦</span>
      <span>BRANDING</span><span class="divider">✦</span>
      <span>UI/UX DESIGN</span><span class="divider">✦</span>
      <span>DIGITAL MARKETING</span><span class="divider">✦</span>
      <span>SEO OPTIMIZATION</span><span class="divider">✦</span>
      <span>CONSULTING</span><span class="divider">✦</span>
      <span>WEB DESIGN</span><span class="divider">✦</span>
      <span>DEVELOPMENT</span><span class="divider">✦</span>
      <span>MOBILE APPS</span><span class="divider">✦</span>
      <span>BRANDING</span><span class="divider">✦</span>
      <span>UI/UX DESIGN</span><span class="divider">✦</span>
      <span>DIGITAL MARKETING</span><span class="divider">✦</span>
      <span>SEO OPTIMIZATION</span><span class="divider">✦</span>
    </div>
  </div>

</main>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  // 1. Dual-Studio Filter & Real-Time Search
  const filterPills = document.querySelectorAll('.srv-pill-btn');
  const serviceCards = document.querySelectorAll('.flagship-card');
  const searchInput = document.getElementById('liveCapabilitiesSearch');
  const marketingGroup = document.getElementById('studioMarketingGroup');
  const techGroup = document.getElementById('studioTechGroup');

  let activeCategory = 'all';

  function filterCards() {
    const q = (searchInput ? searchInput.value : '').toLowerCase().trim();
    let mCount = 0;
    let tCount = 0;

    serviceCards.forEach(card => {
      const cat = card.getAttribute('data-category');
      const tags = (card.getAttribute('data-search') || '').toLowerCase();
      const text = card.innerText.toLowerCase();

      const matchesCat = (activeCategory === 'all') || (cat === activeCategory);
      const matchesSearch = q === '' || tags.includes(q) || text.includes(q);

      if (matchesCat && matchesSearch) {
        card.style.display = 'flex';
        if (cat === 'marketing') mCount++;
        if (cat === 'tech') tCount++;
      } else {
        card.style.display = 'none';
      }
    });

    if (marketingGroup) {
      marketingGroup.style.display = (mCount > 0 && (activeCategory === 'all' || activeCategory === 'marketing')) ? 'block' : 'none';
    }
    if (techGroup) {
      techGroup.style.display = (tCount > 0 && (activeCategory === 'all' || activeCategory === 'tech')) ? 'block' : 'none';
    }
  }

  filterPills.forEach(btn => {
    btn.addEventListener('click', function() {
      filterPills.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      activeCategory = this.getAttribute('data-filter');
      filterCards();
    });
  });

  if (searchInput) {
    searchInput.addEventListener('input', filterCards);
  }

  // 2. Client Experience Carousel with Swipe & Touch Gestures
  const reviewSlides = document.querySelectorAll('.review-slide-box');
  const counterText = document.getElementById('slideCounterDisplay');
  const prevBtn = document.getElementById('prevReviewBtn');
  const nextBtn = document.getElementById('nextReviewBtn');
  const carouselBox = document.getElementById('experienceCarousel');

  if (reviewSlides.length > 0) {
    let currentSlide = 0;
    const slideCount = reviewSlides.length;
    let reviewTimer = null;

    function renderReview(index, direction = 'next') {
      if (index < 0) index = slideCount - 1;
      if (index >= slideCount) index = 0;
      currentSlide = index;

      reviewSlides.forEach((slide, i) => {
        slide.classList.remove('active', 'slide-from-right', 'slide-from-left');
        if (i === currentSlide) {
          slide.classList.add('active');
          slide.classList.add(direction === 'next' ? 'slide-from-right' : 'slide-from-left');
        }
      });

      if (counterText) {
        counterText.textContent = `Review ${currentSlide + 1} of ${slideCount}`;
      }
    }

    function restartTimer() {
      if (reviewTimer) clearInterval(reviewTimer);
      reviewTimer = setInterval(() => {
        renderReview(currentSlide + 1, 'next');
      }, 6000);
    }

    if (prevBtn) {
      prevBtn.addEventListener('click', () => renderReview(currentSlide - 1));
    }
    if (nextBtn) {
      nextBtn.addEventListener('click', () => renderReview(currentSlide + 1));
    }

    let reviewTimer = null;
    const startReviewTimer = () => {
      if (!reviewTimer) {
        reviewTimer = setInterval(() => renderReview(currentSlide + 1), 6000);
      }
    };
    const stopReviewTimer = () => {
      if (reviewTimer) {
        clearInterval(reviewTimer);
        reviewTimer = null;
      }
    };

    const carouselBox = document.getElementById('experienceCarousel');
    if (carouselBox) {
      if ('IntersectionObserver' in window) {
        const carouselObserver = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              startReviewTimer();
            } else {
              stopReviewTimer();
            }
          });
        }, { threshold: 0.1 });
        carouselObserver.observe(carouselBox);
      } else {
        startReviewTimer();
      }

      carouselBox.addEventListener('mouseenter', stopReviewTimer);
      carouselBox.addEventListener('mouseleave', startReviewTimer);
    }
    if (nextBtn) {
      nextBtn.addEventListener('click', (e) => {
        e.preventDefault();
        renderReview(currentSlide + 1, 'next');
        restartTimer();
      });
    }

    // Touch Swipe Gesture Support
    if (carouselBox) {
      let touchStartX = 0;
      let touchStartY = 0;
      let touchEndX = 0;
      let touchEndY = 0;

      carouselBox.addEventListener('touchstart', (e) => {
        if (e.changedTouches && e.changedTouches.length > 0) {
          touchStartX = e.changedTouches[0].screenX;
          touchStartY = e.changedTouches[0].screenY;
        }
      }, { passive: true });

      carouselBox.addEventListener('touchend', (e) => {
        if (e.changedTouches && e.changedTouches.length > 0) {
          touchEndX = e.changedTouches[0].screenX;
          touchEndY = e.changedTouches[0].screenY;
          handleSwipe();
        }
      }, { passive: true });

      function handleSwipe() {
        const diffX = touchEndX - touchStartX;
        const diffY = touchEndY - touchStartY;
        if (Math.abs(diffX) > 35 && Math.abs(diffX) > Math.abs(diffY)) {
          if (diffX < 0) {
            renderReview(currentSlide + 1, 'next');
          } else {
            renderReview(currentSlide - 1, 'prev');
          }
          restartTimer();
        }
      }

      carouselBox.addEventListener('mouseenter', () => {
        if (reviewTimer) clearInterval(reviewTimer);
      });
      carouselBox.addEventListener('mouseleave', restartTimer);
    }

    restartTimer();
  }
});
</script>
@endpush
