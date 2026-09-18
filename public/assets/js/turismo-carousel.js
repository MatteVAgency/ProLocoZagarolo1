// Carosello semplice, senza dipendenze, per le card di monumenti/B&B.
document.querySelectorAll('[data-carousel]').forEach(function (root) {
    var track = root.querySelector('.carousel-track');
    var slides = Array.prototype.slice.call(root.querySelectorAll('.carousel-slide'));
    var dots = Array.prototype.slice.call(root.querySelectorAll('.carousel-dot'));
    var prevBtn = root.querySelector('.carousel-nav.prev');
    var nextBtn = root.querySelector('.carousel-nav.next');
    var index = 0;

    if (slides.length <= 1) return;

    function goTo(i) {
        index = (i + slides.length) % slides.length;
        track.style.transform = 'translateX(-' + (index * 100) + '%)';
        slides.forEach(function (s, si) { s.classList.toggle('is-active', si === index); });
        dots.forEach(function (d, di) { d.classList.toggle('is-active', di === index); });
    }

    if (prevBtn) prevBtn.addEventListener('click', function () { goTo(index - 1); });
    if (nextBtn) nextBtn.addEventListener('click', function () { goTo(index + 1); });
    dots.forEach(function (dot, di) { dot.addEventListener('click', function () { goTo(di); }); });

    // Autoplay leggero, in pausa al passaggio del mouse.
    var timer = setInterval(function () { goTo(index + 1); }, 5000);
    root.addEventListener('mouseenter', function () { clearInterval(timer); });
    root.addEventListener('mouseleave', function () { timer = setInterval(function () { goTo(index + 1); }, 5000); });
});

// Toggle del sottomenu "Turismo" su mobile (su desktop si apre in hover via CSS).
document.querySelectorAll('.nav-item > a').forEach(function (link) {
    var parent = link.parentElement;
    if (!parent.querySelector('.dropdown-menu')) return;
    link.addEventListener('click', function (e) {
        if (window.innerWidth > 800) return; // desktop: lascia fare all'hover CSS
        e.preventDefault();
        parent.classList.toggle('open');
    });
});
