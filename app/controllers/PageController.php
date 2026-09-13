<?php
declare(strict_types=1);

class PageController
{
    public function chiSiamo(): void
    {
        $pageTitle = 'Chi siamo — Pro Loco Zagarolo';
        require __DIR__ . '/../views/chi-siamo.php';
    }

    public function orari(): void
    {
        $pageTitle = 'Orari — Pro Loco Zagarolo';
        require __DIR__ . '/../views/orari.php';
    }
}