@extends('layouts.app')

@section('title', $page['title'] . ' - Retrotech')
@section('description', $page['summary'])

@section('content')
  <main>
    <section class="topic-section">
      <div class="topic-container">
        <span class="process-subtitle">{{ $section['label'] }}</span>
        <h1 class="redefining-heading"><span class="heading-row-1">{{ $page['title'] }}</span></h1>
        <p class="topic-subtext">{{ $page['summary'] }}</p>
        <div class="topic-cta-wrap"><a class="btn-our-story contact-page-link" href="{{ route('contact.page') }}#contact">DISCUSS YOUR NEEDS</a></div>
      </div>
    </section>

    <section class="services-section">
      <div class="services-container">
        <div class="services-header">
          <h2 class="services-heading">A Practical Approach to {{ $page['title'] }}</h2>
          <p class="services-subtitle">Retrotech works with businesses to understand their equipment, information, and operational requirements, then shape a clear plan for the work.</p>
        </div>
        <div class="services-grid">
          <article class="service-card visible"><div class="service-card-art" aria-hidden="true"><i class="fa-solid fa-list-check"></i></div><div class="service-card-content"><h3>Understand the requirements</h3><p>Start with the organization’s goals, assets, and practical constraints so the approach fits the work.</p></div></article>
          <article class="service-card visible"><div class="service-card-art" aria-hidden="true"><i class="fa-solid fa-shield-halved"></i></div><div class="service-card-content"><h3>Handle assets responsibly</h3><p>Consider data security, asset condition, and appropriate next steps throughout the process.</p></div></article>
          <article class="service-card visible"><div class="service-card-art" aria-hidden="true"><i class="fa-solid fa-file-circle-check"></i></div><div class="service-card-content"><h3>Close with clarity</h3><p>Keep teams informed with an organized process and clear reporting on completed work.</p></div></article>
        </div>
      </div>
    </section>

    <section class="process-section">
      <div class="process-container">
        <div class="process-header"><span class="process-subtitle">NEXT STEP</span><h2 class="process-heading">Let’s Talk About {{ $page['title'] }}</h2></div>
        <div class="topic-container"><p class="topic-subtext">Tell us about your organization’s needs and we’ll help identify a practical way forward.</p><div class="topic-cta-wrap"><a class="btn-our-story contact-page-link" href="{{ route('contact.page') }}#contact">CONTACT RETROTECH</a></div></div>
      </div>
    </section>

    <section class="services-section">
      <div class="services-container">
        <div class="services-header"><h2 class="services-heading">What a Thoughtful Project Includes</h2><p class="services-subtitle">Good outcomes come from clear expectations and steady coordination.</p></div>
        <div class="services-grid">
          <article class="service-card visible"><div class="service-card-content"><h3>A Clear Starting Point</h3><p>Agree on project goals, the assets involved, and any site or timing considerations before work begins.</p></div></article>
          <article class="service-card visible"><div class="service-card-content"><h3>Careful Coordination</h3><p>Keep the right people informed as equipment moves through assessment and handling.</p></div></article>
          <article class="service-card visible"><div class="service-card-content"><h3>A Useful Closeout</h3><p>Review the completed work and identify any next steps for your team.</p></div></article>
        </div>
        <div class="topic-cta-wrap section-contact-cta"><a class="btn-our-story contact-page-link" href="{{ route('contact.page') }}#contact">DISCUSS YOUR PROJECT</a></div>
      </div>
    </section>

    <section class="process-section">
      <div class="process-container">
        <div class="process-header"><span class="process-subtitle">PLAN WITH CONFIDENCE</span><h2 class="process-heading">Start with the Details That Matter</h2></div>
        <div class="topic-container"><p class="topic-subtext">A short conversation about your equipment, locations, timelines, and goals can help shape a practical plan for {{ $page['title'] }}.</p></div>
      </div>
    </section>
  </main>
@endsection
