<?php $pageTitle = 'Dove dormire — Pro Loco Zagarolo'; require __DIR__ . '/../layouts/header.php'; ?>
<section class="page-head">
    <div class="container">
        <p class="eyebrow">TURISMO</p>
        <h1>Dove dormire</h1>
        <p>B&amp;B e strutture ricettive di Zagarolo. Elenco di esempio, da completare con i dati reali forniti dalla Pro Loco.</p>
    </div>
</section>

<section class="section">
    <div class="container monumenti-grid">
        <?php foreach ($bnb as $b): ?>
            <article class="monumento-card">
                <?php $slides = [$b['immagine']]; require __DIR__ . '/_carousel.php'; ?>
                <div class="monumento-body">
                    <h2><?= e($b['nome']) ?></h2>
                    <p><?= e($b['descrizione']) ?></p>
                    <?php if (!empty($b['indirizzo'])): ?>
                        <p class="monumento-indirizzo">📍 <?= e($b['indirizzo']) ?></p>
                    <?php endif; ?>
                    <?php if (!empty($b['contatti'])): ?>
                        <p class="monumento-indirizzo">☎️ <?= e($b['contatti']) ?></p>
                    <?php endif; ?>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php require __DIR__ . '/../layouts/footer.php'; ?>