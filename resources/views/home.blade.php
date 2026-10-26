@extends('layouts.app')

@section('title', 'Retrotech - Business Made Easy')

@section('content')

  {{-- =========================================================================
       HERO CENTER SECTION
       ========================================================================= --}}
  <main class="hero-section" id="home">
    <div class="hero-content">
      <div class="hero-action-wrapper">
        <a href="{{ route('contact.page') }}#contact" class="expert-cta-btn contact-page-link">
          <i class="fa-solid fa-headset" aria-hidden="true"></i>
          <span>Connect With Our Experts</span>
        </a>
      </div>
    </div>
  </main>

  {{-- =========================================================================
       NEXT TOPIC SECTION: "Redefining the Modern Workplace"
       ========================================================================= --}}
  <section class="topic-section" id="topicSection">
    <div class="topic-container">
      <h2 class="redefining-heading">
        <span class="heading-row-1">Redefining the</span>
        <span class="heading-row-2">
          <span class="word-modern">Modern</span>
          <span class="video-dock-slot" id="videoDockSlot" aria-label="Embedded Workplace Video"></span>
          <span class="word-workplace">IT Services</span>
        </span>
      </h2>

      <p class="topic-subtext">
        We blend technology, security, and sustainable IT practices to create efficient and secure digital environments.
      </p>

      <div class="topic-cta-wrap">
        <a href="#about" class="btn-our-story icon-label-control"><i class="fa-solid fa-book-open" aria-hidden="true"></i><span>OUR STORY</span></a>
      </div>
    </div>
  </section>

{{-- ================= TESTIMONIALS SECTION ================= --}}

@if(isset($testimonials) && $testimonials->count() > 0)

