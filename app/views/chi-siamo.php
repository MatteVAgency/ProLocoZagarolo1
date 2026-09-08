<?php require __DIR__ . '/../layouts/header.php'; ?>

<section class="page-head">
    <div class="container">
        <p class="eyebrow">CHI SIAMO</p>
        <h1>La Pro Loco di Zagarolo.</h1>
        <p>Cultura, territorio e comunità: la nostra storia e la nostra missione.</p>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div>
            <p class="eyebrow">LA NOSTRA STORIA</p>
            <h2>Da sempre al servizio del territorio.</h2>
            <p>La Pro Loco di Zagarolo nasce dalla volontà di cittadini e appassionati di valorizzare il patrimonio storico, artistico e culturale del paese, promuovendo iniziative capaci di unire residenti e visitatori.</p>
            <p>Nel corso degli anni l'associazione ha organizzato eventi, manifestazioni e attività di promozione turistica, diventando un punto di riferimento per chi vuole scoprire Zagarolo.</p>
        </div>
        <div class="quote-card">
            <span aria-hidden="true">&ldquo;</span>
            <p>Raccontare Zagarolo, un'iniziativa alla volta.</p>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <div>
                <p class="eyebrow">MISSION E OBIETTIVI</p>
                <h2>Cosa ci muove</h2>
            </div>
        </div>
        <div class="cards-grid">
            <div class="info-card">
                <h3>Promozione del territorio</h3>
                <p>Far conoscere le bellezze storiche, artistiche e naturalistiche di Zagarolo a residenti e visitatori.</p>
            </div>
            <div class="info-card">
                <h3>Cultura e tradizioni</h3>
                <p>Custodire e valorizzare le tradizioni locali attraverso eventi, iniziative e momenti di condivisione.</p>
            </div>
            <div class="info-card">
                <h3>Comunità e partecipazione</h3>
                <p>Creare occasioni di incontro tra cittadini, associazioni e istituzioni del territorio.</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <div>
                <p class="eyebrow">ATTIVITÀ</p>
                <h2>Cosa facciamo</h2>
            </div>
        </div>
        <ul class="check-list">
            <li>Organizzazione di eventi culturali e manifestazioni popolari.</li>
            <li>Promozione turistica del territorio di Zagarolo.</li>
            <li>Collaborazione con scuole, associazioni e istituzioni locali.</li>
            <li>Comunicazione e informazione attraverso il sito e i canali social.</li>
            <li>Supporto alle iniziative di valorizzazione del patrimonio locale.</li>
        </ul>
    </div>
</section>

<section class="section section-soft">
    <div class="container contact-box" style="text-align:center">
        <p class="eyebrow">VUOI SAPERNE DI PIÙ?</p>
        <h2>Unisciti a noi o contattaci per informazioni.</h2>
        <div class="actions" style="justify-content:center">
            <a class="btn primary" href="<?= url('/contatti') ?>">Contattaci</a>
            <a class="btn ghost-dark" href="<?= url('/news') ?>">Leggi le news</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../layouts/footer.php'; ?>