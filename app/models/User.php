<?php
declare(strict_types=1);

final class User
{
    public function __construct(private PDO $db)
    {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    /**
     * Cerca un utente tramite username oppure email.
     *
     * @return array<string, mixed>|null
     */
    public function findByLogin(string $login): ?array
    {
        $login = trim($login);

        if ($login === '' || mb_strlen($login) > 255) {
            return null;
        }

        $sql = <<<'SQL'
            SELECT
                id,
                username,
                email,
                password_hash,
                role,
                created_at
            FROM users
            WHERE username = :login_username
               OR email = :login_email
            LIMIT 1
        SQL;

        try {
            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                ':login_username' => $login,
                ':login_email'    => $login,
            ]);

            $user = $stmt->fetch();

            return $user !== false ? $user : null;

        } catch (PDOException $e) {
            // Non mostrare dettagli SQL all'utente.
            error_log(
                'User::findByLogin database error: ' . $e->getMessage()
            );

            return null;
        }
    }
}