@extends('layouts.app')

@section('title', 'Retrotech Digital | 360° IT, Software & Digital Solutions')
@section('description', 'Accelerate enterprise growth with Retrotech Digital. We engineer bespoke web platforms, mobile applications, custom SaaS architectures, and WhatsApp automation.')
@section('canonical', route('home'))
@section('og_type', 'website')

@section('content')

  {{-- =========================================================================
       1. HERO SECTION: Business Made Easy with Retrotech
       ========================================================================= --}}
  <main class="hero-section" id="home" >
    <div class="hero-content hero-content-new">
      <h1 class="hero-title-main">
        Business Made Easy<br><span class="hero-title-gradient">with Retrotech</span>
      </h1>

      <p class="hero-desc-main">
        Boost revenue through WhatsApp marketing and custom software
      </p>

      <div class="hero-cta-group">
        <div class="hero-buttons-row">
          <a href="#contact" class="hero-consult-btn contact-page-link">
            <span>Get a Free Consultation</span>
            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
          </a>
          <a href="{{ route('services.index') }}" class="hero-secondary-btn">
            <span>Explore Services</span>
            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </main>

  {{-- =========================================================================
       3. ABOUT US & VIDEO DOCKING SECTION
       ========================================================================= --}}
  <section class="topic-section" id="about">
    <div class="topic-container">
      <span class="bento-kicker" data-anim="down">
        <span class="bento-kicker-dot"></span>
        About Us
      </span>

      <h2 class="redefining-heading">
        <span class="heading-row-1">Smart IT, AI &amp; Marketing</span>
        <span class="heading-row-2">
          <span class="word-modern">Solutions</span>
          <span class="video-dock-slot" id="videoDockSlot" aria-label="Embedded Workplace Video"></span>
          <span class="word-workplace">For Every Business</span>
        </span>
      </h2>

      <p class="topic-subtext" data-anim="up">
        We are a 360° IT and Digital Solutions Company dedicated to empowering businesses in the digital era. We provide innovative services that help organizations streamline operations, enhance performance, and drive measurable results.
      </p>

      {{-- Grand Executive Metric Ribbon --}}
      <div class="about-proof-ribbon" data-anim="up">
        <div class="apr-item">
          <span class="apr-val">10<span class="apr-plus">+</span></span>
          <span class="apr-lbl">Years Industry Leadership</span>
        </div>
        <div class="apr-sep" aria-hidden="true"></div>
        <div class="apr-item">
          <span class="apr-val">50,000<span class="apr-plus">+</span></span>
          <span class="apr-lbl">Daily Active System Users</span>
        </div>
        <div class="apr-sep" aria-hidden="true"></div>
        <div class="apr-item">
          <span class="apr-val">100<span class="apr-plus">%</span></span>
          <span class="apr-lbl">Source IP Handover</span>
        </div>
        <div class="apr-sep" aria-hidden="true"></div>
        <div class="apr-item">
          <span class="apr-val">24/7</span>
          <span class="apr-lbl">Proactive APM Monitoring</span>
        </div>
      </div>





      {{-- 2026 Deeply Considered Split Canvas: Culture Manifesto + 6 Pillars Grid --}}
      <div class="about-pinned-showcase" id="aboutShowcase">
        <div class="about-split-canvas">
          
          {{-- Left Column: Certificate --}}
          <div class="about-credential-stack">

            {{-- Verified Expertise --}}
            <div class="acred-card acred-card--expertise" data-anim="left">
              <div class="acred-header">
                <span class="acred-icon-wrap"><i class="fa-solid fa-medal"></i></span>
                <div>
                  <h3 class="acred-title">Verified Expertise</h3>
                  <p class="acred-subtitle">Recognized for excellence in IT services &amp; digital marketing</p>
                </div>
                <span class="acred-live-badge"><span class="acred-pulse"></span>Certified</span>
              </div>
              <div class="acred-certificate-frame">
                <img
                  src="{{ asset('assets/images/certificate.png') }}"
                  alt="Retrotech Digital Certificate of Excellence for IT Services and Digital Marketing Solutions"
                  loading="lazy"
                >
              </div>
            </div>

            <a class="about-more-link" href="{{ route('about') }}">More About Us <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            

          </div>
          {{-- Right Column: 6 Core Pillars Grid with Slide Window --}}
          <div class="about-pillars-mosaic-window" id="aboutPillarsMosaicWindow">
            <div class="about-pillars-mosaic" id="aboutPillarsMosaic">
          
          {{-- Pillar 01 --}}
          <div class="pillar-tile-item" data-anim="right">
            <div class="pti-thumb-wrap">
              <img src="{{ asset('assets/images/tech-development/custom-application.jpg') }}" alt="End-to-End Solutions" loading="lazy">
              <span class="pti-number">01</span>
            </div>
            <div class="pti-content">
              <div class="pti-header">
                <span class="pti-icon"><i class="fa-solid fa-cubes"></i></span>
                <h3 class="pti-title">End-to-End Solutions</h3>
              </div>
              <p class="pti-desc">From initial architecture and modern UI/UX design to robust cloud deployment, API integration, and continuous post-launch evolution.</p>
              <div class="pti-kpi"><i class="fa-solid fa-circle-check"></i> 100% Lifecycle Control</div>
            </div>
          </div>

          {{-- Pillar 02 --}}
          <div class="pillar-tile-item" data-anim="up">
            <div class="pti-thumb-wrap">
              <img src="{{ asset('assets/images/tech-development/whatsapp-integration.jpg') }}" alt="AI & Automation Excellence" loading="lazy">
              <span class="pti-number">02</span>
            </div>
            <div class="pti-content">
              <div class="pti-header">
                <span class="pti-icon"><i class="fa-solid fa-robot"></i></span>
                <h3 class="pti-title">AI &amp; Automation Excellence</h3>
              </div>
              <p class="pti-desc">Intelligent WhatsApp automation, conversational workflows, and AI assistants that eliminate manual bottlenecks and accelerate sales.</p>
              <div class="pti-kpi"><i class="fa-solid fa-bolt"></i> 4.8x Efficiency Surge</div>
            </div>
          </div>

          {{-- Pillar 03 --}}
          <div class="pillar-tile-item" data-anim="right">
            <div class="pti-thumb-wrap">
              <img src="{{ asset('assets/images/tech-development/web-development.jpg') }}" alt="Business Growth Focus" loading="lazy">
              <span class="pti-number">03</span>
            </div>
            <div class="pti-content">
              <div class="pti-header">
                <span class="pti-icon"><i class="fa-solid fa-chart-line"></i></span>
                <h3 class="pti-title">Business Growth Focus</h3>
              </div>
              <p class="pti-desc">Every line of code and marketing funnel is engineered with clear KPIs in mind to multiply conversions, leads, and enterprise valuation.</p>
              <div class="pti-kpi"><i class="fa-solid fa-arrow-trend-up"></i> +140% Average Lead Lift</div>
            </div>
          </div>

          {{-- Pillar 04 --}}
          <div class="pillar-tile-item" data-anim="up">
            <div class="pti-thumb-wrap">
              <img src="{{ asset('assets/images/tech-development/crm-development.jpg') }}" alt="Client Success Strategy" loading="lazy">
              <span class="pti-number">04</span>
            </div>
            <div class="pti-content">
              <div class="pti-header">
                <span class="pti-icon"><i class="fa-solid fa-bullseye"></i></span>
                <h3 class="pti-title">Client Success Strategy</h3>
              </div>
              <p class="pti-desc">Transparent sprint updates, dedicated project managers, and proactive technical advisory aligned directly with your business goals.</p>
              <div class="pti-kpi"><i class="fa-solid fa-handshake"></i> 98.6% Client Retention</div>
            </div>
          </div>

          

        </div>
      </div>

    </div>
  </div>
</section>


