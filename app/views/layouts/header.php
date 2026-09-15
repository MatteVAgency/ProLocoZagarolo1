<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $pageTitle ?? 'Pro Loco Zagarolo' ?></title>

    <meta
        name="description"
        content="Pro Loco di Zagarolo — territorio, cultura, iniziative e comunicazioni."
    >

    <link rel="icon" type="image/svg+xml" href="<?= url('/assets/favicon.svg') ?>">
    <meta name="theme-color" content="#0a2a4d">

    <link rel="stylesheet" href="<?= url('/assets/css/base.css') ?>?v=5">
    <?php foreach (($pageStyles ?? []) as $sheet): ?>
        <link rel="stylesheet" href="<?= url('/assets/css/'.$sheet.'.css') ?>?v=5">
    <?php endforeach; ?>
</head>

<body>

<header class="site-header">

    <div class="container nav">

        <a class="brand" href="<?= url('/') ?>">
            <span>PRO LOCO</span>
            <strong>ZAGAROLO</strong>
        </a>

        <button class="menu-toggle" type="button" aria-label="Apri il menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        <nav>

            <a href="<?= url('/') ?>#chi-siamo">
                Chi siamo
            </a>

            <a href="<?= url('/news') ?>">
                News
            </a>

            <a href="<?= url('/') ?>#orari">
                Orari
            </a>

            <a href="<?= url('/contatti') ?>">
                Contatti
            </a>

            <a
                class="nav-admin"
                href="<?= url('/admin/login') ?>"
            >
                Area admin
            </a>

        </nav>

    </div>

</header>

<main>