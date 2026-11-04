@extends('layouts.app')

@section('title', 'Careers at Retrotech')
@section('description', 'Learn about working at Retrotech and get in touch about future opportunities.')

@section('content')
<main>
  <section class="topic-section">
    <div class="topic-container">
      <span class="process-subtitle">CAREERS AT RETROTECH</span>
      <h1 class="redefining-heading"><span class="heading-row-1">Bring your skills</span><span class="heading-row-2"><span class="word-modern">to meaningful work.</span></span></h1>
      <p class="topic-subtext">Help businesses manage technology thoughtfully, protect important information, and find responsible next steps for their IT assets.</p>
      <div class="topic-cta-wrap"><a href="{{ route('contact.page') }}#contact" class="btn-our-story contact-page-link">TELL US ABOUT YOURSELF</a></div>
    </div>
  </section>

  <section class="services-section">
    <div class="services-container">
      <div class="services-header"><h2 class="services-heading">How We Work Together</h2><p class="services-subtitle">We value practical thinking, care in the details, and clear communication with teammates and customers.</p></div>
      <div class="services-grid">
        <article class="service-card" data-service-card><div class="service-card-art" aria-hidden="true"><i class="fa-solid fa-people-group"></i></div><div class="service-card-content"><h3>Work as a team</h3><p>Share knowledge, coordinate carefully, and help one another deliver dependable service.</p></div></article>
        <article class="service-card" data-service-card><div class="service-card-art" aria-hidden="true"><i class="fa-solid fa-shield-halved"></i></div><div class="service-card-content"><h3>Care about the details</h3><p>Take security, documentation, and responsible asset handling seriously.</p></div></article>
        <article class="service-card" data-service-card><div class="service-card-art" aria-hidden="true"><i class="fa-solid fa-lightbulb"></i></div><div class="service-card-content"><h3>Keep learning</h3><p>Bring curiosity to new challenges and look for practical ways to improve the work.</p></div></article>
      </div>
    </div>
  </section>

  <section class="process-section">
    <div class="process-container">
      <div class="process-header"><span class="process-subtitle">JOIN THE CONVERSATION</span><h2 class="process-heading">Interested in Working with Us?</h2></div>
      <div class="topic-container"><p class="topic-subtext">There may not be a listed opening that matches your experience today. Send us a note about your interests and background, and our team can keep your details in mind for future opportunities.</p><div class="topic-cta-wrap"><a class="btn-our-story contact-page-link" href="{{ route('contact.page') }}#contact">CONTACT OUR TEAM</a></div></div>
    </div>
  </section>

  <section class="services-section">
    <div class="services-container">
      <div class="services-header"><span class="process-subtitle">WAYS TO CONTRIBUTE</span><h2 class="services-heading">Different Skills, One Careful Approach</h2><p class="services-subtitle">Our work connects people, process, and technology. These are examples of areas where thoughtful teammates make a difference.</p></div>
      <div class="services-grid">
        <article class="service-card" data-service-card><div class="service-card-content"><h3>Project Coordination</h3><p>Help teams stay aligned on schedules, equipment lists, and the practical details of each engagement.</p></div></article>
        <article class="service-card" data-service-card><div class="service-card-content"><h3>Technology Operations</h3><p>Bring an organized eye to inventory, equipment handling, and technology lifecycle work.</p></div></article>
        <article class="service-card" data-service-card><div class="service-card-content"><h3>Customer Support</h3><p>Make complex services easier to understand through responsive communication and helpful guidance.</p></div></article>
      </div>
      <div class="topic-cta-wrap section-contact-cta"><a class="btn-our-story contact-page-link" href="{{ route('contact.page') }}#contact">SHARE YOUR EXPERIENCE</a></div>
    </div>
  </section>

  <section class="process-section">
    <div class="process-container">
      <div class="process-header"><span class="process-subtitle">MAKE AN INTRODUCTION</span><h2 class="process-heading">A Good Conversation Can Start Anywhere</h2></div>
      <div class="topic-container"><p class="topic-subtext">Tell us what kind of work interests you, the experience you would bring, and how you like to contribute. We’ll share your note with the appropriate team.</p></div>
    </div>
  </section>
</main>
@endsection