{{-- =========================================================================
       2. CONTINUOUS SERVICES TICKER MARQUEE
       ========================================================================= --}}
  <div class="marquee-ticker-bar" aria-hidden="true">
    <div class="ticker-track">
      <span class="ticker-item">CONSULTING <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">WEB DESIGN <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">DEVELOPMENT <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">MOBILE APPS <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">BRANDING <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">UI/UX DESIGN <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">DIGITAL MARKETING <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">SEO OPTIMIZATION <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">SAAS DEVELOPMENT <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">SOFTWARE DEVELOPMENT <i class="fa-solid fa-star-of-life"></i></span>
      {{-- Duplicate set for seamless loop --}}
      <span class="ticker-item">CONSULTING <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">WEB DESIGN <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">DEVELOPMENT <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">MOBILE APPS <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">BRANDING <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">UI/UX DESIGN <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">DIGITAL MARKETING <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">SEO OPTIMIZATION <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">SAAS DEVELOPMENT <i class="fa-solid fa-star-of-life"></i></span>
      <span class="ticker-item">SOFTWARE DEVELOPMENT <i class="fa-solid fa-star-of-life"></i></span>
    </div>
  </div>


  {{-- =========================================================================
       4. SERVICES SECTION: Comprehensive IT & Digital Solutions
       ========================================================================= --}}
  <section class="home-services-section" id="services">
    <div class="services-ambient-glow services-ambient-glow-1" aria-hidden="true"></div>
    <div class="services-ambient-glow services-ambient-glow-2" aria-hidden="true"></div>

    <div class="services-container">
      {{-- Section Header --}}
      <header class="services-header" data-anim="down">
        <div class="services-kicker">
          <span class="sk-ping"><span class="sk-ping-dot"></span></span>
          <span class="sk-text">Enterprise IT &amp; Digital Solutions</span>
          <span class="sk-sep">•</span>
          <span class="sk-sub">Core Capabilities</span>
        </div>
        <h2 class="services-heading">
          Comprehensive IT Solutions. <span class="services-heading-accent">Built for Sustainable Growth.</span>
        </h2>
        <p class="services-subtitle">
          From high-speed web and native mobile applications to custom enterprise software, scalable cloud SaaS, and revenue-driving digital marketing—we build resilient technology tailored to your business goals.
        </p>

        {{-- Capability Discipline Filter Tabs --}}
        <div class="services-filter-bar" role="tablist" aria-label="Services Category Filter">
          <button type="button" class="sfb-btn active" data-filter="all">
            <i class="fa-solid fa-shapes"></i> All Solutions
          </button>
          <button type="button" class="sfb-btn" data-filter="web-mobile">
            <i class="fa-solid fa-code"></i> Web &amp; Mobile
          </button>
          <button type="button" class="sfb-btn" data-filter="enterprise">
            <i class="fa-solid fa-server"></i> Software &amp; SaaS
          </button>
          <button type="button" class="sfb-btn" data-filter="growth">
            <i class="fa-brands fa-whatsapp"></i> Marketing &amp; Automation
          </button>
    
        </div>
      </header>

      {{-- Services Showcase Grid (6 Strategic Pillars - Minimal & High Impact) --}}
      <div class="services-showcase-grid">
        {{-- Card 1: Web Development & Architecture --}}
        <article class="service-card" data-anim="up" data-category="web-mobile">
          <div class="sc-media">
            <img src="{{ asset('assets/images/tech-development/web-development.jpg') }}" alt="Web Development &amp; Architecture" loading="lazy" decoding="async">
            <div class="sc-media-overlay"></div>
            <span class="sc-floating-badge"><i class="fa-solid fa-code"></i> Web Systems</span>
          </div>
          <div class="sc-content">
            <h3 class="sc-title">
              <a href="{{ route('services.show', 'web-development') }}">Web Development &amp; Architecture</a>
            </h3>
            <p class="sc-desc">
              High-performance, responsive websites and dynamic web applications built with modern frameworks, sub-80ms edge speeds, and clean API architecture.
            </p>
            <div class="sc-tags">
              <span class="sc-tag">Laravel 11</span>
              <span class="sc-tag">React 19</span>
              <span class="sc-tag">REST &amp; GraphQL</span>
            </div>
            <div class="sc-footer">
              <a href="{{ route('services.show', 'web-development') }}" class="sc-action-btn">
                <span>Explore Service</span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>

        {{-- Card 2: Mobile App Development --}}
        <article class="service-card" data-anim="up" data-category="web-mobile">
          <div class="sc-media">
            <picture>
              <source srcset="{{ asset('assets/images/tech-development/mobile-app-development.webp') }}" type="image/webp">
              <img src="{{ asset('assets/images/tech-development/mobile-app-development.jpg') }}" alt="Mobile Application Development" loading="lazy" decoding="async">
            </picture>
            <div class="sc-media-overlay"></div>
            <span class="sc-floating-badge"><i class="fa-solid fa-mobile-screen"></i> iOS &amp; Android</span>
          </div>
          <div class="sc-content">
            <h3 class="sc-title">
              <a href="{{ route('services.show', 'mobile-app-development') }}">Mobile App Development</a>
            </h3>
            <p class="sc-desc">
              Native and cross-platform iOS and Android mobile apps engineered for fluid 120Hz gesture response, offline data sync, and biometric security.
            </p>
            <div class="sc-tags">
              <span class="sc-tag">Flutter</span>
              <span class="sc-tag">React Native</span>
              <span class="sc-tag">iOS &amp; Android</span>
            </div>
            <div class="sc-footer">
              <a href="{{ route('services.show', 'mobile-app-development') }}" class="sc-action-btn">
                <span>Explore Service</span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>

        {{-- Card 3: Custom Software Development --}}
        <article class="service-card" data-anim="up" data-category="enterprise">
          <div class="sc-media">
            <img src="{{ asset('assets/images/data-center-new.jpg') }}" alt="Custom Enterprise Software Development" loading="lazy" decoding="async">
            <div class="sc-media-overlay"></div>
            <span class="sc-floating-badge"><i class="fa-solid fa-server"></i> Bespoke Systems</span>
          </div>
          <div class="sc-content">
            <h3 class="sc-title">
              <a href="{{ route('services.show', 'software-development') }}">Custom Software Development</a>
            </h3>
            <p class="sc-desc">
              Tailored enterprise software designed to eliminate manual bottlenecks, automate operational workflows, and scale without friction.
            </p>
            <div class="sc-tags">
              <span class="sc-tag">Python</span>
              <span class="sc-tag">Node.js</span>
              <span class="sc-tag">Microservices</span>
            </div>
            <div class="sc-footer">
              <a href="{{ route('services.show', 'software-development') }}" class="sc-action-btn">
                <span>Explore Service</span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>

        {{-- Card 4: Cloud & SaaS Product Development --}}
        <article class="service-card" data-anim="up" data-category="enterprise">
          <div class="sc-media">
            <picture>
              <source srcset="{{ asset('assets/images/tech-development/api-development.webp') }}" type="image/webp">
              <img src="{{ asset('assets/images/tech-development/api-development.jpg') }}" alt="SaaS Application & Cloud Platform Development" loading="lazy" decoding="async">
            </picture>
            <div class="sc-media-overlay"></div>
            <span class="sc-floating-badge"><i class="fa-solid fa-cloud"></i> Multi-Tenant SaaS</span>
          </div>
          <div class="sc-content">
            <h3 class="sc-title">
              <a href="{{ route('services.show', 'saas-application') }}">SaaS &amp; Cloud Applications</a>
            </h3>
            <p class="sc-desc">
              Scalable multi-tenant cloud software platforms built for recurring revenue, featuring automated billing, tenant isolation, and elastic cloud scaling.
            </p>
            <div class="sc-tags">
              <span class="sc-tag">Multi-Tenant</span>
              <span class="sc-tag">AWS Cloud</span>
              <span class="sc-tag">Stripe Billing</span>
            </div>
            <div class="sc-footer">
              <a href="{{ route('services.show', 'saas-application') }}" class="sc-action-btn">
                <span>Explore Service</span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>

        {{-- Card 5: Digital Marketing & Technical SEO --}}
        <article class="service-card" data-anim="up" data-category="growth">
          <div class="sc-media">
            <img src="{{ asset('assets/images/enterprise-clients.jpg') }}" alt="Digital Marketing & Technical SEO" loading="lazy" decoding="async">
            <div class="sc-media-overlay"></div>
            <span class="sc-floating-badge"><i class="fa-solid fa-chart-line"></i> Revenue Engine</span>
          </div>
          <div class="sc-content">
            <h3 class="sc-title">
              <a href="{{ route('services.show', 'seo-services') }}">Digital Marketing &amp; Technical SEO</a>
            </h3>
            <p class="sc-desc">
              Data-driven organic search ranking, performance PPC marketing, and conversion funnel optimization that acquires high-intent leads and maximizes ROI.
            </p>
            <div class="sc-tags">
              <span class="sc-tag">Technical SEO</span>
              <span class="sc-tag">Google Ads</span>
              <span class="sc-tag">Meta Ads</span>
            </div>
            <div class="sc-footer">
              <a href="{{ route('services.show', 'search-engine-optimization') }}" class="sc-action-btn">
                <span>Explore Service</span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>

        {{-- Card 6: WhatsApp Business API & AI Automation --}}
        <article class="service-card" data-anim="up" data-category="growth">
          <div class="sc-media">
            <img src="{{ asset('assets/images/it-asset-management.jpg') }}" alt="WhatsApp Business API & Conversational AI" loading="lazy" decoding="async">
            <div class="sc-media-overlay"></div>
            <span class="sc-floating-badge"><i class="fa-brands fa-whatsapp"></i> Conversational AI</span>
          </div>
          <div class="sc-content">
            <h3 class="sc-title">
              <a href="{{ route('services.show', 'whatsapp-integration') }}">WhatsApp Automation &amp; CRM Bot</a>
            </h3>
            <p class="sc-desc">
              Automate 24/7 customer support, qualify inbound sales leads, and run verified broadcasts using the official Meta WhatsApp Business Cloud API.
            </p>
            <div class="sc-tags">
              <span class="sc-tag">Meta Cloud API</span>
              <span class="sc-tag">CRM Sync</span>
              <span class="sc-tag">Chatbots</span>
            </div>
            <div class="sc-footer">
              <a href="{{ route('services.show', 'whatsapp-integration') }}" class="sc-action-btn">
                <span>Explore Service</span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>
      </div>

      {{-- Strategic Partnership Consultation Banner --}}
      <div class="services-consult-banner" data-anim="up">
        <div class="scb-glow-accent" aria-hidden="true"></div>
        <div class="scb-content">
          <div class="scb-icon-box" aria-hidden="true">
            <i class="fa-solid fa-handshake"></i>
          </div>
          <div class="scb-text-group">
            <div class="scb-kicker">
              <i class="fa-solid fa-circle-check"></i> Strategic Technology Partnership
            </div>
            <h3 class="scb-heading">Have a Custom Architecture or Enterprise Requirement?</h3>
            <p class="scb-desc">
              Speak directly with our senior technology leads and solutions architects for a free technical consultation.
            </p>
            <div class="scb-trust-row">
              <span><i class="fa-solid fa-clock"></i> 24-Hour Response</span>
              <span><i class="fa-solid fa-shield-halved"></i> Signed NDA</span>
              <span><i class="fa-solid fa-code"></i> 100% IP Handover</span>
            </div>
          </div>
        </div>
        <div class="scb-actions">
          <a href="#contact" class="scb-btn-primary contact-page-link">
            <span>Get Free Consultation</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
          <a href="https://wa.me/919910836538" class="scb-btn-wa" target="_blank" rel="noopener noreferrer">
            <i class="fa-brands fa-whatsapp"></i>
            <span>WhatsApp Direct</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  {{-- =========================================================================
       5. WHY CHOOSE US: Enterprise Advantage Matrix
       ========================================================================= --}}
  <section class="why-choose-section" id="why-choose-us">
    <div class="bento-container">
      {{-- Pinned Scroll Track: Locks view on screen while cards change in exact place --}}
      <div class="why-scroll-pin-track" id="whyScrollTrack">
        <div class="why-pinned-viewport" id="whyPinnedViewport">
          <div class="bento-header" data-anim="down">
            <h2 class="bento-heading" aria-label="Top Reasons to Trust Our IT Expertise">
              Top Reasons <span class="bento-heading-gradient">to Trust Our IT Expertise</span>
            </h2>
            <p class="bento-subtitle">Empower your business with reliable, secure, and scalable IT solutions engineered for performance, velocity, and measurable growth.</p>
          </div>

          {{-- The Cards Stage: Seamless Edge-Bleed Stacking Cards (Paytm Style) --}}
          <div class="why-cards-stage" id="whyCardsStage">
            {{-- Card 1 --}}
            <div class="why-stack-card" data-index="0">
              <div class="wsc-grid">
                {{-- Left: Structured Content --}}
                <div class="wsc-content">
                  <div class="wsc-kicker">
                    <span class="wsc-kicker-tag"><i class="fa-solid fa-user-tie"></i> Senior Tech Talent</span>
                  </div>
                  <h3 class="wsc-title">
                    Experienced IT Professionals <span class="wsc-title-accent">Built for Scale</span>
                  </h3>
                  <p class="wsc-desc">
                    Battle-tested developers, system architects, and technology leads delivering mission-critical digital products using modern best practices and strict code quality standards.
                  </p>
                  
                  <div class="wsc-deliverables-grid">
                    <div class="wsc-deliv-item">
                      <i class="fa-solid fa-circle-check"></i>
                      <span><strong>10+ Yrs Avg Exp</strong> — Senior developers &amp; architects</span>
                    </div>
                    <div class="wsc-deliv-item">
                      <i class="fa-solid fa-circle-check"></i>
                      <span><strong>Top 1% Talent</strong> — Rigorous code quality &amp; peer review</span>
                    </div>
                    <div class="wsc-deliv-item">
                      <i class="fa-solid fa-circle-check"></i>
                      <span><strong>Zero Junior Handoffs</strong> — Direct senior engineer access</span>
                    </div>
                    <div class="wsc-deliv-item">
                      <i class="fa-solid fa-circle-check"></i>
                      <span><strong>Modern Tech Stack</strong> — Laravel 11, React 19, AWS &amp; AI</span>
                    </div>
                  </div>

                  <div class="wsc-footer-bar">
                    <a href="#contact" class="wsc-action-link contact-page-link">
                      <span>Consult Our Senior Engineers</span>
                      <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <span class="wsc-badge-trust">
                      <i class="fa-solid fa-shield-check"></i> 100% In-House Team
                    </span>
                  </div>
                </div>

                {{-- Right: Seamless Bleed Image with Soft Gradient Fade --}}
                <div class="wsc-media">
                  <div class="wsc-img-backdrop">
                    <img src="{{ asset('assets/images/process-1.png') }}" alt="Experienced IT Professionals" class="wsc-bleed-img" loading="lazy">
                    <div class="wsc-floating-pill wsc-pill-top">
                      <span class="wsc-fp-icon"><i class="fa-solid fa-circle-check"></i></span>
                      <span>Senior Devs (L5+)</span>
                    </div>
                    <div class="wsc-floating-pill wsc-pill-bottom">
                      <span class="wsc-fp-icon"><i class="fa-solid fa-certificate"></i></span>
                      <span>Top 1% Talent</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {{-- Card 2 --}}
            <div class="why-stack-card" data-index="1">
              <div class="wsc-grid">
                {{-- Left: Structured Content --}}
                <div class="wsc-content">
                  <div class="wsc-kicker">
                    <span class="wsc-kicker-tag"><i class="fa-solid fa-cubes"></i> Bespoke Architecture</span>
                  </div>
                  <h3 class="wsc-title">
                    Customised Business Solutions <span class="wsc-title-accent">Engineered for You</span>
                  </h3>
                  <p class="wsc-desc">
                    We architect and develop tailored applications, web portals, software, and digital solutions engineered precisely around your specific business processes and operational goals.
                  </p>
                  
                  <div class="wsc-deliverables-grid">
                    <div class="wsc-deliv-item">
                      <i class="fa-solid fa-circle-check"></i>
                      <span><strong>Tailored Workflows</strong> — Built for your unique operations</span>
                    </div>
                    <div class="wsc-deliv-item">
                      <i class="fa-solid fa-circle-check"></i>
                      <span><strong>Scalable Microservices</strong> — Modular APIs &amp; isolated DBs</span>
                    </div>
                    <div class="wsc-deliv-item">
                      <i class="fa-solid fa-circle-check"></i>
                      <span><strong>Zero Vendor Lock-In</strong> — Complete source code ownership</span>
                    </div>
                    <div class="wsc-deliv-item">
                      <i class="fa-solid fa-circle-check"></i>
                      <span><strong>No Pre-Made Templates</strong> — 100% bespoke architecture</span>
                    </div>
                  </div>

                  <div class="wsc-footer-bar">
                    <a href="#contact" class="wsc-action-link contact-page-link">
                      <span>Architect Your Solution</span>
                      <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <span class="wsc-badge-trust">
                      <i class="fa-solid fa-shield-check"></i> Full IP Ownership
                    </span>
                  </div>
                </div>

                {{-- Right: Seamless Bleed Image with Soft Gradient Fade --}}
                <div class="wsc-media">
                  <div class="wsc-img-backdrop">
                    <img src="{{ asset('assets/images/it-asset-management.jpg') }}" alt="Customised Business Solutions" class="wsc-bleed-img" loading="lazy">
                    <div class="wsc-floating-pill wsc-pill-top">
                      <span class="wsc-fp-icon"><i class="fa-solid fa-circle-check"></i></span>
                      <span>100% Bespoke Code</span>
                    </div>
                    <div class="wsc-floating-pill wsc-pill-bottom">
                      <span class="wsc-fp-icon"><i class="fa-solid fa-shield-halved"></i></span>
                      <span>Zero Vendor Lock-In</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {{-- Card 3 --}}
            <div class="why-stack-card" data-index="2">
              <div class="wsc-grid">
                {{-- Left: Structured Content --}}
                <div class="wsc-content">
                  <div class="wsc-kicker">
                    <span class="wsc-kicker-tag"><i class="fa-solid fa-bolt-lightning"></i> Agile Velocity</span>
                  </div>
                  <h3 class="wsc-title">
                    On-Time Project Delivery <span class="wsc-title-accent">&amp; Guaranteed SLAs</span>
                  </h3>
                  <p class="wsc-desc">
                    We leverage modern engineering workflows, automated CI/CD deployment pipelines, and live staging environments to guarantee predictable release schedules and contractual uptime SLAs.
                  </p>
                  
                  <div class="wsc-deliverables-grid">
                    <div class="wsc-deliv-item">
                      <i class="fa-solid fa-circle-check"></i>
                      <span><strong>2-Week Sprints</strong> — Transparent, predictable milestones</span>
                    </div>
                    <div class="wsc-deliv-item">
                      <i class="fa-solid fa-circle-check"></i>
                      <span><strong>Automated CI/CD</strong> — Safe deployments &amp; live staging</span>
                    </div>
                    <div class="wsc-deliv-item">
                      <i class="fa-solid fa-circle-check"></i>
                      <span><strong>Contractual SLAs</strong> — 99.98% guaranteed uptime SLA</span>
                    </div>
                    <div class="wsc-deliv-item">
                      <i class="fa-solid fa-circle-check"></i>
                      <span><strong>24/7 APM Monitoring</strong> — Proactive system health &amp; alerts</span>
                    </div>
                  </div>

                  <div class="wsc-footer-bar">
                    <a href="#contact" class="wsc-action-link contact-page-link">
                      <span>Start Your First Sprint</span>
                      <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <span class="wsc-badge-trust">
                      <i class="fa-solid fa-shield-check"></i> Contractual SLAs
                    </span>
                  </div>
                </div>

                {{-- Right: Seamless Bleed Image with Soft Gradient Fade --}}
                <div class="wsc-media">
                  <div class="wsc-img-backdrop">
                    <img src="{{ asset('assets/images/process-3.png') }}" alt="On-Time Project Delivery & SLA" class="wsc-bleed-img" loading="lazy">
                    <div class="wsc-floating-pill wsc-pill-top">
                      <span class="wsc-fp-icon"><i class="fa-solid fa-circle-check"></i></span>
                      <span>99.98% Uptime SLA</span>
                    </div>
                    <div class="wsc-floating-pill wsc-pill-bottom">
                      <span class="wsc-fp-icon"><i class="fa-solid fa-bolt"></i></span>
                      <span>2-Week Sprints</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Section 5 Feature: The Engineering Comparison Battle Matrix (Single Frame Viewport) --}}
      <div class="rvs-single-frame-viewport" id="rvsSingleFrame">
        {{-- Section Heading (Outside the Card) --}}
        <div class="rvs-section-header" data-anim="down">
          <div class="rvs-badge">
            <i class="fa-solid fa-scale-balanced"></i> Architectural Comparison
          </div>
          <h2 class="rvs-section-heading">
            Retrotech Engineering Standard <span class="bento-heading-gradient">vs. Typical IT Agencies</span>
          </h2>
          <p class="rvs-section-subtitle">
            A transparent breakdown of how our senior-led engineering culture eliminates the risks, vendor lock-in, and technical debt common in traditional outsourcing.
          </p>
        </div>

        <div class="retrotech-vs-agency-card" data-anim="zoom">
          <div class="rvs-table-wrap">
            <table class="rvs-table">
              <thead>
                <tr>
                  <th class="rvs-col-dim">
                    <span class="rvs-th-lbl">Delivery Dimension</span>
                  </th>
                  <th class="rvs-col-retro">
                    <div class="rvs-th-hero">
                      <div class="rvs-th-hero-top">
                        <span class="rvs-brand-title"><i class="fa-solid fa-shield-halved"></i> Retrotech Digital</span>
                        <span class="rvs-badge-highlight">Enterprise Benchmark</span>
                      </div>
                      <span class="rvs-brand-sub">Senior-Led Agile Engineering</span>
                    </div>
                  </th>
                  <th class="rvs-col-typical">
                    <div class="rvs-th-muted">
                      <span class="rvs-muted-title"><i class="fa-solid fa-triangle-exclamation"></i> Typical IT Agencies</span>
                      <span class="rvs-muted-sub">Traditional Outsourcing Model</span>
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="rvs-cell-dim">
                    <div class="rvs-dim-wrap">
                      <div class="rvs-dim-icon"><i class="fa-solid fa-file-code"></i></div>
                      <div class="rvs-dim-text">
                        <strong>Source Code &amp; IP Rights</strong>
                        <span class="rvs-dim-desc">Intellectual property ownership</span>
                      </div>
                    </div>
                  </td>
                  <td class="rvs-cell-retro">
                    <div class="rvs-cell-inner">
                      <span class="rvs-status rvs-yes">
                        <i class="fa-solid fa-check"></i>
                        <span>100% Client Ownership on Day 1</span>
                      </span>
                      <small>Complete IP handover, unencumbered Git repos, zero licensing traps or hostage code</small>
                    </div>
                  </td>
                  <td class="rvs-cell-typical">
                    <div class="rvs-cell-inner">
                      <span class="rvs-status rvs-no">
                        <i class="fa-solid fa-xmark"></i>
                        <span>Vendor Lock-In &amp; Traps</span>
                      </span>
                      <small>Code held hostage, recurring template license fees, and heavy exit penalties</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="rvs-cell-dim">
                    <div class="rvs-dim-wrap">
                      <div class="rvs-dim-icon"><i class="fa-solid fa-user-shield"></i></div>
                      <div class="rvs-dim-text">
                        <strong>Engineering Talent</strong>
                        <span class="rvs-dim-desc">Developer seniority &amp; pedigree</span>
                      </div>
                    </div>
                  </td>
                  <td class="rvs-cell-retro">
                    <div class="rvs-cell-inner">
                      <span class="rvs-status rvs-yes">
                        <i class="fa-solid fa-check"></i>
                        <span>Senior L5+ Lead Architects Only</span>
                      </span>
                      <small>Top 1% vetted developers with dedicated technical leadership and peer code reviews</small>
                    </div>
                  </td>
                  <td class="rvs-cell-typical">
                    <div class="rvs-cell-inner">
                      <span class="rvs-status rvs-no">
                        <i class="fa-solid fa-xmark"></i>
                        <span>Junior Bait-and-Switch</span>
                      </span>
                      <small>Senior partners sell the pitch, while unvetted junior interns write your production code</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="rvs-cell-dim">
                    <div class="rvs-dim-wrap">
                      <div class="rvs-dim-icon"><i class="fa-solid fa-comments"></i></div>
                      <div class="rvs-dim-text">
                        <strong>Communication &amp; Sync</strong>
                        <span class="rvs-dim-desc">Team access &amp; transparency</span>
                      </div>
                    </div>
                  </td>
                  <td class="rvs-cell-retro">
                    <div class="rvs-cell-inner">
                      <span class="rvs-status rvs-yes">
                        <i class="fa-solid fa-check"></i>
                        <span>Direct Slack &amp; WhatsApp Channels</span>
                      </span>
                      <small>Direct access to engineers, daily Git commits, and live interactive staging environments</small>
                    </div>
                  </td>
                  <td class="rvs-cell-typical">
                    <div class="rvs-cell-inner">
                      <span class="rvs-status rvs-no">
                        <i class="fa-solid fa-xmark"></i>
                        <span>Gatekept Account Managers</span>
                      </span>
                      <small>Bureaucratic ticketing queues, communication friction, and lost technical context</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="rvs-cell-dim">
                    <div class="rvs-dim-wrap">
                      <div class="rvs-dim-icon"><i class="fa-solid fa-cubes-stacked"></i></div>
                      <div class="rvs-dim-text">
                        <strong>Architecture Quality</strong>
                        <span class="rvs-dim-desc">Clean code &amp; scalability</span>
                      </div>
                    </div>
                  </td>
                  <td class="rvs-cell-retro">
                    <div class="rvs-cell-inner">
                      <span class="rvs-status rvs-yes">
                        <i class="fa-solid fa-check"></i>
                        <span>Bespoke Microservices &amp; CI/CD</span>
                      </span>
                      <small>Strict linting, automated testing pipelines, and modular scalable software architecture</small>
                    </div>
                  </td>
                  <td class="rvs-cell-typical">
                    <div class="rvs-cell-inner">
                      <span class="rvs-status rvs-no">
                        <i class="fa-solid fa-xmark"></i>
                        <span>Bloated Pre-Made Templates</span>
                      </span>
                      <small>Spaghetti code, heavy third-party plugin bloat, and costly unmaintainable technical debt</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="rvs-cell-dim">
                    <div class="rvs-dim-wrap">
                      <div class="rvs-dim-icon"><i class="fa-solid fa-shield-halved"></i></div>
                      <div class="rvs-dim-text">
                        <strong>Post-Launch SLA</strong>
                        <span class="rvs-dim-desc">Production stability &amp; uptime</span>
                      </div>
                    </div>
                  </td>
                  <td class="rvs-cell-retro">
                    <div class="rvs-cell-inner">
                      <span class="rvs-status rvs-yes">
                        <i class="fa-solid fa-check"></i>
                        <span>Contractual 99.98% Monitored SLA</span>
                      </span>
                      <small>15-minute emergency response protocol, 24/7 APM monitoring, and proactive maintenance</small>
                    </div>
                  </td>
                  <td class="rvs-cell-typical">
                    <div class="rvs-cell-inner">
                      <span class="rvs-status rvs-no">
                        <i class="fa-solid fa-xmark"></i>
                        <span>"Best Effort" &amp; Abandonment</span>
                      </span>
                      <small>Unmonitored servers, delayed incident responses, or complete ghosting post-final invoice</small>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          {{-- Integrated Enterprise Assurance Strip & Action Row --}}
          <div class="rvs-footer-bar">
            <div class="rvs-footer-assurances">
              <span class="rvs-f-item"><i class="fa-solid fa-file-contract"></i> 100% IP Code Handover</span>
              <span class="rvs-f-dot">•</span>
              <span class="rvs-f-item"><i class="fa-solid fa-lock"></i> Strict Mutual NDA</span>
              <span class="rvs-f-dot">•</span>
              <span class="rvs-f-item"><i class="fa-solid fa-chart-line"></i> Zero Lock-In</span>
              <span class="rvs-f-dot">•</span>
              <span class="rvs-f-item"><i class="fa-solid fa-database"></i> Automated Backups</span>
            </div>
            <a href="#contact" class="rvs-footer-btn contact-page-link">
              <span>Experience The Retrotech Standard</span>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- =========================================================================
       6. INDUSTRIES WE SERVE: Specialized Vertical Solutions
       ========================================================================= --}}
  <section class="industries-section" id="industries">
    <div class="bento-container">
      <div class="bento-header" data-anim="down">
        <div class="bento-kicker-badge">
          <span class="bkb-ping"><span class="bkb-ping-dot"></span></span>
          <span class="bkb-text">Specialized Domains</span>
          <span class="bkb-separator">•</span>
          <span class="bkb-sub">Vertical Solutions</span>
        </div>
        <h2 class="bento-heading">
          Tailored Solutions <span class="bento-heading-gradient">for Diverse Industries</span>
        </h2>
        <p class="bento-subtitle">We deliver innovative IT solutions tailored to the unique challenges and goals of businesses across diverse industries.</p>
      </div>

      <div class="ind-slider-viewport" id="indSliderViewport">
        <div class="industries-pro-grid ind-slider-track" id="indSliderTrack">
        {{-- Industry 1 --}}
        <a href="{{ route('industries.show', 'ecommerce-multivendor') }}" class="industry-card-pro" data-anim="left" data-industry-cat="commerce">
          {{-- Image 19: E-Commerce Storefronts --}}
          <div class="icp-img-wrap">
            <img src="{{ asset('assets/images/tech-development/web-development.jpg') }}" alt="E-Commerce &amp; Retail" loading="lazy">
            <div class="icp-img-overlay"></div>
            <span class="icp-img-tag"><i class="fa-solid fa-cart-shopping"></i> E-Commerce</span>
          </div>

          <div class="icp-header">
            <div class="icp-icon-wrap"><i class="fa-solid fa-cart-shopping" aria-hidden="true"></i></div>
            <span class="icp-kpi-badge">+180% Conversions</span>
          </div>
          <h3 class="icp-title">E-Commerce &amp; Retail</h3>
          <p class="icp-desc">High-speed storefronts, headless checkout, multi-vendor marketplaces, and automated inventory sync.</p>
          <div class="icp-tags">
            <span>Headless UI</span>
            <span>Stripe &amp; Razorpay</span>
            <span>WMS Sync</span>
          </div>
          <div class="icp-action-row">
            <span class="icp-action-link">Explore Industry <i class="fa-solid fa-arrow-right"></i></span>
          </div>
        </a>

        {{-- Industry 2 --}}
        <a href="{{ route('industries.show', 'medical-and-healthcare') }}" class="industry-card-pro" data-anim="up" data-industry-cat="fintech">
          {{-- Image 20: Healthcare & Telemedicine --}}
          <div class="icp-img-wrap">
            <picture>
              <source srcset="{{ asset('assets/images/tech-development/mobile-app-development.webp') }}" type="image/webp">
              <img src="{{ asset('assets/images/tech-development/mobile-app-development.jpg') }}" alt="Healthcare &amp; MedTech" loading="lazy" decoding="async">
            </picture>
            <div class="icp-img-overlay"></div>
            <span class="icp-img-tag"><i class="fa-solid fa-heart-pulse"></i> MedTech</span>
          </div>

          <div class="icp-header">
            <div class="icp-icon-wrap"><i class="fa-solid fa-heart-pulse" aria-hidden="true"></i></div>
            <span class="icp-kpi-badge">HIPAA Ready</span>
          </div>
          <h3 class="icp-title">Healthcare &amp; MedTech</h3>
          <p class="icp-desc">HIPAA-compliant telemedicine platforms, patient booking engines, and secure medical EHR synchronization.</p>
          <div class="icp-tags">
            <span>WebRTC Video</span>
            <span>HL7 / FHIR</span>
            <span>Patient CRM</span>
          </div>
          <div class="icp-action-row">
            <span class="icp-action-link">Explore Industry <i class="fa-solid fa-arrow-right"></i></span>
          </div>
        </a>

        {{-- Industry 3 --}}
        <a href="{{ route('industries.show', 'finance-and-insurance') }}" class="industry-card-pro" data-anim="down" data-industry-cat="fintech">
          {{-- Image 21: Banking & FinTech --}}
          <div class="icp-img-wrap">
            <img src="{{ asset('assets/images/enterprise.webp') }}" alt="Banking &amp; FinTech" loading="lazy">
            <div class="icp-img-overlay"></div>
            <span class="icp-img-tag"><i class="fa-solid fa-building-columns"></i> FinTech</span>
          </div>

          <div class="icp-header">
            <div class="icp-icon-wrap"><i class="fa-solid fa-building-columns" aria-hidden="true"></i></div>
            <span class="icp-kpi-badge">&lt; 50ms Pay SLA</span>
          </div>
          <h3 class="icp-title">Banking &amp; FinTech</h3>
          <p class="icp-desc">PCI-DSS compliant payment gateways, micro-lending portals, digital ledgers, and automated KYC/AML verification.</p>
          <div class="icp-tags">
            <span>Double-Entry</span>
            <span>Zero-Trust</span>
            <span>Fraud AI</span>
          </div>
          <div class="icp-action-row">
            <span class="icp-action-link">Explore Industry <i class="fa-solid fa-arrow-right"></i></span>
          </div>
        </a>

        {{-- Industry 4 --}}
        <a href="{{ route('industries.show', 'real-estate-and-construction') }}" class="industry-card-pro" data-anim="right" data-industry-cat="commerce">
          {{-- Image 22: Real Estate & PropTech --}}
          <div class="icp-img-wrap">
            <img src="{{ asset('assets/images/global-locations.jpg') }}" alt="Real Estate &amp; PropTech" loading="lazy">
            <div class="icp-img-overlay"></div>
            <span class="icp-img-tag"><i class="fa-solid fa-city"></i> PropTech</span>
          </div>

          <div class="icp-header">
            <div class="icp-icon-wrap"><i class="fa-solid fa-city" aria-hidden="true"></i></div>
            <span class="icp-kpi-badge">3.4x Leads</span>
          </div>
          <h3 class="icp-title">Real Estate &amp; PropTech</h3>
          <p class="icp-desc">Interactive property search, IDX/MLS integrations, 3D virtual walkthroughs, and automated WhatsApp CRM leads.</p>
          <div class="icp-tags">
            <span>Mapbox GIS</span>
            <span>MLS / IDX Sync</span>
            <span>WhatsApp Bot</span>
          </div>
          <div class="icp-action-row">
            <span class="icp-action-link">Explore Industry <i class="fa-solid fa-arrow-right"></i></span>
          </div>
        </a>

        {{-- Industry 5 --}}
        <a href="{{ route('industries.show', 'edtech-and-e-learning') }}" class="industry-card-pro" data-anim="left" data-industry-cat="enterprise">
          {{-- Image 23: Education & EdTech --}}
          <div class="icp-img-wrap">
            <img src="{{ asset('assets/images/tech-development/saas-application.jpg') }}" alt="Education &amp; EdTech" loading="lazy">
            <div class="icp-img-overlay"></div>
            <span class="icp-img-tag"><i class="fa-solid fa-graduation-cap"></i> EdTech</span>
          </div>

          <div class="icp-header">
            <div class="icp-icon-wrap"><i class="fa-solid fa-graduation-cap" aria-hidden="true"></i></div>
            <span class="icp-kpi-badge">50k+ Concurrent</span>
          </div>
          <h3 class="icp-title">Education &amp; EdTech</h3>
          <p class="icp-desc">Interactive LMS platforms, live streaming virtual classrooms, automated assessments, and learner analytics.</p>
          <div class="icp-tags">
            <span>Video Streaming</span>
            <span>SCORM</span>
            <span>Gamification</span>
          </div>
          <div class="icp-action-row">
            <span class="icp-action-link">Explore Industry <i class="fa-solid fa-arrow-right"></i></span>
          </div>
        </a>

        {{-- Industry 6 --}}
        <a href="{{ route('industries.show', 'other-industries') }}" class="industry-card-pro" data-anim="up" data-industry-cat="enterprise">
          {{-- Image 24: SaaS & Tech Startups --}}
          <div class="icp-img-wrap">
            <img src="{{ asset('assets/images/tech-development/api-development.jpg') }}" alt="SaaS &amp; Tech Startups" loading="lazy">
            <div class="icp-img-overlay"></div>
            <span class="icp-img-tag"><i class="fa-solid fa-rocket"></i> Startups</span>
          </div>

          <div class="icp-header">
            <div class="icp-icon-wrap"><i class="fa-solid fa-rocket" aria-hidden="true"></i></div>
            <span class="icp-kpi-badge">10x Scalability</span>
          </div>
          <h3 class="icp-title">SaaS &amp; Tech Startups</h3>
          <p class="icp-desc">Multi-tenant cloud architectures, usage-based subscription billing, team RBAC, and public API webhooks.</p>
          <div class="icp-tags">
            <span>Multi-Tenant DB</span>
            <span>Stripe Billing</span>
            <span>OpenAPI</span>
          </div>
          <div class="icp-action-row">
            <span class="icp-action-link">Explore Industry <i class="fa-solid fa-arrow-right"></i></span>
          </div>
        </a>

        {{-- Industry 7 --}}
        <a href="{{ route('industries.show', 'manufacturing') }}" class="industry-card-pro" data-anim="down" data-industry-cat="enterprise">
          {{-- Image 25: Manufacturing & Logistics --}}
          <div class="icp-img-wrap">
            <img src="{{ asset('assets/images/it-asset-remarketing.jpg') }}" alt="Manufacturing &amp; Logistics" loading="lazy">
            <div class="icp-img-overlay"></div>
            <span class="icp-img-tag"><i class="fa-solid fa-industry"></i> Logistics</span>
          </div>

          <div class="icp-header">
            <div class="icp-icon-wrap"><i class="fa-solid fa-industry" aria-hidden="true"></i></div>
            <span class="icp-kpi-badge">35% Faster Dispatch</span>
          </div>
          <h3 class="icp-title">Manufacturing &amp; Logistics</h3>
          <p class="icp-desc">Real-time supply chain tracking, fleet telematics, automated warehouse dispatch, and ERP connectivity.</p>
          <div class="icp-tags">
            <span>Fleet GPS</span>
            <span>Barcode &amp; QR</span>
            <span>ERP Sync</span>
          </div>
          <div class="icp-action-row">
            <span class="icp-action-link">Explore Industry <i class="fa-solid fa-arrow-right"></i></span>
          </div>
        </a>

        {{-- Industry 8 --}}
        <a href="{{ route('industries.show', 'travel-and-hospitality') }}" class="industry-card-pro" data-anim="right" data-industry-cat="commerce">
          {{-- Image 26: Travel & Hospitality --}}
          <div class="icp-img-wrap">
            <img src="{{ asset('assets/images/hard-drive-disposal.jpg') }}" alt="Travel &amp; Hospitality" loading="lazy">
            <div class="icp-img-overlay"></div>
            <span class="icp-img-tag"><i class="fa-solid fa-plane-departure"></i> Hospitality</span>
          </div>

          <div class="icp-header">
            <div class="icp-icon-wrap"><i class="fa-solid fa-plane-departure" aria-hidden="true"></i></div>
            <span class="icp-kpi-badge">Real-time Sync</span>
          </div>
          <h3 class="icp-title">Travel &amp; Hospitality</h3>
          <p class="icp-desc">Dynamic reservation engines, itinerary management, GDS sync, multi-currency checkout, and guest messaging.</p>
          <div class="icp-tags">
            <span>GDS / OTA Sync</span>
            <span>Multi-Currency</span>
            <span>Guest WA Bot</span>
          </div>
          <div class="icp-action-row">
            <span class="icp-action-link">Explore Industry <i class="fa-solid fa-arrow-right"></i></span>
          </div>
        </a>
      </div>
    </div>

    {{-- Industry carousel navigation (at bottom of cards) --}}
    <div class="industries-toolbar" data-anim="up">
      <div class="ind-carousel-ctrls">
        <button type="button" class="ind-nav-btn" id="indPrevBtn" aria-label="Previous Domains">
          <i class="fa-solid fa-arrow-left"></i>
        </button>
        <div class="ind-nav-dots" id="indNavDots">
          <button type="button" class="ind-dot active" data-index="0" aria-label="Slide 1"></button>
          <button type="button" class="ind-dot" data-index="1" aria-label="Slide 2"></button>
          <button type="button" class="ind-dot" data-index="2" aria-label="Slide 3"></button>
        </div>
        <button type="button" class="ind-nav-btn" id="indNextBtn" aria-label="Next Domains">
          <i class="fa-solid fa-arrow-right"></i>
        </button>
      </div>
    </div>
  </div>
