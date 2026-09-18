<?php
declare(strict_types=1);

require_once __DIR__ . '/../data/tourism_data.php';

class TurismoController
{
    public function index(): void
    {
        $monumenti = turismo_monumenti();
        $bnb = turismo_bnb();
        require __DIR__ . '/../views/turismo/index.php';
    }

    public function monumenti(): void
    {
        $monumenti = turismo_monumenti();
        require __DIR__ . '/../views/turismo/monumenti.php';
    }

    public function doveDormire(): void
    {
        $bnb = turismo_bnb();
        require __DIR__ . '/../views/turismo/bb.php';
    }
    public function doveMangiare(): void
    {
    $ristoranti = turismo_ristoranti();
    require __DIR__ . '/../views/turismo/ristoranti.php';
    }
}