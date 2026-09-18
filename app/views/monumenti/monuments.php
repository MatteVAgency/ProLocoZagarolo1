<?php $pageTitle = 'Monumenti — Pro Loco Zagarolo'; require __DIR__ . '/../layouts/header.php'; ?>
<section class="page-head">
    <div class="container">
        <p class="eyebrow">TURISMO</p>
        <h1>Monumenti &amp; luoghi d'interesse</h1>
        <p>Un primo elenco dei principali punti di interesse di Zagarolo. Le foto sono provvisorie: verranno sostituite con scatti reali dei singoli monumenti.</p>
    </div>
</section>

<section class="section">
    <div class="container monumenti-grid">
        <?php foreach ($monumenti as $m): ?>
            <article class="monumento-card">
                <?php $slides = $m['immagini']; require __DIR__ . '/_carousel.php'; ?>
                <div class="monumento-body">
                    <h2><?= e($m['nome']) ?></h2>
                    <?php if (!empty($m['sottotitolo'])): ?>
                        <small><?= e($m['sottotitolo']) ?></small>
                    <?php endif; ?>

                    <?php if ($m['descrizione'] === null || $m['descrizione'] === ''): ?>
                        <p class="pending-note">
                            Descrizione in fase di revisione: il testo precedente conteneva informazioni
                            non corrette e non viene pubblicato finché la Pro Loco non fornisce il testo definitivo.
                        </p>
                    <?php else: ?>
                        <p><?= e($m['descrizione']) ?></p>
                    <?php endif; ?>

                    <?php if (!empty($m['indirizzo'])): ?>
                        <p class="monumento-indirizzo">📍 <?= e($m['indirizzo']) ?></p>
                    <?php endif; ?>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php require __DIR__ . '/../layouts/footer.php'; ?>