<style>
    .custom-testimonial-section {
        /* Map these to your site's actual colors (from style.css :root) */
        --t-primary: var(--primary-color, #398158);
        --t-heading: var(--heading-color, #111827);
        --t-text: var(--text-color, #4b5563);
        --t-bg: var(--section-alt-bg, #f8fafc);
        --t-card: #ffffff;
        --t-border: #e5e7eb;
        --t-star: #f59e0b;

        padding: 4rem 0;
        background: transparent;
        /* background-color: var(--t-bg); */
        overflow: hidden;
        font-family: inherit; /* Inter, from the site */
    }
    .custom-testimonial-container {
        max-width: 1200px;
        margin: 0 auto;
        text-align: center;
        padding: 0 1rem;
    }

    /* Same pattern as the process/services headers: small label + big heading */
    .testimonial-subtitle {
        display: inline-block;
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--t-primary);
        margin-bottom: 0.75rem;
    }
    .custom-testimonial-container h2 {
        font-family: inherit;
        font-size: clamp(1.75rem, 3.5vw, 2.5rem);
        font-weight: 800;
        line-height: 1.2;
        color: var(--t-heading);
        margin: 0 0 2.5rem;
    }

    .marquee-wrapper {
        width: 100%;
        overflow: hidden;
        position: relative;
        padding: 1rem 0;
        mask-image: linear-gradient(to right, transparent, black 5%, black 95%, transparent);
        -webkit-mask-image: linear-gradient(to right, transparent, black 5%, black 95%, transparent);
    }
    .marquee-track { display: flex; width: max-content; animation-play-state: paused; }
    .marquee-track.is-ready {
        animation-name: scrollMarquee;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
        animation-duration: var(--marquee-duration, 40s);
    }
    .testimonial-card-wrapper {
        width: 380px;
        padding-right: 1.5rem;
        box-sizing: border-box;
        flex-shrink: 0;
    }
    @keyframes scrollMarquee {
        0%   { transform: translateX(0); }
        100% { transform: translateX(calc(-1 * var(--marquee-distance, 1000px))); }
    }

    .testimonial-card {
        background: var(--t-card);
        border: 1px solid var(--t-border);
        border-top: 3px solid var(--t-primary);
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(17, 24, 39, 0.06);
        padding: 1.75rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        text-align: left;
        font-family: inherit;
        transition: transform .25s ease, box-shadow .25s ease;
    }
    .testimonial-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 36px rgba(17, 24, 39, 0.10);
    }

    .testimonial-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: .75rem;
        margin-bottom: 1.25rem;
    }
    .testimonial-user { display: flex; align-items: center; gap: .85rem; min-width: 0; }
    .testimonial-avatar, .testimonial-avatar-placeholder {
        width: 48px; height: 48px; border-radius: 50%; flex-shrink: 0;
    }
    .testimonial-avatar { object-fit: cover; border: 2px solid var(--t-border); }
    .testimonial-avatar-placeholder {
        background-color: var(--t-primary); color: #fff;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem; font-weight: 700;
    }
    .testimonial-name { font-weight: 700; font-size: 1rem; color: var(--t-heading); margin: 0; }
    .testimonial-location { font-size: .8rem; font-weight: 500; color: var(--t-text); opacity: .75; margin: 2px 0 0; }

    .testimonial-stars { display: flex; flex-direction: column; align-items: flex-end; gap: .2rem; }
    .stars-container { position: relative; font-size: 1.05rem; letter-spacing: 2px; line-height: 1; }
    .testimonial-stars-bg { color: var(--t-border); }
    .testimonial-stars-fill {
        color: var(--t-star);
        position: absolute; top: 0; left: 0;
        white-space: nowrap; overflow: hidden;
    }
    .rating-number { font-size: .8rem; font-weight: 700; color: var(--t-heading); }

    .testimonial-content-wrapper { height: 100px; overflow: hidden; position: relative; width: 100%; }
    .testimonial-content-wrapper.is-expanded {
        overflow-y: auto; padding-right: 6px;
        scrollbar-width: thin; scrollbar-color: var(--t-primary) var(--t-border);
    }
    .testimonial-content-wrapper.is-expanded::-webkit-scrollbar { width: 5px; }
    .testimonial-content-wrapper.is-expanded::-webkit-scrollbar-track { background: var(--t-border); border-radius: 4px; }
    .testimonial-content-wrapper.is-expanded::-webkit-scrollbar-thumb { background: var(--t-primary); border-radius: 4px; }

    /* Upright text like the rest of the site (italic removed) */
    .testimonial-content {
        font-size: .95rem; font-weight: 400; line-height: 1.7;
        color: var(--t-text); margin: 0;
    }

    .read-more-btn {
        background: none; border: none; color: var(--t-primary);
        font-family: inherit; font-size: .85rem; font-weight: 600; cursor: pointer;
        padding: 0; margin-top: .6rem; text-align: left;
        display: none; text-decoration: underline; text-underline-offset: 3px;
    }
    .read-more-btn:hover { opacity: .8; }
</style>

<section class="custom-testimonial-section">
    <div class="custom-testimonial-container">
        <h2>What Our Clients Say</h2>

        <div class="marquee-wrapper" id="marqueeWrapper">
            <div class="marquee-track" id="marqueeTrack">

                {{-- Only ONE set is rendered here. JS clones it as many times as needed for a gap-free loop. --}}
                @foreach($testimonials as $t)
                    <div class="testimonial-card-wrapper">
                        <div class="testimonial-card">
                            <div class="testimonial-header">
                                <div class="testimonial-user">
                                    @if($t->image)
                                        <img src="{{ asset('storage/' . $t->image) }}" alt="{{ $t->name }}" class="testimonial-avatar">
                                    @else
                                        <div class="testimonial-avatar-placeholder">{{ strtoupper(substr($t->name, 0, 1)) }}</div>
                                    @endif
                                    <div>
                                        <p class="testimonial-name">{{ $t->name }}</p>
                                        @if($t->location)
                                            <p class="testimonial-location">{{ $t->location }}</p>
                                        @endif
                                    </div>
                                </div>
                                @php
                                    $rating = (float) $t->rating;
                                    $width = ($rating / 5) * 100;
                                @endphp
                                <div class="testimonial-stars">
                                    <div class="stars-container">
                                        <span class="testimonial-stars-bg">★★★★★</span>
                                        <span class="testimonial-stars-fill" style="width: {{ $width }}%;">★★★★★</span>
                                    </div>
                                    <span class="rating-number">{{ number_format($rating, 1) }} / 5</span>
                                </div>
                            </div>
                            <div class="testimonial-content-wrapper">
                                <p class="testimonial-content">“{{ $t->content }}”</p>
                            </div>
                            <button type="button" class="read-more-btn">Read More</button>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const wrapper = document.getElementById('marqueeWrapper');
        const track   = document.getElementById('marqueeTrack');
        if (!wrapper || !track) return;

        const SPEED = 50; // pixels per second (raise for faster scrolling)
        const originals = Array.from(track.children);

        let started  = false; // becomes true once the section is on screen
        let hovering = false; // cursor (or finger) is over the review area
        let lastWidth = 0;

        // Single place that decides whether the marquee runs or pauses
        function updatePlayState() {
            track.style.animationPlayState = (started && !hovering) ? 'running' : 'paused';
        }

        // Show "Read More" only on cards whose text overflows the fixed height
        function setupReadMore(scope) {
            scope.querySelectorAll('.testimonial-content-wrapper').forEach(box => {
                const content = box.querySelector('.testimonial-content');
                const btn = box.nextElementSibling;
                if (content && btn && content.scrollHeight > box.clientHeight + 1) {
                    btn.style.display = 'inline-block';
                }
            });
        }

        function collapseAll() {
            track.querySelectorAll('.testimonial-content-wrapper.is-expanded').forEach(box => {
                box.classList.remove('is-expanded');
                box.scrollTop = 0;
                const btn = box.nextElementSibling;
                if (btn) btn.textContent = 'Read More';
            });
        }

        // Build a seamless loop: make one "base set" at least as wide as the viewport,
        // then place a second identical base set right after it.
        function build() {
            collapseAll();
            track.querySelectorAll('[data-clone]').forEach(el => el.remove());
            track.classList.remove('is-ready');

            const setWidth = track.scrollWidth;            // width of the original set
            const viewport = wrapper.clientWidth;
            if (!setWidth) return;

            const copies = Math.max(1, Math.ceil(viewport / setWidth)); // sets per base set
            const extraSets = copies * 2 - 1;                           // total sets = 2 base sets

            for (let i = 0; i < extraSets; i++) {
                originals.forEach(el => {
                    const clone = el.cloneNode(true);
                    clone.setAttribute('data-clone', '1');
                    clone.setAttribute('aria-hidden', 'true');
                    track.appendChild(clone);
                });
            }

            const distance = copies * setWidth;
            track.style.setProperty('--marquee-distance', distance + 'px');
            track.style.setProperty('--marquee-duration', (distance / SPEED) + 's');
            track.classList.add('is-ready');
            updatePlayState();
        }

        // 1. Read-more detection first (on originals), then clone (clones inherit the result)
        setupReadMore(track);
        build();
        lastWidth = wrapper.clientWidth;

        // 2. Start only when the section is visible; stop when it leaves (saves resources)
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                started = entry.isIntersecting;
                updatePlayState();
            });
        }, { threshold: 0.1 });
        observer.observe(wrapper);

        // 3. Hover: pause while inside, collapse open reviews and resume when leaving
        wrapper.addEventListener('mouseenter', () => {
            hovering = true;
            updatePlayState();
        });
        wrapper.addEventListener('mouseleave', () => {
            hovering = false;
            collapseAll();
            updatePlayState();
        });

        // 4. Touch devices: tapping inside pauses; tapping outside resumes
        wrapper.addEventListener('touchstart', () => {
            hovering = true;
            updatePlayState();
        }, { passive: true });
        document.addEventListener('touchstart', e => {
            if (!wrapper.contains(e.target)) {
                hovering = false;
                collapseAll();
                updatePlayState();
            }
        }, { passive: true });

        // 5. Read More / Read Less (card size stays fixed; only the text area scrolls)
        track.addEventListener('click', e => {
            const btn = e.target.closest('.read-more-btn');
            if (!btn) return;
            const box = btn.previousElementSibling; // .testimonial-content-wrapper
            const expanded = box.classList.toggle('is-expanded');
            btn.textContent = expanded ? 'Read Less' : 'Read More';
            if (!expanded) box.scrollTop = 0;
        });

        // 6. Rebuild on resize so the loop never shows a gap on wider/narrower screens
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                if (wrapper.clientWidth !== lastWidth) {
                    lastWidth = wrapper.clientWidth;
                    build();
                }
            }, 200);
        });
    });
