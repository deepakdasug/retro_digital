@extends('layouts.app')

@section('title', 'Retrotech - Business Made Easy | 360° IT, AI & Digital Solutions')
@section('description', 'Grow your business and boost revenue by engaging customers, automating messages, and selling smarter through WhatsApp marketing tools, web development, and custom software.')

@section('content')

  {{-- =========================================================================
       1. HERO SECTION: Business Made Easy with Retrotech
       ========================================================================= --}}
  <main class="hero-section" id="home">
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
          <a href="#services" class="hero-secondary-btn">
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

      <h2 class="redefining-heading" data-anim="down">
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



      {{-- 2026 Deeply Considered Split Canvas: Culture Manifesto + 6 Pillars Grid --}}
      <div class="about-split-canvas">
        
        {{-- Left Column: Creative Team Manifesto & Culture Card --}}
        <div class="about-culture-card" data-anim="left">
          <div class="acc-bg-image-wrap">
            <img src="{{ asset('assets/images/process-2.jpg') }}" alt="Retrotech Creative & Engineering Team" loading="lazy">
            <div class="acc-gradient-overlay" aria-hidden="true"></div>
          </div>

          <div class="acc-content-wrap">
            <div class="acc-top-badge">
              <span class="acc-pulse-dot" aria-hidden="true"></span>
              <span>The Retrotech Collective</span>
            </div>

            <div class="acc-team-stat">
              <span class="acc-team-dot"></span>
              <span>48 In-House Senior Engineers • Delhi NCR &amp; Global Hub</span>
            </div>

            <div class="acc-quote-box">
              <i class="fa-solid fa-quote-left acc-quote-icon" aria-hidden="true"></i>
              <blockquote class="acc-quote-text">
                “We are web designers, developers, project managers, and digital marketing professionals dedicated to creative solutions using the latest trends.”
              </blockquote>
            </div>

            <div class="acc-bottom-highlights">
              <div class="acc-highlight-item">
                <span class="acc-hl-icon"><i class="fa-solid fa-wand-magic-sparkles"></i></span>
                <div>
                  <strong>Creative &amp; Strategic</strong>
                  <small>Human-centric UI/UX and brand storytelling</small>
                </div>
              </div>
              <div class="acc-highlight-item">
                <span class="acc-hl-icon"><i class="fa-solid fa-microchip"></i></span>
                <div>
                  <strong>Future-Ready Code</strong>
                  <small>Modern frameworks, microservices &amp; AI</small>
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Right Column: 6 Core Pillars Grid --}}
        <div class="about-pillars-mosaic">
          
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

          {{-- Pillar 05 --}}
          <div class="pillar-tile-item" data-anim="right">
            <div class="pti-thumb-wrap">
              <img src="{{ asset('assets/images/tech-development/saas-application.jpg') }}" alt="Verified Expertise" loading="lazy">
              <span class="pti-number">05</span>
            </div>
            <div class="pti-content">
              <div class="pti-header">
                <span class="pti-icon"><i class="fa-solid fa-certificate"></i></span>
                <h3 class="pti-title">Verified Expertise</h3>
              </div>
              <p class="pti-desc">Senior full-stack developers, certified cloud architects, and battle-tested industry standards delivering clean, maintainable systems.</p>
              <div class="pti-kpi"><i class="fa-solid fa-award"></i> Top 1% Senior Engineers</div>
            </div>
          </div>

          {{-- Pillar 06 --}}
          <div class="pillar-tile-item" data-anim="up">
            <div class="pti-thumb-wrap">
              <img src="{{ asset('assets/images/tech-development/software-development.jpg') }}" alt="Always Honest" loading="lazy">
              <span class="pti-number">06</span>
            </div>
            <div class="pti-content">
              <div class="pti-header">
                <span class="pti-icon"><i class="fa-solid fa-handshake-angle"></i></span>
                <h3 class="pti-title">Always Honest</h3>
              </div>
              <p class="pti-desc">100% transparent pricing with zero hidden surprises, open communication, and dependable project delivery that builds enduring trust.</p>
              <div class="pti-kpi"><i class="fa-solid fa-shield-halved"></i> Zero Vendor Lock-In</div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

  {{-- =========================================================================
       4. SERVICES SECTION: Your Business Growth Through IT Solutions (Bento Grid)
       ========================================================================= --}}
  <section class="bento-services-section" id="services">
    <!-- Spatial Mesh & Ambient Aurora -->
    <div class="bento-mesh-canvas"></div>
    <div class="bento-ambient-glow bento-ambient-glow-1"></div>
    <div class="bento-ambient-glow bento-ambient-glow-2"></div>
    <div class="bento-ambient-glow bento-ambient-glow-center"></div>

    <div class="bento-container">
      <!-- Section Header with Kinetic Typography & Live Badge -->
      <header class="bento-header" data-bento-scroll="top">
        <div class="bento-kicker-badge">
          <span class="bkb-ping"><span class="bkb-ping-dot"></span></span>
          <span class="bkb-text">Architected For Hyper-Growth</span>
          <span class="bkb-separator">•</span>
          <span class="bkb-sub">Next-Gen Enterprise Stack</span>
        </div>
        <h2 class="bento-heading">
          Engineered for Speed. <span class="bento-heading-gradient">Designed for Market Dominance.</span>
        </h2>
        <p class="bento-subtitle">
          We architect, scale, and accelerate mission-critical digital systems—from microsecond-latency full-stack platforms to automated conversational revenue engines.
        </p>

        {{-- Bento Capability Discipline Filter Bar --}}
        <div class="bento-discipline-nav" data-anim="down">
          <button type="button" class="bdn-btn active" data-bento-filter="all">
            <i class="fa-solid fa-shapes"></i> All 7 Disciplines
          </button>
          <button type="button" class="bdn-btn" data-bento-filter="engineering">
            <i class="fa-solid fa-code"></i> Web, Mobile &amp; Software
          </button>
          <button type="button" class="bdn-btn" data-bento-filter="saas">
            <i class="fa-solid fa-cloud"></i> SaaS &amp; Cloud ERP
          </button>
          <button type="button" class="bdn-btn" data-bento-filter="automation">
            <i class="fa-brands fa-whatsapp"></i> WhatsApp &amp; Growth
          </button>
        </div>
      </header>

      <div class="bento-grid">
        {{-- Card 1: Web & App Development (Flagship 2-Cols Split with Interactive Multi-Tab IDE) --}}
        <article class="bento-card bento-span-2 bento-card-flagship" data-bento-scroll="left" data-bento-card data-bento-cat="engineering">
          <div class="bento-card-split">
            <div class="bento-split-content">
              <div class="bento-card-top">
                <span class="bento-pill-tag"><i class="fa-solid fa-code"></i> Full-Stack &amp; Mobile Studio</span>
                <span class="bento-status-pill"><span class="bento-dot-pulse"></span> 99.98% SLA</span>
              </div>

              <div class="bento-card-body">
                <h3 class="bento-title">Web &amp; Mobile App Development</h3>
                <p class="bento-desc">Build fast, responsive websites that strengthen your brand and drive business growth. Develop powerful mobile apps that engage customers and accelerate your business across iOS and Android.</p>
              </div>

              {{-- Image 08: Mobile & Web App Architecture Preview --}}
              <div class="bento-preview-img-wrap">
                <img src="{{ asset('assets/images/tech-development/mobile-app-development.jpg') }}" alt="Web &amp; Mobile App Architecture" loading="lazy">
                <div class="bento-preview-img-overlay"></div>
                <span class="bento-preview-badge"><i class="fa-solid fa-mobile-screen"></i> Cross-Platform iOS &amp; Web</span>
              </div>

              <div class="bento-metrics-row">
                <div class="bento-metric-chip">
                  <span class="bmc-val">99.98%</span>
                  <span class="bmc-lbl">Uptime SLA</span>
                </div>
                <div class="bento-metric-chip">
                  <span class="bmc-val">&lt; 85ms</span>
                  <span class="bmc-lbl">Edge TTFB</span>
                </div>
                <div class="bento-metric-chip">
                  <span class="bmc-val">Grade A</span>
                  <span class="bmc-lbl">Performance Score</span>
                </div>
              </div>

              <div class="bento-stack-tags">
                <span class="bento-stack-pill"><i class="fa-brands fa-laravel"></i> Laravel 11</span>
                <span class="bento-stack-pill"><i class="fa-brands fa-react"></i> React &amp; Vue</span>
                <span class="bento-stack-pill"><i class="fa-solid fa-mobile-screen"></i> Flutter / React Native</span>
                <span class="bento-stack-pill"><i class="fa-brands fa-apple"></i> iOS &amp; Android</span>
                <span class="bento-stack-pill"><i class="fa-solid fa-network-wired"></i> REST &amp; GraphQL</span>
              </div>

              <div class="bento-card-action">
                <a href="{{ route('tech-development.show', ['slug' => 'web-development']) }}" class="bento-btn-primary">
                  <span>Explore Web &amp; App Development</span> <span class="bento-arrow">↗</span>
                </a>
              </div>
            </div>

            <!-- Terminal Visual with Interactive Tabs -->
            <div class="bento-split-visual">
              <div class="bento-terminal-window">
                <div class="btw-header">
                  <div class="btw-dots">
                    <span class="btw-dot btw-dot-red"></span>
                    <span class="btw-dot btw-dot-yellow"></span>
                    <span class="btw-dot btw-dot-green"></span>
                  </div>
                  <div class="btw-tabs" role="tablist">
                    <button class="btw-tab active" data-tab="react" type="button"><i class="fa-brands fa-react"></i> AppKernel.tsx</button>
                    <button class="btw-tab" data-tab="go" type="button"><i class="fa-solid fa-bolt"></i> Gateway.go</button>
                    <button class="btw-tab" data-tab="swift" type="button"><i class="fa-brands fa-apple"></i> Native.swift</button>
                  </div>
                  <span class="btw-badge">Live Edge</span>
                </div>

                <!-- Tab 1: React / TS -->
                <div class="btw-code btw-tab-pane active" id="pane-react">
                  <div class="btw-line"><span class="c-dim">1</span> <span class="c-keyword">import</span> { Engine, EdgeCDN } <span class="c-keyword">from</span> <span class="c-string">'@retrotech/core'</span>;</div>
                  <div class="btw-line"><span class="c-dim">2</span></div>
                  <div class="btw-line"><span class="c-dim">3</span> <span class="c-keyword">export const</span> <span class="c-func">Platform</span> = <span class="c-keyword">await</span> Engine.<span class="c-func">deploy</span>({</div>
                  <div class="btw-line"><span class="c-dim">4</span>   framework: <span class="c-string">'Laravel 11 + React 19'</span>,</div>
                  <div class="btw-line"><span class="c-dim">5</span>   edgeLatency: <span class="c-val">'68ms (Global CDN)'</span>,</div>
                  <div class="btw-line"><span class="c-dim">6</span>   caching: <span class="c-string">'Redis Multi-AZ'</span>,</div>
                  <div class="btw-line"><span class="c-dim">7</span>   security: <span class="c-string">'Zero-Trust SSL'</span>,</div>
                  <div class="btw-line"><span class="c-dim">8</span>   status: <span class="c-val">'Optimal ⚡'</span></div>
                  <div class="btw-line"><span class="c-dim">9</span> });<span class="btw-cursor"></span></div>
                </div>

                <!-- Tab 2: Go Gateway -->
                <div class="btw-code btw-tab-pane" id="pane-go">
                  <div class="btw-line"><span class="c-dim">1</span> <span class="c-keyword">package</span> main</div>
                  <div class="btw-line"><span class="c-dim">2</span> <span class="c-keyword">func</span> <span class="c-func">RouteTraffic</span>(ctx *Fiber.Ctx) error {</div>
                  <div class="btw-line"><span class="c-dim">3</span>   cluster := <span class="c-func">ConnectMicroservices</span>(<span class="c-string">"ap-south-1"</span>)</div>
                  <div class="btw-line"><span class="c-dim">4</span>   latency := cluster.<span class="c-func">Benchmark</span>() <span class="c-comment">// &lt; 4ms</span></div>
                  <div class="btw-line"><span class="c-dim">5</span>   <span class="c-keyword">return</span> ctx.<span class="c-func">JSON</span>(fiber.Map{</div>
                  <div class="btw-line"><span class="c-dim">6</span>     <span class="c-string">"status"</span>: <span class="c-val">"Healthy"</span>,</div>
                  <div class="btw-line"><span class="c-dim">7</span>     <span class="c-string">"uptime"</span>: <span class="c-val">"99.98%"</span></div>
                  <div class="btw-line"><span class="c-dim">8</span>   })</div>
                  <div class="btw-line"><span class="c-dim">9</span> }</div>
                </div>

                <!-- Tab 3: Swift Native -->
                <div class="btw-code btw-tab-pane" id="pane-swift">
                  <div class="btw-line"><span class="c-dim">1</span> <span class="c-keyword">import</span> SwiftUI</div>
                  <div class="btw-line"><span class="c-dim">2</span> <span class="c-keyword">struct</span> <span class="c-func">MobileClient</span>: View {</div>
                  <div class="btw-line"><span class="c-dim">3</span>   @StateObject <span class="c-keyword">var</span> telemetry = <span class="c-func">LiveSync</span>()</div>
                  <div class="btw-line"><span class="c-dim">4</span>   <span class="c-keyword">var</span> body: some View {</div>
                  <div class="btw-line"><span class="c-dim">5</span>     <span class="c-func">RetrotechCoreView</span>()</div>
                  <div class="btw-line"><span class="c-dim">6</span>       .<span class="c-func">frameRate</span>(<span class="c-val">120</span>)</div>
                  <div class="btw-line"><span class="c-dim">7</span>       .<span class="c-func">onSync</span> { telemetry.<span class="c-func">stream</span>() }</div>
                  <div class="btw-line"><span class="c-dim">8</span>   }</div>
                  <div class="btw-line"><span class="c-dim">9</span> }</div>
                </div>

                <div class="btw-run-bar">
                  <button type="button" class="btw-run-btn" id="btwRunBench" title="Click to test live latency benchmark">
                    <i class="fa-solid fa-play"></i> Run Live Benchmark
                  </button>
                  <span class="btw-benchmark-live" id="btwRunOut"><i class="fa-solid fa-bolt"></i> 28ms edge latency (99.98% High SLA)</span>
                </div>

                <div class="btw-footer">
                  <span class="btw-foot-item"><i class="fa-solid fa-code-branch"></i> git:main</span>
                  <span class="btw-foot-item"><i class="fa-solid fa-circle-check"></i> 0 errors</span>
                  <span class="btw-foot-item"><i class="fa-solid fa-bolt"></i> 28ms edge</span>
                </div>
              </div>
            </div>
          </div>
        </article>

        {{-- Card 2: Software Development (1-Col with Live Neural Microservices Visual) --}}
        <article class="bento-card bento-span-1 bento-card-software" data-bento-scroll="right" data-bento-card data-bento-cat="engineering">
          <div class="bento-card-inner">
            <div class="bento-card-top">
              <span class="bento-pill-tag"><i class="fa-solid fa-gears"></i> Software Engineering</span>
              <span class="bento-dot-green"></span>
            </div>

            <div class="bento-card-body">
              <h3 class="bento-title">Software Development</h3>
              <p class="bento-desc">Custom software solutions designed to improve efficiency, eliminate manual bottlenecks, and scale your business operations seamlessly.</p>
            </div>

            {{-- Image 09: Dedicated Cloud Infrastructure Preview --}}
            <div class="bento-preview-img-wrap">
              <img src="{{ asset('assets/images/data-center-new.jpg') }}" alt="Cloud Microservices Infrastructure" loading="lazy">
              <div class="bento-preview-img-overlay"></div>
              <span class="bento-preview-badge"><i class="fa-solid fa-server"></i> Dedicated Cloud Nodes</span>
            </div>

            <!-- Architecture Microservice Visual -->
            <div class="bento-arch-visual">
              <div class="bav-node">
                <i class="fa-solid fa-shield-halved"></i>
                <span>API Gateway</span>
              </div>
              <div class="bav-connector">
                <span class="bav-pulse-line"></span>
                <span class="bav-ping-dot"></span>
              </div>
              <div class="bav-node bav-node-core">
                <i class="fa-solid fa-cubes"></i>
                <span>Microservices</span>
                <span class="bav-subtag">Healthy 99.9%</span>
              </div>
              <div class="bav-connector">
                <span class="bav-pulse-line"></span>
                <span class="bav-ping-dot bav-ping-delayed"></span>
              </div>
              <div class="bav-node">
                <i class="fa-solid fa-database"></i>
                <span>Cloud Data</span>
              </div>
            </div>

            <ul class="bento-feature-list">
              <li><i class="fa-solid fa-circle-check"></i> Modular Microservices Architecture</li>
              <li><i class="fa-solid fa-circle-check"></i> Automated CI/CD &amp; Testing</li>
              <li><i class="fa-solid fa-circle-check"></i> Zero-Trust API Integrations</li>
            </ul>

            <div class="bento-card-action">
              <a href="{{ route('tech-development.show', ['slug' => 'software-development']) }}" class="bento-link-arrow">
                <span>Explore Custom Software</span> <span>→</span>
              </a>
            </div>
          </div>
        </article>

        {{-- Card 3: SaaS Development (1-Col with Real-Time Oscilloscope Telemetry) --}}
        <article class="bento-card bento-span-1 bento-card-saas" data-bento-scroll="left" data-bento-card data-bento-cat="saas">
          <div class="bento-card-inner">
            <div class="bento-card-top">
              <span class="bento-pill-tag"><i class="fa-solid fa-cloud"></i> SaaS Products</span>
              <span class="bento-status-pill">Multi-Tenant</span>
            </div>

            <div class="bento-card-body">
              <h3 class="bento-title">SaaS Development</h3>
              <p class="bento-desc">Create secure, scalable SaaS products that support long-term business success, with automated billing, role management, and analytics.</p>
            </div>

            {{-- Image 10: Multi-Tenant Cloud Architecture Preview --}}
            <div class="bento-preview-img-wrap">
              <img src="{{ asset('assets/images/tech-development/api-development.jpg') }}" alt="Scalable SaaS Architecture" loading="lazy">
              <div class="bento-preview-img-overlay"></div>
              <span class="bento-preview-badge"><i class="fa-solid fa-cloud"></i> Multi-Tenant SaaS DB</span>
            </div>

            <!-- Telemetry Cockpit Widget with Oscilloscope Wave -->
            <div class="bento-saas-telemetry">
              <div class="bst-top">
                <span class="bst-lbl">Active Cloud Concurrency</span>
                <span class="bst-live-badge"><span class="bento-dot-pulse"></span> Streaming</span>
              </div>
              <div class="bst-val-row">
                <span class="bst-val">50,000+</span>
                <span class="bst-unit">Req / Sec</span>
              </div>

              <!-- Animated Oscilloscope Wave -->
              <div class="bst-wave-canvas">
                <svg viewBox="0 0 300 48" class="bst-wave-svg" preserveAspectRatio="none">
                  <path class="bst-wave-path-bg" d="M0,24 Q37.5,6 75,24 T150,24 T225,24 T300,24" />
                  <path class="bst-wave-path" d="M0,24 Q37.5,6 75,24 T150,24 T225,24 T300,24" />
                </svg>
              </div>

              <div class="bst-stats-grid">
                <div class="bst-stat-item">
                  <span class="bst-si-val">Multi-Tenant</span>
                  <span class="bst-si-lbl">DB Isolation</span>
                </div>
                <div class="bst-stat-item">
                  <span class="bst-si-val">Automated</span>
                  <span class="bst-si-lbl">Billing &amp; Subs</span>
                </div>
              </div>
            </div>

            <div class="bento-card-action">
              <a href="{{ route('tech-development.show', ['slug' => 'saas-application']) }}" class="bento-link-arrow">
                <span>Explore SaaS Engineering</span> <span>→</span>
              </a>
            </div>
          </div>
        </article>

        {{-- Card 4: Digital Marketing & WhatsApp Automation (Flagship 2-Cols Split) --}}
        <article class="bento-card bento-span-2 bento-card-growth" data-bento-scroll="right" data-bento-card data-bento-cat="automation">
          <div class="bento-card-split">
            <div class="bento-split-content">
              <div class="bento-card-top">
                <span class="bento-pill-tag"><i class="fa-solid fa-chart-line"></i> Revenue Engine</span>
                <span class="bento-growth-badge"><i class="fa-solid fa-arrow-trend-up"></i> +340% Lead Surge</span>
              </div>

              <div class="bento-card-body">
                <h3 class="bento-title">Digital Marketing, SEO &amp; WhatsApp Automation</h3>
                <p class="bento-desc">Increase your online visibility, generate quality leads, and grow your revenue through organic search engine optimization, paid marketing, and 24/7 automated WhatsApp customer engagement.</p>
              </div>

              {{-- Image 11: Enterprise Growth & Conversions Preview --}}
              <div class="bento-preview-img-wrap">
                <img src="{{ asset('assets/images/enterprise-clients.jpg') }}" alt="Enterprise Growth &amp; Analytics" loading="lazy">
                <div class="bento-preview-img-overlay"></div>
                <span class="bento-preview-badge"><i class="fa-solid fa-arrow-trend-up"></i> +340% Conversions</span>
              </div>

              <div class="bento-growth-features">
                <div class="bgf-chip"><i class="fa-brands fa-google"></i> Google &amp; Meta Ads</div>
                <div class="bgf-chip"><i class="fa-solid fa-magnifying-glass"></i> Technical SEO</div>
                <div class="bgf-chip"><i class="fa-brands fa-whatsapp"></i> WhatsApp CRM Bot</div>
                <div class="bgf-chip"><i class="fa-solid fa-bullseye"></i> High-Converting Funnels</div>
              </div>

              <div class="bento-card-action">
                <a href="{{ route('services.show', 'search-engine-optimization') }}" class="bento-btn-primary">
                  <span>Explore Marketing &amp; SEO</span> <span class="bento-arrow">↗</span>
                </a>
              </div>
            </div>

            <!-- WhatsApp & SEO Dual Visual -->
            <div class="bento-split-visual bento-growth-visual">
              <!-- Mini WhatsApp Chat Simulator with typing pulse -->
              <div class="bento-wa-mini-chat">
                <div class="bwm-header">
                  <div class="bwm-avatar"><i class="fa-brands fa-whatsapp"></i></div>
                  <div class="bwm-info">
                    <span class="bwm-name">Retrotech Growth Bot</span>
                    <span class="bwm-status"><span class="bento-dot-pulse"></span> Instant Automated Reply</span>
                  </div>
                </div>
                <div class="bwm-body">
                  <div class="bwm-msg bwm-msg-user">
                    <p>I want to scale leads &amp; boost conversions for my brand.</p>
                    <span class="bwm-time">10:42 AM</span>
                  </div>
                  <div class="bwm-msg bwm-msg-bot">
                    <p>Welcome! 🚀 We just drove +340% organic traffic for our client. Here is your customized growth blueprint!</p>
                    <span class="bwm-time">10:42 AM <i class="fa-solid fa-check-double bwm-ticks"></i></span>
                  </div>
                </div>
              </div>

              <!-- Mini SEO Rank Widget with trophy gradient -->
              <div class="bento-seo-mini-ranks">
                <div class="bsm-head">
                  <span class="bsm-badge"><i class="fa-solid fa-trophy"></i> #1 Google Rank</span>
                  <span class="bsm-score">Top 1% SERP</span>
                </div>
                <div class="bsm-metrics">
                  <div class="bsm-m-item">
                    <span class="bsm-val">+340%</span>
                    <span class="bsm-lbl">Organic Growth</span>
                  </div>
                  <div class="bsm-m-item">
                    <span class="bsm-val">19.4%</span>
                    <span class="bsm-lbl">Average CTR</span>
                  </div>
                  <div class="bsm-m-item">
                    <span class="bsm-val">3.8x</span>
                    <span class="bsm-lbl">Lead Multiplier</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </article>

        {{-- Card 5: Full Suite Consulting (Panoramic Obsidian Crystal Canvas - 3 Columns) --}}
        <article class="bento-card bento-span-3 bento-card-ecosystem" data-bento-scroll="bottom" data-bento-card data-bento-cat="all">
          <div class="bento-aurora-line"></div>
          <div class="bento-card-inner bento-eco-layout">
            <div class="bento-eco-left">
              <span class="bento-pill-tag"><i class="fa-solid fa-gem"></i> Strategic Technology Partnership</span>
              <h3 class="bento-title">Empowering Businesses with Cutting-Edge Digital Solutions</h3>
              
              {{-- Image 12: Global Technology & Engineering Reach --}}
              <div class="bento-preview-img-wrap" style="height: 105px; max-width: 480px;">
                <img src="{{ asset('assets/images/global-locations.jpg') }}" alt="Global IT &amp; Digital Network" loading="lazy">
                <div class="bento-preview-img-overlay"></div>
                <span class="bento-preview-badge"><i class="fa-solid fa-globe"></i> Global 24/7 Operations</span>
              </div>

              <p class="bento-desc">"We are web designers, developers, project managers, and digital marketing professionals dedicated to creative solutions using the latest trends."</p>
              <div class="bento-eco-sla">
                <span class="bento-sla-dot"></span>
                <span>Guaranteed Expert Response Within 24 Hours • Free Technical Consultation</span>
              </div>
            </div>

            <div class="bento-eco-right">
              <div class="bento-eco-chips">
                <span><i class="fa-solid fa-circle-check"></i> Website Development</span>
                <span><i class="fa-solid fa-circle-check"></i> SEO &amp; Marketing</span>
                <span><i class="fa-solid fa-circle-check"></i> App Development</span>
                <span><i class="fa-solid fa-circle-check"></i> SaaS &amp; Cloud</span>
                <span><i class="fa-solid fa-circle-check"></i> Custom Software</span>
              </div>
              <a href="#contact" class="bento-btn-secondary contact-page-link">
                <span>Get a Free Consultation</span> <span class="bento-arrow">↗</span>
              </a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>

  {{-- =========================================================================
       5. WHY CHOOSE US: Enterprise Advantage Matrix
       ========================================================================= --}}
  <section class="why-choose-section" id="why-choose-us">
    <div class="bento-container">
      <div class="bento-header" data-anim="down">
        <div class="bento-kicker-badge">
          <span class="bkb-ping"><span class="bkb-ping-dot"></span></span>
          <span class="bkb-text">Enterprise Advantage</span>
          <span class="bkb-separator">•</span>
          <span class="bkb-sub">Why Retrotech</span>
        </div>
        <h2 class="bento-heading" aria-label="Top Six Reasons to Trust Our IT Expertise">
          Top Six Reasons <span class="bento-heading-gradient">to Trust Our IT Expertise</span>
        </h2>
        <p class="bento-subtitle">Empower your business with reliable, secure, and scalable IT solutions tailored to your unique goals and requirements.</p>

        {{-- Slide Navigation & Pagination Controls --}}
        <div class="why-carousel-ctrls">
          <div class="wcc-counter">
            <span class="wcc-icon"><i class="fa-solid fa-layer-group"></i></span>
            <span>Slide <strong id="whyActivePage">1</strong> of <strong id="whyTotalPages">2</strong></span>
          </div>
          <div class="wcc-actions">
            <button type="button" class="why-nav-btn" id="whyPrevBtn" aria-label="Previous Slide">
              <i class="fa-solid fa-arrow-left"></i>
            </button>
            <div class="why-nav-dots" id="whyNavDots">
              <button type="button" class="why-dot active" data-index="0" aria-label="Slide 1: Reasons 01-03"></button>
              <button type="button" class="why-dot" data-index="1" aria-label="Slide 2: Reasons 04-06"></button>
            </div>
            <button type="button" class="why-nav-btn" id="whyNextBtn" aria-label="Next Slide">
              <i class="fa-solid fa-arrow-right"></i>
            </button>
          </div>
        </div>
      </div>

      <div class="why-slider-viewport" id="whySliderViewport">
        <div class="why-matrix-grid why-slider-track" id="whySliderTrack">
        {{-- Card 1 --}}
        <div class="why-matrix-card" data-anim="left">
          <div class="wmc-watermark" aria-hidden="true">01</div>

          {{-- Image 13: Senior Engineering Talent --}}
          <div class="wmc-img-wrap">
            <img src="{{ asset('assets/images/process-1.png') }}" alt="Experienced IT Professionals" loading="lazy">
            <div class="wmc-img-overlay"></div>
            <span class="wmc-img-badge"><i class="fa-solid fa-code"></i> Senior Devs (L5+)</span>
          </div>

          <div class="wmc-top">
            <span class="wmc-number">01</span>
            <span class="wmc-badge">SENIOR TECH TALENT</span>
            <div class="wmc-icon"><i class="fa-solid fa-user-tie"></i></div>
          </div>
          <h3 class="wmc-title">Experienced IT Professionals</h3>
          <p class="wmc-desc">Our skilled developers, designers, and technology experts deliver reliable solutions using proven industry practices.</p>
          
          <div class="wmc-micro-vis wmc-vis-radar">
            <span class="wmr-tag"><i class="fa-solid fa-code"></i> Senior Devs (L5+)</span>
            <span class="wmr-stat"><i class="fa-solid fa-certificate"></i> Top 1% Talent</span>
          </div>

          <div class="wmc-chips">
            <span>Laravel 11</span>
            <span>React 19</span>
            <span>AWS Cloud</span>
            <span>Python</span>
          </div>
          <div class="wmc-footer">
            <i class="fa-solid fa-circle-check"></i>
            <span>10+ Years Avg Senior Experience</span>
          </div>
        </div>

        {{-- Card 2 --}}
        <div class="why-matrix-card" data-anim="up">
          <div class="wmc-watermark" aria-hidden="true">02</div>

          {{-- Image 14: Bespoke Business Architecture --}}
          <div class="wmc-img-wrap">
            <img src="{{ asset('assets/images/it-asset-management.jpg') }}" alt="Customised Business Solutions" loading="lazy">
            <div class="wmc-img-overlay"></div>
            <span class="wmc-img-badge"><i class="fa-solid fa-sliders"></i> 100% Bespoke Code</span>
          </div>

          <div class="wmc-top">
            <span class="wmc-number">02</span>
            <span class="wmc-badge">BESPOKE ARCHITECTURE</span>
            <div class="wmc-icon"><i class="fa-solid fa-sliders"></i></div>
          </div>
          <h3 class="wmc-title">Customised Business Solutions</h3>
          <p class="wmc-desc">We create tailored websites, applications, software, and digital solutions that match your business processes and objectives.</p>
          
          <div class="wmc-micro-vis wmc-vis-arch">
            <div class="wma-node">Bespoke UI</div>
            <span class="wma-arrow">→</span>
            <div class="wma-node wma-node-glow">Micro-APIs</div>
            <span class="wma-arrow">→</span>
            <div class="wma-node">Isolated DB</div>
          </div>

          <div class="wmc-chips">
            <span>Tailored Workflows</span>
            <span>Multi-Tenant</span>
            <span>Custom APIs</span>
          </div>
          <div class="wmc-footer">
            <i class="fa-solid fa-circle-check"></i>
            <span>100% Bespoke Code • No Templates</span>
          </div>
        </div>

        {{-- Card 3 --}}
        <div class="why-matrix-card" data-anim="right">
          <div class="wmc-watermark" aria-hidden="true">03</div>

          {{-- Image 15: Agile Velocity & On-Time Delivery --}}
          <div class="wmc-img-wrap">
            <img src="{{ asset('assets/images/process-3.png') }}" alt="On-Time Project Delivery" loading="lazy">
            <div class="wmc-img-overlay"></div>
            <span class="wmc-img-badge"><i class="fa-solid fa-bolt"></i> 2-Week Sprints</span>
          </div>

          <div class="wmc-top">
            <span class="wmc-number">03</span>
            <span class="wmc-badge">AGILE VELOCITY</span>
            <div class="wmc-icon"><i class="fa-solid fa-clock-check"></i></div>
          </div>
          <h3 class="wmc-title">On-Time Project Delivery</h3>
          <p class="wmc-desc">We use the latest tools, frameworks, and technologies to build secure, high-performing, and future-ready digital products.</p>
          
          <div class="wmc-micro-vis wmc-vis-sprint">
            <div class="wms-bar-track"><div class="wms-bar-prog" style="width: 82%;"></div></div>
            <div class="wms-meta"><span>Sprint 14: Day 08/10</span><strong>100% CI/CD Passed</strong></div>
          </div>

          <div class="wmc-chips">
            <span>2-Week Sprints</span>
            <span>Live Staging</span>
            <span>Automated CI/CD</span>
          </div>
          <div class="wmc-footer">
            <i class="fa-solid fa-circle-check"></i>
            <span>98.4% Sprint Milestones Met</span>
          </div>
        </div>

        {{-- Card 4 --}}
        <div class="why-matrix-card" data-anim="left">
          <div class="wmc-watermark" aria-hidden="true">04</div>

          {{-- Image 16: Frictionless Sync & Transparency --}}
          <div class="wmc-img-wrap">
            <img src="{{ asset('assets/images/process-4.png') }}" alt="Transparent Communication" loading="lazy">
            <div class="wmc-img-overlay"></div>
            <span class="wmc-img-badge"><i class="fa-brands fa-slack"></i> Direct Dev Sync</span>
          </div>

          <div class="wmc-top">
            <span class="wmc-number">04</span>
            <span class="wmc-badge">FRICTIONLESS SYNC</span>
            <div class="wmc-icon"><i class="fa-solid fa-comments"></i></div>
          </div>
          <h3 class="wmc-title">Transparent Communication</h3>
          <p class="wmc-desc">We maintain clear communication, transparent processes, and timely delivery throughout every stage of your project.</p>
          
          <div class="wmc-micro-vis wmc-vis-slack">
            <div class="wm-slack-badge"><i class="fa-brands fa-slack"></i> #enterprise-sync</div>
            <span class="wm-slack-typing"><span class="wst-dot"></span> Senior Architect online</span>
          </div>

          <div class="wmc-chips">
            <span>Direct Dev Slack</span>
            <span>Weekly Video Demos</span>
            <span>Live Telemetry</span>
          </div>
          <div class="wmc-footer">
            <i class="fa-solid fa-circle-check"></i>
            <span>Dedicated Slack &amp; WhatsApp Channel</span>
          </div>
        </div>

        {{-- Card 5 --}}
        <div class="why-matrix-card" data-anim="up">
          <div class="wmc-watermark" aria-hidden="true">05</div>

          {{-- Image 17: Enterprise Security & Data Protection --}}
          <div class="wmc-img-wrap">
            <img src="{{ asset('assets/images/it-data-destruction.jpg') }}" alt="Scalable & Secure Technologies" loading="lazy">
            <div class="wmc-img-overlay"></div>
            <span class="wmc-img-badge"><i class="fa-solid fa-shield-halved"></i> AES-256 Vault</span>
          </div>

          <div class="wmc-top">
            <span class="wmc-number">05</span>
            <span class="wmc-badge">ENTERPRISE SECURITY</span>
            <div class="wmc-icon"><i class="fa-solid fa-shield-halved"></i></div>
          </div>
          <h3 class="wmc-title">Scalable &amp; Secure Technologies</h3>
          <p class="wmc-desc">Every solution is carefully designed, developed, tested, and optimized to provide an excellent user experience.</p>
          
          <div class="wmc-micro-vis wmc-vis-lock">
            <div class="wml-chip"><i class="fa-solid fa-lock"></i> Bank-Grade AES-256</div>
            <span class="wml-status"><i class="fa-solid fa-circle-check"></i> SOC2 Ready</span>
          </div>

          <div class="wmc-chips">
            <span>AES-256</span>
            <span>Zero-Trust SSL</span>
            <span>Role-Based Auth</span>
            <span>GDPR</span>
          </div>
          <div class="wmc-footer">
            <i class="fa-solid fa-circle-check"></i>
            <span>Zero-Trust Architecture &amp; SOC2 Ready</span>
          </div>
        </div>

        {{-- Card 6 --}}
        <div class="why-matrix-card" data-anim="right">
          <div class="wmc-watermark" aria-hidden="true">06</div>

          {{-- Image 18: Continuous 24/7 APM Telemetry --}}
          <div class="wmc-img-wrap">
            <img src="{{ asset('assets/images/data-center-decommissioning.jpg') }}" alt="Dedicated Post-Launch Support" loading="lazy">
            <div class="wmc-img-overlay"></div>
            <span class="wmc-img-badge"><i class="fa-solid fa-headset"></i> 24/7 APM SLA</span>
          </div>

          <div class="wmc-top">
            <span class="wmc-number">06</span>
            <span class="wmc-badge">CONTINUOUS GROWTH</span>
            <div class="wmc-icon"><i class="fa-solid fa-headset"></i></div>
          </div>
          <h3 class="wmc-title">Dedicated Post-Launch Support</h3>
          <p class="wmc-desc">We provide cost-effective IT services that can easily scale and adapt as your business continues to grow.</p>
          
          <div class="wmc-micro-vis wmc-vis-pulse">
            <span class="wmp-ping"><span class="wmp-ping-dot"></span></span>
            <span class="wmp-sla">Heartbeat: 99.98% High Availability</span>
            <span class="wmp-badge">15-Min SLA</span>
          </div>

          <div class="wmc-chips">
            <span>24/7 APM</span>
            <span>Zero Downtime Patching</span>
            <span>DevOps</span>
          </div>
          <div class="wmc-footer">
            <i class="fa-solid fa-circle-check"></i>
            <span>24/7 Monitoring &amp; 15-Minute SLA</span>
          </div>
        </div>
      </div>
    </div>

      {{-- Section 5 Feature: The Engineering Comparison Battle Matrix --}}
      <div class="retrotech-vs-agency-card" data-anim="zoom">
        <div class="rvs-header">
          <div class="rvs-title-group">
            <span class="rvs-badge"><i class="fa-solid fa-code-compare"></i> TRANSPARENCY MATRIX</span>
            <h3 class="rvs-heading">Retrotech Engineering Standard <span class="bento-heading-gradient">vs. Typical IT Agencies</span></h3>
            <p class="rvs-subtitle">See why high-growth startups, scale-ups, and enterprises choose Retrotech for mission-critical software builds.</p>
          </div>
          <div class="rvs-legend">
            <span class="rvs-leg-item rvs-leg-pro"><i class="fa-solid fa-circle-check"></i> Retrotech Standard</span>
            <span class="rvs-leg-item rvs-leg-con"><i class="fa-solid fa-circle-xmark"></i> Typical Agencies</span>
          </div>
        </div>

        <div class="rvs-table-wrap">
          <table class="rvs-table">
            <thead>
              <tr>
                <th class="rvs-col-dim">Delivery Dimension</th>
                <th class="rvs-col-retro"><i class="fa-solid fa-shield-halved"></i> Retrotech Digital</th>
                <th class="rvs-col-typical"><i class="fa-solid fa-triangle-exclamation"></i> Typical Outsourcing Agency</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="rvs-cell-dim">
                  <strong>Source Code &amp; IP Rights</strong>
                  <span>Full intellectual property ownership</span>
                </td>
                <td class="rvs-cell-retro">
                  <span class="rvs-status rvs-yes"><i class="fa-solid fa-check"></i> 100% Client Ownership Day 1</span>
                  <small>No licensing fees or hostage repositories</small>
                </td>
                <td class="rvs-cell-typical">
                  <span class="rvs-status rvs-no"><i class="fa-solid fa-xmark"></i> Vendor Lock-In &amp; Proprietary Traps</span>
                  <small>Code held hostage or template licensing</small>
                </td>
              </tr>
              <tr>
                <td class="rvs-cell-dim">
                  <strong>Engineering Talent</strong>
                  <span>Developer seniority &amp; pedigree</span>
                </td>
                <td class="rvs-cell-retro">
                  <span class="rvs-status rvs-yes"><i class="fa-solid fa-check"></i> Senior L5+ Lead Architects Only</span>
                  <small>Zero bait-and-switch junior outsourcing</small>
                </td>
                <td class="rvs-cell-typical">
                  <span class="rvs-status rvs-no"><i class="fa-solid fa-xmark"></i> Inexperienced Junior Interns</span>
                  <small>Senior sells the pitch, juniors write the code</small>
                </td>
              </tr>
              <tr>
                <td class="rvs-cell-dim">
                  <strong>Communication &amp; Sync</strong>
                  <span>Team access &amp; transparency</span>
                </td>
                <td class="rvs-cell-retro">
                  <span class="rvs-status rvs-yes"><i class="fa-solid fa-check"></i> Direct Slack / WhatsApp Channel</span>
                  <small>Daily commits &amp; live staging preview</small>
                </td>
                <td class="rvs-cell-typical">
                  <span class="rvs-status rvs-no"><i class="fa-solid fa-xmark"></i> Gatekept Account Managers</span>
                  <small>Slow ticket queues &amp; lost context</small>
                </td>
              </tr>
              <tr>
                <td class="rvs-cell-dim">
                  <strong>Architecture Quality</strong>
                  <span>Clean code &amp; scalability</span>
                </td>
                <td class="rvs-cell-retro">
                  <span class="rvs-status rvs-yes"><i class="fa-solid fa-check"></i> Bespoke Microservices &amp; CI/CD</span>
                  <small>Strict linting, automated tests, modular design</small>
                </td>
                <td class="rvs-cell-typical">
                  <span class="rvs-status rvs-no"><i class="fa-solid fa-xmark"></i> Bloated Pre-made Templates</span>
                  <small>Spaghetti code, slow loading &amp; unmaintainable</small>
                </td>
              </tr>
              <tr>
                <td class="rvs-cell-dim">
                  <strong>Post-Launch SLA</strong>
                  <span>Production stability &amp; uptime</span>
                </td>
                <td class="rvs-cell-retro">
                  <span class="rvs-status rvs-yes"><i class="fa-solid fa-check"></i> 99.98% Monitored Uptime SLA</span>
                  <small>15-minute emergency response protocol</small>
                </td>
                <td class="rvs-cell-typical">
                  <span class="rvs-status rvs-no"><i class="fa-solid fa-xmark"></i> "Best Effort" Unmonitored</span>
                  <small>Ghosted after final payment milestone</small>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      {{-- Enterprise Assurance Strip --}}
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

      {{-- 2026 Interactive Industry Segmented Filter Bar & Slide Navigation Controls --}}
      <div class="industries-toolbar" data-anim="down">
        <div class="industries-filter-bar">
          <button type="button" class="ifb-btn active" data-filter="all"><i class="fa-solid fa-shapes"></i> All Domains</button>
          <button type="button" class="ifb-btn" data-filter="enterprise"><i class="fa-solid fa-network-wired"></i> Enterprise &amp; SaaS</button>
          <button type="button" class="ifb-btn" data-filter="fintech"><i class="fa-solid fa-shield-halved"></i> FinTech &amp; Health</button>
          <button type="button" class="ifb-btn" data-filter="commerce"><i class="fa-solid fa-cart-shopping"></i> E-Commerce &amp; Retail</button>
        </div>

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

      <div class="ind-slider-viewport" id="indSliderViewport">
        <div class="industries-pro-grid ind-slider-track" id="indSliderTrack">
        {{-- Industry 1 --}}
        <div class="industry-card-pro" data-anim="left" data-industry-cat="commerce">
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
        </div>

        {{-- Industry 2 --}}
        <div class="industry-card-pro" data-anim="up" data-industry-cat="fintech">
          {{-- Image 20: Healthcare & Telemedicine --}}
          <div class="icp-img-wrap">
            <img src="{{ asset('assets/images/tech-development/mobile-app-development.jpg') }}" alt="Healthcare &amp; MedTech" loading="lazy">
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
        </div>

        {{-- Industry 3 --}}
        <div class="industry-card-pro" data-anim="down" data-industry-cat="fintech">
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
        </div>

        {{-- Industry 4 --}}
        <div class="industry-card-pro" data-anim="right" data-industry-cat="commerce">
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
        </div>

        {{-- Industry 5 --}}
        <div class="industry-card-pro" data-anim="left" data-industry-cat="enterprise">
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
        </div>

        {{-- Industry 6 --}}
        <div class="industry-card-pro" data-anim="up" data-industry-cat="enterprise">
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
        </div>

        {{-- Industry 7 --}}
        <div class="industry-card-pro" data-anim="down" data-industry-cat="enterprise">
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
        </div>

        {{-- Industry 8 --}}
        <div class="industry-card-pro" data-anim="right" data-industry-cat="commerce">
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
        </div>
      </div>
    </div>
  </div>
