<?php $pageTitle='Dashboard Admin'; require __DIR__.'/../layouts/header.php'; ?>
<section class="page-head"><div class="container"><p class="eyebrow">AREA AMMINISTRATIVA</p><h1>Dashboard</h1><p>Benvenuto, <?= e($_SESSION['admin_name'] ?? 'admin') ?>.</p>
<a class="btn primary" href="<?= url('/admin/news/create') ?>">+ Nuova news</a> <a class="btn dark" href="<?= url('/admin/logout') ?>">Logout</a></div></section>
<section class="section"><div class="container"><div class="admin-table-wrap"><table class="admin-table">
<thead><tr><th>Titolo</th><th>Stato</th><th>Data</th><th>Azioni</th></tr></thead><tbody>
<?php foreach($news as $item): ?><tr><td><?= e($item['title']) ?></td><td><?= e($item['status']) ?></td><td><?= e($item['created_at']) ?></td>
<td><a href="<?= url('/admin/news/edit/'.$item['id']) ?>">Modifica</a>
<form class="inline" method="post" action="<?= url('/admin/news/delete/'.$item['id']) ?>"><input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>"><button>Elimina</button></form></td></tr><?php endforeach; ?>
</tbody></table></div></div></section>
<?php require __DIR__.'/../layouts/footer.php'; ?>
