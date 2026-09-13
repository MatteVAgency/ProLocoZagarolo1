<?php
declare(strict_types=1);

require_once __DIR__ . '/../models/User.php';

final class AuthController
{
    private const MAX_ATTEMPTS = 5;
    private const LOCK_SECONDS = 300; // 5 minuti

    public function login(): void
    {
        $pageTitle = 'Login Admin — Pro Loco Zagarolo';
        $pageDescription = 'Accesso riservato agli amministratori della Pro Loco di Zagarolo.';

        // Se l'amministratore è già autenticato
        if (!empty($_SESSION['admin_id'])) {
            header('Location: ' . url('/admin'));
            exit;
        }

        $error = null;

        // Protezione brute-force
        $attempts = (int)($_SESSION['login_attempts'] ?? 0);
        $lockedUntil = (int)($_SESSION['login_locked_until'] ?? 0);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Protezione CSRF
            if (!verify_csrf($_POST['csrf'] ?? null)) {
                http_response_code(403);
                die('CSRF non valido');
            }

            // Controllo blocco temporaneo
            if ($lockedUntil > time()) {
                $remaining = $lockedUntil - time();

                $minutes = max(1, (int)ceil($remaining / 60));

                $error = "Troppi tentativi non riusciti. Riprova tra {$minutes} minuto/i.";
            } else {

                $login = trim((string)($_POST['login'] ?? ''));
                $password = (string)($_POST['password'] ?? '');

                // Validazione minima
                if (
                    $login === '' ||
                    $password === '' ||
                    mb_strlen($login) > 255 ||
                    mb_strlen($password) > 255
                ) {
                    $error = 'Credenziali non valide.';
                } else {

                    $user = (new User(db()))->findByLogin($login);

                    /*
                     * IMPORTANTE:
                     * La password nel database è salvata in password_hash.
                     * password_verify() confronta la password inserita
                     * con l'hash senza mai richiedere la password in chiaro.
                     */
                    if (
                        $user !== null &&
                        isset($user['password_hash']) &&
                        is_string($user['password_hash']) &&
                        password_verify($password, $user['password_hash']) &&
                        isset($user['role']) &&
                        $user['role'] === 'admin'
                    ) {

                        // Rigenera l'ID della sessione dopo il login
                        // per prevenire session fixation.
                        session_regenerate_id(true);

                        $_SESSION['admin_id'] = (int)$user['id'];
                        $_SESSION['admin_name'] = (string)$user['username'];

                        // Azzera i tentativi falliti
                        unset(
                            $_SESSION['login_attempts'],
                            $_SESSION['login_locked_until']
                        );

                        header('Location: ' . url('/admin'));
                        exit;
                    }

                    // Login fallito
                    $attempts++;

                    $_SESSION['login_attempts'] = $attempts;

                    if ($attempts >= self::MAX_ATTEMPTS) {
                        $_SESSION['login_locked_until'] =
                            time() + self::LOCK_SECONDS;
                    }

                    // Messaggio volutamente generico
                    $error = 'Credenziali non valide.';
                }
            }
        }

        require __DIR__ . '/../views/auth/login.php';
    }

    public function logout(): void
    {
        // Svuota tutti i dati della sessione
        $_SESSION = [];

        // Elimina il cookie di sessione
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        // Distrugge la sessione
        session_destroy();

        header('Location: ' . url('/admin/login'));
        exit;
    }
}