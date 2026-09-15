<?php
declare(strict_types=1);

class LoginAttempt
{
    public function __construct(private PDO $db) {}

    public function countRecent(string $ip, int $minutes): int
    {
        $stmt = $this->db->prepare(
            "SELECT COUNT(*) FROM login_attempts
             WHERE ip_address = ? AND attempted_at > (NOW() - INTERVAL ? MINUTE)"
        );
        $stmt->execute([$ip, $minutes]);
        return (int) $stmt->fetchColumn();
    }

    public function record(string $ip): void
    {
        $stmt = $this->db->prepare("INSERT INTO login_attempts (ip_address) VALUES (?)");
        $stmt->execute([$ip]);
    }

    public function clear(string $ip): void
    {
        $stmt = $this->db->prepare("DELETE FROM login_attempts WHERE ip_address = ?");
        $stmt->execute([$ip]);
    }
}