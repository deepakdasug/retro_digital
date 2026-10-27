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
            <li><a href="#">IT Asset Re-Marketing</a></li>
            <li><a href="#">IT Data Destruction</a></li>
            <li><a href="#">IT Asset Disposition (ITAD)</a></li>
            <li><a href="#">IT Asset Management (ITAM)</a></li>
            <li><a href="#">Data Center Decommissioning</a></li>
            <li><a href="#">Harddrive Disposal</a></li>
            <li><a href="#">Hard disk Destruction</a></li>
          </ul>
        </section>

        <section class="footer-column" aria-labelledby="footer-industries-heading">
          <h2 class="footer-heading" id="footer-industries-heading">Industries</h2>
          <ul class="footer-nav">
            <li><a href="#">Small Business</a></li>
            <li><a href="#">Manufacturers</a></li>
            <li><a href="#">Education</a></li>
            <li><a href="#">Banking &amp; Finance</a></li>
            <li><a href="#">Government &amp; Nonprofit</a></li>
            <li><a href="#">Healthcare</a></li>
            <li><a href="#">Insurance</a></li>
          </ul>
        </section>

        <section class="footer-column" aria-labelledby="footer-more-industries-heading">
          <h2 class="footer-heading" id="footer-more-industries-heading">More Industries</h2>
          <ul class="footer-nav">
            <li><a href="#">Legal &amp; Corporate</a></li>
            <li><a href="#">Research &amp; Development</a></li>
            <li><a href="#">Pharmaceutical</a></li>
            <li><a href="#">Real Estate</a></li>
            <li><a href="#">Tech &amp; Cloud Providers</a></li>
            <li><a href="#">Distributors &amp; Resellers</a></li>
            <li><a href="#">Retail</a></li>
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
