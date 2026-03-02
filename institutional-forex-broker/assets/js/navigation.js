(() => {
  const header = document.querySelector('.site-header.is-sticky');
  if (!header) return;

  let lastY = window.scrollY;
  window.addEventListener('scroll', () => {
    const currentY = window.scrollY;
    const isScrollingDown = currentY > lastY;

    if (isScrollingDown && currentY > 120) {
      header.classList.add('is-hidden');
    } else {
      header.classList.remove('is-hidden');
    }

    lastY = currentY;
  }, { passive: true });
})();
