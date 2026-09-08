<?php $pageTitle='News — Pro Loco Zagarolo'; require __DIR__.'/../layouts/header.php'; ?>
<section class="page-head"><div class="container"><p class="eyebrow">AGGIORNAMENTI</p><h1>Tutte le news</h1><p>Comunicazioni e iniziative della Pro Loco.</p></div></section>
<section class="section"><div class="container"><div class="news-grid">
<?php foreach($news as $i=>$item): ?><article class="news-card"><div class="news-image <?= $i%3===0?'image-one':($i%3===1?'image-two':'image-three') ?>"></div>
<div class="news-body"><small><?= e(date('d/m/Y', strtotime($item['published_at'] ?? $item['created_at']))) ?></small>
<h3><?= e($item['title']) ?></h3><p><?= e(mb_substr($item['content'],0,150)) ?>…</p>
<a href="<?= url('/news/'.rawurlencode($item['slug'])) ?>">Leggi la news →</a></div></article><?php endforeach; ?>
</div></div></section>
<?php require __DIR__.'/../layouts/footer.php'; ?>
