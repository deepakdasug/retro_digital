/* ==========================================================================
   CINEMATIC JS v2 — LIGHTWEIGHT & OPTIMIZED
   Single IntersectionObserver, throttled scroll, cached queries, no cursor
   ========================================================================== */
(() => {
  'use strict';

  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const lenis = window.retroLenis || null;

  /* ==========================================================================
     1. CACHE DOM QUERIES ONCE
     ========================================================================== */
  const metricPills = document.querySelectorAll('.metric-pill');
  const revealTargets = document.querySelectorAll(
    '[data-reveal], .reveal, .seo-motion-in, .seo-motion-float, ' +
    '.seo-lp-hero-copy, .seo-lp-heading, .seo-lp-service-card, ' +
    '.seo-lp-audit-list article, .seo-lp-process article, ' +
    '.seo-lp-tech-card, .seo-lp-intent-cards article, ' +
    '.seo-lp-results-metrics article, .seo-lp-faq-list details, ' +
    '.seo-lp-proof-point, .hero-metrics, .metric-pill'
  );
  const staggerGroups = document.querySelectorAll('[data-stagger]');
  const heroOrbs = document.querySelectorAll('.hero-orb');
  const heroTags = document.querySelectorAll('.hero-tag');
  const floatChips = document.querySelectorAll('.seo-lp-float-chip');

  /* ==========================================================================
     1. COUNTER ANIMATION — Single IntersectionObserver
     ========================================================================== */
  const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const pill = entry.target;
        const valueEl = pill.querySelector('.metric-value');
        const target = parseFloat(valueEl.dataset.target) || 0;
        const isDecimal = valueEl.dataset.target.includes('.');
        const suffix = valueEl.dataset.target.replace(/[\d.]/g, '');
        
        animateCounter(valueEl, target, isDecimal, suffix);
        counterObserver.unobserve(pill);
      }
    });
  }, { threshold: 0.3, rootMargin: '0px 0px -50px 0px' });

  function animateCounter(el, target, isDecimal, suffix) {
    const duration = 1000;
    const startTime = performance.now();
    const isInteger = !isDecimal && Number.isInteger(target);
    
    function tick(now) {
      const elapsed = now - startTime;
      const progress = Math.min(elapsed / 1000, 1);
      const eased = 1 - Math.pow(1 - progress, 3);
      const current = target * eased;
      
      if (isInteger) {
        el.textContent = Math.floor(current).toLocaleString() + suffix;
      } else {
        el.textContent = current.toFixed(1) + suffix;
      }
      
      if (progress < 1) {
        requestAnimationFrame(tick);
      } else {
        el.textContent = target.toLocaleString() + suffix;
      }
    }
    
    requestAnimationFrame(tick);
  }

  metricPills.forEach(pill => counterObserver.observe(pill));

  /* ==========================================================================
     2. SCROLL REVEAL — Single IntersectionObserver
     ========================================================================== */
  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        if (entry.target.dataset.revealOnce) revealObserver.unobserve(entry.target);
      } else if (!entry.target.dataset.revealOnce) {
        entry.target.classList.remove('is-visible');
      }
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -10% 0px' });

  revealTargets.forEach((el) => {
    if (!el.dataset.reveal) el.dataset.reveal = 'up';
    revealObserver.observe(el);
  });

  /* Stagger groups */
  staggerGroups.forEach((group) => {
    group.querySelectorAll(':scope > *').forEach((item, i) => {
      item.style.setProperty('--stagger-delay', `${i * 60}ms`);
      revealObserver.observe(item);
    });
  });

  /* ==========================================================================
     3. MAGNETIC BUTTONS — Only on hover, not mousemove
     ========================================================================== */
  if (!prefersReduced) {
    const magnets = document.querySelectorAll(
      '.seo-lp-button, .seo-lp-content-demo-link, .seo-lp-card-arrow, ' +
      '.seo-lp-content-more, .btn-primary, .btn-glass, .btn-outline, .metric-pill'
    );

    magnets.forEach((btn) => {
      let rafId = null;
      const update = (e) => {
        if (rafId) return;
        rafId = requestAnimationFrame(() => {
          const rect = btn.getBoundingClientRect();
          const x = e.clientX - rect.left - rect.width / 2;
          const y = e.clientY - rect.top - rect.height / 2;
          btn.style.setProperty('--mx', `${x * 0.3}px`);
          btn.style.setProperty('--my', `${y * 0.3}px`);
          btn.classList.add('is-magnetic');
          rafId = null;
        });
      };
      const clear = () => btn.classList.remove('is-magnetic');

      btn.addEventListener('mousemove', update, { passive: true });
      btn.addEventListener('mouseenter', update, { passive: true });
      btn.addEventListener('mouseleave', clear);
    });
  }

  /* ==========================================================================
     4. LENIS PARALLAX — Throttled with rAF, cached queries
     ========================================================================== */
  if (lenis && !prefersReduced) {
    let scrollY = 0;
    let rafId = null;
    const maxScroll = document.documentElement.scrollHeight - window.innerHeight;

    function parallaxTick() {
      const s = scrollY;
      const progress = s / maxScroll;

      // Hero orbs
      heroOrbs.forEach((orb, i) => {
        const mult = i === 0 ? -0.08 : i === 1 ? 0.06 : -0.05;
        orb.style.transform = `translate(${s * mult}px, ${s * 0.03}px)`;
      });

      // Hero tags
      heroTags.forEach((tag, i) => {
        tag.style.transform = `translateY(${Math.sin(s * 0.001 + i) * 8}px)`;
      });

      // Floating chips
      floatChips.forEach((chip, i) => {
        chip.style.transform = `translateY(${Math.sin(s * 0.001 + i) * 6}px)`;
      });

      // Scroll progress
      const progressBar = document.querySelector('.scroll-progress');
      if (progressBar) {
        progressBar.style.transform = `scaleX(${Math.min(progress, 1)})`;
      }

      rafId = null;
    }

    lenis.on('scroll', () => {
      scrollY = lenis.scroll;
      if (!rafId) rafId = requestAnimationFrame(parallaxTick);
    });
  }

  /* ==========================================================================
     4. SCROLL PROGRESS — CSS-based, no JS on scroll
     ========================================================================== */
  // Progress bar is updated in parallaxTick above

  /* ==========================================================================
     5. SMOOTH SCROLL ANCHORS
     ========================================================================== */
  if (lenis) {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', (e) => {
        const target = document.querySelector(anchor.getAttribute('href'));
        if (target) {
          e.preventDefault();
          lenis.scrollTo(target, { offset: -80, duration: 1 });
        }
      });
    });
  }
})();