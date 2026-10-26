/**
 * RETROTECH - BUSINESS MADE EASY
 * Handles background video playback, video scroll docking, WhatsApp widget,
 * page transitions, and responsive mobile navigation.
 */

function initRetrotech() {
  const lenis = window.Lenis
    ? new window.Lenis({
        autoRaf: true,
        lerp: 0.075,
        wheelMultiplier: 0.8,
        syncTouch: true,
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
      lenis.scrollTo(offsetPosition, { lerp: 0.075 });
    } else {
      window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
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
    const windowW = window.innerWidth;
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

    if (siteHeader) {
      siteHeader.classList.toggle('scrolled', scrollY > 40);
    }
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
     4. WHATSAPP FLOATING BUTTON & AUTO GREETING BUBBLE
     ========================================================================= */
  const whatsappBtn = document.getElementById('whatsappBtn');
  const waBubble = document.getElementById('waBubble');
  const waCloseBubble = document.getElementById('waCloseBubble');

  if (whatsappBtn && waBubble) {
    whatsappBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      waBubble.classList.toggle('active');
    });

    if (waCloseBubble) {
      waCloseBubble.addEventListener('click', (e) => {
        e.stopPropagation();
        waBubble.classList.remove('active');
      });
    }

    

    document.addEventListener('click', (e) => {
      if (!waBubble.contains(e.target) && !whatsappBtn.contains(e.target)) {
        waBubble.classList.remove('active');
      }
    });
  }

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
     6. SERVICES SECTION SCROLL ANIMATION
     ========================================================================= */
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
}

/* Boot: works whether the script loads before or after DOMContentLoaded */
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initRetrotech);
} else {
  initRetrotech();
}
