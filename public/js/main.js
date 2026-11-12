/**
 * RETROTECH - BUSINESS MADE EASY
 * Handles background video playback, video scroll docking, WhatsApp widget,
 * page transitions, and responsive mobile navigation.
 */

function initRetrotech() {
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const lenisEasing = (time) => 1 - Math.pow(1 - time, 3);
  // Lenis is initialised globally in layouts/app.blade.php for every page.
  const lenis = window.retroLenis || null;

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
  /* =========================================================================
     2. VIDEO SCROLL DOCKING ENGINE (HIGH PERFORMANCE)
     ========================================================================= */
  const videoContainer = document.getElementById('videoContainer');
  const videoDockSlot = document.getElementById('videoDockSlot');
  const heroContent = document.querySelector('.hero-content');
  const siteHeader = document.getElementById('siteHeader');
  const splitCanvas = document.querySelector('.about-split-canvas');
  const cultureImg = document.querySelector('.acc-bg-image-wrap img');

  let ticking = false;
  let slotDocTop = 0;
  let slotLeft = 0;
  let slotW = 0;
  let slotH = 0;
  let splitCanvasDocTop = 0;
  let splitCanvasH = 0;
  let windowW = window.innerWidth;
  let windowH = window.innerHeight;
  let measurementsReady = false;

  const getScrollY = () =>
    window.pageYOffset ||
    document.documentElement.scrollTop ||
    document.body.scrollTop ||
    0;

  const measureLayout = () => {
    windowW = document.documentElement.clientWidth || window.innerWidth;
    windowH = window.innerHeight;
    const scrollY = getScrollY();

    if (videoDockSlot) {
      const r = videoDockSlot.getBoundingClientRect();
      if (r.width > 0 && r.height > 0) {
        slotDocTop = r.top + scrollY;
        slotLeft = r.left;
        slotW = r.width;
        slotH = r.height;
        measurementsReady = true;
      }
    }

    if (splitCanvas) {
      const cr = splitCanvas.getBoundingClientRect();
      splitCanvasDocTop = cr.top + scrollY;
      splitCanvasH = cr.height;
    }
  };

  let lastW = null;
  let lastH = null;
  let lastTransform = '';
  let lastRadius = null;
  let lastShadow = null;
  let lastHeroOpacity = null;
  let lastHeroTransform = '';
  let videoIsOffscreen = false;

  const handleVideoScroll = () => {
    if (!videoContainer) {
      if (siteHeader) siteHeader.classList.add('scrolled');
      return;
    }

    if (!measurementsReady || slotW === 0) {
      measureLayout();
      if (!measurementsReady || slotW === 0) return;
    }

    const scrollY = getScrollY();
    const transitionDistance = windowH * 0.85;
    const rawProgress = scrollY / transitionDistance;
    const p = Math.min(Math.max(rawProgress, 0), 1);

    const targetW = slotW;
    const targetH = slotH;
    const targetX = slotLeft;
    const targetY = slotDocTop - scrollY;

    // When the docked video has scrolled completely off the top of the viewport,
    // hide it and pause decoding to free 100% GPU/CPU for the rest of the page.
    if (p >= 1.0 && targetY < -targetH - 120) {
      if (!videoIsOffscreen) {
        videoIsOffscreen = true;
        videoContainer.style.visibility = 'hidden';
        if (heroVideo && !heroVideo.paused) {
          heroVideo.pause();
        }
      }
      if (siteHeader) siteHeader.classList.add('scrolled');
      return;
    } else if (videoIsOffscreen) {
      videoIsOffscreen = false;
      videoContainer.style.visibility = 'visible';
      if (heroVideo && heroVideo.paused) {
        heroVideo.play().catch(() => {});
      }
    }

    const midW = Math.min(windowW * 0.54, 660);
    const midH = midW * (9 / 16);
    const midX = (windowW - midW) / 2;
    const midY = (windowH - midH) / 2 - 20;

    let curW, curH, curX, curY, curShadow, curRadius;

    if (p <= 0.5) {
      const subP = p / 0.5;
      const ease = subP * subP * (3 - 2 * subP);
      curW = Math.round(windowW + (midW - windowW) * ease);
      curH = Math.round(windowH + (midH - windowH) * ease);
      curX = Math.round(midX * ease);
      curY = Math.round(midY * ease);
      curShadow = ease * 25;
      curRadius = ease * 14;
    } else if (p < 1.0) {
      const subP = (p - 0.5) / 0.5;
      const ease = subP * subP * (3 - 2 * subP);
      curW = Math.round(midW + (targetW - midW) * ease);
      curH = Math.round(midH + (targetH - midH) * ease);
      curX = Math.round(midX + (targetX - midX) * ease);
      curY = Math.round(midY + (targetY - midY) * ease);
      curShadow = 25 - ease * 15;
      curRadius = 14;
    } else {
      curW = targetW;
      curH = targetH;
      curX = Math.round(targetX);
      curY = Math.round(targetY);
      curShadow = 10;
      curRadius = 14;
    }

    // Only mutate width/height/radius/shadow when their values change (prevents layout thrashing)
    if (curW !== lastW) {
      videoContainer.style.width = `${curW}px`;
      lastW = curW;
    }
    if (curH !== lastH) {
      videoContainer.style.height = `${curH}px`;
      lastH = curH;
    }
    const nextTransform = `translate3d(${curX}px, ${curY}px, 0)`;
    if (nextTransform !== lastTransform) {
      videoContainer.style.transform = nextTransform;
      lastTransform = nextTransform;
    }
    const roundedRadius = Math.round(curRadius);
    if (roundedRadius !== lastRadius) {
      videoContainer.style.borderRadius = `${roundedRadius}px`;
      lastRadius = roundedRadius;
    }
    const roundedShadow = Math.round(curShadow);
    if (roundedShadow !== lastShadow) {
      videoContainer.style.boxShadow = roundedShadow > 0 ? `0 10px ${roundedShadow}px rgba(0,0,0,0.22)` : 'none';
      lastShadow = roundedShadow;
    }

    if (heroContent) {
      const heroOpacity = Math.max(0, 1 - p * 2.2);
      if (Math.abs(heroOpacity - (lastHeroOpacity ?? -1)) > 0.01) {
        heroContent.style.opacity = heroOpacity.toFixed(2);
        lastHeroOpacity = heroOpacity;
        heroContent.style.pointerEvents = heroOpacity < 0.2 ? 'none' : 'auto';
      }
      const heroShift = Math.round(-p * 60);
      const nextHeroTransform = `translateY(${heroShift}px)`;
      if (nextHeroTransform !== lastHeroTransform) {
        heroContent.style.transform = nextHeroTransform;
        lastHeroTransform = nextHeroTransform;
      }
    }

    /* Parallax depth on About Culture card image during scroll */
    if (splitCanvas && cultureImg && splitCanvasH > 0) {
      const topInView = splitCanvasDocTop - scrollY;
      if (topInView < windowH && topInView + splitCanvasH > 0) {
        const progress = (windowH - topInView) / (windowH + splitCanvasH);
        const shiftY = ((progress - 0.5) * 44).toFixed(1);
        cultureImg.style.transform = `translate3d(0, ${shiftY}px, 0) scale(1.08)`;
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
  window.addEventListener('resize', () => {
    measureLayout();
    onScroll();
  }, { passive: true });
  window.addEventListener('load', () => {
    measureLayout();
    onScroll();
  });

  // Run after a frame so layout/paint has settled (important in Blade layouts)
  requestAnimationFrame(() => {
    measureLayout();
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
     6. HOME SERVICES SECTION: INTERACTIVE CATEGORY FILTER
     ========================================================================= */
  const srvFilterBtns = document.querySelectorAll('.services-filter-bar .sfb-btn');
  const srvCards = document.querySelectorAll('.services-showcase-grid .service-card');

  if (srvFilterBtns.length > 0 && srvCards.length > 0) {
    srvFilterBtns.forEach((btn) => {
      btn.addEventListener('click', () => {
        const filter = btn.getAttribute('data-filter') || 'all';
        srvFilterBtns.forEach(b => b.classList.toggle('active', b === btn));

        srvCards.forEach((card) => {
          const cat = card.getAttribute('data-category') || 'all';
          if (filter === 'all' || cat === filter) {
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
        if (el.closest('.ind-slider-track')) {
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
     8.45 WHY CHOOSE US: SMOOTH CONTINUOUS SCROLL STACKING CARDS
     ========================================================================= */
  const whyTrack = document.getElementById('whyScrollTrack');
  const whyPinned = document.getElementById('whyPinnedViewport');
  const card0 = document.querySelector('.why-cards-stage .why-stack-card[data-index="0"]');
  const card1 = document.querySelector('.why-cards-stage .why-stack-card[data-index="1"]');
  const card2 = document.querySelector('.why-cards-stage .why-stack-card[data-index="2"]');

  if (whyTrack && card0 && card1 && card2) {
    let ticking = false;

    // Hermite smoothstep for acceleration and deceleration with zero jerk
    const smoothstep = (min, max, value) => {
      const x = Math.max(0, Math.min(1, (value - min) / (max - min)));
      return x * x * (3 - 2 * x);
    };

    const getStickyTop = () => {
      if (whyPinned) {
        const topVal = parseInt(window.getComputedStyle(whyPinned).top, 10);
        if (!isNaN(topVal)) return topVal;
      }
      return window.innerWidth <= 860 ? 65 : 72;
    };

    const updateStackPhysics = () => {
      const rect = whyTrack.getBoundingClientRect();
      const trackHeight = whyTrack.offsetHeight;
      const viewportHeight = window.innerHeight;
      const scrollDistance = trackHeight - viewportHeight;

      if (scrollDistance <= 0) {
        ticking = false;
        return;
      }

      const stickyTop = getStickyTop();
      // Progress from 0 (starts sticking) to 1 (reaches end of track)
      const progress = Math.min(1, Math.max(0, (stickyTop - rect.top) / scrollDistance));

      // Phase 1: Card 1 stacks smoothly over Card 0 (scroll progress 0.03 to 0.48)
      const p1 = smoothstep(0.03, 0.48, progress);

      // Phase 2: Card 2 stacks smoothly over Card 1 (scroll progress 0.50 to 0.95)
      const p2 = smoothstep(0.50, 0.95, progress);

      // Card 0 physics (bottom-most card)
      const scale0 = 1 - (p1 * 0.05) - (p2 * 0.03);
      const op0 = 1 - (p1 * 0.35) - (p2 * 0.25);
      const bright0 = 1 - (p1 * 0.12) - (p2 * 0.08);
      card0.style.transform = `scale(${scale0.toFixed(4)})`;
      card0.style.opacity = op0.toFixed(3);
      card0.style.filter = `brightness(${bright0.toFixed(3)})`;

      // Card 1 physics (middle card: rises over Card 0, then scales beneath Card 2)
      const y1 = (1 - p1) * 105;
      const scale1 = 1 - (p2 * 0.05);
      const op1 = p1 > 0 ? (1 - (p2 * 0.35)) : 0;
      const bright1 = 1 - (p2 * 0.12);
      card1.style.visibility = p1 > 0 ? 'visible' : 'hidden';
      card1.style.transform = `translate3d(0, ${y1.toFixed(2)}%, 0) scale(${scale1.toFixed(4)})`;
      card1.style.opacity = op1.toFixed(3);
      card1.style.filter = `brightness(${bright1.toFixed(3)})`;

      // Card 2 physics (top-most card: rises over Card 1)
      const y2 = (1 - p2) * 105;
      const op2 = p2 > 0 ? 1 : 0;
      card2.style.visibility = p2 > 0 ? 'visible' : 'hidden';
      card2.style.transform = `translate3d(0, ${y2.toFixed(2)}%, 0) scale(1)`;
      card2.style.opacity = op2.toFixed(3);

      ticking = false;
    };

    window.addEventListener('scroll', () => {
      if (!ticking) {
        window.requestAnimationFrame(updateStackPhysics);
        ticking = true;
      }
    }, { passive: true });

    window.addEventListener('resize', updateStackPhysics, { passive: true });
    updateStackPhysics();
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
      const progress = Math.min(1, Math.max(0, scrollY / docHeight));
      scrollProgressBar.style.transform = `scaleX(${progress})`;
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
     15b. HOMEPAGE ACCORDION AUTO-FOLD SIBLINGS
     ========================================================================= */
  const faqAccordionItems = document.querySelectorAll('.faq-accordion-group .faq-acc-item');
  if (faqAccordionItems.length > 0) {
    faqAccordionItems.forEach((item) => {
      item.addEventListener('toggle', () => {
        if (item.open) {
          faqAccordionItems.forEach((sibling) => {
            if (sibling !== item && sibling.open) {
              sibling.removeAttribute('open');
            }
          });
        }
      });
    });
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
