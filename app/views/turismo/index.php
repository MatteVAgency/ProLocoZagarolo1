<?php $pageTitle = 'Turismo — Pro Loco Zagarolo'; require __DIR__ . '/../layouts/header.php'; ?>
<section class="page-head">
    <div class="container">
        <p class="eyebrow">TURISMO</p>
        <h1>Scopri Zagarolo</h1>
        <p>Monumenti da visitare e strutture ricettive per chi vuole fermarsi più a lungo.</p>
    </div>
</section>

<section class="section">
    <div class="container turismo-hub">
        <a class="turismo-hub-card" href="<?= url('/turismo/monumenti') ?>">
            <div class="carousel-placeholder ph-1 hub-thumb"><span>Monumenti</span></div>
            <div class="turismo-hub-body">
                <h2>Monumenti &amp; luoghi d'interesse</h2>
                <p>Palazzi, chiese e angoli storici del centro di Zagarolo.</p>
                <span class="text-link">Esplora i monumenti →</span>
            </div>
        </a>
        <a class="turismo-hub-card" href="<?= url('/turismo/dove-dormire') ?>">
            <div class="carousel-placeholder ph-4 hub-thumb"><span>Dove dormire</span></div>
            <div class="turismo-hub-body">
                <h2>Dove dormire</h2>
                <p>B&amp;B e strutture ricettive per soggiornare a Zagarolo.</p>
                <span class="text-link">Vedi le strutture →</span>
            </div>
        </a>
    </div>
</section>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
