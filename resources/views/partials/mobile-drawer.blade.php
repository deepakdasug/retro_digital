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
          <li class="mobile-overview-item"><a href="#" aria-disabled="true" tabindex="-1" onclick="return false" class="mobile-overview-link"><span>View All Services</span> <i class="fa-solid fa-arrow-right"></i></a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Marketing Platform</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Search Engine Optimization</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Social Media Marketing</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Paid Marketing</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Email Marketing</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Video Marketing</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Content Marketing</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">ORM Services</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Tech Development</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Web Development</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Mobile App Development</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Custom Application</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Salesforce &amp; ERPNext Services</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">SaaS Application</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">API Development</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Software Development</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">WhatsApp Integration</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Our Platform</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Tech Exploration</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Tech Solutions</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">IT Support</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">IT Services</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Digital Marketing Services</a></li>
        </ul>
      </details>
    </li>
    <li class="mobile-services-item">
      <details>
        <summary class="mobile-nav-link">Industries</summary>
        <ul class="mobile-services-links" data-lenis-prevent-wheel="true" data-lenis-prevent-touch="true">
          <li class="mobile-overview-item"><a href="#" aria-disabled="true" tabindex="-1" onclick="return false" class="mobile-overview-link"><span>View All Industries</span> <i class="fa-solid fa-arrow-right"></i></a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Ecommerce &amp; Multivendor</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Real Estate &amp; Construction</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Manufacturing</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Media &amp; Entertainment</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Medical &amp; Healthcare</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Personal Beauty Care</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">EdTech &amp; E-Learning</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Travel &amp; Hospitality</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Transportation &amp; Logistics</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Oil and Gas</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Finance &amp; Insurance</a></li>
          <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Other Industries</a></li>
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
