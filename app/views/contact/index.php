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
function e(?string $value): string {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}
function url(string $path = '/'): string {
    $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    return ($base === '' ? '' : $base) . $path;
}

/**
 * Validazione e salvataggio di un'immagine caricata (RF-04 / RNF-05).
 * Ritorna il percorso relativo salvato (es. "assets/uploads/news/xxx.jpg") o null.
 */
function handle_news_image_upload(array $file, ?string $previousImage = null): ?string {
    if (empty($file) || ($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
        return $previousImage;
    }
    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new RuntimeException('Errore durante il caricamento del file.');
    }

    $maxSize = 3 * 1024 * 1024; // 3MB
    if ($file['size'] > $maxSize) {
        throw new RuntimeException('L\'immagine supera la dimensione massima di 3MB.');
    }

    $allowed = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/webp' => 'webp',
    ];

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);
    if (!isset($allowed[$mime])) {
        throw new RuntimeException('Formato immagine non consentito (usa JPG, PNG o WEBP).');
    }

    [$w, $h] = @getimagesize($file['tmp_name']) ?: [0, 0];
    if ($w < 1 || $h < 1) {
        throw new RuntimeException('Il file caricato non è un\'immagine valida.');
    }

    $ext = $allowed[$mime];
    $filename = bin2hex(random_bytes(12)) . '.' . $ext;
    $destDir = __DIR__ . '/assets/uploads/news';
    if (!is_dir($destDir)) mkdir($destDir, 0755, true);
    $dest = $destDir . '/' . $filename;

    if (!move_uploaded_file($file['tmp_name'], $dest)) {
        throw new RuntimeException('Impossibile salvare l\'immagine.');
    }

    // Rimuove la vecchia immagine se presente
    if ($previousImage) {
        $old = __DIR__ . '/' . $previousImage;
        if (is_file($old)) @unlink($old);
    }

    return 'assets/uploads/news/' . $filename;
}

require_once __DIR__ . '/../routes/web.php';