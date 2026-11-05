@extends('layouts.app')

@section('title', 'About Us - Retrotech | 360° IT, AI & Digital Solutions Company')
@section('description', 'Learn about Retrotech: A premier 360° IT and Digital Solutions Company delivering bespoke Web Development, Mobile Apps, SaaS Platforms, Cloud Architecture, and WhatsApp Marketing Automation.')

@section('content')
  <main class="about-page-main">

    {{-- =========================================================================
         1. ABOUT HERO BANNER: 360° Digital Leadership & Proven Metrics
         ========================================================================= --}}
    <section class="about-hero-section" id="about-hero">
      <div class="about-hero-ambient-glow" aria-hidden="true"></div>

      <div class="bento-container">
        {{-- Breadcrumb Nav --}}
        <nav class="about-breadcrumb" aria-label="Breadcrumb">
          <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Home</a>
          <span class="ab-sep">/</span>
          <span class="ab-current">About Us</span>
        </nav>

        <div class="about-hero-header">
          <div class="bento-kicker-badge">
            <span class="bkb-ping"><span class="bkb-ping-dot"></span></span>
            <span class="bkb-text">Architected For Scalability</span>
            <span class="bkb-separator">•</span>
            <span class="bkb-sub">Founded in Gurugram, Scaling Globally</span>
          </div>

          <h1 class="about-hero-title">
            Pioneering 360° Digital Solutions <br>
            <span class="bento-heading-gradient">&amp; Software Engineering Excellence</span>
          </h1>

          <p class="about-hero-subtitle">
            We are a <strong>360° IT and Digital Solutions Company</strong> dedicated to empowering ambitious businesses, startups, and enterprises. We unite bespoke web and mobile engineering, custom SaaS architectures, and automated WhatsApp marketing engines to turn technology into measurable enterprise valuation.
          </p>

          <div class="about-hero-actions">
            <a href="#contact" class="about-btn-primary contact-page-link">
              <span>Connect with Our Technical Team</span>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a href="{{ route('home') }}#services" class="about-btn-secondary">
              <span>Explore 7 Core Disciplines</span>
              <i class="fa-solid fa-shapes"></i>
            </a>
          </div>
        </div>

        {{-- Executive Proof Ribbon --}}
        <div class="about-proof-ribbon" data-anim="up">
          <div class="apr-item">
            <span class="apr-val">10<span class="apr-plus">+</span></span>
            <span class="apr-lbl">Years Industry Experience</span>
          </div>
          <div class="apr-sep" aria-hidden="true"></div>
          <div class="apr-item">
            <span class="apr-val">350<span class="apr-plus">+</span></span>
            <span class="apr-lbl">Projects Delivered Worldwide</span>
          </div>
          <div class="apr-sep" aria-hidden="true"></div>
          <div class="apr-item">
            <span class="apr-val">100<span class="apr-plus">%</span></span>
            <span class="apr-lbl">IP Code Ownership Handover</span>
          </div>
          <div class="apr-sep" aria-hidden="true"></div>
          <div class="apr-item">
            <span class="apr-val">98.6<span class="apr-plus">%</span></span>
            <span class="apr-lbl">Client Retention Rate</span>
          </div>
          <div class="apr-sep" aria-hidden="true"></div>
          <div class="apr-item">
            <span class="apr-val">99.98<span class="apr-plus">%</span></span>
            <span class="apr-lbl">Monitored Production SLA</span>
          </div>
        </div>
      </div>
    </section>

    {{-- =========================================================================
         2. THE RETROTECH MANIFESTO: Culture, Mission & Vision Split Canvas
         ========================================================================= --}}
    <section class="about-manifesto-section" id="manifesto">
      <div class="bento-container">
        <div class="about-split-canvas">

          {{-- Left: Visual Culture Card with Image --}}
          <div class="about-culture-card" data-anim="left">
            <div class="acc-bg-image-wrap">
              <img src="{{ asset('assets/images/process-2.jpg') }}" alt="Retrotech Engineering &amp; Creative Team" loading="lazy">
              <div class="acc-gradient-overlay" aria-hidden="true"></div>
            </div>

            <div class="acc-content-wrap">
              <div class="acc-top-badge">
                <span class="acc-pulse-dot" aria-hidden="true"></span>
                <span>Engineering Collective • Gurugram &amp; Global</span>
              </div>

              <blockquote class="acc-quote">
                “We don't just write code; we build high-performance digital engines that give ambitious founders and growing enterprises an unfair market advantage.”
              </blockquote>

              <div class="acc-author-bar">
                <div class="acc-author-meta">
                  <span class="acc-author-title">The Retrotech Standard</span>
                  <span class="acc-author-sub">Senior Architects • Full-Stack Engineers • UI/UX Designers</span>
                </div>
                <div class="acc-stat-pill">
                  <i class="fa-solid fa-code"></i> L5+ Senior Devs
                </div>
              </div>
            </div>
          </div>

          {{-- Right: Mission, Vision & 360° Philosophy --}}
          <div class="about-pillars-stack" data-anim="right">
            <div class="manifesto-card">
              <div class="mc-icon"><i class="fa-solid fa-bullseye"></i></div>
              <div class="mc-content">
                <span class="mc-tag">OUR CORE MISSION</span>
                <h2 class="mc-title">Eliminating Friction, Accelerating Enterprise Growth</h2>
                <p class="mc-desc">
                  To empower modern enterprises with clean, uncompromised technology. We replace sluggish, fragmented software with unified web platforms, lightning-fast mobile apps, scalable SaaS microservices, and conversational WhatsApp funnels that convert visitors into loyal customers.
                </p>
                <div class="mc-chips">
                  <span><i class="fa-solid fa-check"></i> Zero Technical Debt</span>
                  <span><i class="fa-solid fa-check"></i> 100% Bespoke Code</span>
                  <span><i class="fa-solid fa-check"></i> Transparent Sprint Delivery</span>
                </div>
              </div>
            </div>

            <div class="manifesto-card">
              <div class="mc-icon mc-icon-vision"><i class="fa-solid fa-eye"></i></div>
              <div class="mc-content">
                <span class="mc-tag">OUR LONG-TERM VISION</span>
                <h2 class="mc-title">Setting the Benchmark for 360° IT Solutions</h2>
                <p class="mc-desc">
                  To be the global technology partner of choice for ambitious companies scaling from startup to industry leader. We envision a future where high-grade software engineering, AI automation, and customer acquisition operate as a singular, frictionless growth engine.
                </p>
                <div class="mc-chips">
                  <span><i class="fa-solid fa-check"></i> Global Scalability</span>
                  <span><i class="fa-solid fa-check"></i> AI-Powered Automation</span>
                  <span><i class="fa-solid fa-check"></i> Zero Vendor Lock-In</span>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    {{-- =========================================================================
         3. CORE VALUES & ENGINEERING PRINCIPLES (Bento Grid)
         ========================================================================= --}}
    <section class="about-values-section" id="core-values">
      <div class="bento-container">
        <div class="bento-header" data-anim="down">
          <div class="bento-kicker-badge">
            <span class="bkb-ping"><span class="bkb-ping-dot"></span></span>
            <span class="bkb-text">Our Guiding North Star</span>
            <span class="bkb-separator">•</span>
            <span class="bkb-sub">Why We Build Differently</span>
          </div>
          <h2 class="bento-heading">
            Engineering Principles <span class="bento-heading-gradient">That Set Us Apart</span>
          </h2>
          <p class="bento-subtitle">We believe exceptional software requires exceptional discipline, total transparency, and unwavering focus on business results.</p>
        </div>

        <div class="values-bento-grid">
          {{-- Value 1 --}}
          <div class="value-card" data-anim="left">
            <div class="vc-top">
              <span class="vc-num">01</span>
              <div class="vc-icon"><i class="fa-solid fa-file-contract"></i></div>
            </div>
            <h3 class="vc-title">100% IP Code Ownership</h3>
            <p class="vc-desc">You retain full, uncompromised intellectual property rights from Day 1. Complete Git repository access, zero hidden licensing fees, and zero vendor lock-in traps.</p>
            <div class="vc-footer">
              <i class="fa-solid fa-circle-check"></i> Clean Repositories Handover
            </div>
          </div>

          {{-- Value 2 --}}
          <div class="value-card" data-anim="up">
            <div class="vc-top">
              <span class="vc-num">02</span>
              <div class="vc-icon"><i class="fa-solid fa-user-astronaut"></i></div>
            </div>
            <h3 class="vc-title">Senior L5+ Architects Only</h3>
            <p class="vc-desc">Zero bait-and-switch. Your digital products are engineered by seasoned architects with proven track records building high-traffic, mission-critical systems.</p>
            <div class="vc-footer">
              <i class="fa-solid fa-circle-check"></i> 10+ Years Avg Senior Experience
            </div>
          </div>

          {{-- Value 3 --}}
          <div class="value-card" data-anim="right">
            <div class="vc-top">
              <span class="vc-num">03</span>
              <div class="vc-icon"><i class="fa-solid fa-bolt"></i></div>
            </div>
            <h3 class="vc-title">2-Week Agile Sprints</h3>
            <p class="vc-desc">We work in focused bi-weekly milestones with live staging demos. You see real progress continuously, eliminating unpleasant surprises and deadline delays.</p>
            <div class="vc-footer">
              <i class="fa-solid fa-circle-check"></i> Automated CI/CD Staging
            </div>
          </div>

          {{-- Value 4 --}}
          <div class="value-card" data-anim="left">
            <div class="vc-top">
              <span class="vc-num">04</span>
              <div class="vc-icon"><i class="fa-solid fa-shield-halved"></i></div>
            </div>
            <h3 class="vc-title">Bank-Grade Zero-Trust Security</h3>
            <p class="vc-desc">Every line of code is written with security in mind. AES-256 data encryption, role-based access control, secure SSL, and full SOC2 / GDPR compliance readiness.</p>
            <div class="vc-footer">
              <i class="fa-solid fa-circle-check"></i> SOC2 &amp; GDPR Ready Vaults
            </div>
          </div>

          {{-- Value 5 --}}
          <div class="value-card" data-anim="up">
            <div class="vc-top">
              <span class="vc-num">05</span>
              <div class="vc-icon"><i class="fa-solid fa-comments"></i></div>
            </div>
            <h3 class="vc-title">Direct Dev Sync via Slack &amp; WhatsApp</h3>
            <p class="vc-desc">No frustrating gatekept account managers or endless email chains. You get direct Slack and WhatsApp channels with the senior engineers writing your code.</p>
            <div class="vc-footer">
              <i class="fa-solid fa-circle-check"></i> Real-time Engineering Sync
            </div>
          </div>

          {{-- Value 6 --}}
          <div class="value-card" data-anim="right">
            <div class="vc-top">
              <span class="vc-num">06</span>
              <div class="vc-icon"><i class="fa-solid fa-headset"></i></div>
            </div>
            <h3 class="vc-title">99.98% Monitored Uptime SLA</h3>
            <p class="vc-desc">We stand by our work post-launch. Continuous 24/7 APM heartbeat monitoring, automated error logging, and a guaranteed 15-minute emergency response protocol.</p>
            <div class="vc-footer">
              <i class="fa-solid fa-circle-check"></i> 15-Minute Emergency Response
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- =========================================================================
         4. OUR 10-YEAR GROWTH JOURNEY (Interactive Timeline)
         ========================================================================= --}}
    <section class="about-timeline-section" id="timeline">
      <div class="bento-container">
        <div class="bento-header" data-anim="down">
          <div class="bento-kicker-badge">
            <span class="bkb-ping"><span class="bkb-ping-dot"></span></span>
            <span class="bkb-text">Continuous Evolution</span>
            <span class="bkb-separator">•</span>
            <span class="bkb-sub">10-Year Track Record</span>
          </div>
          <h2 class="bento-heading">
            Our Journey <span class="bento-heading-gradient">from Inception to Global Impact</span>
          </h2>
          <p class="bento-subtitle">A decade of engineering breakthroughs, relentless innovation, and trusted enterprise partnerships.</p>
        </div>

        <div class="timeline-track-wrap">
          {{-- Milestone 1 --}}
          <div class="timeline-node" data-anim="up">
            <div class="tn-year-badge">2016</div>
            <div class="tn-content-card">
              <span class="tn-kicker"><i class="fa-solid fa-seedling"></i> THE INCEPTION</span>
              <h3 class="tn-title">Founding in Gurugram</h3>
              <p class="tn-desc">Retrotech was founded in DLF Phase 1, Gurugram, with a core mission: replacing slow, unreliable web agencies with disciplined, high-speed software engineering.</p>
              <div class="tn-stat">10+ Founding Clients</div>
            </div>
          </div>

          {{-- Milestone 2 --}}
          <div class="timeline-node" data-anim="up">
            <div class="tn-year-badge">2019</div>
            <div class="tn-content-card">
              <span class="tn-kicker"><i class="fa-solid fa-mobile-screen"></i> MOBILE &amp; CLOUD EXPANSION</span>
              <h3 class="tn-title">Native Apps &amp; AWS DevOps</h3>
              <p class="tn-desc">Expanded into cross-platform mobile app development (Flutter, React Native, Swift) and containerized AWS cloud infrastructure to support hyper-growth startups.</p>
              <div class="tn-stat">100+ Shipped Products</div>
            </div>
          </div>

          {{-- Milestone 3 --}}
          <div class="timeline-node" data-anim="up">
            <div class="tn-year-badge">2022</div>
            <div class="tn-content-card">
              <span class="tn-kicker"><i class="fa-brands fa-whatsapp"></i> AUTOMATION &amp; SAAS</span>
              <h3 class="tn-title">Conversational WhatsApp Engines</h3>
              <p class="tn-desc">Pioneered automated WhatsApp marketing APIs and multi-tenant SaaS tools, enabling clients to drive 140%+ surges in lead conversions and automated revenue.</p>
              <div class="tn-stat">1M+ Messages Processed Daily</div>
            </div>
          </div>

          {{-- Milestone 4 --}}
          <div class="timeline-node" data-anim="up">
            <div class="tn-year-badge">2026</div>
            <div class="tn-content-card tn-content-current">
              <span class="tn-kicker"><i class="fa-solid fa-globe"></i> 360° GLOBAL SOLUTIONS</span>
              <h3 class="tn-title">Global Enterprise Scale</h3>
              <p class="tn-desc">Today, Retrotech is a trusted 360° IT, AI &amp; digital solutions powerhouse serving 350+ enterprises and startups across India, the United States, UK, and the Middle East.</p>
              <div class="tn-stat tn-stat-accent">350+ Global Partnerships</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- =========================================================================
         5. 360° CAPABILITIES OVERVIEW: Visual Discipline Cards
         ========================================================================= --}}
    <section class="about-capabilities-section" id="capabilities">
      <div class="bento-container">
        <div class="bento-header" data-anim="down">
          <div class="bento-kicker-badge">
            <span class="bkb-ping"><span class="bkb-ping-dot"></span></span>
            <span class="bkb-text">Full-Spectrum Suite</span>
            <span class="bkb-separator">•</span>
            <span class="bkb-sub">End-to-End Execution</span>
          </div>
          <h2 class="bento-heading">
            Our 360° <span class="bento-heading-gradient">Engineering &amp; Growth Disciplines</span>
          </h2>
          <p class="bento-subtitle">Everything you need to conceptualize, design, launch, and scale digital market leaders under one roof.</p>
        </div>

        <div class="capabilities-grid">
          {{-- Discipline 1 --}}
          <div class="cap-card" data-anim="up">
            <div class="cap-img-wrap">
              <img src="{{ asset('assets/images/tech-development/web-development.jpg') }}" alt="Web Development" loading="lazy">
              <div class="cap-overlay"></div>
              <span class="cap-badge"><i class="fa-solid fa-code"></i> Web Architecture</span>
            </div>
            <div class="cap-body">
              <h3 class="cap-title">Web Development</h3>
              <p class="cap-desc">Custom web platforms, headless storefronts, and ultra-fast web apps engineered with Laravel 11, React 19, and Next.js.</p>
              <a href="{{ route('tech-development.show', ['slug' => 'web-development']) }}" class="cap-link">
                <span>Explore Discipline</span> <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          {{-- Discipline 2 --}}
          <div class="cap-card" data-anim="up">
            <div class="cap-img-wrap">
              <img src="{{ asset('assets/images/tech-development/mobile-app-development.jpg') }}" alt="Mobile App Development" loading="lazy">
              <div class="cap-overlay"></div>
              <span class="cap-badge"><i class="fa-solid fa-mobile-screen"></i> iOS &amp; Android</span>
            </div>
            <div class="cap-body">
              <h3 class="cap-title">Mobile App Development</h3>
              <p class="cap-desc">Intuitive, high-performance native and cross-platform apps built with Flutter, React Native, and Swift for seamless UX.</p>
              <a href="{{ route('tech-development.show', ['slug' => 'mobile-app-development']) }}" class="cap-link">
                <span>Explore Discipline</span> <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          {{-- Discipline 3 --}}
          <div class="cap-card" data-anim="up">
            <div class="cap-img-wrap">
              <img src="{{ asset('assets/images/tech-development/saas-application.jpg') }}" alt="SaaS Application Development" loading="lazy">
              <div class="cap-overlay"></div>
              <span class="cap-badge"><i class="fa-solid fa-cloud"></i> Multi-Tenant</span>
            </div>
            <div class="cap-body">
              <h3 class="cap-title">Custom SaaS Products</h3>
              <p class="cap-desc">Scalable multi-tenant architectures, automated billing integrations, database isolation, and high-concurrency microservices.</p>
              <a href="{{ route('tech-development.show', ['slug' => 'saas-application']) }}" class="cap-link">
                <span>Explore Discipline</span> <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          {{-- Discipline 4 --}}
          <div class="cap-card" data-anim="up">
            <div class="cap-img-wrap">
              <img src="{{ asset('assets/images/tech-development/whatsapp-integration.jpg') }}" alt="WhatsApp Automation" loading="lazy">
              <div class="cap-overlay"></div>
              <span class="cap-badge"><i class="fa-brands fa-whatsapp"></i> Conversational AI</span>
            </div>
            <div class="cap-body">
              <h3 class="cap-title">WhatsApp Marketing Automation</h3>
              <p class="cap-desc">Official WhatsApp Cloud API integrations, automated lead capture, broadcast marketing, and interactive chatbot workflows.</p>
              <a href="{{ route('tech-development.show', ['slug' => 'whatsapp-integration']) }}" class="cap-link">
                <span>Explore Discipline</span> <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          {{-- Discipline 5 --}}
          <div class="cap-card" data-anim="up">
            <div class="cap-img-wrap">
              <img src="{{ asset('assets/images/tech-development/api-development.jpg') }}" alt="API &amp; Microservices" loading="lazy">
              <div class="cap-overlay"></div>
              <span class="cap-badge"><i class="fa-solid fa-network-wired"></i> Zero-Trust APIs</span>
            </div>
            <div class="cap-body">
              <h3 class="cap-title">API &amp; Cloud Integration</h3>
              <p class="cap-desc">High-throughput REST and GraphQL APIs connecting payment gateways, ERP systems, third-party databases, and microservices.</p>
              <a href="{{ route('tech-development.show', ['slug' => 'api-development']) }}" class="cap-link">
                <span>Explore Discipline</span> <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          {{-- Discipline 6 --}}
          <div class="cap-card" data-anim="up">
            <div class="cap-img-wrap">
              <img src="{{ asset('assets/images/tech-development/crm-development.jpg') }}" alt="CRM &amp; ERP Workflows" loading="lazy">
              <div class="cap-overlay"></div>
              <span class="cap-badge"><i class="fa-solid fa-gears"></i> Business Automation</span>
            </div>
            <div class="cap-body">
              <h3 class="cap-title">CRM &amp; ERP Solutions</h3>
              <p class="cap-desc">Custom business workflow management, sales pipelines, inventory automation, and internal tool dashboards tailored to your processes.</p>
              <a href="{{ route('tech-development.show', ['slug' => 'crm-development']) }}" class="cap-link">
                <span>Explore Discipline</span> <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- =========================================================================
         6. ENTERPRISE ASSURANCE BAR
         ========================================================================= --}}
    <section class="about-assurance-section">
      <div class="bento-container">
        <div class="why-assurance-bar" data-anim="up">
          <div class="w-assure-item">
            <i class="fa-solid fa-file-contract"></i>
            <span>100% IP Code Ownership Handover</span>
          </div>
          <div class="w-assure-sep"></div>
          <div class="w-assure-item">
            <i class="fa-solid fa-lock"></i>
            <span>Signed Strict Mutual NDA</span>
          </div>
          <div class="w-assure-sep"></div>
          <div class="w-assure-item">
            <i class="fa-solid fa-chart-line"></i>
            <span>Zero Vendor Lock-In Guarantee</span>
          </div>
          <div class="w-assure-sep"></div>
          <div class="w-assure-item">
            <i class="fa-solid fa-database"></i>
            <span>Daily Automated Cloud Backups</span>
          </div>
        </div>
      </div>
    </section>

  </main>
@endsection
