document.addEventListener('click', (event) => {
  const target = event.target instanceof Element ? event.target : null;
  const button = target?.closest('[data-content-list-more]');
  if (!button) return;

  const panel = button.closest('[data-content-list-panel]');
  const viewport = panel?.querySelector('[data-content-list-window]');
  if (!viewport) return;

  const shouldEnableScrolling = !viewport.classList.contains('is-scroll-enabled');
  if (shouldEnableScrolling) {
    viewport.classList.add('is-scroll-enabled');
    button.textContent = 'Show less';
    return;
  }

  viewport.scrollTop = 0;
  viewport.classList.remove('is-scroll-enabled');
  button.textContent = 'Show more';
});
