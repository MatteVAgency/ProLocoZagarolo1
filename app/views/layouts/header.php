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

    <link
        rel="stylesheet"
        <link rel="stylesheet" href="<?= url('/assets/css/style.css') ?>">
    >
    <link
        rel="stylesheet"
        <link rel="stylesheet" href="<?= url('/assets/css/turismo.css') ?>">
    >
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

            <a href="/ProLocoZagarolo1/#chi-siamo">
                Chi siamo
            </a>

            <a href="/ProLocoZagarolo1/news">
                News
            </a>

            <div class="nav-item">
                <a href="/ProLocoZagarolo1/turismo">
                    Turismo ▾
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/ProLocoZagarolo1/turismo/monumenti">Monumenti</a></li>
                    <li><a href="/ProLocoZagarolo1/turismo/dove-dormire">Dove dormire</a></li>
                </ul>
            </div>

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