</section>

  {{-- =========================================================================
       7. MID-PAGE CONVERSION BANNER: Aurora Horizon Glass Canvas
       ========================================================================= --}}
  <section class="mid-cta-section">
    <div class="mid-cta-panel mid-cta-aurora" data-anim="zoom">
      <div class="mid-cta-mesh-glow"></div>
      <div class="mid-cta-left" data-anim="left">
        <div class="mid-cta-status-pill">
          <span class="mid-pulse-dot"></span>
          <span>Available for New Sprint Allocations • Q2 2026</span>
        </div>
        <h2 class="mid-cta-title">
          Let's Build Your Next <br><span class="mid-cta-highlight">Digital Success Story</span>
        </h2>
        <p class="mid-cta-desc">Whether you need a high-performance web platform, SEO growth engine, or enterprise SaaS software, our senior engineers are ready to build with you.</p>
        
        <div class="mid-cta-perks">
          <span><i class="fa-solid fa-check"></i> Free 45-Min Discovery Session</span>
          <span><i class="fa-solid fa-check"></i> Full Architecture Roadmap</span>
          <span><i class="fa-solid fa-check"></i> Fixed-Price or Agile Scope</span>
        </div>

        {{-- 2026 Interactive Project Scope & Sprint Estimator Widget --}}
        <div class="mid-cta-calc-widget">
          <div class="mcc-label"><i class="fa-solid fa-sliders"></i> Interactive Project Scope &amp; Sprint Estimator</div>
          
          <div class="mcc-row">
            <span class="mcc-sub">Select Target Solution:</span>
            <div class="mcc-pills" id="mccTypePills">
              <button type="button" class="mcc-pill active" data-type="Web Platform" data-sprints="2–4 Sprints" data-team="Senior Full-Stack Lead + UI/UX">🌐 Web Platform</button>
              <button type="button" class="mcc-pill" data-type="Mobile App" data-sprints="4–6 Sprints" data-team="iOS/Android Architect + API Team">📱 Mobile App</button>
              <button type="button" class="mcc-pill" data-type="Custom SaaS" data-sprints="6–8 Sprints" data-team="Cloud Architect + 3 Full-Stack Devs">⚡ Custom SaaS</button>
              <button type="button" class="mcc-pill" data-type="Growth Engine" data-sprints="Immediate (1 Sprint)" data-team="Growth Lead + WA Automation Specialist">🤖 Growth &amp; WhatsApp</button>
            </div>
          </div>

          <div class="mcc-output-card">
            <div class="mcc-out-item">
              <span class="mcc-out-lbl">Target Scope</span>
              <strong class="mcc-out-val" id="mccOutType">Web Platform</strong>
            </div>
            <div class="mcc-out-item">
              <span class="mcc-out-lbl">Estimated Timeline</span>
              <strong class="mcc-out-val" id="mccOutSprints">2–4 Sprints</strong>
            </div>
            <div class="mcc-out-item">
              <span class="mcc-out-lbl">Dedicated Cohort</span>
              <strong class="mcc-out-val" id="mccOutTeam">Senior Full-Stack Lead + UI/UX</strong>
            </div>
            <div class="mcc-out-action">
              <a href="https://wa.me/919973960072?text=Hi%20Retrotech%2C%20I%20used%20your%20Project%20Estimator%20for%20a%20Web%20Platform%20project.%20I%20would%20like%20to%20discuss%20next%20steps." 
                 target="_blank" rel="noopener noreferrer" class="mcc-wa-cta" id="mccWaLink">
                <i class="fa-brands fa-whatsapp"></i> Lock In Scope on WhatsApp ↗
              </a>
            </div>
          </div>
        </div>

        <div class="mid-cta-tags" style="margin-top: 1.5rem;">
          <span>Website Development</span>
          <span>Digital Marketing</span>
          <span>SEO Optimization</span>
          <span>Custom Software</span>
          <span>Mobile App Development</span>
        </div>
      </div>

      <div class="mid-cta-right" data-anim="right">
        {{-- Image 27: Elite Engineering Cohort Collaboration Preview --}}
        <div class="mid-cta-media-wrap">
          <img src="{{ asset('assets/images/enterprise-clients.jpg') }}" alt="Retrotech Engineering &amp; Client Success Team" loading="lazy">
          <span class="mid-cta-media-badge"><i class="fa-solid fa-users-gear"></i> Elite Engineering Team</span>
        </div>

        <div class="mid-cta-actions">
          <a href="#contact" class="mid-cta-btn-primary contact-page-link">
            <span>Schedule Consultation</span>
            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
          </a>
          <a href="https://wa.me/919999999999" target="_blank" rel="noopener noreferrer" class="mid-cta-btn-wa">
            <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
            <span>Chat on WhatsApp</span>
          </a>
        </div>
        <div class="mid-cta-response-hint">
          <i class="fa-solid fa-bolt"></i> Average response time: under 15 minutes
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
        <div class="testi-pill-badge">
          <span class="testi-pill-stars" aria-hidden="true">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </span>
          <span class="testi-pill-rating">4.9 / 5.0</span>
          <span class="testi-pill-dot" aria-hidden="true"></span>
          <span class="testi-pill-count">5,000+ Verified Client Reviews</span>
        </div>

        <h2 class="testi-heading-main" id="testimonials-heading">
          Customer Experiences <br><span class="testi-heading-gradient">That Speak for Themselves</span>
        </h2>

        <p class="testi-subheading-main">
          See how leading brands scale operations, automate customer journeys, and boost digital revenue with Retrotech’s IT, AI, and marketing solutions.
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

      {{-- Interactive Navigation Controls (Pause, Prev, Next) --}}
      <div class="testi-controls-bar">
        <button type="button" class="testi-ctrl-btn" id="testiPrevBtn" aria-label="Scroll testimonials left">
          <i class="fa-solid fa-arrow-left"></i>
        </button>
        <span class="testi-ctrl-indicator">
          <i class="fa-solid fa-circle-dot"></i> Real Client Stories
        </span>
        <button type="button" class="testi-ctrl-btn" id="testiNextBtn" aria-label="Scroll testimonials right">
          <i class="fa-solid fa-arrow-right"></i>
        </button>
      </div>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const stage = document.getElementById('testiStage');
      const track = document.getElementById('testiTrack');
      const prevBtn = document.getElementById('testiPrevBtn');
      const nextBtn = document.getElementById('testiNextBtn');
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

      if (prevBtn) {
        prevBtn.addEventListener('click', function () {
          stage.scrollBy({ left: -390, behavior: 'smooth' });
        });
      }
      if (nextBtn) {
        nextBtn.addEventListener('click', function () {
          stage.scrollBy({ left: 390, behavior: 'smooth' });
        });
      }
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
        <div class="faq-help-desk" data-anim="left">
          <div class="bento-kicker-badge">
            <span class="bkb-ping"><span class="bkb-ping-dot"></span></span>
            <span class="bkb-text">Support &amp; Clarity</span>
            <span class="bkb-separator">•</span>
            <span class="bkb-sub">FAQs</span>
          </div>
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
        <div class="faq-accordion-group" data-anim="right">
          {{-- Section 9 Feature: FAQ Live Real-Time Search Bar --}}
          <div class="faq-search-widget">
            <div class="faq-search-input-wrap">
              <i class="fa-solid fa-magnifying-glass faq-search-icon"></i>
              <input type="text" id="faqSearchInput" class="faq-search-input" placeholder="Search queries (e.g. services, timeline, SLA, pricing, support)..." autocomplete="off" aria-label="Search frequently asked questions">
              <button type="button" id="faqSearchClear" class="faq-search-clear" aria-label="Clear search" style="display: none;">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>
            <div class="faq-search-meta">
              <span class="fsm-count"><strong id="faqMatchCount">6</strong> queries available</span>
              <span class="fsm-hint"><i class="fa-solid fa-bolt"></i> Real-time filter</span>
            </div>
            <div class="faq-search-empty" id="faqSearchEmpty" style="display: none;">
              <div class="fse-icon"><i class="fa-solid fa-circle-question"></i></div>
              <p class="fse-text">No answers matching "<span id="faqSearchTerm"></span>".</p>
              <a href="https://wa.me/919973960072" target="_blank" rel="noopener noreferrer" class="fse-wa-btn">
                <i class="fa-brands fa-whatsapp"></i> Inquire directly with our lead engineers
              </a>
            </div>
          </div>

          <details class="faq-acc-item" open>
            <summary class="faq-acc-summary">
              <div class="faq-acc-meta">
                <span class="faq-category-tag">SERVICES SCOPE</span>
                <h3 class="faq-acc-q">What IT services does your company provide?</h3>
              </div>
              <span class="faq-acc-icon" aria-hidden="true">+</span>
            </summary>
            <div class="faq-acc-content">
              <p>Retrotech provides 360° IT and digital solutions including custom Website Development, Mobile App Development, Enterprise Software, SaaS Products, SEO, Paid Marketing, and WhatsApp Marketing Automation.</p>
            </div>
          </details>

          <details class="faq-acc-item">
            <summary class="faq-acc-summary">
              <div class="faq-acc-meta">
                <span class="faq-category-tag">TAILORED SOLUTIONS</span>
                <h3 class="faq-acc-q">Do you provide customized solutions for businesses?</h3>
              </div>
              <span class="faq-acc-icon" aria-hidden="true">+</span>
            </summary>
            <div class="faq-acc-content">
              <p>Yes. We create customized websites, applications, and digital platforms that match your unique business workflows, branding guidelines, and long-term scaling objectives.</p>
            </div>
          </details>

          <details class="faq-acc-item">
            <summary class="faq-acc-summary">
              <div class="faq-acc-meta">
                <span class="faq-category-tag">TIMELINE &amp; SPRINT</span>
                <h3 class="faq-acc-q">How long does it take to complete an IT project?</h3>
              </div>
              <span class="faq-acc-icon" aria-hidden="true">+</span>
            </summary>
            <div class="faq-acc-content">
              <p>Project timelines depend on the scope and complexity. Standard business websites typically launch in 2 to 4 weeks, while custom web applications, mobile apps, or enterprise SaaS platforms follow agile sprint milestones ranging from 6 to 12 weeks.</p>
            </div>
          </details>

          <details class="faq-acc-item">
            <summary class="faq-acc-summary">
              <div class="faq-acc-meta">
                <span class="faq-category-tag">POST-LAUNCH SLA</span>
                <h3 class="faq-acc-q">Do you provide support after the project is completed?</h3>
              </div>
              <span class="faq-acc-icon" aria-hidden="true">+</span>
            </summary>
            <div class="faq-acc-content">
              <p>Yes, we provide dedicated post-launch support, ongoing maintenance, performance optimization, security monitoring, and scaling assistance so your digital product continues to run smoothly.</p>
            </div>
          </details>

          <details class="faq-acc-item">
            <summary class="faq-acc-summary">
              <div class="faq-acc-meta">
                <span class="faq-category-tag">IP &amp; SECURITY</span>
                <h3 class="faq-acc-q">Who owns the source code and intellectual property?</h3>
              </div>
              <span class="faq-acc-icon" aria-hidden="true">+</span>
            </summary>
            <div class="faq-acc-content">
              <p>You retain 100% full intellectual property (IP) and source code ownership upon project completion and milestone handover. We provide clean Git repositories, complete documentation, and zero proprietary lock-in.</p>
            </div>
          </details>

          <details class="faq-acc-item">
            <summary class="faq-acc-summary">
              <div class="faq-acc-meta">
                <span class="faq-category-tag">TECH STACK</span>
                <h3 class="faq-acc-q">What technologies and frameworks do you specialize in?</h3>
              </div>
              <span class="faq-acc-icon" aria-hidden="true">+</span>
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
