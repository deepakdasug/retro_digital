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
          <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'marketing-platform']) }}">Marketing Platform</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'search-engine-optimization']) }}">Search Engine Optimization</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'social-media-marketing']) }}">Social Media Marketing</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'paid-marketing']) }}">Paid Marketing</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'email-marketing']) }}">Email Marketing</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'video-marketing']) }}">Video Marketing</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'content-marketing']) }}">Content Marketing</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'orm-services']) }}">ORM Services</a></li>
          <li><a href="{{ route('tech-development.show', ['slug' => 'web-development']) }}">Tech Development</a></li>
          <li><a href="{{ route('tech-development.show', ['slug' => 'web-development']) }}">Web Development</a></li>
          <li><a href="{{ route('tech-development.show', ['slug' => 'mobile-app-development']) }}">Mobile App Development</a></li>
          <li><a href="{{ route('tech-development.show', ['slug' => 'custom-application']) }}">Custom Application</a></li>
          <li><a href="{{ route('tech-development.show', ['slug' => 'crm-development']) }}">Salesforce &amp; ERPNext Services</a></li>
          <li><a href="{{ route('tech-development.show', ['slug' => 'saas-application']) }}">SaaS Application</a></li>
          <li><a href="{{ route('tech-development.show', ['slug' => 'api-development']) }}">API Development</a></li>
          <li><a href="{{ route('tech-development.show', ['slug' => 'software-development']) }}">Software Development</a></li>
          <li><a href="{{ route('tech-development.show', ['slug' => 'whatsapp-integration']) }}">WhatsApp Integration</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'our-platform']) }}">Our Platform</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'tech-exploration']) }}">Tech Exploration</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'tech-solutions']) }}">Tech Solutions</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'it-support']) }}">IT Support</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'it-services']) }}">IT Services</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'digital-marketing-services']) }}">Digital Marketing Services</a></li>
        </ul>
      </details>
    </li>
    <li class="mobile-services-item">
      <details>
        <summary class="mobile-nav-link">Industries</summary>
        <ul class="mobile-services-links">
          <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'ecommerce-multivendor']) }}">Ecommerce &amp; Multivendor</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'real-estate-construction']) }}">Real Estate &amp; Construction</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'manufacturing']) }}">Manufacturing</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'media-entertainment']) }}">Media &amp; Entertainment</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'medical-healthcare']) }}">Medical &amp; Healthcare</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'personal-beauty-care']) }}">Personal Beauty Care</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'edtech-elearning']) }}">EdTech &amp; E-Learning</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'travel-hospitality']) }}">Travel &amp; Hospitality</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'transportation-logistics']) }}">Transportation &amp; Logistics</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'oil-and-gas']) }}">Oil and Gas</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'finance-insurance']) }}">Finance &amp; Insurance</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'other-industries']) }}">Other Industries</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'our-platform']) }}">Our Platform</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'tech-exploration']) }}">Tech Exploration</a></li>
          <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'tech-solutions']) }}">Tech Solutions</a></li>
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
