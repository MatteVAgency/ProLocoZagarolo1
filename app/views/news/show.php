<?php $pageTitle=$article['title'].' — Pro Loco Zagarolo'; $pageStyles=['news']; require __DIR__.'/../layouts/header.php'; ?>
<section class="page-head"><div class="container"><p class="eyebrow">NEWS</p><h1><?= e($article['title']) ?></h1>
<small><?= e(date('d/m/Y H:i', strtotime($article['published_at'] ?? $article['created_at']))) ?></small></div></section>
<section class="section"><div class="container article"><p><?= nl2br(e($article['content'])) ?></p><a class="text-link" href="<?= url('/news') ?>">← Torna alle news</a></div></section>
<?php require __DIR__.'/../layouts/footer.php'; ?>