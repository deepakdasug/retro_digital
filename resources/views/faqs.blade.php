@extends('layouts.app')

@section('title', 'FAQs - Retrotech')
@section('description', 'Answers to common questions about IT asset management, data destruction, and technology lifecycle services.')

@section('content')
<main>
  <section class="topic-section">
    <div class="topic-container">
      <span class="process-subtitle">HELP &amp; INFORMATION</span>
      <h1 class="redefining-heading"><span class="heading-row-1">Frequently Asked</span><span class="heading-row-2"><span class="word-modern">Questions</span></span></h1>
      <p class="topic-subtext">Some starting points for planning IT asset and data lifecycle work. Contact us if you have a question about your organization’s needs.</p>
      <div class="topic-cta-wrap"><a class="btn-our-story contact-page-link" href="{{ route('contact.page') }}#contact">ASK OUR TEAM</a></div>
    </div>
  </section>
  <section class="services-section">
    <div class="services-container">
      <div class="services-header"><h2 class="services-heading">Common Questions</h2><p class="services-subtitle">These answers are general guidance. The right process depends on your assets and project requirements.</p></div>
      <div class="services-grid">
        <article class="service-card visible"><div class="service-card-content"><h3>What is IT asset disposition?</h3><p>IT asset disposition (ITAD) is the planned handling of retired technology, including inventory, data security, reuse or remarketing, recycling, and reporting as appropriate.</p></div></article>
        <article class="service-card visible"><div class="service-card-content"><h3>How are data-bearing devices handled?</h3><p>Devices that may contain information should be identified at the start of a project. The agreed plan can specify data destruction steps and the records your organization needs.</p></div></article>
        <article class="service-card visible"><div class="service-card-content"><h3>Can retired equipment still have value?</h3><p>Some equipment may be suitable for reuse or remarketing depending on its type, age, condition, and your organization’s requirements.</p></div></article>
        <article class="service-card visible"><div class="service-card-content"><h3>What happens during collection and audit?</h3><p>Equipment is gathered and inventoried to create a clear project record, confirm the items in scope, and help determine appropriate next steps.</p></div></article>
        <article class="service-card visible"><div class="service-card-content"><h3>Can you support a data center project?</h3><p>Data center decommissioning can be planned around site access, equipment lists, operational timelines, data security, and the closeout information your team needs.</p></div></article>
        <article class="service-card visible"><div class="service-card-content"><h3>What should I include in a project enquiry?</h3><p>A rough equipment list, location, preferred timing, and any data handling requirements give the team a useful starting point. Do not include passwords or sensitive records in the website form.</p><a class="service-card-btn contact-page-link icon-label-control" href="{{ route('contact.page') }}#contact"><i class="fa-regular fa-envelope" aria-hidden="true"></i><span>Contact Retrotech</span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></div></article>
      </div>
    </div>
  </section>

  <section class="process-section">
    <div class="process-container">
      <div class="process-header"><span class="process-subtitle">PLANNING A PROJECT?</span><h2 class="process-heading">A Few Details Help Set the Direction</h2></div>
      <div class="process-steps">
        <article class="process-step"><div class="step-circle-wrapper"><div class="step-number">01</div><div class="step-image step-icon-visual" aria-hidden="true"><i class="fa-solid fa-laptop"></i></div></div><div class="step-content"><h3>Asset Types</h3><p>Make a rough list of device types, quantities, and any known condition details.</p></div></article>
        <div class="process-arrow" aria-hidden="true"><i class="fa-solid fa-arrow-right"></i></div>
        <article class="process-step"><div class="step-circle-wrapper"><div class="step-number">02</div><div class="step-image step-icon-visual" aria-hidden="true"><i class="fa-solid fa-shield-halved"></i></div></div><div class="step-content"><h3>Data Considerations</h3><p>Identify which devices may store information that needs careful handling.</p></div></article>
        <div class="process-arrow" aria-hidden="true"><i class="fa-solid fa-arrow-right"></i></div>
        <article class="process-step"><div class="step-circle-wrapper"><div class="step-number">03</div><div class="step-image step-icon-visual" aria-hidden="true"><i class="fa-solid fa-location-dot"></i></div></div><div class="step-content"><h3>Location &amp; Timing</h3><p>Note where the equipment is and any important dates or access requirements.</p></div></article>
        <div class="process-arrow" aria-hidden="true"><i class="fa-solid fa-arrow-right"></i></div>
        <article class="process-step"><div class="step-circle-wrapper"><div class="step-number">04</div><div class="step-image step-icon-visual" aria-hidden="true"><i class="fa-solid fa-bullseye"></i></div></div><div class="step-content"><h3>Desired Outcome</h3><p>Think about what your team needs to know when the work is complete.</p></div></article>
      </div>
    </div>
  </section>

  <section class="services-section">
    <div class="services-container">
      <div class="services-header"><h2 class="services-heading">Questions About Specific Services?</h2><p class="services-subtitle">Browse the service pages for a closer look at common project considerations.</p></div>
      <div class="services-grid">
        <article class="service-card visible"><div class="service-card-content"><h3>Data Destruction</h3><p>Review planning considerations for data-bearing devices.</p><a class="service-card-btn icon-label-control" href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'it-data-destruction']) }}"><span>Read about data destruction</span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></div></article>
        <article class="service-card visible"><div class="service-card-content"><h3>Asset Remarketing</h3><p>Learn how teams can consider reuse and value recovery.</p><a class="service-card-btn icon-label-control" href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'it-asset-remarketing']) }}"><span>Read about remarketing</span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></div></article>
        <article class="service-card visible"><div class="service-card-content"><h3>Data Center Projects</h3><p>Explore the coordination involved in decommissioning work.</p><a class="service-card-btn icon-label-control" href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'data-center-decommissioning']) }}"><span>Read about data center projects</span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></div></article>
      </div>
      <div class="topic-cta-wrap section-contact-cta"><a class="btn-our-story contact-page-link" href="{{ route('contact.page') }}#contact">ASK ABOUT YOUR PROJECT</a></div>
    </div>
  </section>

  <section class="topic-section">
    <div class="topic-container"><span class="process-subtitle">STILL HAVE A QUESTION?</span><h2 class="services-heading">Let’s Talk Through Your Requirements</h2><p class="topic-subtext">Share the details you have so far. Our team can help identify the next practical step.</p></div>
  </section>
</main>
@endsection
