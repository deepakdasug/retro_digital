<aside class="mobile-nav-drawer" id="mobileNavDrawer" aria-label="Mobile navigation" aria-hidden="true" inert data-lenis-prevent>
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
          <li class="mobile-overview-item"><a href="{{ route('home') }}#services" class="mobile-overview-link"><span>View All Services</span> <i class="fa-solid fa-arrow-right"></i></a></li>
          <li><a href="{{ route('services.seo') }}">Marketing Platform</a></li>
          <li><a href="{{ route('services.seo') }}">Search Engine Optimization</a></li>
          <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'social-media-marketing']) }}">Social Media Marketing</a></li>
          <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'paid-marketing']) }}">Paid Marketing</a></li>
            <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'email-marketing']) }}">Email Marketing</a></li>
              <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'video-marketing']) }}">Video Marketing</a></li>
              <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'content-marketing']) }}">Content
                Marketing</a></li>
              <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'orm-services']) }}">ORM Services</a></li>
          <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'web-development']) }}">Tech Development</a></li>
          <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'web-development']) }}">Web Development</a></li>
          <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'mobile-app-development']) }}">Mobile App Development</a></li>
          <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'custom-application']) }}">Custom Application</a></li>
          <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'salesforce-erpnext-services']) }}">Salesforce &amp; ERPNext Services</a></li>
          <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'saas-application']) }}">SaaS Application</a></li>
          <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'api-development']) }}">API Development</a></li>
          <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'software-development']) }}">Software Development</a></li>
          <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'whatsapp-integration']) }}">WhatsApp Integration</a></li>
          <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'saas-application']) }}">Our Platform</a></li>
          <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'custom-application']) }}">Tech Exploration</a></li>
          <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'software-development']) }}">Tech Solutions</a></li>
          <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'api-development']) }}">IT Support</a></li>
          <li><a href="{{ route('webpages.show', ['section' => 'services', 'slug' => 'web-development']) }}">IT Services</a></li>
          <li><a href="{{ route('services.seo') }}">Digital Marketing Services</a></li>
        </ul>
      </details>
    </li>
    <li class="mobile-services-item">
      <details>
        <summary class="mobile-nav-link">Industries</summary>
        <ul class="mobile-services-links" data-lenis-prevent-wheel="true" data-lenis-prevent-touch="true">
          <li class="mobile-overview-item"><a href="#" aria-disabled="true" tabindex="-1" onclick="return false" class="mobile-overview-link"><span>View All Industries</span> <i class="fa-solid fa-arrow-right"></i></a></li>
          <li><a href="{{ route('industries.show', ['slug' => 'ecommerce-multivendor']) }}">Ecommerce &amp; Multivendor</a></li>
          <li><a href="{{ route('industries.show', ['slug' => 'real-estate-and-construction']) }}">Real Estate &amp; Construction</a></li>
          <li><a href="{{ route('industries.show', ['slug' => 'manufacturing']) }}">Manufacturing</a></li>
          <li><a href="{{ route('industries.show', ['slug' => 'media-and-entertainment']) }}">Media &amp; Entertainment</a></li>
          <li><a href="{{ route('industries.show', ['slug' => 'medical-and-healthcare']) }}">Medical &amp; Healthcare</a></li>
          <li><a href="{{ route('industries.show', ['slug' => 'personal-beauty-care']) }}">Personal Beauty Care</a></li>
          <li><a href="{{ route('industries.show', ['slug' => 'edtech-and-e-learning']) }}">EdTech &amp; E-Learning</a></li>
          <li><a href="{{ route('industries.show', ['slug' => 'travel-and-hospitality']) }}">Travel &amp; Hospitality</a></li>
          <li><a href="{{ route('industries.show', ['slug' => 'transportation-and-logistics']) }}">Transportation &amp; Logistics</a></li>
          <li><a href="{{ route('industries.show', ['slug' => 'oil-and-gas']) }}">Oil and Gas</a></li>
          <li><a href="{{ route('industries.show', ['slug' => 'finance-and-insurance']) }}">Finance &amp; Insurance</a></li>
          <li><a href="{{ route('industries.show', ['slug' => 'other-industries']) }}">Other Industries</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Our Platform</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Tech Exploration</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Tech Solutions</a></li>
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
