<?php $pageTitle=($article?'Modifica':'Nuova').' News'; $pageCss='admin'; require __DIR__.'/../layouts/header.php'; ?>
<section class="section"><div class="container narrow"><p class="eyebrow">AREA AMMINISTRATIVA</p><h1><?= $article?'Modifica':'Nuova' ?> news</h1>
<?php if(!empty($error)): ?><p class="form-error"><?= e($error) ?></p><?php endif; ?>
<form class="contact-form" method="post" enctype="multipart/form-data"><input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
<input name="title" placeholder="Titolo" required value="<?= e($article['title'] ?? '') ?>">
<input name="slug" placeholder="slug-url" value="<?= e($article['slug'] ?? '') ?>">
<textarea name="content" rows="10" placeholder="Contenuto" required><?= e($article['content'] ?? '') ?></textarea>
<input type="file" name="image" accept="image/jpeg,image/png,image/webp">
<?php if (!empty($article['image'])): ?>
<label class="check"><input type="checkbox" name="remove_image"> Rimuovi immagine attuale</label>
<?php endif; ?>
<select name="status"><option value="draft" <?= (($article['status']??'draft')==='draft'?'selected':'') ?>>Bozza</option><option value="published" <?= (($article['status']??'')==='published'?'selected':'') ?>>Pubblicata</option></select>
<button class="btn primary">Salva news</button><a class="btn dark" href="<?= url('/admin') ?>">Annulla</a>
</form></div></section>
<?php require __DIR__.'/../layouts/footer.php'; ?>