/* ==========================================================================
   service-cinematic.js — Award-winning motion layer for Retrotech Digital
   Works with the existing Lenis smooth-scroll instance (window.retroLenis).
   Admin-editable: only reads data attributes and existing section classes.
   ========================================================================== */
(() => {
  'use strict';

  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const lenis = window.retroLenis || null;

  if (prefersReduced || !('IntersectionObserver' in window)) return;

  /* Observe the stationary section so the sliding columns cannot retrigger it. */
  const splitSections = document.querySelectorAll('[data-reveal="split"]');
  const splitObserver = new IntersectionObserver((entries) => {
    entries.forEach(({ target, intersectionRatio }) => {
      target.classList.toggle('is-visible', intersectionRatio >= 0.15);
      target.classList.add('is-reveal-ready');
    });
  }, { threshold: 0.15 });

  splitSections.forEach((section) => splitObserver.observe(section));

  /* Reveal each section and stagger group once, then keep its content visible. */
  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(({ target, isIntersecting }) => {
      if (isIntersecting) {
        target.classList.add('is-visible');
        revealObserver.unobserve(target);
      }
      target.classList.add('is-reveal-ready');
    });
  });

  const revealTargets = document.querySelectorAll(
    '.seo-reveal, .seo-reveal-up, .seo-reveal-left, .seo-reveal-right, .seo-reveal-fade, .seo-reveal-scale, .seo-stagger'
  );
  revealTargets.forEach((element) => revealObserver.observe(element));

  document.querySelectorAll('.seo-service-page > .seo-section:not([data-reveal]), .seo-service-page > .custom-section-container')
    .forEach((section) => {
      section.classList.add('seo-reveal-up');
      revealObserver.observe(section);
    });

  /* ---------- Magnetic buttons ---------- */
  const magnets = document.querySelectorAll(
    '.seo-lp-button, .seo-lp-content-demo-link, .seo-lp-card-arrow, .seo-lp-content-more, .seo-lp-proof-point'
  );

  magnets.forEach((btn) => {
    const update = (e) => {
      const rect = btn.getBoundingClientRect();
      const x = e.clientX - rect.left - rect.width / 2;
      const y = e.clientY - rect.top - rect.height / 2;
      btn.style.setProperty('--mx', `${x}px`);
      btn.style.setProperty('--my', `${y}px`);
      btn.classList.add('is-magnetic');
    };
    const clear = () => btn.classList.remove('is-magnetic');

    btn.addEventListener('mousemove', update);
    btn.addEventListener('mouseenter', update);
    btn.addEventListener('mouseleave', clear);
  });

  /* ---------- Lenis-driven parallax ---------- */
  if (lenis) {
    lenis.on('scroll', () => {
      const s = lenis.scroll;

      document.querySelectorAll('.seo-lp-orbit').forEach((orb, i) => {
        const mult = i === 0 ? -0.12 : 0.1;
        orb.style.transform = `rotate(${s * 0.05}deg) translate(${s * mult}px, ${s * 0.04}px)`;
      });

      document.querySelectorAll('.seo-lp-float-chip').forEach((chip, i) => {
        chip.style.transform = `translateY(${Math.sin(s * 0.0018 + i) * 10}px)`;
      });
    });
  }

  /* ---------- Subtle cursor follower (desktop, fine pointer) ---------- */
  if (window.matchMedia('(pointer: fine)').matches) {
    const cursor = document.createElement('div');
    cursor.className = 'cinema-cursor';
    document.body.appendChild(cursor);

    const move = (e) => {
      cursor.style.left = `${e.clientX}px`;
      cursor.style.top = `${e.clientY}px`;
    };
    document.addEventListener('mousemove', move);
    document.addEventListener('mousedown', () => cursor.classList.add('is-active'));
    document.addEventListener('mouseup', () => cursor.classList.remove('is-active'));

    const hoverables = document.querySelectorAll(
      'a, button, .seo-lp-service-card, .seo-lp-audit-list article, .seo-lp-tech-card, .seo-lp-intent-cards article, .seo-lp-proof-point'
    );
    hoverables.forEach((el) => {
      el.addEventListener('mouseenter', () => cursor.classList.add('is-hovered'));
      el.addEventListener('mouseleave', () => cursor.classList.remove('is-hovered'));
    });
  }
})();
