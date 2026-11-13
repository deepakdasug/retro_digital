<header class="site-header" id="siteHeader">
  <div class="header-inner">

    <a href="{{ route('home') }}#home" class="brand-logo" aria-label="Retrotech Home">
      <img id="brandLogoImg" src="{{ asset('assets/images/logo.png') }}" alt="Retrotech Logo">
    </a>

    <nav class="main-nav" aria-label="Main Navigation">
      <ul class="nav-list">

        <li class="nav-item">
          <a href="{{ route('home') }}#home" class="nav-link">Home</a>
        </li>

        {{-- Services dropdown --}}
        <li class="nav-item has-dropdown">
          <a href="{{ route('services.index') }}" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">
            Services <i class="fa-solid fa-caret-down dropdown-arrow"></i>
          </a>
          <div class="dropdown-menu glass-panel services-mega-menu">
            <div class="dropdown-arrow-indicator"></div>
            <div class="services-mega-columns">
              <section class="services-mega-group" aria-labelledby="marketing-services-heading">
                <h2 id="marketing-services-heading"><a href="{{ route('services.show', 'digital-marketing') }}">Digital Marketing <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></h2>
                <p>Grow your reach through SEO, paid campaigns, social media, and content marketing.</p>
                <ul class="services-mega-links">
                  <li><a href="{{ route('services.show', 'seo-services') }}"><i class="fa-solid fa-magnifying-glass-chart" aria-hidden="true"></i>Search Engine Optimization</a></li>
                  <li><a href="{{ route('services.show', 'social-media-marketing') }}"><i class="fa-brands fa-square-facebook" aria-hidden="true"></i>Social Media Marketing</a></li>
                  <li><a href="{{ route('services.show', 'paid-marketing') }}"><i class="fa-solid fa-sack-dollar" aria-hidden="true"></i>Paid Marketing</a></li>
                  <li><a href="{{ route('services.show', 'email-marketing') }}"><i class="fa-regular fa-envelope" aria-hidden="true"></i>Email Marketing</a></li>
                  <li><a href="{{ route('services.show', 'video-marketing') }}"><i class="fa-solid fa-video" aria-hidden="true"></i>Video Marketing</a></li>
                  <li><a href="{{ route('services.show', 'content-marketing') }}"><i class="fa-regular fa-file-lines" aria-hidden="true"></i>Content Marketing</a></li>
                  <li><a href="{{ route('services.show', 'orm-services') }}"><i class="fa-solid fa-thumbs-up" aria-hidden="true"></i>ORM Services</a></li>
                </ul>
              </section>

              <section class="services-mega-group" aria-labelledby="development-services-heading">
                <h2 id="development-services-heading"><a href="{{ route('services.show', 'web-development') }}">Tech Development <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></h2>
                <p>Plan and support the digital systems your organization relies on every day.</p>
                <ul class="services-mega-links">
                  <li><a href="{{ route('services.show', 'web-development') }}"><i class="fa-solid fa-code" aria-hidden="true"></i>Web Development</a></li>
                  <li><a href="{{ route('services.show', 'mobile-app-development') }}"><i class="fa-solid fa-mobile-screen-button" aria-hidden="true"></i>Mobile App Development</a></li>
                  <li><a href="{{ route('services.show', 'custom-application') }}"><i class="fa-solid fa-gears" aria-hidden="true"></i>Custom Application</a></li>
                  <li><a href="{{ route('services.show', 'crm-development') }}"><i class="fa-solid fa-diagram-project" aria-hidden="true"></i>Salesforce &amp; ERPNext Services</a></li>
                  <li><a href="{{ route('services.show', 'saas-application') }}"><i class="fa-solid fa-cloud" aria-hidden="true"></i>SaaS Application</a></li>
                  <li><a href="{{ route('services.show', 'api-development') }}"><i class="fa-solid fa-plug" aria-hidden="true"></i>API Development</a></li>
                  <li><a href="{{ route('services.show', 'software-development') }}"><i class="fa-solid fa-laptop-code" aria-hidden="true"></i>Software Development</a></li>
                  <li><a href="{{ route('services.show', 'whatsapp-integration') }}"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i>WhatsApp Integration</a></li>
                </ul>
              </section>

              <section class="services-mega-group services-mega-platforms" aria-label="Platforms and solutions">
                <article>
                  <h2><a href="{{ route('services.index') }}">Our Services <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></h2>
                  <p>Explore digital marketing and software development capabilities for your business.</p>
                </article>
                <article>
                  <h2><a href="{{ route('services.show', 'web-development') }}">Tech Exploration <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></h2>
                  <p>Explore practical ways to improve how your team works with technology.</p>
                </article>
                <article>
                  <h2><a href="{{ route('services.show', 'software-development') }}">Software Development <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></h2>
                  <p>Deliver software shaped around your workflows and business requirements.</p>
                </article>
              </section>
            </div>
            <div class="services-mega-cards">
              <a href="{{ route('services.show', 'seo-services') }}" class="services-mega-card"><span class="services-mega-card-copy"><strong>Search Engine Optimization</strong><small>Improve organic visibility with search-focused website and content optimization.</small></span><img class="services-mega-card-art" src="{{ asset('assets/images/enterprise.webp') }}" alt="Search engine optimization services" loading="lazy"></a>
              <a href="{{ route('services.show', 'web-development') }}" class="services-mega-card"><span class="services-mega-card-copy"><strong>Web Development</strong><small>Build responsive websites and web applications around your business requirements.</small></span><img class="services-mega-card-art" src="{{ asset('assets/images/enterprise.webp') }}" alt="Web development services" loading="lazy"></a>
              <a href="{{ route('services.show', 'digital-marketing') }}" class="services-mega-card"><span class="services-mega-card-copy"><strong>Digital Marketing Services</strong><small>Grow your online presence with SEO, social media marketing, PPC advertising, content creation, and data-driven digital marketing strategies.</small></span><img class="services-mega-card-art" src="{{ asset('assets/images/enterprise.webp') }}" alt="Digital Marketing Services" loading="lazy"></a>
            </div>
          </div>
        </li>

        {{-- Industries dropdown --}}
        <li class="nav-item has-dropdown">
          <a href="{{ route('industries.index') }}" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">
            Industries <i class="fa-solid fa-caret-down dropdown-arrow"></i>
          </a>
          <div class="dropdown-menu glass-panel services-mega-menu industries-mega-menu">
            <div class="dropdown-arrow-indicator"></div>
            <div class="industries-mega-columns">
              <ul class="industries-mega-list">
                <li><a href="{{ route('industries.show', 'ecommerce-multivendor') }}"><i class="fa-solid fa-cart-shopping" aria-hidden="true"></i><span><strong>Ecommerce &amp; Multivendor</strong><small>Commerce platforms and online marketplaces</small></span></a></li>
                <li><a href="{{ route('industries.show', 'real-estate-and-construction') }}"><i class="fa-solid fa-building" aria-hidden="true"></i><span><strong>Real Estate &amp; Construction</strong><small>Property platforms and project workflows</small></span></a></li>
                <li><a href="{{ route('industries.show', 'manufacturing') }}"><i class="fa-solid fa-industry" aria-hidden="true"></i><span><strong>Manufacturing</strong><small>Connected operations and business software</small></span></a></li>
                <li><a href="{{ route('industries.show', 'media-and-entertainment') }}"><i class="fa-solid fa-film" aria-hidden="true"></i><span><strong>Media &amp; Entertainment</strong><small>Publishing and digital audience platforms</small></span></a></li>
                <li><a href="{{ route('industries.show', 'medical-and-healthcare') }}"><i class="fa-solid fa-stethoscope" aria-hidden="true"></i><span><strong>Medical &amp; Healthcare</strong><small>Healthcare applications and digital workflows</small></span></a></li>
                <li><a href="{{ route('industries.show', 'personal-beauty-care') }}"><i class="fa-solid fa-spa" aria-hidden="true"></i><span><strong>Personal Beauty Care</strong><small>Booking, ecommerce, and customer experiences</small></span></a></li>
              </ul>

              <ul class="industries-mega-list">
                <li><a href="{{ route('industries.show', 'edtech-and-e-learning') }}"><i class="fa-solid fa-graduation-cap" aria-hidden="true"></i><span><strong>EdTech &amp; E-Learning</strong><small>Learning platforms and education software</small></span></a></li>
                <li><a href="{{ route('industries.show', 'travel-and-hospitality') }}"><i class="fa-solid fa-plane" aria-hidden="true"></i><span><strong>Travel &amp; Hospitality</strong><small>Booking platforms and guest experiences</small></span></a></li>
                <li><a href="{{ route('industries.show', 'transportation-and-logistics') }}"><i class="fa-solid fa-truck" aria-hidden="true"></i><span><strong>Transportation &amp; Logistics</strong><small>Logistics systems and workflow automation</small></span></a></li>
                <li><a href="{{ route('industries.show', 'oil-and-gas') }}"><i class="fa-solid fa-oil-well" aria-hidden="true"></i><span><strong>Oil and Gas</strong><small>Operational software and data platforms</small></span></a></li>
                <li><a href="{{ route('industries.show', 'finance-and-insurance') }}"><i class="fa-solid fa-hand-holding-dollar" aria-hidden="true"></i><span><strong>Finance &amp; Insurance</strong><small>Financial applications and digital workflows</small></span></a></li>
                <li><a href="{{ route('industries.show', 'other-industries') }}"><i class="fa-solid fa-layer-group" aria-hidden="true"></i><span><strong>Other Industries</strong><small>Custom software for your business needs</small></span></a></li>
              </ul>

              <section class="services-mega-group services-mega-platforms" aria-label="Platforms and solutions">
                <article>
                  <h2><a href="{{ route('industries.index') }}">Our Platform <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></h2>
                  <p>Bring technology lifecycle services together around your organization’s needs.</p>
                </article>
                <article>
                  <h2><a href="{{ route('industries.index') }}">Tech Exploration <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></h2>
                  <p>Explore practical ways to improve how your team works with technology.</p>
                </article>
                <article>
                  <h2><a href="{{ route('industries.index') }}">Tech Solutions <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></h2>
                  <p>Find support for equipment, data, and operational requirements.</p>
                </article>
              </section>
            </div>
          </div>
        </li>

        {{-- Insight dropdown --}}
        <li class="nav-item has-dropdown">
          <a href="#" role="button" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">
            Insights <i class="fa-solid fa-caret-down dropdown-arrow"></i>
          </a>
          <div class="dropdown-menu glass-panel">
            <div class="dropdown-arrow-indicator"></div>
            <ul class="dropdown-list">
              <li><a href="{{ route('about') }}" class="dropdown-item"><i class="fa-solid fa-users dropdown-icon" aria-hidden="true"></i><span class="dropdown-text"><strong>About Us</strong></span></a></li>
              <li><a href="{{ route('blog') }}" class="dropdown-item"><i class="fa-solid fa-tower-broadcast dropdown-icon" aria-hidden="true"></i><span class="dropdown-text"><strong>Blogs</strong></span></a></li>
              <li><a href="{{ route('careers') }}" class="dropdown-item"><i class="fa-solid fa-briefcase dropdown-icon" aria-hidden="true"></i><span class="dropdown-text"><strong>Careers</strong></span></a></li>
              <li><a href="{{ route('faqs') }}" class="dropdown-item"><i class="fa-solid fa-circle-question dropdown-icon" aria-hidden="true"></i><span class="dropdown-text"><strong>FAQs</strong></span></a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact.page') }}#contact">Contact Us</a>
        </li>

      </ul>
    </nav>

    <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle navigation menu">
      <span class="hamburger-bar"></span>
      <span class="hamburger-bar"></span>
      <span class="hamburger-bar"></span>
    </button>

  </div>
</header>
