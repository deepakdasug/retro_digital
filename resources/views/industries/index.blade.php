@extends('layouts.app')

@section('title', 'Industries We Serve: Enterprise IT Solutions | Retrotech')
@section('description', 'Discover tailored IT and software solutions engineered for healthcare, fintech, e-commerce, logistics, manufacturing, edtech, real estate, and hospitality.')
@section('canonical', route('industries.index'))

@push('head')
<meta name="keywords" content="Industries We Serve, Global Partners, IT Solutions, Retrotech Digital, Who We Serve, Digital Transformation">
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/services-index.css') }}?v={{ file_exists(public_path('css/services-index.css')) ? filemtime(public_path('css/services-index.css')) : '4.1' }}">
@endpush

@section('content')
<main class="srv-flagship-wrap">

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
            <span>Global Partners, Clients &amp; Industry Leaders</span>
          </div>

          <h1 class="srv-hero-heading">
            Who We <span class="brand-mint">Serve</span>
          </h1>

          <p class="srv-hero-lead">
            We provide certified IT and tailored technology solutions to businesses across all industries—from high-growth startups and global enterprises to healthcare, retail, finance, and education, ensuring security, compliance, and maximum digital performance.
          </p>

          <div class="srv-hero-actions">
            <a href="#industriesStudio" class="btn-hero-explore">
              <span>Explore All 12 Industries</span>
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
              <span>12 Core Industries</span>
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
                <span>Fast Industry Consultation</span>
              </h3>
              <p class="terminal-sub">Speak directly with our technology architects and industry leads.</p>
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
                  <option value="" disabled selected>Select Your Industry *</option>
                  <option value="Ecommerce & Multivendor">Ecommerce &amp; Multivendor</option>
                  <option value="Real Estate & Construction">Real Estate &amp; Construction</option>
                  <option value="Manufacturing">Manufacturing</option>
                  <option value="Media & Entertainment">Media &amp; Entertainment</option>
                  <option value="Medical & Healthcare">Medical &amp; Healthcare</option>
                  <option value="Personal Beauty Care">Personal Beauty Care</option>
                  <option value="EdTech & E-Learning">EdTech &amp; E-Learning</option>
                  <option value="Travel & Hospitality">Travel &amp; Hospitality</option>
                  <option value="Transportation & Logistics">Transportation &amp; Logistics</option>
                  <option value="Oil and Gas">Oil and Gas</option>
                  <option value="Finance & Insurance">Finance &amp; Insurance</option>
                  <option value="Other Industries">Other Industries</option>
                </select>
              </div>

              <button type="submit" class="btn-terminal-submit">
                <span>Request Industry Proposal</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>

              <div class="terminal-guarantee">
                <span><i class="fa-solid fa-lock" style="color: var(--srv-green-brand, #2f6f46);"></i> Strict NDA Protected</span>
                <span><i class="fa-solid fa-bolt" style="color: var(--srv-green-brand, #2f6f46);"></i> 24h Response</span>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </header>

  {{-- =========================================================================
       2. THE 12 INDUSTRIES: TWO FLAGSHIP THEMATIC STUDIOS
       ========================================================================= --}}
  <section class="srv-showcase-section" id="industriesStudio">
    <div class="srv-showcase-container">

      {{-- STUDIO A: CONSUMER, RETAIL, HEALTH & MEDIA SOLUTIONS --}}
      <div class="studio-block-group" id="studioConsumerGroup">
        <div class="studio-headline-block">
          <span class="studio-headline-chip">Consumer, Retail &amp; Life Sciences</span>
          <h2 class="studio-headline-title">Commerce, Media &amp; Health Solutions</h2>
          <p class="studio-headline-sub">Accelerate audience engagement, omnichannel retail transactions, and HIPAA-compliant healthcare workflows.</p>
        </div>

        <div class="marketing-bento-grid">

          {{-- Industry 1: Ecommerce & Multivendor (Spotlight Wide Bento) --}}
          <article class="flagship-card bento-card bento-card-wide bento-card-spotlight">
            <div class="bento-badge-strip">
              <span class="card-metric-badge"><i class="fa-solid fa-cart-shopping" aria-hidden="true"></i> Omnichannel Retail</span>
              <span class="bento-serp-chip"><i class="fa-solid fa-bolt" aria-hidden="true"></i> High-Converting GMV</span>
            </div>
            <div class="bento-hero-main">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-cart-shopping"></i></div>
              <div class="bento-hero-text">
                <h3 class="flagship-card-title">Ecommerce &amp; Multivendor</h3>
                <p class="flagship-card-desc">Build high-converting online stores, multi-vendor marketplaces, and omnichannel retail platforms with seamless checkout and inventory management.</p>
              </div>
            </div>
            <div class="bento-card-media bento-wide-card-media">
              <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1000&q=80" alt="Ecommerce & Multivendor" loading="lazy">
              <span class="bento-media-badge"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i> Enterprise Scalable</span>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('industries.show', 'ecommerce-multivendor') }}" class="card-explore-btn">
                <span>Explore Industry Solutions</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
              <span class="bento-footer-stat">Ready for High GMV</span>
            </div>
          </article>

          {{-- Industry 2: Real Estate & Construction (Standard Bento) --}}
          <article class="flagship-card bento-card">
            <div class="card-crest-row">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-building"></i></div>
              <span class="card-metric-badge">Property Tech</span>
            </div>
            <h3 class="flagship-card-title">Real Estate &amp; Construction</h3>
            <p class="flagship-card-desc">Property listing portals, MLS synchronizations, interactive 3D virtual tours, construction management CRM, and automated lead capture.</p>
            <div class="bento-card-media">
              <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=800&q=80" alt="Real Estate & Construction" loading="lazy">
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('industries.show', 'real-estate-and-construction') }}" class="card-explore-btn">
                <span>Explore Industry Solutions</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </article>

          {{-- Industry 3: Media & Entertainment (Standard Bento) --}}
          <article class="flagship-card bento-card">
            <div class="card-crest-row">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-film"></i></div>
              <span class="card-metric-badge">Audience Media</span>
            </div>
            <h3 class="flagship-card-title">Media &amp; Entertainment</h3>
            <p class="flagship-card-desc">High-traffic video streaming architectures, digital content distribution networks, dynamic audience engagement portals, and interactive experiences.</p>
            <div class="bento-card-media">
              <img src="https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?auto=format&fit=crop&w=800&q=80" alt="Media & Entertainment" loading="lazy">
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('industries.show', 'media-and-entertainment') }}" class="card-explore-btn">
                <span>Explore Industry Solutions</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </article>

          {{-- Industry 4: Medical & Healthcare (Spotlight Wide Bento) --}}
          <article class="flagship-card bento-card bento-card-wide bento-card-spotlight">
            <div class="bento-badge-strip">
              <span class="card-metric-badge"><i class="fa-solid fa-stethoscope" aria-hidden="true"></i> HIPAA Compliant</span>
              <span class="bento-serp-chip"><i class="fa-solid fa-heart-pulse" aria-hidden="true"></i> Telehealth Systems</span>
            </div>
            <div class="bento-hero-main">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-stethoscope"></i></div>
              <div class="bento-hero-text">
                <h3 class="flagship-card-title">Medical &amp; Healthcare</h3>
                <p class="flagship-card-desc">HIPAA-compliant digital health applications, telemedicine platforms, patient appointment booking systems, and confidential medical data pipelines.</p>
              </div>
            </div>
            <div class="bento-card-media bento-wide-card-media">
              <img src="https://images.unsplash.com/photo-1584982751601-97dcc096659c?auto=format&fit=crop&w=1000&q=80" alt="Medical & Healthcare" loading="lazy">
              <span class="bento-media-badge"><i class="fa-solid fa-shield-virus" aria-hidden="true"></i> HIPAA &amp; ISO 27001</span>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('industries.show', 'medical-and-healthcare') }}" class="card-explore-btn">
                <span>Explore Industry Solutions</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
              <span class="bento-footer-stat">Confidential Data Pipelines</span>
            </div>
          </article>

          {{-- Industry 5: Personal Beauty Care (Spotlight Wide Bento) --}}
          <article class="flagship-card bento-card bento-card-wide bento-card-spotlight">
            <div class="bento-badge-strip">
              <span class="card-metric-badge"><i class="fa-solid fa-spa" aria-hidden="true"></i> D2C Brand &amp; Booking</span>
              <span class="bento-serp-chip"><i class="fa-solid fa-gem" aria-hidden="true"></i> Loyalty Programs</span>
            </div>
            <div class="bento-hero-main">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-spa"></i></div>
              <div class="bento-hero-text">
                <h3 class="flagship-card-title">Personal Beauty Care</h3>
                <p class="flagship-card-desc">Salon booking engines, direct-to-consumer cosmetics ecommerce, customer loyalty rewards programs, and social brand marketing acceleration.</p>
              </div>
            </div>
            <div class="bento-card-media bento-wide-card-media">
              <img src="https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?auto=format&fit=crop&w=1000&q=80" alt="Personal Beauty Care" loading="lazy">
              <span class="bento-media-badge"><i class="fa-solid fa-award" aria-hidden="true"></i> Premium Experience</span>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('industries.show', 'personal-beauty-care') }}" class="card-explore-btn">
                <span>Explore Industry Solutions</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
              <span class="bento-footer-stat">Omnichannel D2C Ready</span>
            </div>
          </article>

          {{-- Industry 6: EdTech & E-Learning (Standard Bento) --}}
          <article class="flagship-card bento-card">
            <div class="card-crest-row">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-graduation-cap"></i></div>
              <span class="card-metric-badge">Education Platforms</span>
            </div>
            <h3 class="flagship-card-title">EdTech &amp; E-Learning</h3>
            <p class="flagship-card-desc">Scalable learning management systems (LMS), virtual classrooms, interactive student portals, video lecture streaming, and automated certification engines.</p>
            <div class="bento-card-media">
              <img src="https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&w=800&q=80" alt="EdTech & E-Learning" loading="lazy">
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('industries.show', 'edtech-and-e-learning') }}" class="card-explore-btn">
                <span>Explore Industry Solutions</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </article>

        </div>
      </div>

      {{-- STUDIO B: INDUSTRIAL, MOBILITY, ENERGY & FINANCIAL TECH --}}
      <div class="studio-block-group" id="studioEnterpriseGroup">
        <div class="studio-headline-block">
          <span class="studio-headline-chip">Operations, Infrastructure &amp; Scale</span>
          <h2 class="studio-headline-title">Industrial, Logistics &amp; Financial Technologies</h2>
          <p class="studio-headline-sub">Modernize supply chains, energy asset lifecycles, freight routing, and banking-grade security architectures.</p>
        </div>

        <div class="tech-bento-grid">

          {{-- Industry 7: Manufacturing (Spotlight Wide Bento) --}}
          <article class="flagship-card bento-card bento-card-wide bento-card-spotlight">
            <div class="bento-badge-strip">
              <span class="card-metric-badge"><i class="fa-solid fa-industry" aria-hidden="true"></i> Industrial Automation</span>
              <span class="bento-serp-chip"><i class="fa-solid fa-gears" aria-hidden="true"></i> Smart Factory</span>
            </div>
            <div class="bento-hero-main">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-industry"></i></div>
              <div class="bento-hero-text">
                <h3 class="flagship-card-title">Manufacturing</h3>
                <p class="flagship-card-desc">Industrial automation, enterprise ERP solutions, supply chain digitization, production tracking, and IoT-ready factory workflows for smart operations.</p>
              </div>
            </div>
            <div class="bento-card-media bento-wide-card-media">
              <img src="https://images.unsplash.com/photo-1565793298595-6a879b1d9492?auto=format&fit=crop&w=1000&q=80" alt="Manufacturing" loading="lazy">
              <span class="bento-media-badge"><i class="fa-solid fa-microchip" aria-hidden="true"></i> Industry 4.0 IoT</span>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('industries.show', 'manufacturing') }}" class="card-explore-btn">
                <span>Explore Industry Solutions</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
              <span class="bento-footer-stat">IoT &amp; ERP Synchronized</span>
            </div>
          </article>

          {{-- Industry 8: Transportation & Logistics (Standard Bento) --}}
          <article class="flagship-card bento-card">
            <div class="card-crest-row">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-truck"></i></div>
              <span class="card-metric-badge">Fleet &amp; Freight</span>
            </div>
            <h3 class="flagship-card-title">Transportation &amp; Logistics</h3>
            <p class="flagship-card-desc">Real-time fleet tracking software, logistics routing dispatch portals, warehouse management systems, and automated shipment notification tools.</p>
            <div class="bento-card-media">
              <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=800&q=80" alt="Transportation & Logistics" loading="lazy">
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('industries.show', 'transportation-and-logistics') }}" class="card-explore-btn">
                <span>Explore Industry Solutions</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </article>

          {{-- Industry 9: Travel & Hospitality (Standard Bento) --}}
          <article class="flagship-card bento-card">
            <div class="card-crest-row">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-plane-departure"></i></div>
              <span class="card-metric-badge">Booking Systems</span>
            </div>
            <h3 class="flagship-card-title">Travel &amp; Hospitality</h3>
            <p class="flagship-card-desc">Direct hotel booking engines, dynamic tour itinerary apps, channel manager integrations, and automated guest experience messaging.</p>
            <div class="bento-card-media">
              <img src="https://images.unsplash.com/photo-1564501049412-61c2a3083791?auto=format&fit=crop&w=800&q=80" alt="Travel & Hospitality" loading="lazy">
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('industries.show', 'travel-and-hospitality') }}" class="card-explore-btn">
                <span>Explore Industry Solutions</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </article>

          {{-- Industry 10: Oil and Gas (Spotlight Wide Bento) --}}
          <article class="flagship-card bento-card bento-card-wide bento-card-spotlight">
            <div class="bento-badge-strip">
              <span class="card-metric-badge"><i class="fa-solid fa-oil-well" aria-hidden="true"></i> Energy Operations</span>
              <span class="bento-serp-chip"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i> Mission Critical</span>
            </div>
            <div class="bento-hero-main">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-oil-well"></i></div>
              <div class="bento-hero-text">
                <h3 class="flagship-card-title">Oil and Gas</h3>
                <p class="flagship-card-desc">Industrial asset lifecycle monitoring, field energy operations dashboards, environmental compliance tracking, and secure telemetry data ingestion.</p>
              </div>
            </div>
            <div class="bento-card-media bento-wide-card-media">
              <img src="https://images.unsplash.com/photo-1596980786765-775174984ec9?auto=format&fit=crop&w=1000&q=80" alt="Oil and Gas" loading="lazy">
              <span class="bento-media-badge"><i class="fa-solid fa-gauge-high" aria-hidden="true"></i> Mission Critical SCADA</span>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('industries.show', 'oil-and-gas') }}" class="card-explore-btn">
                <span>Explore Industry Solutions</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
              <span class="bento-footer-stat">Asset &amp; Safety Certified</span>
            </div>
          </article>

          {{-- Industry 11: Finance & Insurance (Spotlight Wide Bento) --}}
          <article class="flagship-card bento-card bento-card-wide bento-card-spotlight">
            <div class="bento-badge-strip">
              <span class="card-metric-badge"><i class="fa-solid fa-hand-holding-dollar" aria-hidden="true"></i> Fintech Grade</span>
              <span class="bento-serp-chip"><i class="fa-solid fa-vault" aria-hidden="true"></i> Banking Security</span>
            </div>
            <div class="bento-hero-main">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-hand-holding-dollar"></i></div>
              <div class="bento-hero-text">
                <h3 class="flagship-card-title">Finance &amp; Insurance</h3>
                <p class="flagship-card-desc">Fintech web applications, loan processing calculators, secure payment portals, insurance quote engines, and banking compliance architectures.</p>
              </div>
            </div>
            <div class="bento-card-media bento-wide-card-media">
              <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=1000&q=80" alt="Finance & Insurance" loading="lazy">
              <span class="bento-media-badge"><i class="fa-solid fa-vault" aria-hidden="true"></i> SOC2 &amp; PCI-DSS Ready</span>
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('industries.show', 'finance-and-insurance') }}" class="card-explore-btn">
                <span>Explore Industry Solutions</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
              <span class="bento-footer-stat">Bank-Grade Encryption Ready</span>
            </div>
          </article>

          {{-- Industry 12: Other Industries (Standard Bento) --}}
          <article class="flagship-card bento-card">
            <div class="card-crest-row">
              <div class="card-icon-crest" aria-hidden="true"><i class="fa-solid fa-layer-group"></i></div>
              <span class="card-metric-badge">Custom Engineering</span>
            </div>
            <h3 class="flagship-card-title">Other Industries</h3>
            <p class="flagship-card-desc">Bespoke digital transformation, custom cloud platforms, and tailored software architectures across emerging, niche, and non-profit sectors.</p>
            <div class="bento-card-media">
              <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=800&q=80" alt="Other Industries" loading="lazy">
            </div>
            <div class="bento-card-footer">
              <a href="{{ route('industries.show', 'other-industries') }}" class="card-explore-btn">
                <span>Explore Industry Solutions</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </article>

        </div>
      </div>

    </div>
  </section>

  {{-- =========================================================================
       3. ENTERPRISE TRUST BENTO (Why Choose Us: Top Six Reasons)
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

        {{-- Bento Reason 1 --}}
        <div class="bento-reason-unit">
          <div class="bento-reason-header">
            <span class="reason-num-crest">01</span>
            <i class="fa-solid fa-user-check" style="color: var(--srv-green-brand, #2f6f46); font-size: 16px;"></i>
          </div>
          <h4 class="reason-unit-title">Experienced IT Professionals</h4>
          <p class="reason-unit-desc">Our skilled developers, designers, and technology experts deliver reliable solutions using proven industry practices.</p>
        </div>

        {{-- Bento Reason 2 --}}
        <div class="bento-reason-unit">
          <div class="bento-reason-header">
            <span class="reason-num-crest">02</span>
            <i class="fa-solid fa-puzzle-piece" style="color: var(--srv-green-brand, #2f6f46); font-size: 16px;"></i>
          </div>
          <h4 class="reason-unit-title">Customised Business Solutions</h4>
          <p class="reason-unit-desc">We create tailored websites, applications, software, and digital solutions that match your business processes and objectives.</p>
        </div>

        {{-- Bento Reason 3 --}}
        <div class="bento-reason-unit">
          <div class="bento-reason-header">
            <span class="reason-num-crest">03</span>
            <i class="fa-solid fa-clock-rotate-left" style="color: var(--srv-green-brand, #2f6f46); font-size: 16px;"></i>
          </div>
          <h4 class="reason-unit-title">On-Time Project Delivery</h4>
          <p class="reason-unit-desc">We use the latest tools, frameworks, and technologies to build secure, high-performing, and future-ready digital products.</p>
        </div>

        {{-- Bento Reason 4 --}}
        <div class="bento-reason-unit">
          <div class="bento-reason-header">
            <span class="reason-num-crest">04</span>
            <i class="fa-solid fa-comments" style="color: var(--srv-green-brand, #2f6f46); font-size: 16px;"></i>
          </div>
          <h4 class="reason-unit-title">Transparent Communication</h4>
          <p class="reason-unit-desc">We maintain clear communication, transparent processes, and timely delivery throughout every stage of your project.</p>
        </div>

        {{-- Bento Reason 5 --}}
        <div class="bento-reason-unit">
          <div class="bento-reason-header">
            <span class="reason-num-crest">05</span>
            <i class="fa-solid fa-shield-halved" style="color: var(--srv-green-brand, #2f6f46); font-size: 16px;"></i>
          </div>
          <h4 class="reason-unit-title">Scalable &amp; Secure Technologies</h4>
          <p class="reason-unit-desc">Every solution is carefully designed, developed, tested, and optimized to provide an excellent user experience.</p>
        </div>

        {{-- Bento Reason 6 --}}
        <div class="bento-reason-unit">
          <div class="bento-reason-header">
            <span class="reason-num-crest">06</span>
            <i class="fa-solid fa-headset" style="color: var(--srv-green-brand, #2f6f46); font-size: 16px;"></i>
          </div>
          <h4 class="reason-unit-title">Dedicated Post-Launch Support</h4>
          <p class="reason-unit-desc">We provide cost-effective IT services that can easily scale and adapt as your business continues to grow.</p>
        </div>

      </div>

    </div>
  </section>

  {{-- =========================================================================
       4. OFFICIAL ENTERPRISE CERTIFICATION & COMPLIANCE SHOWCASE
       ========================================================================= --}}
  <section class="srv-cert-section" id="certificationSection">
    <div class="srv-cert-container">
      <div class="srv-cert-card">
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
              <button type="button" class="slide-nav-btn prev" id="prevReviewBtn" aria-label="Previous review">
                <i class="fa-solid fa-arrow-left"></i>
              </button>
              <button type="button" class="slide-nav-btn next" id="nextReviewBtn" aria-label="Next review">
                <i class="fa-solid fa-arrow-right"></i>
              </button>
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
            <a href="{{ route('contact.page') }}#contact" class="btn-act-call">
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
            <a href="{{ url('/blog/cloud-computing-managed-it-services-scalable-businesses') }}" class="blog-deck-card">
              <div class="blog-card-thumb">
                <img src="https://images.unsplash.com/photo-1667984390538-3dea7a3fe33d?auto=format&fit=crop&w=400&h=300&q=80" alt="Cloud Computing and Managed IT Services for Scalable Businesses" loading="lazy">
              </div>
              <div class="blog-card-content">
                <div class="blog-card-meta">
                  <span><i class="fa-regular fa-calendar"></i> 31 JAN</span>
                  <span><i class="fa-solid fa-lightbulb"></i> Strategy</span>
                </div>
                <h4 class="blog-card-h4">Cloud Computing &amp; Managed IT Services for Businesses</h4>
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
      <span>INDUSTRY-FOCUSED IT SOLUTIONS</span><span class="divider">✦</span>
      <span>CERTIFIED R2V3 ENTERPRISE STANDARD</span><span class="divider">✦</span>
      <span>SCALABLE ARCHITECTURES</span><span class="divider">✦</span>
      <span>ZERO DATA LEAKAGE</span><span class="divider">✦</span>
      <span>GLOBAL DELIVERY</span><span class="divider">✦</span>
      <span>24/7 DEDICATED SUPPORT</span><span class="divider">✦</span>
      <span>INDUSTRY-FOCUSED IT SOLUTIONS</span><span class="divider">✦</span>
      <span>CERTIFIED R2V3 ENTERPRISE STANDARD</span><span class="divider">✦</span>
      <span>SCALABLE ARCHITECTURES</span><span class="divider">✦</span>
      <span>ZERO DATA LEAKAGE</span><span class="divider">✦</span>
      <span>GLOBAL DELIVERY</span><span class="divider">✦</span>
      <span>24/7 DEDICATED SUPPORT</span><span class="divider">✦</span>
    </div>
  </div>

</main>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Client Experience Carousel with Swipe & Touch Gestures
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
      prevBtn.addEventListener('click', (e) => {
        e.preventDefault();
        renderReview(currentSlide - 1, 'prev');
        restartTimer();
      });
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
        // Require horizontal swipe of at least 35px and more horizontal than vertical
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
