<?php
$pageCss = 'contatti';
require __DIR__ . '/../layouts/header.php';
?>

<section class="page-head">
    <div class="container">
        <p class="eyebrow">CONTATTI</p>
        <h1>Parliamo di Zagarolo.</h1>
        <p>Per informazioni, collaborazioni o richieste, inviaci un messaggio.</p>
    </div>
</section>

<section class="section contact-section">
    <div class="container contact-grid">
        <div>
            <div class="contact-list">
                <p>📍 Zagarolo, Roma</p>
                <p>✉️ info@prolocozagarolo.it</p>
                <p>☎️ 06 9576 9413</p>
            </div>
        </div>

        <form class="contact-form" action="<?= url('/contatti/invia') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">

            <?php if (!empty($error)): ?>
                <p class="form-error"><?= e($error) ?></p>
            <?php endif; ?>

            <?php if (!empty($success)): ?>
                <p class="form-success"><?= e($success) ?></p>
            <?php endif; ?>

            <div class="form-row">
                <input required name="nome" placeholder="Nome" value="<?= e($_POST['nome'] ?? '') ?>">
                <input required name="cognome" placeholder="Cognome" value="<?= e($_POST['cognome'] ?? '') ?>">
            </div>
            <input required type="email" name="email" placeholder="Email" value="<?= e($_POST['email'] ?? '') ?>">
            <input name="oggetto" placeholder="Oggetto" value="<?= e($_POST['oggetto'] ?? '') ?>">
            <textarea required name="messaggio" rows="5" placeholder="Messaggio"><?= e($_POST['messaggio'] ?? '') ?></textarea>

            <label class="check">
                <input type="checkbox" name="consenso" required> Acconsento al trattamento dei dati.
            </label>

            <button class="btn primary">Invia richiesta</button>
        </form>
    </div>
</section>

<?php require __DIR__ . '/../layouts/footer.php'; ?>