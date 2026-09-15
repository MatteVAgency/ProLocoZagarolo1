const toggle = document.querySelector('.menu-toggle');
const nav = document.querySelector('.site-header nav');

function setOpen(isOpen) {
  nav.classList.toggle('open', isOpen);
  toggle.classList.toggle('open', isOpen);
  toggle.setAttribute('aria-expanded', String(isOpen));
}

if (toggle && nav) {
  toggle.addEventListener('click', (e) => {
    e.stopPropagation();
    setOpen(!nav.classList.contains('open'));
  });

  // Chiude il menu cliccando ovunque fuori dal menu e dal pulsante
  document.addEventListener('click', (e) => {
    if (nav.classList.contains('open') && !nav.contains(e.target) && !toggle.contains(e.target)) {
      setOpen(false);
    }
  });

  // Chiude il menu selezionando una voce
  nav.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => setOpen(false));
  });

  // Chiude il menu con il tasto Esc
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') setOpen(false);
  });
}