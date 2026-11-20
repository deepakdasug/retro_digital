<footer class="site-footer" id="siteFooter">
  <div class="footer-main">
    <div class="footer-inner">
      <div class="footer-grid">

        <div class="footer-brand">
          <a class="footer-logo" href="#home" aria-label="Retrotech home">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Retrotech Business Solutions Pvt Ltd">
          </a>
          <p class="footer-description">Empowering businesses with cutting-edge digital marketing solutions and proven
            SEO strategies.</p>
          <ul class="footer-contact-list">
            <li>
              <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
              <span>O-126, O-145, O-146 The Shopping Mall, Arjun Marg, DLF Phase 1, Gurugram, Haryana, India,
                122002</span>
            </li>
            <li class="footer-contact-inline">
              <a href="tel:+919910836538" class="footer-contact-item">
                <i class="fa-solid fa-phone" aria-hidden="true"></i>
                <span>+91 99108 36538</span>
              </a>
              <a href="mailto:info@retrotech.in" class="footer-contact-item">
                <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                <span>info@retrotech.in</span>
              </a>
            </li>
          </ul>
        </div>

        <div class="footer-nav-grid">
          <section class="footer-column" aria-labelledby="footer-who-we-are-heading">
          <h2 class="footer-heading" id="footer-who-we-are-heading">Who We Are</h2>
          <ul class="footer-nav">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Services</a></li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Industries</a></li>
            <li><a href="{{ route('faqs') }}">Faqs</a></li>
            <li><a href="{{ route('blog') }}">Blog</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('contact.page') }}#contact">Contact Us</a></li>
          </ul>
        </section>

        <section class="footer-column" aria-labelledby="footer-our-services-heading">
          <h2 class="footer-heading" id="footer-our-services-heading">Our Services</h2>
          <ul class="footer-nav">
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Digital Marketing</a></li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Search Engine Optimization</a></li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Social Media Marketing</a></li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Paid Marketing</a></li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Email Marketing</a></li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Content Marketing</a></li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">ORM Services</a></li>
          </ul>
        </section>

        <section class="footer-column" aria-labelledby="footer-technology-solutions-heading">
          <h2 class="footer-heading" id="footer-technology-solutions-heading">Technology Solutions</h2>
          <ul class="footer-nav">
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Web Development</a></li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">App Development</a>
            </li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Custom Application</a>
            </li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Salesforce Solutions</a>
            </li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Whatsapp
                Integration</a></li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">CRM Development</a></li>
          </ul>
        </section>

        <section class="footer-column" aria-labelledby="footer-our-industries-heading">
          <h2 class="footer-heading" id="footer-our-industries-heading">Our Industries</h2>
          <ul class="footer-nav">
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Ecommerce &amp; Multivendor</a></li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Real Estate &amp;
                Construction</a></li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Manufacturing</a></li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Personal Beauty Care</a></li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Medical &amp; Healthcare</a></li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Oil &amp; Gas</a></li>
            <li><a href="#" aria-disabled="true" tabindex="-1" onclick="return false">Finance &amp; Insurance</a></li>
          </ul>

          <div class="footer-socials" aria-label="Social media">
            <a href="https://www.pinterest.com/retrotechdigital/" class="footer-social-icon is-pinterest" aria-label="Pinterest"><i
                class="fa-brands fa-pinterest-p" aria-hidden="true"></i></a>
            <a href="https://www.facebook.com/people/Retrotech-Digital/61592197780253/" class="footer-social-icon is-facebook" aria-label="Facebook"><i class="fa-brands fa-facebook-f"
                aria-hidden="true"></i></a>
            <a href="https://www.linkedin.com/company/retrotech-digital/" class="footer-social-icon is-linkedin" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"
                aria-hidden="true"></i></a>
            <a href="https://www.instagram.com/retrotech_digital/" class="footer-social-icon is-instagram" aria-label="Instagram"><i class="fa-brands fa-instagram"
                aria-hidden="true"></i></a>
            <a href="https://www.youtube.com/@RetrotechBusinessSolutions" class="footer-social-icon is-youtube" aria-label="YouTube"><i class="fa-brands fa-youtube"
                aria-hidden="true"></i></a>
          </div>
        </section>
        </div>

      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="footer-inner footer-bottom-inner">
      <p>&copy; {{ date('Y') }} Retrotech Business Solution PVT LTD | All Rights Reserved</p>
    </div>
  </div>
</footer>