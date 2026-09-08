<?php
declare(strict_types=1);

class User
{
    public function __construct(private PDO $db) {}

    public function findByLogin(string $login): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username=? OR email=? LIMIT 1");
        $stmt->execute([$login, $login]);
        return $stmt->fetch() ?: null;
    }
}