@extends('layouts.app')

@section('title', 'About Retrotech - Business Made Easy')
@section('description', 'Learn about Retrotech and our approach to secure, responsible IT asset management and technology lifecycle services.')

@section('content')
  <main>
    <section class="topic-section" id="about">
      <div class="topic-container">
        <h1 class="redefining-heading">
          <span class="heading-row-1">About</span>
          <span class="heading-row-2"><span class="word-modern">Retrotech</span></span>
        </h1>
        <p class="topic-subtext">We help businesses manage technology responsibly, protect sensitive information, and make the most of IT assets throughout their lifecycle.</p>
        <div class="topic-cta-wrap">
          <a href="{{ route('contact.page') }}#contact" class="btn-our-story contact-page-link">CONNECT WITH OUR TEAM</a>
        </div>
      </div>
    </section>

    <section class="services-section" id="about-story">
      <div class="services-container">
        <div class="services-header">
          <h2 class="services-heading">Technology, Managed with Care</h2>
          <p class="services-subtitle">Good IT asset management takes clear processes from the first inventory through data destruction, value recovery, and final reporting. Retrotech brings these services together to make that work easier for businesses to manage.</p>
        </div>

        <div class="services-grid">
          <article class="service-card" data-service-card>
            <div class="service-card-art" aria-hidden="true"><i class="fa-solid fa-shield-halved"></i></div>
            <div class="service-card-content">
              <h3>Security Comes First</h3>
              <p>We handle data-bearing equipment with care and provide secure data destruction services as part of responsible asset management.</p>
            </div>
          </article>
          <article class="service-card" data-service-card>
            <div class="service-card-art" aria-hidden="true"><i class="fa-solid fa-arrow-trend-up"></i></div>
            <div class="service-card-content">
              <h3>Value Where Possible</h3>
              <p>Equipment that can continue to be useful may be directed toward reuse or remarketing to help recover value.</p>
            </div>
          </article>
          <article class="service-card" data-service-card>
            <div class="service-card-art" aria-hidden="true"><i class="fa-solid fa-clipboard-check"></i></div>
            <div class="service-card-content">
              <h3>Clear from Start to Finish</h3>
              <p>Collection, assessment, and reporting give teams a clearer view of the work and the outcome for their assets.</p>
            </div>
          </article>
        </div>
      </div>
    </section>

    <section class="process-section" id="about-process">
      <div class="process-container">
        <div class="process-header">
          <span class="process-subtitle">OUR APPROACH</span>
          <h2 class="process-heading">A Clear Path for Every Asset</h2>
        </div>

        <div class="process-steps">
          <article class="process-step" data-process-step>
            <div class="step-circle-wrapper"><div class="step-number">01</div><div class="step-image step-icon-visual" aria-hidden="true"><i class="fa-solid fa-boxes-stacked"></i></div></div>
            <div class="step-content"><h3>Collection &amp; Audit</h3><p>Gather equipment and establish an inventory as a clear starting point for the project.</p></div>
          </article>
          <div class="process-arrow" aria-hidden="true"><i class="fa-solid fa-arrow-right"></i></div>
          <article class="process-step" data-process-step>
            <div class="step-circle-wrapper"><div class="step-number">02</div><div class="step-image step-icon-visual" aria-hidden="true"><i class="fa-solid fa-shield-halved"></i></div></div>
            <div class="step-content"><h3>Data Destruction</h3><p>Handle data-bearing devices through secure destruction services.</p></div>
          </article>
          <div class="process-arrow" aria-hidden="true"><i class="fa-solid fa-arrow-right"></i></div>
          <article class="process-step" data-process-step>
            <div class="step-circle-wrapper"><div class="step-number">03</div><div class="step-image step-icon-visual" aria-hidden="true"><i class="fa-solid fa-arrow-trend-up"></i></div></div>
            <div class="step-content"><h3>Value Recovery</h3><p>Identify suitable opportunities for reuse and remarketing where possible.</p></div>
          </article>
          <div class="process-arrow" aria-hidden="true"><i class="fa-solid fa-arrow-right"></i></div>
          <article class="process-step" data-process-step>
            <div class="step-circle-wrapper"><div class="step-number">04</div><div class="step-image step-icon-visual" aria-hidden="true"><i class="fa-solid fa-file-circle-check"></i></div></div>
            <div class="step-content"><h3>Reporting</h3><p>Close out the work with clear documentation of the completed process.</p></div>
          </article>
        </div>
      </div>
    </section>

    <section class="services-section">
      <div class="services-container">
        <div class="services-header"><span class="process-subtitle">WHAT WE HELP WITH</span><h2 class="services-heading">Practical Support Across the IT Lifecycle</h2><p class="services-subtitle">Retrotech brings related services together so teams can plan the full task, not just one step in isolation.</p></div>
        <div class="services-grid">
          <article class="service-card" data-service-card><div class="service-card-art" aria-hidden="true"><i class="fa-solid fa-hard-drive"></i></div><div class="service-card-content"><h3>Data-Bearing Devices</h3><p>Plan data destruction and secure handling for storage devices and business equipment.</p><a class="service-card-btn icon-label-control" href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'it-data-destruction']) }}"><span>Explore service</span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></div></article>
          <article class="service-card" data-service-card><div class="service-card-art" aria-hidden="true"><i class="fa-solid fa-recycle"></i></div><div class="service-card-content"><h3>Asset Value Recovery</h3><p>Consider reuse and remarketing options for equipment that may still have useful life.</p><a class="service-card-btn icon-label-control" href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'it-asset-remarketing']) }}"><span>Explore service</span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></div></article>
          <article class="service-card" data-service-card><div class="service-card-art" aria-hidden="true"><i class="fa-solid fa-server"></i></div><div class="service-card-content"><h3>Complex Environments</h3><p>Coordinate larger projects with attention to equipment, site needs, and closeout.</p><a class="service-card-btn icon-label-control" href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'data-center-decommissioning']) }}"><span>Explore service</span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></div></article>
        </div>
        <div class="topic-cta-wrap section-contact-cta"><a class="btn-our-story contact-page-link" href="{{ route('contact.page') }}#contact">TALK WITH OUR TEAM</a></div>
      </div>
    </section>

    <section class="process-section">
      <div class="process-container">
        <div class="process-header"><span class="process-subtitle">WORK WITH RETROTECH</span><h2 class="process-heading">A Better Starting Point Is a Conversation</h2></div>
        <div class="topic-container"><p class="topic-subtext">Talk with our team about your equipment, data, and timeline. We’ll help you consider the services and next steps that fit your situation.</p></div>
      </div>
    </section>
  </main>
@endsection
