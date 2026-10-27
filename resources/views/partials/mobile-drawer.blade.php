<aside class="mobile-nav-drawer" id="mobileNavDrawer" aria-hidden="true">
  <div class="drawer-header">
    <img src="{{ asset('assets/images/logo.png') }}" alt="Retrotech Logo" class="drawer-logo">
    <button class="drawer-close-btn icon-only-control" id="drawerCloseBtn" aria-label="Close menu" title="Close menu"><i class="fa-solid fa-xmark" aria-hidden="true"></i></button>
  </div>
  <ul class="mobile-nav-list">
    <li><a href="{{ route('home') }}#home" class="mobile-nav-link">Home</a></li>
    <li class="mobile-services-item">
      <details>
        <summary class="mobile-nav-link">Services</summary>
        <ul class="mobile-services-links">
          <li><a href="#">Marketing Platform</a></li>
          <li><a href="{{ route('services.show', 'search-engine-optimization') }}">Search Engine Optimization</a></li>
          <li><a href="{{ route('services.show', 'social-media-marketing') }}">Social Media Marketing</a></li>
          <li><a href="{{ route('services.show', 'paid-marketing') }}">Paid Marketing</a></li>
          <li><a href="{{ route('services.show', 'email-marketing') }}">Email Marketing</a></li>
          <li><a href="#">Video Marketing</a></li>
          <li><a href="#">Content Marketing</a></li>
          <li><a href="#">ORM Services</a></li>
          <li><a href="#">Tech Development</a></li>
          <li><a href="#">Web Development</a></li>
          <li><a href="#">Mobile App Development</a></li>
          <li><a href="#">Custom Application</a></li>
          <li><a href="#">Salesforce &amp; ERPNext Services</a></li>
          <li><a href="#">SaaS Application</a></li>
          <li><a href="#">API Development</a></li>
          <li><a href="#">Software Development</a></li>
          <li><a href="#">WhatsApp Integration</a></li>
          <li><a href="#">Our Platform</a></li>
          <li><a href="#">Tech Exploration</a></li>
          <li><a href="#">Tech Solutions</a></li>
          <li><a href="#">IT Support</a></li>
          <li><a href="#">IT Services</a></li>
          <li><a href="#">Digital Marketing Services</a></li>
        </ul>
      </details>
    </li>
    <li class="mobile-services-item">
      <details>
        <summary class="mobile-nav-link">Industries</summary>
        <ul class="mobile-services-links">
          <li><a href="#">Ecommerce &amp; Multivendor</a></li>
          <li><a href="#">Real Estate &amp; Construction</a></li>
          <li><a href="#">Manufacturing</a></li>
          <li><a href="#">Media &amp; Entertainment</a></li>
          <li><a href="#">Medical &amp; Healthcare</a></li>
          <li><a href="#">Personal Beauty Care</a></li>
          <li><a href="#">EdTech &amp; E-Learning</a></li>
          <li><a href="#">Travel &amp; Hospitality</a></li>
          <li><a href="#">Transportation &amp; Logistics</a></li>
          <li><a href="#">Oil and Gas</a></li>
          <li><a href="#">Finance &amp; Insurance</a></li>
          <li><a href="#">Other Industries</a></li>
          <li><a href="#">Our Platform</a></li>
          <li><a href="#">Tech Exploration</a></li>
          <li><a href="#">Tech Solutions</a></li>
        </ul>
      </details>
    </li>
    <li class="mobile-services-item">
      <details>
        <summary class="mobile-nav-link">Insights</summary>
        <ul class="mobile-services-links">
          <li><a href="{{ route('about') }}">About Us</a></li>
          <li><a href="{{ route('blog') }}">Blogs</a></li>
          <li><a href="{{ route('careers') }}">Careers</a></li>
          <li><a href="{{ route('faqs') }}">FAQs</a></li>
        </ul>
      </details>
    </li>
    <li><a class="mobile-nav-btn contact-page-link icon-label-control" href="{{ route('contact.page') }}#contact"><i class="fa-regular fa-envelope" aria-hidden="true"></i><span>Contact</span></a></li>
  </ul>
</aside>
<div class="drawer-backdrop" id="drawerBackdrop"></div>
