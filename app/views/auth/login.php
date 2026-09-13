<?php $pageTitle='Login Admin'; $pageCss='admin'; require __DIR__.'/../layouts/header.php'; ?>
<section class="section"><div class="container narrow"><p class="eyebrow">AREA AMMINISTRATIVA</p><h1>Accedi</h1>
<?php if($error): ?><p class="form-error"><?= e($error) ?></p><?php endif; ?>
<form class="contact-form" method="post"><input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
<input name="login" placeholder="Username o email" required><input type="password" name="password" placeholder="Password" required>
<button class="btn primary">Accedi</button></form><p class="hint">Demo: <b>admin</b> / <b>admin</b></p></div></section>
<?php require __DIR__.'/../layouts/footer.php'; ?>