@extends('layouts.app')

@section('title', $title . ' - Retrotech')
@section('description', $summary)

@section('content')
<main>
  <section class="topic-section">
    <div class="topic-container">
      <span class="process-subtitle">WEBSITE INFORMATION</span>
      <h1 class="redefining-heading"><span class="heading-row-1">{{ $title }}</span></h1>
      <p class="topic-subtext">{{ $summary }}</p>
    </div>
  </section>

  <section class="services-section">
    <div class="services-container">
      <div class="legal-document">
        <p class="legal-notice">{{ $notice }}</p>
        @foreach ($sections as $section)
          <section class="legal-document-section">
            <h2>{{ $section['heading'] }}</h2>
            <p>{{ $section['body'] }}</p>
          </section>
        @endforeach
        <p class="legal-updated">Last updated: October 2026</p>
      </div>
      <div class="topic-cta-wrap section-contact-cta">
        <a class="btn-our-story contact-page-link" href="{{ route('contact.page') }}#contact">CONTACT OUR TEAM</a>
      </div>
    </div>
  </section>
</main>
@endsection
