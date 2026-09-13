<?php
declare(strict_types=1);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';
$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
if ($base && $base !== '/' && str_starts_with($uri, $base)) {
    $uri = substr($uri, strlen($base)) ?: '/';
}

require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/PageController.php';
require_once __DIR__ . '/../app/controllers/NewsController.php';
require_once __DIR__ . '/../app/controllers/ContactController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

switch (true) {
    case $uri === '/' || $uri === '/index.php':
        (new HomeController())->index();
        break;
    case $uri === '/chi-siamo':
        (new PageController())->chiSiamo();
        break;
    case $uri === '/orari':
        (new PageController())->orari();
        break;
    case $uri === '/news':
        (new NewsController())->index();
        break;
    case preg_match('#^/news/([^/]+)$#', $uri, $m):
        (new NewsController())->show($m[1]);
        break;
    case $uri === '/contatti':
        (new ContactController())->index();
        break;
    case $uri === '/contatti/invia' && $_SERVER['REQUEST_METHOD'] === 'POST':
        (new ContactController())->send();
        break;
    case $uri === '/admin/login':
        (new AuthController())->login();
        break;
    case $uri === '/admin/logout':
        (new AuthController())->logout();
        break;
    case $uri === '/admin':
        (new NewsController())->admin();
        break;
    case $uri === '/admin/news/create':
        (new NewsController())->create();
        break;
    case preg_match('#^/admin/news/edit/(\d+)$#', $uri, $m):
        (new NewsController())->edit((int)$m[1]);
        break;
    case preg_match('#^/admin/news/delete/(\d+)$#', $uri, $m):
        (new NewsController())->delete((int)$m[1]);
        break;
    default:
        http_response_code(404);
        $pageTitle = 'Pagina non trovata — Pro Loco Zagarolo';
        require __DIR__ . '/../app/views/errors/404.php';
}