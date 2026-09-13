<?php $pageTitle = $pageTitle ?? 'Pagina non trovata — Pro Loco Zagarolo'; require __DIR__ . '/../layouts/header.php'; ?>

<section class="page-head">
    <div class="container">
        <p class="eyebrow">ERRORE 404</p>
        <h1>Contenuto non trovato.</h1>
        <p>La pagina o la news che cerchi non esiste o non è più disponibile.</p>
    </div>
</section>

<section class="section">
    <div class="container narrow">
        <p>Puoi tornare alla <a class="text-link" href="<?= url('/') ?>">home</a>
        oppure consultare <a class="text-link" href="<?= url('/news') ?>">tutte le news</a>.</p>
    </div>
</section>

<?php require __DIR__ . '/../layouts/footer.php'; ?>