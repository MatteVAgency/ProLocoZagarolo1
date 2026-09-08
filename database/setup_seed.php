<?php
declare(strict_types=1);
require_once __DIR__ . '/../config/database.php';

$pdo = db();

$check = $pdo->prepare("SELECT id FROM users WHERE username = ?");
$check->execute(['admin']);

if (!$check->fetch()) {
    $hash = password_hash('admin', PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username,email,password,role) VALUES (?,?,?,'admin')");
    $stmt->execute(['admin', 'admin@example.local', $hash]);
    echo "Admin creato. Username: admin / Password: admin\n";
} else {
    echo "Admin già presente.\n";
}

$count = (int)$pdo->query("SELECT COUNT(*) FROM news")->fetchColumn();
if ($count === 0) {
    $stmt = $pdo->prepare(
        "INSERT INTO news (title,slug,content,published_at,status,author_id)
         VALUES (?,?,?,?,?,(SELECT id FROM users WHERE username='admin'))"
    );
    $news = [
        ['Benvenuti sul nuovo sito della Pro Loco','benvenuti-nuovo-sito',
         'Questa è una news demo. Qui verranno pubblicate le comunicazioni ufficiali della Pro Loco di Zagarolo.',
         date('Y-m-d H:i:s'),'published'],
        ['Le prossime iniziative a Zagarolo','prossime-iniziative',
         'Spazio per appuntamenti, iniziative ed eventi del territorio.',
         date('Y-m-d H:i:s', strtotime('-3 days')),'published'],
        ['Tradizioni e territorio','tradizioni-e-territorio',
         'Uno spazio dedicato alla cultura, alla storia e alle tradizioni di Zagarolo.',
         date('Y-m-d H:i:s', strtotime('-7 days')),'published'],
    ];
    foreach ($news as $n) $stmt->execute($n);
    echo "News demo create.\n";
}