</section>


  {{-- =========================================================================
       8. TESTIMONIALS SECTION: Trusted by Businesses, Empowered by Results
       ========================================================================= --}}
  @php
      if (!isset($testimonials) || $testimonials->isEmpty()) {
          try {
              $testimonials = \App\Models\Testimonial::latest()->get();
          } catch (\Throwable $e) {
              $testimonials = collect();
          }
      }
      if (!isset($testimonials) || $testimonials->isEmpty()) {
          $testimonials = collect([
              (object)[
                  'id' => 1,
                  'name' => 'Aarav Mehta',
                  'location' => 'Founder & CEO, Zenith Retail • Gurugram',
                  'rating' => 5.0,
                  'content' => 'Retrotech completely redesigned our web platform and integrated automated customer messaging. Our organic traffic and leads jumped by 140% in just 60 days. Truly exceptional engineering!',
                  'image' => null,
              ],
              (object)[
                  'id' => 2,
                  'name' => 'Sarah Jenkins',
                  'location' => 'VP of Engineering, CloudSphere Global • London',
                  'rating' => 5.0,
                  'content' => 'Working with Retrotech on our multi-tenant SaaS architecture was a game changer. The APIs are lightning-fast, secure, and built for immense scale. Seamless collaboration from day one.',
                  'image' => null,
              ],
              (object)[
                  'id' => 3,
                  'name' => 'Vikram Singhania',
                  'location' => 'Managing Director, Apex Logistics • Mumbai',
                  'rating' => 4.9,
                  'content' => 'Their WhatsApp marketing tools and automated bot workflows transformed our sales pipeline. Customer response times dropped from hours to seconds, boosting conversions by over 45%.',
                  'image' => null,
              ],
              (object)[
                  'id' => 4,
                  'name' => 'Priya Sharma',
                  'location' => 'Product Lead, HealthPulse Tech • Bangalore',
                  'rating' => 5.0,
                  'content' => 'The mobile app Retrotech engineered for our healthcare ecosystem is fast, intuitive, and handles 50k+ active users effortlessly. Proactive support and flawless delivery!',
                  'image' => null,
              ],
              (object)[
                  'id' => 5,
                  'name' => 'David Miller',
                  'location' => 'Head of Growth, FinEdge Capital • New York',
                  'rating' => 4.9,
                  'content' => 'Retrotech’s performance marketing and technical SEO strategy helped us secure top rankings for our most lucrative keywords. We experienced a 3x increase in qualified inbound leads.',
                  'image' => null,
              ],
              (object)[
                  'id' => 6,
                  'name' => 'Neha Kapoor',
                  'location' => 'Operations Director, Nexus Systems • Delhi NCR',
                  'rating' => 5.0,
                  'content' => 'From modernizing legacy workflows to custom software integration, Retrotech delivered our complete enterprise portal on schedule with zero downtime. Honest, transparent, and highly skilled!',
                  'image' => null,
              ],
          ]);
      }
  @endphp

  @if($testimonials->isNotEmpty())
  {{-- =========================================================================
       8. SOCIAL PROOF & CUSTOMER EXPERIENCES (2026 World-Class Showcase)
       ========================================================================= --}}
  <section class="testi-showcase-section" id="testimonials" aria-labelledby="testimonials-heading">
    <div class="testi-ambient-glow" aria-hidden="true"></div>

    <div class="testi-inner-container">
      {{-- Section Header --}}
      <div class="testi-header-center" data-anim="down">
        <h2 class="testi-heading-main" id="testimonials-heading">
          Customer Experiences
        </h2>

        <p class="testi-subheading-main">
          That Speak for Themselves
        </p>

        {{-- High-Trust Proof Strip --}}
        <div class="testi-proof-strip" data-anim="up">
          <div class="t-proof-card">
            <span class="t-proof-num">98.6%</span>
            <span class="t-proof-label">Client Retention</span>
          </div>
          <div class="t-proof-divider" aria-hidden="true"></div>
          <div class="t-proof-card">
            <span class="t-proof-num">350+</span>
            <span class="t-proof-label">Projects Delivered</span>
          </div>
          <div class="t-proof-divider" aria-hidden="true"></div>
          <div class="t-proof-card">
            <span class="t-proof-num">140%</span>
            <span class="t-proof-label">Avg. Lead Boost</span>
          </div>
          <div class="t-proof-divider" aria-hidden="true"></div>
          <div class="t-proof-card">
            <span class="t-proof-num">24/7</span>
            <span class="t-proof-label">Dedicated Support</span>
          </div>
        </div>
      </div>

      {{-- Marquee Showcase Stage with Left/Right Gradient Fades & Manual Controls --}}
      <div class="testi-marquee-stage" id="testiStage" data-anim="up">
        <div class="testi-fade-mask testi-fade-left" aria-hidden="true"></div>
        <div class="testi-fade-mask testi-fade-right" aria-hidden="true"></div>

        <div class="testi-marquee-track" id="testiTrack">
          @foreach($testimonials as $index => $t)
            @php
              $rating = (float) $t->rating;
              $servicePills = [
                'Web & UI/UX',
                'SaaS Architecture',
                'WhatsApp Automation',
                'Mobile App (iOS/Android)',
                'SEO & Growth',
                'Custom Software'
              ];
              $impactBadges = [
                '+140% Leads',
                'Zero Downtime',
                '45% Higher Sales',
                '50k+ Active Users',
                '3x Pipeline Growth',
                '100% On Schedule'
              ];
              $servicePill = $servicePills[$index % count($servicePills)];
              $impactBadge = $impactBadges[$index % count($impactBadges)];
              $initial = strtoupper(substr($t->name, 0, 1));
            @endphp
            <div class="testi-card-item">
              <div class="testi-card-box">
                {{-- Background Watermark Quote --}}
                <i class="fa-solid fa-quote-right testi-quote-watermark" aria-hidden="true"></i>

                {{-- Card Header: User Info + Verified Tag --}}
                <div class="testi-card-top">
                  <div class="testi-author-info">
                    @if(!empty($t->image))
                      <img src="{{ asset('storage/' . $t->image) }}" alt="{{ $t->name }}" class="testi-avatar-img" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                      <div class="testi-avatar-initials" style="display: none;">{{ $initial }}</div>
                    @else
                      <div class="testi-avatar-initials">{{ $initial }}</div>
                    @endif
                    <div class="testi-meta">
                      <h3 class="testi-author-name">{{ $t->name }}</h3>
                      @if($t->location)
                        <p class="testi-author-role">{{ $t->location }}</p>
                      @endif
                    </div>
                  </div>

                  <span class="testi-verified-badge">
                    <i class="fa-solid fa-circle-check"></i> Verified
                  </span>
                </div>

                {{-- Rating Stars & Service Pill Row --}}
                <div class="testi-score-row">
                  <div class="testi-stars-group" aria-label="{{ $rating }} out of 5 stars">
                    @for($i = 1; $i <= 5; $i++)
                      @if($i <= floor($rating))
                        <i class="fa-solid fa-star star-filled"></i>
                      @elseif($i - $rating < 1)
                        <i class="fa-solid fa-star-half-stroke star-filled"></i>
                      @else
                        <i class="fa-regular fa-star star-empty"></i>
                      @endif
                    @endfor
                    <span class="testi-score-num">{{ number_format($rating, 1) }}</span>
                  </div>

                  <span class="testi-service-chip">
                    {{ $servicePill }}
                  </span>
                </div>

                {{-- Review Content (Uniform Clamped Height) --}}
                <p class="testi-card-quote">
                  “{{ $t->content }}”
                </p>

                {{-- Card Bottom: Impact Badge --}}
                <div class="testi-card-bottom">
                  <span class="testi-impact-pill">
                    <i class="fa-solid fa-arrow-trend-up"></i> {{ $impactBadge }}
                  </span>
                  <span class="testi-date-hint">Client Partnership</span>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      {{-- Interactive Navigation Controls --}}
      <div class="testi-controls-bar">
        <div class="ind-carousel-ctrls">
          <button type="button" class="ind-nav-btn" id="testiPrevBtn" aria-label="Scroll testimonials left">
            <i class="fa-solid fa-arrow-left"></i>
          </button>
          <div class="ind-nav-dots" id="testiNavDots">
            <button type="button" class="ind-dot active" data-index="0" aria-label="Slide 1"></button>
            <button type="button" class="ind-dot" data-index="1" aria-label="Slide 2"></button>
            <button type="button" class="ind-dot" data-index="2" aria-label="Slide 3"></button>
          </div>
          <button type="button" class="ind-nav-btn" id="testiNextBtn" aria-label="Scroll testimonials right">
            <i class="fa-solid fa-arrow-right"></i>
          </button>
        </div>
      </div>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const stage = document.getElementById('testiStage');
      const track = document.getElementById('testiTrack');
      const prevBtn = document.getElementById('testiPrevBtn');
      const nextBtn = document.getElementById('testiNextBtn');
      const dots = document.querySelectorAll('#testiNavDots .ind-dot');
      if (!stage || !track) return;

      const originals = Array.from(track.children);
      const viewport = stage.clientWidth;
      const setWidth = track.scrollWidth;
      if (!setWidth) return;

      const copies = Math.max(1, Math.ceil(viewport / setWidth) + 1);
      for (let i = 0; i < copies; i++) {
        originals.forEach(el => {
          const clone = el.cloneNode(true);
          clone.setAttribute('aria-hidden', 'true');
          track.appendChild(clone);
        });
      }

      const distance = setWidth;
      track.style.setProperty('--testi-scroll-distance', distance + 'px');
      track.style.setProperty('--testi-scroll-duration', Math.max(30, (distance / 42)) + 's');
      track.classList.add('is-animated');

      let currentTestiDot = 0;
      const updateTestiDots = (idx) => {
        if (!dots.length) return;
        currentTestiDot = Math.max(0, Math.min(idx, dots.length - 1));
        dots.forEach((d, i) => d.classList.toggle('active', i === currentTestiDot));
        if (prevBtn) prevBtn.disabled = currentTestiDot === 0;
        if (nextBtn) nextBtn.disabled = currentTestiDot === dots.length - 1;
      };
      updateTestiDots(0);

      if (prevBtn) {
        prevBtn.addEventListener('click', function () {
          if (currentTestiDot > 0) {
            stage.scrollBy({ left: -390, behavior: 'smooth' });
            updateTestiDots(currentTestiDot - 1);
          }
        });
      }
      if (nextBtn) {
        nextBtn.addEventListener('click', function () {
          if (currentTestiDot < dots.length - 1) {
            stage.scrollBy({ left: 390, behavior: 'smooth' });
            updateTestiDots(currentTestiDot + 1);
          }
        });
      }
      dots.forEach((dot, idx) => {
        dot.addEventListener('click', function () {
          stage.scrollTo({ left: idx * 390, behavior: 'smooth' });
          updateTestiDots(idx);
        });
      });
    });
  </script>
  @endif

  {{-- =========================================================================
       9. FREQUENTLY ASKED QUESTIONS (Split Support Canvas)
       ========================================================================= --}}
  <section class="faq-section-home" id="faqs">
    <div class="bento-container">
      <div class="faq-split-layout">
        {{-- Left Sticky Support Desk Card --}}
        <div class="faq-help-desk">
          <h2 class="faq-main-title">
            Get Answers to <span class="bento-heading-gradient">Common Queries</span>
          </h2>
          <p class="faq-main-subtitle">
            Clear answers to help you understand our services, engineering processes, and project commitments.
          </p>

          <div class="faq-help-card">
            <div class="fhc-header">
              <div class="fhc-avatar-pulse">
                <i class="fa-solid fa-headset"></i>
                <span class="fhc-online-dot"></span>
              </div>
              <div class="fhc-meta">
                <h4 class="fhc-title">Have a specific question?</h4>
                <p class="fhc-sub">Solutions Lead is online now</p>
              </div>
            </div>
            <p class="fhc-desc">Speak directly with our technical team to discuss project feasibility, scope estimates, and custom architectures.</p>
            <div class="fhc-actions">
              <a href="https://wa.me/919999999999" target="_blank" rel="noopener noreferrer" class="fhc-wa-btn">
                <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp
              </a>
              <a href="#contact" class="fhc-link-btn contact-page-link">
                Leave a Project Inquiry →
              </a>
            </div>
            <div class="fhc-trust-list">
              <span><i class="fa-solid fa-circle-check"></i> 100% IP Code Ownership</span>
              <span><i class="fa-solid fa-circle-check"></i> Mutual NDA on Request</span>
            </div>
          </div>
        </div>

        {{-- Right Accordion Stack --}}
        <div class="faq-accordion-group">
          <details class="faq-acc-item" name="homepage-faqs">
            <summary class="faq-acc-summary">
              <div class="faq-acc-meta">
                <span class="faq-category-tag">SERVICES SCOPE</span>
                <h3 class="faq-acc-q">What IT services does your company provide?</h3>
              </div>
              <span class="faq-acc-icon" aria-hidden="true"><i class="fa-solid fa-plus"></i></span>
            </summary>
            <div class="faq-acc-content">
              <p>Retrotech provides 360° IT and digital solutions including custom Website Development, Mobile App Development, Enterprise Software, SaaS Products, SEO, Paid Marketing, and WhatsApp Marketing Automation.</p>
            </div>
          </details>

          <details class="faq-acc-item" name="homepage-faqs">
            <summary class="faq-acc-summary">
              <div class="faq-acc-meta">
                <span class="faq-category-tag">TAILORED SOLUTIONS</span>
                <h3 class="faq-acc-q">Do you provide customized solutions for businesses?</h3>
              </div>
              <span class="faq-acc-icon" aria-hidden="true"><i class="fa-solid fa-plus"></i></span>
            </summary>
            <div class="faq-acc-content">
              <p>Yes. We create customized websites, applications, and digital platforms that match your unique business workflows, branding guidelines, and long-term scaling objectives.</p>
            </div>
          </details>

          <details class="faq-acc-item" name="homepage-faqs">
            <summary class="faq-acc-summary">
              <div class="faq-acc-meta">
                <span class="faq-category-tag">TIMELINE &amp; SPRINT</span>
                <h3 class="faq-acc-q">How long does it take to complete an IT project?</h3>
              </div>
              <span class="faq-acc-icon" aria-hidden="true"><i class="fa-solid fa-plus"></i></span>
            </summary>
            <div class="faq-acc-content">
              <p>Project timelines depend on the scope and complexity. Standard business websites typically launch in 2 to 4 weeks, while custom web applications, mobile apps, or enterprise SaaS platforms follow agile sprint milestones ranging from 6 to 12 weeks.</p>
            </div>
          </details>

          <details class="faq-acc-item" name="homepage-faqs">
            <summary class="faq-acc-summary">
              <div class="faq-acc-meta">
                <span class="faq-category-tag">POST-LAUNCH SLA</span>
                <h3 class="faq-acc-q">Do you provide support after the project is completed?</h3>
              </div>
              <span class="faq-acc-icon" aria-hidden="true"><i class="fa-solid fa-plus"></i></span>
            </summary>
            <div class="faq-acc-content">
              <p>Yes, we provide dedicated post-launch support, ongoing maintenance, performance optimization, security monitoring, and scaling assistance so your digital product continues to run smoothly.</p>
            </div>
          </details>

          <details class="faq-acc-item" name="homepage-faqs">
            <summary class="faq-acc-summary">
              <div class="faq-acc-meta">
                <span class="faq-category-tag">IP &amp; SECURITY</span>
                <h3 class="faq-acc-q">Who owns the source code and intellectual property?</h3>
              </div>
              <span class="faq-acc-icon" aria-hidden="true"><i class="fa-solid fa-plus"></i></span>
            </summary>
            <div class="faq-acc-content">
              <p>You retain 100% full intellectual property (IP) and source code ownership upon project completion and milestone handover. We provide clean Git repositories, complete documentation, and zero proprietary lock-in.</p>
            </div>
          </details>

          <details class="faq-acc-item" name="homepage-faqs">
            <summary class="faq-acc-summary">
              <div class="faq-acc-meta">
                <span class="faq-category-tag">TECH STACK</span>
                <h3 class="faq-acc-q">What technologies and frameworks do you specialize in?</h3>
              </div>
              <span class="faq-acc-icon" aria-hidden="true"><i class="fa-solid fa-plus"></i></span>
            </summary>
            <div class="faq-acc-content">
              <p>We work with modern, high-performance tech stacks: Laravel 11, React 19, Vue.js, Node.js, Python, Flutter, React Native, Swift, Redis, PostgreSQL, MySQL, Docker, and AWS / Cloudflare edge infrastructure.</p>
            </div>
          </details>
        </div>
      </div>
    </div>
  </section>

  {{-- =========================================================================
       10. FROM THE BLOG: Check Out Latest News Updates & Articles
       ========================================================================= --}}
  @php
      try {
          $recentPosts = \App\Models\BlogPost::where('is_published', true)->latest('published_at')->take(3)->get();
      } catch (\Throwable $e) {
          $recentPosts = collect();
      }
  @endphp

  @if($recentPosts->isNotEmpty())
  @php
      $blogImageFallbacks = [
          asset('assets/images/it-asset-management.jpg'),
          asset('assets/images/data-center-decommissioning.jpg'),
          asset('assets/images/it-data-destruction.jpg'),
      ];
      $usedBlogImages = [];
  @endphp
  <section class="home-blog-section" id="blog">
    <div class="bento-container">
      <div class="bento-header" data-anim="down">
        <div class="bento-kicker-badge">
          <span class="bkb-ping"><span class="bkb-ping-dot"></span></span>
          <span class="bkb-text">Engineering &amp; Growth Insights</span>
          <span class="bkb-separator">•</span>
          <span class="bkb-sub">Articles</span>
        </div>
        <h2 class="bento-heading">
          Check Out Latest <span class="bento-heading-gradient">News &amp; Articles</span>
        </h2>
        <p class="bento-subtitle">Insights, technological trends, and strategic perspectives from our digital engineering team.</p>
      </div>

      <div class="home-blog-pro-grid">
        @foreach($recentPosts as $post)
          @php
            $wordCount = str_word_count(strip_tags($post->content ?? ''));
            $readTime = max(3, ceil($wordCount / 200));
            $blogImageFallback = $blogImageFallbacks[$loop->index % count($blogImageFallbacks)];
            $blogImage = $post->image_url;
            if (empty($post->image_path) || in_array($blogImage, $usedBlogImages, true)) {
                $blogImage = $blogImageFallback;
            }
            $usedBlogImages[] = $blogImage;
          @endphp
          <article class="home-blog-card-pro" data-anim="up">
            <div class="hbcp-img-wrap">
              <img src="{{ $blogImage }}" alt="{{ $post->title }}" loading="lazy" onerror="this.onerror=null; this.src='{{ $blogImageFallback }}';">
              <span class="hbcp-read-badge"><i class="fa-regular fa-clock"></i> {{ $readTime }} min read</span>
            </div>
            <div class="hbcp-body">
              <div class="hbcp-meta-row">
                <span class="hbcp-cat">{{ $post->category ?: 'TECH & INSIGHTS' }}</span>
                @if($post->published_at)
                  <span class="hbcp-date">{{ $post->published_at->format('M d, Y') }}</span>
                @endif
              </div>
              <h3 class="hbcp-title">
                <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
              </h3>
              <p class="hbcp-excerpt">{{ Str::limit($post->excerpt ?: strip_tags($post->content), 120) }}</p>
              <div class="hbcp-footer">
                <a href="{{ route('blog.show', $post->slug) }}" class="hbcp-link">
                  <span>Read Article</span>
                  <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </section>
  @endif

@endsection
