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

    <!-- base.css: stili comuni a tutte le pagine (sempre caricato) -->
    <link
        rel="stylesheet"
        href="/ProLocoZagarolo1/assets/css/base.css"
    >

    <?php
    // $pageCss viene impostato da ogni view PRIMA di richiedere questo header,
    // es: $pageCss = 'home';  oppure  $pageCss = ['home'];
    // In questo modo ogni pagina carica SOLO il proprio file CSS aggiuntivo.
    if (!empty($pageCss)):
        foreach ((array) $pageCss as $css): ?>
    <link
        rel="stylesheet"
        href="/ProLocoZagarolo1/assets/css/<?= e($css) ?>.css"
    >
    <?php endforeach;
    endif; ?>
</head>

<body>

<header class="site-header">

    <div class="container nav">

        <a class="brand" href="/ProLocoZagarolo1/">
            <span>PRO LOCO</span>
            <strong>ZAGAROLO</strong>
        </a>

        <button class="menu-toggle" type="button">
            ☰
        </button>

        <nav>

            <a href="/ProLocoZagarolo1/chi-siamo">
                Chi siamo
            </a>

            <a href="/ProLocoZagarolo1/news">
                News
            </a>

            <a href="/ProLocoZagarolo1/#orari">
                Orari
            </a>

            <a href="/ProLocoZagarolo1/contatti">
                Contatti
            </a>

            <a
                class="nav-admin"
                href="/ProLocoZagarolo1/admin/login"
            >
                Area admin
            </a>

        </nav>

    </div>

</header>

<main>