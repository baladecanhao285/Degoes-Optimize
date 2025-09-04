document.addEventListener('DOMContentLoaded', () => {
  const overlay = document.querySelector('.overlay');
  const openers = document.querySelectorAll('[data-open-menu]');
  const closers = document.querySelectorAll('[data-close-menu], .overlay a');
  const body = document.body;

  function openMenu(){
    overlay.classList.add('open');
    body.classList.add('scroll-lock');
    const btn = document.querySelector('[data-open-menu]');
    if(btn) btn.setAttribute('aria-expanded', 'true');
  }
  function closeMenu(){
    overlay.classList.remove('open');
    body.classList.remove('scroll-lock');
    const btn = document.querySelector('[data-open-menu]');
    if(btn) btn.setAttribute('aria-expanded', 'false');
  }

  openers.forEach(el => el.addEventListener('click', openMenu));
  closers.forEach(el => el.addEventListener('click', closeMenu));
  overlay.addEventListener('click', (e) => { if(e.target.classList.contains('overlay')) closeMenu(); });

  // Smooth scroll for in-page anchors
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const id = a.getAttribute('href').slice(1);
      const el = document.getElementById(id);
      if(el){
        e.preventDefault();
        window.scrollTo({ top: el.offsetTop - 64, behavior: 'smooth' });
      }
    });
  });

  // Lazy attributes for images
  document.querySelectorAll('img').forEach(img => {
    if(!img.hasAttribute('loading')) img.setAttribute('loading', 'lazy');
    if(!img.hasAttribute('decoding')) img.setAttribute('decoding', 'async');
  });

  // Back to top
  const topBtn = document.getElementById('backToTop');
  if(topBtn){
    topBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
  }

  // Scroll-indicator: go to Projects
  const mouse = document.querySelector('.scroll-indicator');
  if(mouse){
    mouse.addEventListener('click', () => {
      const next = document.getElementById('projects') || document.querySelector('main section:nth-of-type(2)');
      if(next){ window.scrollTo({ top: next.offsetTop - 64, behavior: 'smooth' }); }
    });
  }
});
