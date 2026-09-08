<?php
require_once __DIR__ . '/../models/News.php';

class HomeController
{
    public function index(): void
    {
        $pageTitle = 'Pro Loco Zagarolo — Territorio, cultura, comunità';
        $pageDescription = 'Sito ufficiale della Pro Loco di Zagarolo: news, eventi, orari e contatti dell\'associazione.';
        $news = (new News(db()))->latest(3);
        require __DIR__ . '/../views/home/index.php';
    }
}