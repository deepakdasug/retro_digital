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
        <ul class="mobile-services-links" data-lenis-prevent-wheel="true" data-lenis-prevent-touch="true">
          <li class="mobile-overview-item"><a href="{{ route('services.index') }}" class="mobile-overview-link"><span>View All Services</span> <i class="fa-solid fa-arrow-right"></i></a></li>
          <li><a href="{{ route('services.digital-marketing') }}">Marketing Platform</a></li>
          <li><a href="{{ route('services.show', 'search-engine-optimization') }}">Search Engine Optimization</a></li>
          <li><a href="{{ route('services.show', 'social-media-marketing') }}">Social Media Marketing</a></li>
          <li><a href="{{ route('services.show', 'paid-marketing') }}">Paid Marketing</a></li>
          <li><a href="{{ route('services.show', 'email-marketing') }}">Email Marketing</a></li>
          <li><a href="{{ route('services.show', 'video-marketing') }}">Video Marketing</a></li>
          <li><a href="{{ route('services.show', 'content-marketing') }}">Content Marketing</a></li>
          <li><a href="{{ route('services.show', 'orm-services') }}">ORM Services</a></li>
          <li><a href="{{ route('services.show', 'web-development') }}">Tech Development</a></li>
          <li><a href="{{ route('services.show', 'web-development') }}">Web Development</a></li>
          <li><a href="{{ route('services.show', 'mobile-app-development') }}">Mobile App Development</a></li>
          <li><a href="{{ route('services.show', 'custom-application') }}">Custom Application</a></li>
          <li><a href="{{ route('services.show', 'crm-development') }}">Salesforce &amp; ERPNext Services</a></li>
          <li><a href="{{ route('services.show', 'saas-application') }}">SaaS Application</a></li>
          <li><a href="{{ route('services.show', 'api-development') }}">API Development</a></li>
          <li><a href="{{ route('services.show', 'software-development') }}">Software Development</a></li>
          <li><a href="{{ route('services.show', 'whatsapp-integration') }}">WhatsApp Integration</a></li>
          <li><a href="{{ route('services.index') }}">Our Platform</a></li>
          <li><a href="{{ route('services.show', 'web-development') }}">Tech Exploration</a></li>
          <li><a href="{{ route('services.index') }}">Tech Solutions</a></li>
          <li><a href="{{ route('services.index') }}">IT Support</a></li>
          <li><a href="{{ route('services.index') }}">IT Services</a></li>
          <li><a href="{{ route('services.show', 'digital-marketing') }}">Digital Marketing Services</a></li>
        </ul>
      </details>
    </li>
    <li class="mobile-services-item">
      <details>
        <summary class="mobile-nav-link">Industries</summary>
        <ul class="mobile-services-links" data-lenis-prevent-wheel="true" data-lenis-prevent-touch="true">
          <li class="mobile-overview-item"><a href="{{ route('industries.index') }}" class="mobile-overview-link"><span>View All Industries</span> <i class="fa-solid fa-arrow-right"></i></a></li>
          <li><a href="{{ route('industries.show', 'ecommerce-multivendor') }}">Ecommerce &amp; Multivendor</a></li>
          <li><a href="{{ route('industries.show', 'real-estate-and-construction') }}">Real Estate &amp; Construction</a></li>
          <li><a href="{{ route('industries.show', 'manufacturing') }}">Manufacturing</a></li>
          <li><a href="{{ route('industries.show', 'media-and-entertainment') }}">Media &amp; Entertainment</a></li>
          <li><a href="{{ route('industries.show', 'medical-and-healthcare') }}">Medical &amp; Healthcare</a></li>
          <li><a href="{{ route('industries.show', 'personal-beauty-care') }}">Personal Beauty Care</a></li>
          <li><a href="{{ route('industries.show', 'edtech-and-e-learning') }}">EdTech &amp; E-Learning</a></li>
          <li><a href="{{ route('industries.show', 'travel-and-hospitality') }}">Travel &amp; Hospitality</a></li>
          <li><a href="{{ route('industries.show', 'transportation-and-logistics') }}">Transportation &amp; Logistics</a></li>
          <li><a href="{{ route('industries.show', 'oil-and-gas') }}">Oil and Gas</a></li>
          <li><a href="{{ route('industries.show', 'finance-and-insurance') }}">Finance &amp; Insurance</a></li>
          <li><a href="{{ route('industries.show', 'other-industries') }}">Other Industries</a></li>
          <li><a href="{{ route('industries.index') }}">Our Platform</a></li>
          <li><a href="{{ route('industries.index') }}">Tech Exploration</a></li>
          <li><a href="{{ route('industries.index') }}">Tech Solutions</a></li>
        </ul>
      </details>
    </li>
    <li class="mobile-services-item">
      <details>
        <summary class="mobile-nav-link">Insights</summary>
        <ul class="mobile-services-links" data-lenis-prevent-wheel="true" data-lenis-prevent-touch="true">
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
