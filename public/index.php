<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . '/../config/database.php';

function csrf_token(): string {
    if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));
    return $_SESSION['csrf'];
}
function verify_csrf(?string $token): bool {
    return is_string($token) && hash_equals($_SESSION['csrf'] ?? '', $token);
}
function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
function url(string $path = '/'): string {
    $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    return ($base === '' ? '' : $base) . $path;
}

require_once __DIR__ . '/../routes/web.php';