</script>
@endif
{{-- ================= END TESTIMONIALS SECTION ================= --}}


  {{-- =========================================================================
       SERVICES SECTION
       ========================================================================= --}}
  <section class="services-section" id="services">
    <div class="services-container">
      <div class="services-header">
        <h2 class="services-heading">Let's Check Our Services</h2>
        <p class="services-subtitle">Explore our wide range of technology and marketing services designed to accelerate your business growth, enhance digital presence, and deliver measurable results.</p>
      </div>

      <div class="services-grid">
        <div class="service-card" data-service-card>
          <div class="service-card-image">
            <img src="{{ asset('assets/images/it-data-destruction.jpg') }}" alt="IT Data Destruction" loading="lazy">
          </div>
          <div class="service-card-content">
            <h3>IT Data Destruction</h3>
            <p>Securely destroy sensitive data and protect organizations from compliance and security risks.</p>
            <a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'it-data-destruction']) }}" class="service-card-btn icon-label-control"><span>Learn more</span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>

        <div class="service-card" data-service-card>
          <div class="service-card-image">
            <img src="{{ asset('assets/images/it-asset-remarketing.jpg') }}" alt="IT Asset Remarketing" loading="lazy">
          </div>
          <div class="service-card-content">
            <h3>IT Asset Remarketing</h3>
            <p>Maximize asset value through secure resale, reuse, and responsible technology lifecycle management.</p>
            <a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'it-asset-remarketing']) }}" class="service-card-btn icon-label-control"><span>Learn more</span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>

        <div class="service-card" data-service-card>
          <div class="service-card-image">
            <img src="{{ asset('assets/images/it-asset-management.jpg') }}" alt="IT Asset Management" loading="lazy">
          </div>
          <div class="service-card-content">
            <h3>IT Asset Management</h3>
            <p>Maximize asset value through secure resale, reuse, and responsible technology lifecycle management.</p>
            <a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'it-asset-management']) }}" class="service-card-btn icon-label-control"><span>Learn more</span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>

        <div class="service-card" data-service-card>
          <div class="service-card-image">
            <img src="{{ asset('assets/images/hard-drive-disposal.jpg') }}" alt="Hard Drive Disposal" loading="lazy">
          </div>
          <div class="service-card-content">
            <h3>Hard Drive Disposal</h3>
            <p>Secure disposal of hard drives ensuring data protection and environmental compliance.</p>
            <a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'hard-drive-disposal']) }}" class="service-card-btn icon-label-control"><span>Learn more</span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>

        <div class="service-card" data-service-card>
          <div class="service-card-image">
            <img src="{{ asset('assets/images/data-center-decommissioning.jpg') }}" alt="Data Center Decommissioning" loading="lazy">
          </div>
          <div class="service-card-content">
            <h3>Data Center Decommissioning</h3>
            <p>Secure and efficient decommissioning of data centers ensuring compliance, safety, and asset recovery.</p>
            <a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'data-center-decommissioning']) }}" class="service-card-btn icon-label-control"><span>Learn more</span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>

        <div class="service-card" data-service-card>
          <div class="service-card-image">
            <img src="{{ asset('assets/images/hard-disk-destruction.jpg') }}" alt="Hard Disk Destruction" loading="lazy">
          </div>
          <div class="service-card-content">
            <h3>Hard Disk Destruction</h3>
            <p>Certified hard disk destruction ensuring irreversible data removal, compliance, and auditability.</p>
            <a href="{{ route('catalog.show', ['section' => 'services', 'slug' => 'hard-disk-destruction']) }}" class="service-card-btn icon-label-control"><span>Learn more</span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
      <div class="topic-cta-wrap section-contact-cta">
        <a href="{{ route('contact.page') }}#contact" class="btn-our-story contact-page-link"><span>PLAN YOUR IT PROJECT</span></a>
      </div>
    </div>
  </section>

  {{-- =========================================================================
       WORKING PROCESS SECTION
       ========================================================================= --}}
  <section class="process-section" id="process">
    <div class="process-container">
      <div class="process-header">
        <span class="process-subtitle">WORKING PROCESS</span>
        <h2 class="process-heading">We Follow the Easy Working Steps</h2>
      </div>

      <div class="process-steps">
        <div class="process-step" data-process-step>
          <div class="step-circle-wrapper">
            <div class="step-number">01</div>
            <div class="step-image">
              <img src="{{ asset('assets/images/process-1.png') }}" alt="Asset Collection & Audit" loading="lazy">
            </div>
          </div>
          <div class="step-content">
            <h3>Asset Collection & Audit</h3>
            <p>Proactively collect audit assets ensuring maintainable value across mission-critical infrastructures for business planning.</p>
          </div>
        </div>

        <div class="process-arrow" aria-hidden="true">
          <i class="fa-solid fa-arrow-right"></i>
        </div>

        <div class="process-step" data-process-step>
          <div class="step-circle-wrapper">
            <div class="step-number">02</div>
            <div class="step-image">
              <img src="{{ asset('assets/images/process-2.jpg') }}" alt="Data Destruction" loading="lazy">
            </div>
          </div>
          <div class="step-content">
            <h3>Data Destruction</h3>
            <p>Proactively destroy data securely ensuring maintainable value across mission-critical infrastructures for business planning.</p>
          </div>
        </div>

        <div class="process-arrow" aria-hidden="true">
          <i class="fa-solid fa-arrow-right"></i>
        </div>

        <div class="process-step" data-process-step>
          <div class="step-circle-wrapper">
            <div class="step-number">03</div>
            <div class="step-image">
              <img src="{{ asset('assets/images/process-3.png') }}" alt="Value Recovery" loading="lazy">
            </div>
          </div>
          <div class="step-content">
            <h3>Value Recovery</h3>
            <p>Proactively recover asset value ensuring maintainable returns across mission-critical infrastructures for business planning.</p>
          </div>
        </div>

        <div class="process-arrow" aria-hidden="true">
          <i class="fa-solid fa-arrow-right"></i>
        </div>

        <div class="process-step" data-process-step>
          <div class="step-circle-wrapper">
            <div class="step-number">04</div>
            <div class="step-image">
              <img src="{{ asset('assets/images/process-4.png') }}" alt="Certification & Reporting" loading="lazy">
            </div>
          </div>
          <div class="step-content">
            <h3>Certification & Reporting</h3>
            <p>Proactively deliver certification reporting ensuring maintainable compliance across mission-critical infrastructures for business planning.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
