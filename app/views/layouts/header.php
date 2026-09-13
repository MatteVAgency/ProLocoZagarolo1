<?php
/**
 * Variabili opzionali che ogni vista può impostare PRIMA di fare:
 *   require __DIR__.'/../layouts/header.php';
 *
 * $pageTitle : string  -> titolo della pagina (facoltativo)
 * $pageCss   : string  -> nome del file CSS specifico, SENZA estensione
 *                         (es. 'home' per assets/css/pages/home.css). Facoltativo.
 */

// Cartella fisica dove tenete i CSS "per pagina" (adatta il path se diverso)
$pageCssPath = __DIR__ . '/../../../public/assets/css/pages/' . ($pageCss ?? '') . '.css';
$hasPageCss = !empty($pageCss) && is_file($pageCssPath);
?>
<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= e($pageTitle ?? 'Pro Loco Zagarolo') ?></title>

    <meta
        name="description"
        content="Pro Loco di Zagarolo — territorio, cultura, iniziative e comunicazioni."
    >

    <!-- base.css: stili comuni a tutte le pagine (sempre caricato) -->
    <link rel="stylesheet" href="<?= url('/assets/css/style.css') ?>">

    <?php if ($hasPageCss): ?>
    <!-- CSS specifico della pagina corrente, caricato solo se esiste -->
    <link rel="stylesheet" href="<?= url('/assets/css/pages/' . rawurlencode($pageCss) . '.css') ?>">
    <?php endif; ?>
</head>

<body>

<header class="site-header">
    <div class="container nav">

        <a class="brand" href="<?= url('/') ?>">
            <span>PRO LOCO</span>
            <strong>ZAGAROLO</strong>
        </a>

        <button class="menu-toggle" type="button">☰</button>

        <nav>
            <a href="<?= url('/') ?>#chi-siamo">Chi siamo</a>
            <a href="<?= url('/news') ?>">News</a>
            <a href="<?= url('/') ?>#orari">Orari</a>
            <a href="<?= url('/contatti') ?>">Contatti</a>
            <a class="nav-admin" href="<?= url('/admin/login') ?>">Area admin</a>
        </nav>

    </div>
</header>

<main>