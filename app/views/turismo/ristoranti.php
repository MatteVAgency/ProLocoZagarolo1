<?php $pageTitle = 'Dove mangiare — Pro Loco Zagarolo'; require __DIR__ . '/../layouts/header.php'; ?>
<section class="page-head">
    <div class="container">
        <p class="eyebrow">TURISMO</p>
        <h1>Dove mangiare</h1>
        <p>Ristoranti e locali di Zagarolo. Elenco di esempio, da completare con i dati reali forniti dalla Pro Loco.</p>
    </div>
</section>

<section class="section">
    <div class="container monumenti-grid">
        <?php foreach ($ristoranti as $r): ?>
            <article class="monumento-card">
                <?php $slides = [$r['immagine']]; require __DIR__ . '/_carousel.php'; ?>
                <div class="monumento-body">
                    <h2><?= e($r['nome']) ?></h2>
                    <p><?= e($r['descrizione']) ?></p>
                    <?php if (!empty($r['indirizzo'])): ?>
                        <p class="monumento-indirizzo">📍 <?= e($r['indirizzo']) ?></p>
                    <?php endif; ?>
                    <?php if (!empty($r['contatti'])): ?>
                        <p class="monumento-indirizzo">☎️ <?= e($r['contatti']) ?></p>
                    <?php endif; ?>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php require __DIR__ . '/../layouts/footer.php'; ?>