const toggle = document.querySelector('.menu-toggle');
const nav = document.querySelector('.site-header nav');

if (toggle && nav) {
  toggle.addEventListener('click', (e) => {
    e.stopPropagation();
    nav.classList.toggle('open');
  });

  // Chiude il menu cliccando ovunque fuori dal menu stesso
  document.addEventListener('click', (e) => {
    if (nav.classList.contains('open') && !nav.contains(e.target) && e.target !== toggle) {
      nav.classList.remove('open');
    }
  });

  // Chiude il menu selezionando una voce
  nav.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => nav.classList.remove('open'));
  });

  // Chiude il menu con il tasto Esc
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') nav.classList.remove('open');
  });
}