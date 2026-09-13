<?php $pageTitle = 'Chi siamo — Pro Loco Zagarolo'; $pageCss = 'chi-siamo'; require __DIR__.'/layouts/header.php'; ?>

<section class="page-head">
    <div class="container">
        <p class="eyebrow">CHI SIAMO</p>
        <h1>La nostra storia,<br>il nostro territorio.</h1>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div>
            <p class="eyebrow">LA NOSTRA MISSION</p>
            <h2>Valorizzare Zagarolo.</h2>
            <p>
                La Pro Loco di Zagarolo è un'associazione che promuove il territorio,
                la cultura e le tradizioni locali, creando occasioni di incontro e
                partecipazione per cittadini e visitatori.
                <!-- TODO: sostituire con il testo definitivo fornito dalla Pro Loco -->
            </p>
        </div>
        <div class="quote-card">
            <span>&ldquo;</span>
            <p>Valorizzare Zagarolo significa raccontarne la storia e costruirne insieme il futuro.</p>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <p class="eyebrow">COSA FACCIAMO</p>
        <h2>Le nostre attività.</h2>
        <div class="value-grid">
            <div class="value-card">
                <h3>Eventi e iniziative</h3>
                <p>Organizziamo eventi culturali e ricreativi durante tutto l'anno.
                <!-- TODO: contenuto definitivo --></p>
            </div>
            <div class="value-card">
                <h3>Promozione del territorio</h3>
                <p>Raccontiamo la storia, i luoghi e le tradizioni di Zagarolo.
                <!-- TODO: contenuto definitivo --></p>
            </div>
            <div class="value-card">
                <h3>Comunità e partecipazione</h3>
                <p>Creiamo occasioni di incontro tra cittadini, associazioni e visitatori.
                <!-- TODO: contenuto definitivo --></p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container narrow">
        <p class="eyebrow">INFORMAZIONI ISTITUZIONALI</p>
        <h2>La nostra storia.</h2>
        <p>
            <!-- TODO: inserire qui la storia della Pro Loco, anno di fondazione,
                 organigramma/membri se previsti, con i contenuti definitivi. -->
            Spazio dedicato alla storia della Pro Loco di Zagarolo: fondazione,
            tappe principali e persone che ne hanno fatto parte nel tempo.
        </p>
        <a class="text-link" href="<?= url('/contatti') ?>">Contattaci →</a>
    </div>
</section>
<?php require __DIR__ . '/layouts/footer.php'; ?>