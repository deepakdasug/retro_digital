/* ==========================================================================
   service-cinematic.js — Award-winning motion layer for Retrotech Digital
   Works with the existing Lenis smooth-scroll instance (window.retroLenis).
   Admin-editable: only reads data attributes and existing section classes.
   ========================================================================== */
(() => {
  'use strict';

  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const lenis = window.retroLenis || null;

  /* ---------- Intersection reveal ---------- */
  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        if (entry.target.dataset.revealOnce) revealObserver.unobserve(entry.target);
      } else if (!entry.target.dataset.revealOnce) {
        entry.target.classList.remove('is-visible');
      }
    });
  }, { threshold: 0.07, rootMargin: '0px 0px -12% 0px' });

  const revealTargets = document.querySelectorAll(
    '[data-reveal], .seo-motion-in, .seo-motion-float, .seo-lp-hero-copy, .seo-lp-heading, ' +
    '.seo-lp-service-card, .seo-lp-audit-list article, .seo-lp-process article, ' +
    '.seo-lp-tech-card, .seo-lp-intent-cards article, .seo-lp-results-metrics article, ' +
    '.seo-lp-faq-list details, .seo-lp-proof-point'
  );

  revealTargets.forEach((el) => {
    if (!el.dataset.reveal) el.dataset.reveal = 'up';
    revealObserver.observe(el);
  });

  /* Stagger groups */
  document.querySelectorAll('[data-stagger]').forEach((group) => {
    group.querySelectorAll(':scope > *').forEach((item, i) => {
      item.style.setProperty('--stagger-delay', `${i * 0.07}s`);
      revealObserver.observe(item);
    });
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
  if (!prefersReduced && window.matchMedia('(pointer: fine)').matches) {
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
