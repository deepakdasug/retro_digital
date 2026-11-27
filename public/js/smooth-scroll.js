(() => {
  'use strict';

  if (!window.Lenis || window.retroLenis || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  const isHomePage = document.body.classList.contains('home-page');

  window.retroLenis = new window.Lenis({
    autoRaf: true,
    lerp: isHomePage ? 0.05 : 0.18,
    wheelMultiplier: isHomePage ? 0.9 : 1,
    smoothWheel: true,
    syncTouch: false,
    anchors: false,
    allowNestedScroll: true,
    stopInertiaOnNavigate: true
  });
})();
