<?php
$pageCss = 'home';
require __DIR__ . '/../layouts/header.php';
?>

<!-- HERO -->
<section class="hero">
    <div class="hero-overlay"></div>

    <div class="container hero-content">
        <p class="eyebrow">PRO LOCO DI ZAGAROLO</p>

        <h1>
            Il cuore di Zagarolo,<br>
            <em>vissuto insieme.</em>
        </h1>

        <p>
            Informazioni, iniziative, eventi e comunicazioni
            della Pro Loco.
        </p>

        <div class="actions">
            <a class="btn primary" href="<?= url('/news') ?>">
                Scopri le news
            </a>

            <a class="btn ghost" href="<?= url('/contatti') ?>">
                Contattaci
            </a>
        </div>
    </div>
</section>


<!-- CHI SIAMO -->
<section id="chi-siamo" class="section">
    <div class="container split">

        <div>
            <p class="eyebrow">CHI SIAMO</p>

            <h2>Una realtà per il territorio.</h2>

            <p>
                La Pro Loco di Zagarolo promuove il territorio,
                la cultura, le tradizioni e le iniziative locali,
                creando occasioni di incontro e partecipazione.
            </p>

            <a class="text-link" href="<?= url('/chi-siamo') ?>">
                Scopri chi siamo →
            </a>
        </div>

        <div class="quote-card">
            <span>&ldquo;</span>

            <p>
                Valorizzare Zagarolo significa raccontarne la storia
                e costruirne insieme il futuro.
            </p>
        </div>

    </div>
</section>


<!-- NEWS -->
<section id="news" class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <div>
                <p class="eyebrow">AGGIORNAMENTI</p>
                <h2>Ultime news</h2>
            </div>

            <a class="text-link" href="<?= url('/news') ?>">
                Tutte le news →
            </a>
        </div>

        <div class="news-grid">

            <?php if (!empty($news)): ?>

                <?php foreach ($news as $i => $item): ?>

                    <article class="news-card">

                        <?php if ($i === 0): ?>
                            <div class="news-image image-one"></div>
                        <?php elseif ($i === 1): ?>
                            <div class="news-image image-two"></div>
                        <?php else: ?>
                            <div class="news-image image-three"></div>
                        <?php endif; ?>

                        <div class="news-body">

                            <small>
                                <?= e(date('d/m/Y', strtotime($item['published_at'] ?? $item['created_at']))) ?>
                            </small>

                            <h3>
                                <?= e($item['title'] ?? 'Senza titolo') ?>
                            </h3>

                            <p>
                                <?php
                                $content = strip_tags($item['content'] ?? '');
                                echo e(mb_substr($content, 0, 120));
                                if (mb_strlen($content) > 120) echo '…';
                                ?>
                            </p>

                            <?php if (!empty($item['slug'])): ?>
                                <a href="<?= url('/news/' . rawurlencode($item['slug'])) ?>">
                                    Leggi →
                                </a>
                            <?php endif; ?>

                        </div>
                    </article>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="empty-news">
                    <p>Nessuna news disponibile al momento.</p>
                </div>

            <?php endif; ?>

        </div>
    </div>
</section>


<!-- ORARI -->
<section id="orari" class="section">
    <div class="container info-grid">

        <div>
            <p class="eyebrow">ORARI</p>

            <h2>Quando trovarci</h2>

            <p>
                Gli orari della Pro Loco di Zagarolo.
            </p>

            <a class="text-link" href="<?= url('/orari') ?>">
                Tutti gli orari →
            </a>
        </div>

        <div class="hours-card">

            <div>
                <span>Lunedì — Venerdì</span>
                <strong>09:00 — 13:00</strong>
            </div>

            <div>
                <span>Sabato</span>
                <strong>09:00 — 13:00</strong>
            </div>

            <div>
                <span>Domenica</span>
                <strong>Chiuso</strong>
            </div>

        </div>

    </div>
</section>


<!-- CONTATTI -->
<section id="contatti" class="section section-soft">
    <div class="container">

        <div class="contact-box">

            <p class="eyebrow">CONTATTI</p>

            <h2>Hai bisogno di informazioni?</h2>

            <p>
                Per informazioni, eventi, iniziative e collaborazioni
                puoi contattare la Pro Loco di Zagarolo.
            </p>

            <div class="actions">

                <a class="btn primary" href="<?= url('/contatti') ?>">
                    Contattaci
                </a>

                <a class="btn ghost" href="<?= url('/news') ?>">
                    Tutte le news
                </a>

            </div>

        </div>

    </div>
</section>

<?php require __DIR__ . '/../layouts/footer.php'; ?>