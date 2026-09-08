<?php
$currentUri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
if ($base && $base !== '/' && str_starts_with($currentUri, $base)) {
    $currentUri = substr($currentUri, strlen($base)) ?: '/';
}
function nav_active(string $path, string $current): string {
    if ($path === '/') return $current === '/' ? ' class="active"' : '';
    return str_starts_with($current, $path) ? ' class="active"' : '';
}
?><!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle ?? 'Pro Loco Zagarolo') ?></title>
    <meta name="description" content="<?= e($pageDescription ?? "Pro Loco di Zagarolo — territorio, cultura, iniziative e comunicazioni.") ?>">
    <meta name="theme-color" content="#0d3b78">
    <link rel="canonical" href="<?= e(url($currentUri)) ?>">
    <link rel="icon" href="data:,">
    <link rel="stylesheet" href="<?= url('/assets/css/style.css') ?>">
</head>
<body>
<header class="site-header">
    <div class="container nav">
        <a class="brand" href="<?= url('/') ?>">
            <span>PRO LOCO</span>
            <strong>ZAGAROLO</strong>
        </a>
        <button class="menu-toggle" type="button" aria-label="Apri menu" aria-expanded="false">☰</button>
        <nav>
            <a<?= nav_active('/', $currentUri) ?> href="<?= url('/') ?>">Home</a>
            <a<?= nav_active('/chi-siamo', $currentUri) ?> href="<?= url('/chi-siamo') ?>">Chi siamo</a>
            <a<?= nav_active('/news', $currentUri) ?> href="<?= url('/news') ?>">News</a>
            <a<?= nav_active('/orari', $currentUri) ?> href="<?= url('/orari') ?>">Orari</a>
            <a<?= nav_active('/contatti', $currentUri) ?> href="<?= url('/contatti') ?>">Contatti</a>
            <a class="nav-admin" href="<?= url('/admin/login') ?>">Area admin</a>
        </nav>
    </div>
</header>
<main>