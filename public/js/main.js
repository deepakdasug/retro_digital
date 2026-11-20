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
      lenis.scrollTo(offsetPosition, { duration: 0.9, easing: lenisEasing });
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
     2. UNIFIED 60FPS COMPOSITOR SCROLL ENGINE & VIDEO DOCKING ENGINE
     ========================================================================= */
  const scrollTasks = [];
  const registerScrollTask = (fn) => scrollTasks.push(fn);

  const layoutTasks = [];
  const registerLayoutTask = (fn) => layoutTasks.push(fn);

  let windowW = window.innerWidth;
  let windowH = window.innerHeight;

  const getScrollY = () =>
    window.pageYOffset ||
    document.documentElement.scrollTop ||
    document.body.scrollTop ||
    0;

  const measureLayout = () => {
    windowW = document.documentElement.clientWidth || window.innerWidth;
    windowH = window.innerHeight;
    const scrollY = getScrollY();
    for (let i = 0; i < layoutTasks.length; i++) {
      layoutTasks[i](scrollY, windowW, windowH);
    }
  };

  let scrollTicking = false;
  const dispatchScroll = () => {
    if (!scrollTicking) {
      window.requestAnimationFrame(() => {
        const scrollY = getScrollY();
        for (let i = 0; i < scrollTasks.length; i++) {
          scrollTasks[i](scrollY, windowW, windowH);
        }
        scrollTicking = false;
      });
      scrollTicking = true;
    }
  };

  const videoContainer = document.getElementById('videoContainer');
  const videoDockSlot = document.getElementById('videoDockSlot');
  const videoDarkOverlay = document.getElementById('videoDarkOverlay');
  const heroContent = document.querySelector('.hero-content');
  const siteHeader = document.getElementById('siteHeader');
  const splitCanvas = document.querySelector('.about-split-canvas');
  const cultureImg = document.querySelector('.acc-bg-image-wrap img');

  let slotDocTop = 0;
  let slotDocLeft = 0;
  let slotW = 0;
  let slotH = 0;
  let dockCompleteScroll = 0;
  let videoOffscreenScroll = 999999;
  let midW = 0, midH = 0, midX = 0, midY = 0;
  let splitCanvasDocTop = 0;
  let splitCanvasH = 0;

  const measureVideoDocking = (scrollY, w, h) => {
    if (videoDockSlot) {
      const sr = videoDockSlot.getBoundingClientRect();
      slotDocTop = sr.top + scrollY;
      slotDocLeft = sr.left;
      slotW = sr.width;
      slotH = sr.height;

      const dockViewportTargetY = Math.max(80, h * 0.42);
      dockCompleteScroll = Math.max(120, slotDocTop - dockViewportTargetY);
      videoOffscreenScroll = slotDocTop + slotH + 120;

      midW = Math.min(Math.max(w * 0.54, 300), Math.min(660, w * 0.9));
      midH = midW * (9 / 16);
      midX = (w - midW) / 2;
      midY = (h - midH) / 2 - 15;
    }

    if (splitCanvas) {
      const cr = splitCanvas.getBoundingClientRect();
      splitCanvasDocTop = cr.top + scrollY;
      splitCanvasH = cr.height;
    }
  };

  registerLayoutTask(measureVideoDocking);

  let lastW = null;
  let lastH = null;
  let lastTransform = '';
  let lastRadius = null;
  let lastHeroOpacity = null;
  let lastHeroTransform = '';
  let lastDarkOverlayOpacity = null;
  let videoIsOffscreen = false;

  const handleVideoScroll = (scrollY, w, h) => {
    if (siteHeader) {
      siteHeader.classList.toggle('scrolled', scrollY > 40);
    }

    if (!videoContainer || !videoDockSlot || slotW === 0 || slotH === 0) {
      return;
    }

    // Fast off-screen check: zero layout reflows!
    if (scrollY > videoOffscreenScroll) {
      if (!videoIsOffscreen) {
        videoIsOffscreen = true;
        videoContainer.style.visibility = 'hidden';
        if (heroVideo && !heroVideo.paused) {
          heroVideo.pause();
        }
      }
      return;
    } else if (videoIsOffscreen) {
      videoIsOffscreen = false;
      videoContainer.style.visibility = 'visible';
      if (heroVideo && heroVideo.paused) {
        heroVideo.play().catch(() => {});
      }
    }

    const rawProgress = dockCompleteScroll > 0 ? scrollY / dockCompleteScroll : 1;
    const p = Math.min(Math.max(rawProgress, 0), 1);

    const targetW = slotW;
    const targetH = slotH;
    const targetX = slotDocLeft;
    const targetY = slotDocTop - scrollY;

    let curW, curH, curX, curY, curRadius;

    if (p <= 0.5) {
      const subP = p / 0.5;
      const ease = subP * subP * (3 - 2 * subP);
      curW = w + (midW - w) * ease;
      curH = h + (midH - h) * ease;
      curX = midX * ease;
      curY = midY * ease;
      curRadius = ease * 14;
    } else if (p < 1.0) {
      const subP = (p - 0.5) / 0.5;
      const ease = subP * subP * (3 - 2 * subP);
      curW = midW + (targetW - midW) * ease;
      curH = midH + (targetH - midH) * ease;
      curX = midX + (targetX - midX) * ease;
      curY = midY + (targetY - midY) * ease;
      curRadius = 14;
    } else {
      curW = targetW;
      curH = targetH;
      curX = targetX;
      curY = targetY;
      curRadius = 14;
    }

    const roundedW = Math.round(curW * 10) / 10;
    const roundedH = Math.round(curH * 10) / 10;
    if (roundedW !== lastW) {
      videoContainer.style.width = `${roundedW}px`;
      lastW = roundedW;
    }
    if (roundedH !== lastH) {
      videoContainer.style.height = `${roundedH}px`;
      lastH = roundedH;
    }

    const nextTransform = `translate3d(${curX.toFixed(1)}px, ${curY.toFixed(1)}px, 0)`;
    if (nextTransform !== lastTransform) {
      videoContainer.style.transform = nextTransform;
      lastTransform = nextTransform;
    }

    const roundedRadius = Math.round(curRadius);
    if (roundedRadius !== lastRadius) {
      videoContainer.style.borderRadius = `${roundedRadius}px`;
      lastRadius = roundedRadius;
    }

    // Fade dark overlay out to reveal bright video with zero GPU decode stall
    if (videoDarkOverlay) {
      const overlayOpacity = Math.max(0, 1 - p * 1.5);
      if (Math.abs(overlayOpacity - (lastDarkOverlayOpacity ?? -1)) > 0.02) {
        videoDarkOverlay.style.opacity = overlayOpacity.toFixed(2);
        lastDarkOverlayOpacity = overlayOpacity;
      }
    }

    // Hero title and CTA fade out
    if (heroContent) {
      if (p <= 0.6) {
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
      } else if (lastHeroOpacity !== 0) {
        heroContent.style.opacity = '0';
        heroContent.style.pointerEvents = 'none';
        lastHeroOpacity = 0;
      }
    }

    // Parallax depth on About Culture card image during scroll
    if (splitCanvas && cultureImg && splitCanvasH > 0) {
      const topInView = splitCanvasDocTop - scrollY;
      if (topInView < h && topInView + splitCanvasH > 0) {
        const progress = (h - topInView) / (h + splitCanvasH);
        const shiftY = ((progress - 0.5) * 44).toFixed(1);
        cultureImg.style.transform = `translate3d(0, ${shiftY}px, 0) scale(1.08)`;
      }
    }
  };

  registerScrollTask(handleVideoScroll);

  window.addEventListener('scroll', dispatchScroll, { passive: true });
  window.addEventListener('resize', () => {
    measureLayout();
    dispatchScroll();
  }, { passive: true });
  window.addEventListener('load', () => {
    measureLayout();
    dispatchScroll();
  });
  if (document.fonts && document.fonts.ready) {
    document.fonts.ready.then(() => {
      measureLayout();
      dispatchScroll();
    });
  }

  requestAnimationFrame(() => {
    measureLayout();
    dispatchScroll();
  });
  setTimeout(() => {
    measureLayout();
    dispatchScroll();
  }, 350);

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
      const href = toggle.getAttribute('href');
      if (href && href !== '#' && href !== '') {
        // Real link destination (e.g., /services or /industries) -> allow normal navigation
        return;
      }
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

  document.querySelectorAll('a.mobile-nav-link, .mobile-services-links a').forEach((link) => {
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
        const delay = cardIndex * 75;

        if (entry.isIntersecting) {
          setTimeout(() => card.classList.add('visible'), delay);
          observer.unobserve(card);
        }
      });
    }, { root: null, rootMargin: '0px 0px -40px 0px', threshold: 0.1 });

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
        const delay = stepIndex * 100;

        if (entry.isIntersecting) {
          setTimeout(() => step.classList.add('visible'), delay);
          processObserver.unobserve(step);
        }
      });
    }, { root: null, rootMargin: '0px 0px -40px 0px', threshold: 0.15 });

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
     8.45 WHY CHOOSE US: HIGH-PERFORMANCE 60FPS STACKING CARDS
     ========================================================================= */
  const whyTrack = document.getElementById('whyScrollTrack');
  const whyPinned = document.getElementById('whyPinnedViewport');
  const card0 = document.querySelector('.why-cards-stage .why-stack-card[data-index="0"]');
  const card1 = document.querySelector('.why-cards-stage .why-stack-card[data-index="1"]');
  const card2 = document.querySelector('.why-cards-stage .why-stack-card[data-index="2"]');

  if (whyTrack && card0 && card1 && card2) {
    let whyTrackDocTop = 0;
    let whyTrackHeight = 0;
    let whyStickyTop = 72;
    let lastStackProgress = -1;

    const smoothstep = (min, max, value) => {
      const x = Math.max(0, Math.min(1, (value - min) / (max - min)));
      return x * x * (3 - 2 * x);
    };

    const measureWhyStack = (scrollY, w) => {
      const rect = whyTrack.getBoundingClientRect();
      whyTrackDocTop = rect.top + scrollY;
      whyTrackHeight = whyTrack.offsetHeight;
      if (whyPinned) {
        const topVal = parseInt(window.getComputedStyle(whyPinned).top, 10);
        whyStickyTop = !isNaN(topVal) ? topVal : (w <= 860 ? 65 : 72);
      } else {
        whyStickyTop = w <= 860 ? 65 : 72;
      }
    };

    registerLayoutTask(measureWhyStack);

    const applyStackPhysics = (progress) => {
      const p1 = smoothstep(0.03, 0.48, progress);
      const p2 = smoothstep(0.50, 0.95, progress);

      // Card 0 physics (bottom-most card)
      const scale0 = 1 - (p1 * 0.05) - (p2 * 0.03);
      const op0 = 1 - (p1 * 0.35) - (p2 * 0.25);
      card0.style.transform = `scale(${scale0.toFixed(4)})`;
      card0.style.opacity = op0.toFixed(3);

      // Card 1 physics (middle card)
      const y1 = (1 - p1) * 105;
      const scale1 = 1 - (p2 * 0.05);
      const op1 = p1 > 0 ? (1 - (p2 * 0.35)) : 0;
      card1.style.visibility = p1 > 0 ? 'visible' : 'hidden';
      card1.style.transform = `translate3d(0, ${y1.toFixed(2)}%, 0) scale(${scale1.toFixed(4)})`;
      card1.style.opacity = op1.toFixed(3);

      // Card 2 physics (top-most card)
      const y2 = (1 - p2) * 105;
      const op2 = p2 > 0 ? 1 : 0;
      card2.style.visibility = p2 > 0 ? 'visible' : 'hidden';
      card2.style.transform = `translate3d(0, ${y2.toFixed(2)}%, 0) scale(1)`;
      card2.style.opacity = op2.toFixed(3);
    };

    const updateStackPhysics = (scrollY, w, h) => {
      if (whyTrackHeight === 0) return;
      const scrollDistance = whyTrackHeight - h;
      if (scrollDistance <= 0) return;

      const whyTop = whyTrackDocTop - scrollY;

      // Offscreen fast guards: avoid any DOM writes when not in view
      if (whyTop > h + 80) {
        if (lastStackProgress !== 0) {
          applyStackPhysics(0);
          lastStackProgress = 0;
        }
        return;
      }
      if (whyTop + whyTrackHeight < -80) {
        if (lastStackProgress !== 1) {
          applyStackPhysics(1);
          lastStackProgress = 1;
        }
        return;
      }

      const progress = Math.min(1, Math.max(0, (whyStickyTop - whyTop) / scrollDistance));
      if (Math.abs(progress - lastStackProgress) > 0.001) {
        applyStackPhysics(progress);
        lastStackProgress = progress;
      }
    };

    registerScrollTask(updateStackPhysics);
  }

  /* =========================================================================
     8.5 INDUSTRIES SLIDE CAROUSEL & INFINITE LOOP ENGINE
     ========================================================================= */
  const indViewport = document.getElementById('indSliderViewport');
  const indTrack = document.getElementById('indSliderTrack');
  const indPrevBtn = document.getElementById('indPrevBtn');
  const indNextBtn = document.getElementById('indNextBtn');
  const indNavDots = document.getElementById('indNavDots');

  if (indViewport && indTrack) {
    const originalCards = Array.from(indTrack.querySelectorAll('.industry-card-pro'));
    const totalOriginals = originalCards.length;

    if (totalOriginals > 0) {
      // 1. Setup Clones for Seamless Infinite Loop
      // Prepend a full set of clones before first original card in correct forward order
      const firstOriginal = originalCards[0];
      originalCards.forEach((card) => {
        const cloneBefore = card.cloneNode(true);
        cloneBefore.classList.add('is-clone');
        cloneBefore.setAttribute('aria-hidden', 'true');
        cloneBefore.removeAttribute('data-anim');
        cloneBefore.classList.add('is-animated');
        indTrack.insertBefore(cloneBefore, firstOriginal);
      });

      // Append a full set of clones after the last original card
      originalCards.forEach((card) => {
        const cloneAfter = card.cloneNode(true);
        cloneAfter.classList.add('is-clone');
        cloneAfter.setAttribute('aria-hidden', 'true');
        cloneAfter.removeAttribute('data-anim');
        cloneAfter.classList.add('is-animated');
        indTrack.appendChild(cloneAfter);
      });

      // Total items in track: 3 * totalOriginals (24 items)
      // Index totalOriginals (8) corresponds to original Card 0
      let currentIndex = totalOriginals;
      let lastActionTime = 0;
      const actionThrottle = 200; // ms

      // 2. Setup Dots for all 8 industries
      if (indNavDots) {
        indNavDots.innerHTML = '';
        for (let i = 0; i < totalOriginals; i++) {
          const dot = document.createElement('button');
          dot.type = 'button';
          dot.className = 'ind-dot' + (i === 0 ? ' active' : '');
          dot.setAttribute('data-index', i);
          dot.setAttribute('aria-label', `Industry ${i + 1}`);
          indNavDots.appendChild(dot);
        }
      }
      const dots = indNavDots ? Array.from(indNavDots.querySelectorAll('.ind-dot')) : [];

      const getStepDistance = () => {
        const firstCard = indTrack.querySelector('.industry-card-pro');
        if (!firstCard) return 0;
        const cardWidth = firstCard.getBoundingClientRect().width;
        const computedGap = parseFloat(window.getComputedStyle(indTrack).gap) || 24;
        return cardWidth + computedGap;
      };

      const updateDots = () => {
        const realIndex = ((currentIndex - totalOriginals) % totalOriginals + totalOriginals) % totalOriginals;
        dots.forEach((dot, idx) => {
          dot.classList.toggle('active', idx === realIndex);
        });
      };

      const setTrackPosition = (withTransition = true) => {
        const step = getStepDistance();
        if (withTransition) {
          indTrack.style.transition = 'transform 0.45s cubic-bezier(0.25, 1, 0.5, 1)';
        } else {
          indTrack.style.transition = 'none';
        }
        indTrack.style.transform = `translate3d(-${currentIndex * step}px, 0, 0)`;
        updateDots();
      };

      // Set initial position immediately without transition
      setTrackPosition(false);

      // 3. Silent Jump / Seamless Wrap on transitionend
      indTrack.addEventListener('transitionend', (e) => {
        if (e.target !== indTrack || e.propertyName !== 'transform') return;

        // If index moved beyond originals into the end clone set (>= 16)
        // or before originals into the start clone set (< 8)
        if (currentIndex >= totalOriginals * 2 || currentIndex < totalOriginals) {
          currentIndex = totalOriginals + (((currentIndex - totalOriginals) % totalOriginals + totalOriginals) % totalOriginals);
          setTrackPosition(false);
        }
      });

      // 4. Infinite Loop Navigation (Next / Prev)
      const nextSlide = () => {
        const now = Date.now();
        if (now - lastActionTime < actionThrottle) return;
        lastActionTime = now;
        currentIndex++;
        setTrackPosition(true);
      };

      const prevSlide = () => {
        const now = Date.now();
        if (now - lastActionTime < actionThrottle) return;
        lastActionTime = now;
        currentIndex--;
        setTrackPosition(true);
      };

      // Ensure buttons are permanently enabled and never disabled
      if (indNextBtn) {
        indNextBtn.disabled = false;
        indNextBtn.removeAttribute('disabled');
        indNextBtn.addEventListener('click', (e) => {
          e.preventDefault();
          nextSlide();
        });
      }

      if (indPrevBtn) {
        indPrevBtn.disabled = false;
        indPrevBtn.removeAttribute('disabled');
        indPrevBtn.addEventListener('click', (e) => {
          e.preventDefault();
          prevSlide();
        });
      }

      // 5. Dots Click Navigation
      dots.forEach((dot) => {
        dot.addEventListener('click', (e) => {
          e.preventDefault();
          const targetIndex = parseInt(dot.getAttribute('data-index') || '0', 10);
          const currentRealIndex = ((currentIndex - totalOriginals) % totalOriginals + totalOriginals) % totalOriginals;
          const diff = targetIndex - currentRealIndex;
          if (diff === 0) return;
          currentIndex += diff;
          setTrackPosition(true);
        });
      });

      // 6. Touch Swipe Support
      let touchStartX = 0;
      let touchEndX = 0;

      indViewport.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
      }, { passive: true });

      indViewport.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        const diff = touchStartX - touchEndX;
        if (Math.abs(diff) > 40) {
          if (diff > 0) {
            nextSlide();
          } else {
            prevSlide();
          }
        }
      }, { passive: true });

      // 7. Responsive alignment on Resize and Load
      window.addEventListener('resize', () => {
        setTrackPosition(false);
      });

      window.addEventListener('load', () => {
        setTrackPosition(false);
      });
    }
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
    let docHeight = 1;
    let lastProgressVal = -1;

    registerLayoutTask((scrollY, w, h) => {
      docHeight = Math.max(1, document.documentElement.scrollHeight - h);
    });

    const updateProgressBar = (scrollY) => {
      if (docHeight <= 0) return;
      const progress = Math.min(1, Math.max(0, scrollY / docHeight));
      const rounded = Math.round(progress * 1000) / 1000;
      if (rounded !== lastProgressVal) {
        scrollProgressBar.style.transform = `scaleX(${rounded})`;
        lastProgressVal = rounded;
      }
    };

    registerScrollTask(updateProgressBar);
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
