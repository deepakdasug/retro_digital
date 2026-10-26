<footer class="site-footer" id="siteFooter">
  <div class="footer-main">
    <div class="footer-inner">
      <div class="footer-grid">

        <div class="footer-brand">
          <a class="footer-logo" href="#home" aria-label="Retrotech home">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Retrotech Business Solutions Pvt Ltd">
          </a>
          <p class="footer-description">Empowering businesses with cutting-edge digital marketing solutions and proven SEO strategies.</p>
          <ul class="footer-contact-list">
            <li>
              <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
              <span>O-126, O-145, O-146 The Shopping Mall, Arjun Marg, DLF Phase 1, Gurugram, Haryana, India, 122002</span>
            </li>
            <li>
              <i class="fa-solid fa-phone" aria-hidden="true"></i>
              <a href="tel:+919910836538">+91 99108 36538</a>
            </li>
            <li>
              <i class="fa-solid fa-envelope" aria-hidden="true"></i>
              <a href="mailto:info@retrotech.in">info@retrotech.in</a>
            </li>
          </ul>
        </div>

        <section class="footer-column" aria-labelledby="footer-company-heading">
          <h2 class="footer-heading" id="footer-company-heading">Our Company</h2>
          <ul class="footer-nav">
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a class="footer-link-button contact-page-link" href="{{ route('contact.page') }}#contact"><i class="fa-regular fa-envelope" aria-hidden="true"></i> Contact</a></li>
            <li><a href="{{ route('faqs') }}">FAQs</a></li>
            <li><a href="{{ route('blog') }}">Blog</a></li>
            <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
            <li><a href="{{ route('terms') }}">Terms And Conditions</a></li>
            <li><a href="{{ route('careers') }}">Career</a></li>
          </ul>
        </section>

        <section class="footer-column" aria-labelledby="footer-services-heading">
          <h2 class="footer-heading" id="footer-services-heading">Services</h2>
          <ul class="footer-nav">
            <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'it-asset-remarketing']) }}">IT Asset Re-Marketing</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'it-data-destruction']) }}">IT Data Destruction</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'it-asset-disposition']) }}">IT Asset Disposition (ITAD)</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'it-asset-management']) }}">IT Asset Management (ITAM)</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'data-center-decommissioning']) }}">Data Center Decommissioning</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'hard-drive-disposal']) }}">Harddrive Disposal</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'hard-disk-destruction']) }}">Hard disk Destruction</a></li>
          </ul>
        </section>

        <section class="footer-column" aria-labelledby="footer-industries-heading">
          <h2 class="footer-heading" id="footer-industries-heading">Industries</h2>
          <ul class="footer-nav">
            <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'small-business']) }}">Small Business</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'manufacturing']) }}">Manufacturers</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'edtech-elearning']) }}">Education</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'finance-insurance']) }}">Banking &amp; Finance</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'government-nonprofit']) }}">Government &amp; Nonprofit</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'medical-healthcare']) }}">Healthcare</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'finance-insurance']) }}">Insurance</a></li>
          </ul>
        </section>

        <section class="footer-column" aria-labelledby="footer-more-industries-heading">
          <h2 class="footer-heading" id="footer-more-industries-heading">More Industries</h2>
          <ul class="footer-nav">
            <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'legal-corporate']) }}">Legal &amp; Corporate</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'research-development']) }}">Research &amp; Development</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'pharmaceutical']) }}">Pharmaceutical</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'real-estate-construction']) }}">Real Estate</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'tech-cloud-providers']) }}">Tech &amp; Cloud Providers</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'distributors-resellers']) }}">Distributors &amp; Resellers</a></li>
            <li><a href="{{ route('catalog.show', ['section' => 'industries', 'slug' => 'ecommerce-multivendor']) }}">Retail</a></li>
          </ul>
        </section>

      </div>

      <div class="footer-socials" aria-label="Social media">
        <span class="footer-social-icon" aria-label="Pinterest"><i class="fa-brands fa-pinterest-p" aria-hidden="true"></i></span>
        <span class="footer-social-icon" aria-label="Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></span>
        <span class="footer-social-icon" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in" aria-hidden="true"></i></span>
        <span class="footer-social-icon" aria-label="Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></span>
        <span class="footer-social-icon" aria-label="YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></span>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="footer-inner footer-bottom-inner">
      <p>&copy; {{ date('Y') }} Retrotech Business Solution PVT LTD | All Rights Reserved</p>
      <a href="#home" class="footer-back-to-top" aria-label="Back to top" title="Back to top">
        <i class="fa-solid fa-arrow-up" aria-hidden="true"></i>
      </a>
    </div>
  </div>
</footer>
