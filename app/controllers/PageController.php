<?php
declare(strict_types=1);

class PageController
{
    public function chiSiamo(): void
    {
        $pageTitle = 'Chi siamo — Pro Loco Zagarolo';
        $pageDescription = 'Scopri la storia, la mission e le attività della Pro Loco di Zagarolo.';
        require __DIR__ . '/../views/pages/chi-siamo.php';
    }

    public function orari(): void
    {
        $pageTitle = 'Orari e sede — Pro Loco Zagarolo';
        $pageDescription = 'Orari di apertura, sede e informazioni utili per contattare la Pro Loco di Zagarolo.';
        require __DIR__ . '/../views/pages/orari.php';
    }
}