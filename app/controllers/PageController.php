<?php
declare(strict_types=1);

class PageController
{
    public function chiSiamo(): void
    {
        require __DIR__ . '/../views/page/chi-siamo.php';
    }
}