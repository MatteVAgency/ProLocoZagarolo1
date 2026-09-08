<?php
require_once __DIR__ . '/../models/News.php';

class HomeController
{
    public function index(): void
    {
        $news = (new News(db()))->latest(3);
        require __DIR__ . '/../views/home/index.php';
    }
}
