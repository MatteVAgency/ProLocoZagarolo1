<?php $pageTitle=($article?'Modifica':'Nuova').' News'; $pageStyles=['admin']; require __DIR__.'/../layouts/header.php'; ?>
<section class="page-head"><div class="container"><p class="eyebrow">AREA AMMINISTRATIVA</p><h1><?= $article?'Modifica':'Nuova' ?> news</h1></div></section>
<section class="section"><div class="container narrow">
<?php if(!empty($error)): ?><p class="form-error"><?= e($error) ?></p><?php endif; ?>
<form class="admin-form" method="post"><input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
<input name="title" placeholder="Titolo" required value="<?= e($article['title'] ?? '') ?>">
<input name="slug" placeholder="slug-url" value="<?= e($article['slug'] ?? '') ?>">
<textarea name="content" rows="10" placeholder="Contenuto" required><?= e($article['content'] ?? '') ?></textarea>
<select name="status"><option value="draft" <?= (($article['status']??'draft')==='draft'?'selected':'') ?>>Bozza</option><option value="published" <?= (($article['status']??'')==='published'?'selected':'') ?>>Pubblicata</option></select>
<div class="form-actions"><button class="btn primary">Salva news</button><a class="btn dark" href="<?= url('/admin') ?>">Annulla</a></div>
</form></div></section>
<?php require __DIR__.'/../layouts/footer.php'; ?>