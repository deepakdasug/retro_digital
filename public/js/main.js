/**
 * RETROTECH - BUSINESS MADE EASY
 * Handles background video playback, video scroll docking, WhatsApp widget,
 * page transitions, and responsive mobile navigation.
 */

function initRetrotech() {
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const lenisEasing = (time) => 1 - Math.pow(1 - time, 3);
  const lenis = window.Lenis && !prefersReducedMotion
    ? new window.Lenis({
        autoRaf: true,
        lerp: 0.1,
        duration: 2,
        easing: lenisEasing,
        wheelMultiplier: 1.05,
        touchMultiplier: 1.0,
        smoothWheel: true,
        syncTouch: false,
        anchors: false,
        allowNestedScroll: true,
        stopInertiaOnNavigate: true
      })
    : null;

  if (lenis) window.retroLenis = lenis;

  /* =========================================================================
     0. SMOOTH ANCHOR SCROLL
     ========================================================================= */
  document.addEventListener('click', (event) => {
    if (event.defaultPrevented || event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;

    const clickedElement = event.target instanceof Element ? event.target : null;
    const link = clickedElement?.closest('a[href^="#"]');
    if (!link || link.hasAttribute('download') || (link.target && link.target !== '_self')) return;

    const targetId = decodeURIComponent(link.getAttribute('href').slice(1));
    if (!targetId) return;
    const target = document.getElementById(targetId);
    if (!target) return;

    event.preventDefault();
    history.pushState(null, '', `#${encodeURIComponent(targetId)}`);
    const headerOffset = document.getElementById('siteHeader')?.offsetHeight ?? 0;
    const elementPosition = target.getBoundingClientRect().top;
    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

    if (lenis) {
      lenis.scrollTo(offsetPosition, { duration: 2, easing: lenisEasing });
    } else {
      window.scrollTo({
        top: offsetPosition,
        behavior: prefersReducedMotion ? 'auto' : 'smooth'
      });
    }
  });

  /* =========================================================================
     1. CONTINUOUS AUTOMATIC BACKGROUND VIDEO PLAYBACK
     ========================================================================= */
  const heroVideo = document.getElementById('heroVideo');

  if (heroVideo) {
    heroVideo.muted = true;
    heroVideo.defaultMuted = true;
    heroVideo.loop = true;
    heroVideo.playsInline = true;
    heroVideo.setAttribute('muted', '');
    heroVideo.setAttribute('playsinline', '');
    heroVideo.setAttribute('autoplay', '');
    heroVideo.playbackRate = 0.6;

    const startPlayback = () => {
      heroVideo.muted = true;
      const playPromise = heroVideo.play();
      if (playPromise !== undefined) {
        playPromise
          .then(() => {
            heroVideo.playbackRate = 0.6;
          })
          .catch((err) => {
            console.warn('Autoplay waiting for user gesture:', err);
          });
      }
    };

    startPlayback();
    heroVideo.addEventListener('loadedmetadata', startPlayback);
    heroVideo.addEventListener('canplay', startPlayback);

    const triggerOnInteraction = () => {
      if (heroVideo.paused) {
        heroVideo.play().catch(() => {});
        heroVideo.playbackRate = 0.6;
      }
      window.removeEventListener('click', triggerOnInteraction);
      window.removeEventListener('touchstart', triggerOnInteraction);
      window.removeEventListener('scroll', triggerOnInteraction);
      window.removeEventListener('mousemove', triggerOnInteraction);
    };

    window.addEventListener('click', triggerOnInteraction, { once: true, passive: true });
    window.addEventListener('touchstart', triggerOnInteraction, { once: true, passive: true });
    window.addEventListener('scroll', triggerOnInteraction, { once: true, passive: true });
    window.addEventListener('mousemove', triggerOnInteraction, { once: true, passive: true });

    heroVideo.addEventListener('ended', () => {
      heroVideo.currentTime = 0;
      heroVideo.play().catch(() => {});
    });
  }

  /* =========================================================================
     2. VIDEO SCROLL DOCKING ENGINE
     ========================================================================= */
  const videoContainer = document.getElementById('videoContainer');
  const videoDockSlot = document.getElementById('videoDockSlot');
  const heroContent = document.querySelector('.hero-content');
  const siteHeader = document.getElementById('siteHeader');

  let ticking = false;

  const getScrollY = () =>
    window.pageYOffset ||
    document.documentElement.scrollTop ||
    document.body.scrollTop ||
    0;

  const handleVideoScroll = () => {
    if (!videoDockSlot || !videoContainer) {
      if (siteHeader) siteHeader.classList.add('scrolled');
      return;
    }

    // If the dock slot has no size yet (hidden / not laid out), skip until it does.
    const slotRect = videoDockSlot.getBoundingClientRect();
    if (slotRect.width === 0 || slotRect.height === 0) return;

    const scrollY = getScrollY();
    const windowW = document.documentElement.clientWidth || window.innerWidth;
    const windowH = window.innerHeight;

    const transitionDistance = windowH * 0.85;
    const rawProgress = scrollY / transitionDistance;
    const p = Math.min(Math.max(rawProgress, 0), 1);

    const targetW = slotRect.width;
    const targetH = slotRect.height;
    const targetX = slotRect.left;
    const targetY = slotRect.top;

    const midW = Math.min(windowW * 0.54, 660);
    const midH = midW * (9 / 16);
    const midX = (windowW - midW) / 2;
    const midY = (windowH - midH) / 2 - 20;

    let curW, curH, curX, curY, curShadow, curRadius;

    if (p <= 0.5) {
      const subP = p / 0.5;
      const ease = subP * subP * (3 - 2 * subP);
      curW = windowW + (midW - windowW) * ease;
      curH = windowH + (midH - windowH) * ease;
      curX = midX * ease;
      curY = midY * ease;
      curShadow = ease * 25;
      curRadius = ease * 14;
    } else if (p < 1.0) {
      const subP = (p - 0.5) / 0.5;
      const ease = subP * subP * (3 - 2 * subP);
      curW = midW + (targetW - midW) * ease;
      curH = midH + (targetH - midH) * ease;
      curX = midX + (targetX - midX) * ease;
      curY = midY + (targetY - midY) * ease;
      curShadow = 25 - ease * 15;
      curRadius = 14;
    } else {
      curW = targetW;
      curH = targetH;
      curX = targetX;
      curY = targetY;
      curShadow = 10;
      curRadius = 14;
    }

    videoContainer.style.width = `${curW}px`;
    videoContainer.style.height = `${curH}px`;
    videoContainer.style.transform = `translate3d(${curX}px, ${curY}px, 0)`;
    videoContainer.style.borderRadius = `${curRadius}px`;
    videoContainer.style.boxShadow = curShadow > 0 ? `0 10px ${curShadow}px rgba(0,0,0,0.22)` : 'none';

    if (heroContent) {
      const heroOpacity = Math.max(0, 1 - p * 2.2);
      heroContent.style.opacity = heroOpacity;
      heroContent.style.transform = `translateY(${-p * 60}px)`;
      heroContent.style.pointerEvents = heroOpacity < 0.2 ? 'none' : 'auto';
    }

    /* Parallax depth on About Culture card image during scroll */
    const splitCanvas = document.querySelector('.about-split-canvas');
    const cultureImg = document.querySelector('.acc-bg-image-wrap img');
    if (splitCanvas && cultureImg) {
      const rect = splitCanvas.getBoundingClientRect();
      if (rect.top < windowH && rect.bottom > 0) {
        const progress = (windowH - rect.top) / (windowH + rect.height);
        const shiftY = (progress - 0.5) * 44;
        cultureImg.style.transform = `translate3d(0, ${shiftY.toFixed(1)}px, 0) scale(1.08)`;
      }
    }

    if (siteHeader) {
      siteHeader.classList.toggle('scrolled', scrollY > 40);
    }
  };

  /* =========================================================================
     2B. ABOUT SPLIT-CANVAS PINNED SLIDE ENGINE
     Left card stays pinned/stationary in view.
     Right 6-pillars mosaic smoothly slides up through the window as user scrolls.
     When slide completes, page scrolling continues forward.
     ========================================================================= */
  const aboutShowcase = document.getElementById('aboutShowcase');
  const aboutMosaic = document.getElementById('aboutPillarsMosaic');
  const aboutMosaicWindow = document.getElementById('aboutPillarsMosaicWindow');

  // Scroll-driven slide removed — mosaic renders as a static grid
  const handleAboutShowcaseScroll = () => {
    if (aboutMosaic) aboutMosaic.style.transform = 'none';
  };

  const onScroll = () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        handleVideoScroll();
        ticking = false;
      });
      ticking = true;
    }
  };

  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', onScroll, { passive: true });
  window.addEventListener('load', onScroll);

  // Run after a frame so layout/paint has settled (important in Blade layouts)
  requestAnimationFrame(() => {
    handleVideoScroll();
    onScroll();
  });

  /* =========================================================================
     3. CONTACT PAGE POP TRANSITION
     ========================================================================= */
  document.querySelectorAll('.contact-page-link').forEach((link) => {
    link.addEventListener('click', (event) => {
      if (event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;
      if (link.target && link.target !== '_self') return;

      const destination = new URL(link.href, window.location.href);
      if (destination.origin !== window.location.origin || destination.pathname === window.location.pathname) return;

      event.preventDefault();
      document.body.classList.add('contact-page-leaving');
      const delay = window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 0 : 220;
      window.setTimeout(() => window.location.assign(destination.href), delay);
    });
  });

  /* =========================================================================
     5. MOBILE NAVIGATION DRAWER
     ========================================================================= */
  const mobileMenuBtn = document.getElementById('mobileMenuBtn');
  const mobileNavDrawer = document.getElementById('mobileNavDrawer');
  const drawerCloseBtn = document.getElementById('drawerCloseBtn');
  const drawerBackdrop = document.getElementById('drawerBackdrop');

  const dropdownToggles = document.querySelectorAll('.site-header .dropdown-toggle');
  const closeDropdownMenus = () => {
    dropdownToggles.forEach((toggle) => {
      const item = toggle.closest('.has-dropdown');
      if (!item) return;
      item.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
      if (document.activeElement === toggle) toggle.blur();
    });
  };

  dropdownToggles.forEach((toggle) => {
    const item = toggle.closest('.has-dropdown');
    if (item) {
      item.addEventListener('mouseenter', () => toggle.setAttribute('aria-expanded', 'true'));
      item.addEventListener('mouseleave', () => {
        if (!item.classList.contains('is-open')) toggle.setAttribute('aria-expanded', 'false');
      });
      item.addEventListener('focusin', () => toggle.setAttribute('aria-expanded', 'true'));
      item.addEventListener('focusout', () => {
        window.queueMicrotask(() => {
          if (!item.contains(document.activeElement) && !item.classList.contains('is-open')) {
            toggle.setAttribute('aria-expanded', 'false');
          }
        });
      });
    }

    toggle.addEventListener('click', (event) => {
      event.preventDefault();
      if (!item) return;
      const shouldOpen = !item.classList.contains('is-open');
      closeDropdownMenus();
      if (shouldOpen) {
        item.classList.add('is-open');
        toggle.setAttribute('aria-expanded', 'true');
      }
    });
  });

  document.addEventListener('click', (event) => {
    const target = event.target instanceof Element ? event.target : null;
    if (!target?.closest('.site-header .has-dropdown')) closeDropdownMenus();
  });

  function openMobileDrawer() {
    if (mobileNavDrawer) mobileNavDrawer.classList.add('active');
    if (drawerBackdrop) drawerBackdrop.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeMobileDrawer() {
    if (mobileNavDrawer) mobileNavDrawer.classList.remove('active');
    if (drawerBackdrop) drawerBackdrop.classList.remove('active');
    document.body.style.overflow = '';
  }

  if (mobileMenuBtn) mobileMenuBtn.addEventListener('click', openMobileDrawer);
  if (drawerCloseBtn) drawerCloseBtn.addEventListener('click', closeMobileDrawer);
  if (drawerBackdrop) drawerBackdrop.addEventListener('click', closeMobileDrawer);

  document.querySelectorAll('.mobile-nav-link').forEach((link) => {
    link.addEventListener('click', closeMobileDrawer);
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      closeModal();
      closeMobileDrawer();
      closeDropdownMenus();
    }
  });

  /* =========================================================================
     5.5 ABOUT SECTION (SPLIT CANVAS) ON-SCROLL REVEAL & STAGGER
     ========================================================================= */
  const aboutSplitCanvas = document.querySelector('.about-split-canvas');
  const aboutCultureCard = document.querySelector('.about-culture-card');
  const aboutPillarTiles = document.querySelectorAll('.pillar-tile-item');

  if (aboutSplitCanvas && 'IntersectionObserver' in window) {
    const aboutObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          if (aboutCultureCard) {
            aboutCultureCard.classList.add('is-revealed');
          }
          aboutPillarTiles.forEach((tile, idx) => {
            setTimeout(() => {
              tile.classList.add('is-revealed');
            }, 60 + idx * 85);
          });
          aboutObserver.unobserve(entry.target);
        }
      });
    }, { root: null, rootMargin: '0px 0px -40px 0px', threshold: 0.12 });

    aboutObserver.observe(aboutSplitCanvas);
  } else if (aboutCultureCard) {
    aboutCultureCard.classList.add('is-revealed');
    aboutPillarTiles.forEach(tile => tile.classList.add('is-revealed'));
  }

  /* =========================================================================
     6. BENTO SERVICES SECTION: 2026+ NEXT-GEN SPATIAL & KINETIC ENGINE
     ========================================================================= */
  const bentoSection = document.querySelector('.bento-services-section#services');
  if (bentoSection) {
    bentoSection.classList.add('bento-scroll-enabled');
    const bentoElements = bentoSection.querySelectorAll('[data-bento-scroll]');
    const bentoCards = bentoSection.querySelectorAll('[data-bento-card]');

    /* 6.1 Native Off-Thread Intersection Observer (Zero-Jank Reveal) */
    if ('IntersectionObserver' in window) {
      const bentoObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-active');
            entry.target.classList.remove('is-above', 'is-below');
            bentoObserver.unobserve(entry.target);
          }
        });
      }, {
        root: null,
        rootMargin: '0px 0px -40px 0px',
        threshold: 0.1
      });

      bentoElements.forEach((el) => bentoObserver.observe(el));
    } else {
      bentoElements.forEach((el) => el.classList.add('is-active'));
    }

    /* 6.2 Dynamic Cursor Spotlight & 3D Spatial Tilt Physics */
    if (window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
      bentoCards.forEach((card) => {
        card.addEventListener('mousemove', (e) => {
          const rect = card.getBoundingClientRect();
          const x = e.clientX - rect.left;
          const y = e.clientY - rect.top;

          card.style.setProperty('--mouse-x', `${x}px`);
          card.style.setProperty('--mouse-y', `${y}px`);

          // Subtle 3D Gyroscopic Perspective Tilt
          const rotX = (((y / rect.height) - 0.5) * -6).toFixed(2);
          const rotY = (((x / rect.width) - 0.5) * 6).toFixed(2);
          card.style.setProperty('--rot-x', `${rotX}deg`);
          card.style.setProperty('--rot-y', `${rotY}deg`);
        });

        card.addEventListener('mouseleave', () => {
          card.style.setProperty('--rot-x', '0deg');
          card.style.setProperty('--rot-y', '0deg');
        });
      });
    }

    /* 6.3 Interactive IDE Code Studio Tab Switcher (Card 1) */
    const tabButtons = bentoSection.querySelectorAll('.btw-tab');
    const tabPanes = bentoSection.querySelectorAll('.btw-tab-pane');

    tabButtons.forEach((btn) => {
      btn.addEventListener('click', () => {
        const targetTab = btn.getAttribute('data-tab');
        tabButtons.forEach(b => b.classList.toggle('active', b === btn));
        tabPanes.forEach(p => p.classList.toggle('active', p.id === `pane-${targetTab}`));
      });
    });

    /* 6.3.1 Live Interactive Latency Benchmark Simulator */
    const runBenchBtn = bentoSection.querySelector('#btwRunBench');
    const runBenchOut = bentoSection.querySelector('#btwRunOut');
    if (runBenchBtn && runBenchOut) {
      runBenchBtn.addEventListener('click', () => {
        runBenchBtn.disabled = true;
        const icon = runBenchBtn.querySelector('i');
        if (icon) icon.className = 'fa-solid fa-spinner fa-spin';
        runBenchOut.textContent = 'Pinging Edge Network...';
        runBenchOut.style.color = '#38bdf8';

        setTimeout(() => {
          const latency = Math.floor(Math.random() * 16) + 22; // 22ms - 37ms
          runBenchOut.innerHTML = `⚡ Benchmark: <strong>${latency}ms</strong> edge TTFB (99.98% SLA Verified)`;
          runBenchOut.style.color = '#22c55e';
          if (icon) icon.className = 'fa-solid fa-check';
          setTimeout(() => {
            runBenchBtn.disabled = false;
            if (icon) icon.className = 'fa-solid fa-play';
          }, 2500);
        }, 500);
      });
    }

    /* 6.4 Real-Time Oscilloscope Wave Synthesizer (Card 3) */
    const wavePath = bentoSection.querySelector('.bst-wave-path');
    if (wavePath) {
      let phase = 0;
      let waveRafId = null;

      const animateWave = () => {
        phase += 0.045;
        const p1 = 24 + Math.sin(phase) * 14;
        const p2 = 24 + Math.cos(phase * 1.2) * 12;
        const p3 = 24 + Math.sin(phase * 0.8 + 1) * 14;
        const d = `M0,24 Q37.5,${p1.toFixed(1)} 75,24 T150,${p2.toFixed(1)} T225,${p3.toFixed(1)} T300,24`;
        wavePath.setAttribute('d', d);
        waveRafId = requestAnimationFrame(animateWave);
      };

      // Only run when section is intersecting
      if ('IntersectionObserver' in window) {
        const waveObserver = new IntersectionObserver((entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              if (!waveRafId) waveRafId = requestAnimationFrame(animateWave);
            } else if (waveRafId) {
              cancelAnimationFrame(waveRafId);
              waveRafId = null;
            }
          });
        }, { threshold: 0.1 });
        waveObserver.observe(bentoSection);
      } else {
        waveRafId = requestAnimationFrame(animateWave);
      }
    }
  }

  const serviceCards = document.querySelectorAll('[data-service-card]');
  if (serviceCards.length > 0 && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        const card = entry.target;
        const cardIndex = Array.from(serviceCards).indexOf(card);
        const delay = cardIndex * 100;

        if (entry.isIntersecting) {
          setTimeout(() => card.classList.add('visible'), delay);
        } else {
          card.classList.remove('visible');
        }
      });
    }, { root: null, rootMargin: '0px', threshold: 0.1 });

    serviceCards.forEach((card) => observer.observe(card));
  }

  /* =========================================================================
     7. PROCESS SECTION SCROLL ANIMATION
     ========================================================================= */
  const processSteps = document.querySelectorAll('[data-process-step]');

  if (processSteps.length > 0 && 'IntersectionObserver' in window) {
    const processObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        const step = entry.target;
        const stepIndex = Array.from(processSteps).indexOf(step);
        const delay = stepIndex * 150;

        if (entry.isIntersecting) {
          setTimeout(() => step.classList.add('visible'), delay);
        } else {
          step.classList.remove('visible');
        }
      });
    }, { root: null, rootMargin: '0px', threshold: 0.2 });

    processSteps.forEach((step) => processObserver.observe(step));
  }

  /* =========================================================================
     8. STATS COUNTERS
     ========================================================================= */
  const statNumbers = document.querySelectorAll('.stats-section .stat-number[data-count]');
  const counterFrames = new WeakMap();

  const formatStatNumber = (number, decimals, suffix) => {
    const formattedNumber = new Intl.NumberFormat(undefined, {
      minimumFractionDigits: decimals,
      maximumFractionDigits: decimals
    }).format(number);
    return `${formattedNumber}${suffix}`;
  };

  /* =========================================================================
     DIRECTIONAL KINETIC ON-SCROLL REVEAL ENGINE (PERFORMANCE-OPTIMIZED)
     ========================================================================= */
  const animElements = document.querySelectorAll('[data-anim]');
  if (animElements.length > 0) {
    if ('IntersectionObserver' in window) {
      const animObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-inview', 'is-animated');
            entry.target.classList.remove('is-above', 'is-below');
            animObserver.unobserve(entry.target);
          }
        });
      }, {
        root: null,
        rootMargin: '0px 0px -40px 0px',
        threshold: 0.08
      });

      animElements.forEach((el) => {
        // Elements inside sliders should reveal immediately to prevent transform collisions
        if (el.closest('.why-slider-track') || el.closest('.ind-slider-track')) {
          el.classList.add('is-inview', 'is-animated');
        } else {
          animObserver.observe(el);
        }
      });
    } else {
      animElements.forEach(el => el.classList.add('is-inview', 'is-animated'));
    }
  }

  /* =========================================================================
     8.4 BENTO CAPABILITY DISCIPLINE SWITCHER
     ========================================================================= */
  const bentoFilterBtns = document.querySelectorAll('.bdn-btn');
  const bentoCards = document.querySelectorAll('.bento-grid .bento-card');

  if (bentoFilterBtns.length > 0 && bentoCards.length > 0) {
    bentoFilterBtns.forEach((btn) => {
      btn.addEventListener('click', () => {
        const filter = btn.getAttribute('data-bento-filter') || 'all';
        bentoFilterBtns.forEach(b => b.classList.toggle('active', b === btn));

        bentoCards.forEach((card) => {
          const cat = card.getAttribute('data-bento-cat') || 'all';
          if (filter === 'all' || cat === filter || cat === 'all') {
            card.style.display = '';
            card.style.opacity = '1';
            card.style.transform = 'none';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });
  }

  /* =========================================================================
     8.45 WHY CHOOSE US INTERACTIVE SLIDE CAROUSEL
     ========================================================================= */
  const whyViewport = document.getElementById('whySliderViewport');
  const whyTrack = document.getElementById('whySliderTrack');
  const whyPrevBtn = document.getElementById('whyPrevBtn');
  const whyNextBtn = document.getElementById('whyNextBtn');
  const whyActivePage = document.getElementById('whyActivePage');
  const whyTotalPages = document.getElementById('whyTotalPages');
  const whyDots = document.querySelectorAll('#whyNavDots .why-dot');
  const whyCards = document.querySelectorAll('.why-slider-track .why-matrix-card');

  if (whyViewport && whyTrack && whyCards.length > 0) {
    let currentWhySlide = 0;

    const getCardsPerView = () => {
      if (window.innerWidth <= 640) return 1;
      if (window.innerWidth <= 1024) return 2;
      return 3;
    };

    const updateWhyCarousel = () => {
      const cardsPerView = getCardsPerView();
      const maxSlide = Math.max(0, Math.ceil(whyCards.length / cardsPerView) - 1);
      if (currentWhySlide > maxSlide) currentWhySlide = maxSlide;

      const card = whyCards[0];
      if (!card) return;
      const cardWidth = card.getBoundingClientRect().width;
      const gap = 24; // 1.5rem
      const slideDistance = (cardWidth + gap) * cardsPerView;

      whyTrack.style.transform = `translateX(-${currentWhySlide * slideDistance}px)`;

      if (whyActivePage) whyActivePage.textContent = currentWhySlide + 1;
      if (whyTotalPages) whyTotalPages.textContent = maxSlide + 1;

      if (whyPrevBtn) whyPrevBtn.disabled = currentWhySlide === 0;
      if (whyNextBtn) whyNextBtn.disabled = currentWhySlide >= maxSlide;

      if (whyDots.length > 0) {
        whyDots.forEach((dot, idx) => {
          dot.classList.toggle('active', idx === currentWhySlide);
          dot.style.display = idx <= maxSlide ? '' : 'none';
        });
      }
    };

    if (whyPrevBtn) {
      whyPrevBtn.addEventListener('click', () => {
        if (currentWhySlide > 0) {
          currentWhySlide--;
          updateWhyCarousel();
        }
      });
    }

    if (whyNextBtn) {
      whyNextBtn.addEventListener('click', () => {
        const cardsPerView = getCardsPerView();
        const maxSlide = Math.max(0, Math.ceil(whyCards.length / cardsPerView) - 1);
        if (currentWhySlide < maxSlide) {
          currentWhySlide++;
          updateWhyCarousel();
        }
      });
    }

    if (whyDots.length > 0) {
      whyDots.forEach((dot) => {
        dot.addEventListener('click', () => {
          const targetIndex = parseInt(dot.getAttribute('data-index') || '0', 10);
          currentWhySlide = targetIndex;
          updateWhyCarousel();
        });
      });
    }

    // Touch Swipe Support
    let touchStartX = 0;
    let touchEndX = 0;

    whyViewport.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    whyViewport.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].screenX;
      const diff = touchStartX - touchEndX;
      if (Math.abs(diff) > 40) {
        if (diff > 0 && whyNextBtn && !whyNextBtn.disabled) {
          currentWhySlide++;
          updateWhyCarousel();
        } else if (diff < 0 && whyPrevBtn && !whyPrevBtn.disabled) {
          currentWhySlide--;
          updateWhyCarousel();
        }
      }
    }, { passive: true });

    window.addEventListener('resize', updateWhyCarousel);
    updateWhyCarousel();
  }

  /* =========================================================================
     8.5 INDUSTRIES SLIDE CAROUSEL & SEGMENTED FILTER ENGINE
     ========================================================================= */
  const indViewport = document.getElementById('indSliderViewport');
  const indTrack = document.getElementById('indSliderTrack');
  const indPrevBtn = document.getElementById('indPrevBtn');
  const indNextBtn = document.getElementById('indNextBtn');
  const indDots = document.querySelectorAll('#indNavDots .ind-dot');
  const industryCards = document.querySelectorAll('.industry-card-pro');

  if (indViewport && indTrack && industryCards.length > 0) {
    let currentIndSlide = 0;

    const getIndCardsPerView = () => {
      if (window.innerWidth <= 640) return 1;
      if (window.innerWidth <= 1024) return 2;
      return 3;
    };

    const updateIndCarousel = () => {
      const cardsPerView = getIndCardsPerView();
      const maxSlide = Math.max(0, Math.ceil(industryCards.length / cardsPerView) - 1);
      if (currentIndSlide > maxSlide) currentIndSlide = maxSlide;

      const card = industryCards[0];
      if (!card) return;
      const cardWidth = card.getBoundingClientRect().width;
      const gap = 24; // 1.5rem
      const slideDistance = (cardWidth + gap) * cardsPerView;

      indTrack.style.transform = `translateX(-${currentIndSlide * slideDistance}px)`;

      if (indPrevBtn) indPrevBtn.disabled = currentIndSlide === 0;
      if (indNextBtn) indNextBtn.disabled = currentIndSlide >= maxSlide;

      if (indDots.length > 0) {
        indDots.forEach((dot, idx) => {
          dot.classList.toggle('active', idx === currentIndSlide);
          dot.style.display = idx <= maxSlide ? '' : 'none';
        });
      }
    };

    if (indPrevBtn) {
      indPrevBtn.addEventListener('click', () => {
        if (currentIndSlide > 0) {
          currentIndSlide--;
          updateIndCarousel();
        }
      });
    }

    if (indNextBtn) {
      indNextBtn.addEventListener('click', () => {
        const cardsPerView = getIndCardsPerView();
        const maxSlide = Math.max(0, Math.ceil(industryCards.length / cardsPerView) - 1);
        if (currentIndSlide < maxSlide) {
          currentIndSlide++;
          updateIndCarousel();
        }
      });
    }

    if (indDots.length > 0) {
      indDots.forEach((dot) => {
        dot.addEventListener('click', () => {
          const targetIndex = parseInt(dot.getAttribute('data-index') || '0', 10);
          currentIndSlide = targetIndex;
          updateIndCarousel();
        });
      });
    }

    // Touch Swipe Support for Industries
    let indTouchStartX = 0;
    let indTouchEndX = 0;

    indViewport.addEventListener('touchstart', (e) => {
      indTouchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    indViewport.addEventListener('touchend', (e) => {
      indTouchEndX = e.changedTouches[0].screenX;
      const diff = indTouchStartX - indTouchEndX;
      if (Math.abs(diff) > 40) {
        if (diff > 0 && indNextBtn && !indNextBtn.disabled) {
          currentIndSlide++;
          updateIndCarousel();
        } else if (diff < 0 && indPrevBtn && !indPrevBtn.disabled) {
          currentIndSlide--;
          updateIndCarousel();
        }
      }
    }, { passive: true });

    window.addEventListener('resize', updateIndCarousel);
    updateIndCarousel();
  }

  /* =========================================================================
     8.6 INTERACTIVE MID-CTA SCOPE & SPRINT ESTIMATOR
     ========================================================================= */
  const mccPills = document.querySelectorAll('.mcc-pill');
  const mccOutType = document.getElementById('mccOutType');
  const mccOutSprints = document.getElementById('mccOutSprints');
  const mccOutTeam = document.getElementById('mccOutTeam');
  const mccWaLink = document.getElementById('mccWaLink');

  if (mccPills.length > 0 && mccOutType && mccOutSprints && mccOutTeam && mccWaLink) {
    mccPills.forEach((pill) => {
      pill.addEventListener('click', () => {
        mccPills.forEach(p => p.classList.toggle('active', p === pill));
        const type = pill.getAttribute('data-type') || 'Web Platform';
        const sprints = pill.getAttribute('data-sprints') || '2–4 Sprints';
        const team = pill.getAttribute('data-team') || 'Senior Full-Stack Lead + UI/UX';

        mccOutType.textContent = type;
        mccOutSprints.textContent = sprints;
        mccOutTeam.textContent = team;

        const waMsg = `Hi Retrotech, I used your Project Estimator for a ${type} project (${sprints}). Dedicated cohort: ${team}. Let's discuss next steps.`;
        mccWaLink.href = `https://wa.me/919973960072?text=${encodeURIComponent(waMsg)}`;
      });
    });
  }

  if ('IntersectionObserver' in window) {
    const statsCounterObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        const numberElement = entry.target;
        const activeFrame = counterFrames.get(numberElement);
        if (!entry.isIntersecting || entry.intersectionRatio < 0.5) {
          if (activeFrame) window.cancelAnimationFrame(activeFrame);
          counterFrames.delete(numberElement);
          return;
        }

        const target = Number(numberElement.dataset.count);
        const decimals = Number(numberElement.dataset.decimals || 0);
        const suffix = numberElement.dataset.suffix || '';
        if (activeFrame) window.cancelAnimationFrame(activeFrame);

        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
          numberElement.textContent = formatStatNumber(target, decimals, suffix);
          return;
        }

        const duration = 600;
        const startValue = target * 0.75;
        const startTime = performance.now();
        numberElement.textContent = formatStatNumber(startValue, decimals, suffix);

        const updateCounter = (currentTime) => {
          const progress = Math.min((currentTime - startTime) / duration, 1);
          const easedProgress = 1 - Math.pow(1 - progress, 4);
          const currentValue = startValue + (target - startValue) * easedProgress;
          numberElement.textContent = formatStatNumber(currentValue, decimals, suffix);

          if (progress < 1) {
            counterFrames.set(numberElement, window.requestAnimationFrame(updateCounter));
          } else {
            numberElement.textContent = formatStatNumber(target, decimals, suffix);
            counterFrames.delete(numberElement);
          }
        };

        counterFrames.set(numberElement, window.requestAnimationFrame(updateCounter));
      });
    }, { threshold: 0.5 });

    statNumbers.forEach((numberElement) => statsCounterObserver.observe(numberElement));
  } else {
    statNumbers.forEach((numberElement) => {
      const target = Number(numberElement.dataset.count);
      const decimals = Number(numberElement.dataset.decimals || 0);
      const suffix = numberElement.dataset.suffix || '';
      numberElement.textContent = formatStatNumber(target, decimals, suffix);
    });
  }

  /* =========================================================================
     14. VIEWPORT SCROLL PROGRESS NEON BAR (THROTTLED RAF)
     ========================================================================= */
  const scrollProgressBar = document.getElementById('scrollProgressBar');
  if (scrollProgressBar) {
    let progressRaf = null;
    let docHeight = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);

    window.addEventListener('resize', () => {
      docHeight = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);
    }, { passive: true });

    const updateProgressBar = () => {
      const scrollY = window.scrollY || window.pageYOffset;
      const progress = (scrollY / docHeight) * 100;
      scrollProgressBar.style.width = Math.min(100, Math.max(0, progress)) + '%';
      progressRaf = null;
    };

    const handleScrollProgress = () => {
      if (!progressRaf) {
        progressRaf = requestAnimationFrame(updateProgressBar);
      }
    };
    window.addEventListener('scroll', handleScrollProgress, { passive: true });
    updateProgressBar();
  }

  /* =========================================================================
     15. REAL-TIME FAQ LIVE SEARCH
     ========================================================================= */
  const faqSearchInput = document.getElementById('faqSearchInput');
  const faqSearchClear = document.getElementById('faqSearchClear');
  const faqMatchCount = document.getElementById('faqMatchCount');
  const faqSearchEmpty = document.getElementById('faqSearchEmpty');
  const faqSearchTerm = document.getElementById('faqSearchTerm');
  const faqItems = document.querySelectorAll('.faq-accordion-group .faq-acc-item');

  if (faqSearchInput && faqItems.length > 0) {
    const filterFaqs = () => {
      const query = faqSearchInput.value.trim().toLowerCase();
      let matchCount = 0;

      if (faqSearchClear) {
        faqSearchClear.style.display = query.length > 0 ? 'inline-flex' : 'none';
      }

      faqItems.forEach((item) => {
        const text = (item.textContent || '').toLowerCase();
        const isMatch = query === '' || text.includes(query);

        if (isMatch) {
          item.style.display = '';
          matchCount++;
          if (query.length > 1) {
            item.setAttribute('open', '');
          }
        } else {
          item.style.display = 'none';
        }
      });

      if (faqMatchCount) {
        faqMatchCount.textContent = matchCount;
      }

      if (faqSearchEmpty) {
        if (matchCount === 0 && query.length > 0) {
          faqSearchEmpty.style.display = 'block';
          if (faqSearchTerm) faqSearchTerm.textContent = faqSearchInput.value;
        } else {
          faqSearchEmpty.style.display = 'none';
        }
      }
    };

    faqSearchInput.addEventListener('input', filterFaqs);

    if (faqSearchClear) {
      faqSearchClear.addEventListener('click', () => {
        faqSearchInput.value = '';
        filterFaqs();
        faqSearchInput.focus();
      });
    }
  }

  /* =========================================================================
     16. INTERACTIVE CONTACT BUDGET CHIPS
     ========================================================================= */
  const budgetChips = document.querySelectorAll('#contactBudgetChips .budget-chip');
  const contactMsg = document.getElementById('contactMessage');

  if (budgetChips.length > 0 && contactMsg) {
    budgetChips.forEach((chip) => {
      chip.addEventListener('click', () => {
        const isAlreadyActive = chip.classList.contains('active');
        budgetChips.forEach(c => c.classList.remove('active'));

        let currentVal = contactMsg.value;
        currentVal = currentVal.replace(/^\[Budget:\s*[^\]]+\]\r?\n?/i, '');

        if (!isAlreadyActive) {
          chip.classList.add('active');
          const budget = chip.getAttribute('data-budget') || chip.textContent.trim();
          contactMsg.value = `[Budget: ${budget}]\n` + currentVal;
        } else {
          contactMsg.value = currentVal;
        }
      });
    });
  }
}

/* Boot: works whether the script loads before or after DOMContentLoaded */
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initRetrotech);
} else {
  initRetrotech();
}
