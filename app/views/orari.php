<?php $pageTitle = $pageTitle ?? 'Orari — Pro Loco Zagarolo'; require __DIR__ . '/layouts/header.php'; ?>

<section class="page-head">
    <div class="container">
        <p class="eyebrow">ORARI</p>
        <h1>Quando trovarci.</h1>
        <p>Gli orari di apertura della sede della Pro Loco di Zagarolo.</p>
    </div>
</section>

<section class="section">
    <div class="container info-grid">
        <div>
            <p class="eyebrow">SEDE</p>
            <h2>Vieni a trovarci</h2>
            <p>La sede della Pro Loco di Zagarolo è aperta al pubblico secondo i seguenti orari. Per informazioni urgenti puoi sempre scriverci o chiamarci.</p>
            <ul class="check-list">
                <li>Indirizzo: Piazza Indipendenza 6, Zagarolo (RM)</li>
                <li>Telefono: 06 9576 9413</li>
                <li>Email: info@prolocozagarolo.it</li>
            </ul>
            <a class="text-link" href="<?= url('/contatti') ?>">Vai alla pagina contatti →</a>
        </div>
        <div class="hours-card">
            <div><span>Lunedì — Domenica</span><strong>09:00 — 13:00 / 15:00 - 19:00</strong></div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <p class="eyebrow">NOTE</p>
        <h2>Informazioni utili</h2>
        <p>Gli orari possono subire variazioni in occasione di eventi, festività o manifestazioni organizzate dalla Pro Loco. Eventuali chiusure straordinarie verranno comunicate tramite il sito e i canali ufficiali.</p>
    </div>
</section>

<?php require __DIR__ . '/../layouts/footer.php'; ?>