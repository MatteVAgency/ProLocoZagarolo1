<?php
require_once __DIR__ . '/../models/User.php';

class AuthController
{
    private const MAX_ATTEMPTS = 5;
    private const LOCK_SECONDS = 300;

    public function login(): void
    {
        $pageTitle = 'Login Admin — Pro Loco Zagarolo';
        $pageDescription = 'Accesso riservato agli amministratori della Pro Loco di Zagarolo.';

        if (!empty($_SESSION['admin_id'])) {
            header('Location: ' . url('/admin')); exit;
        }

        $error = null;

        // Basic brute-force protection (RNF-05).
        $attempts = $_SESSION['login_attempts'] ?? 0;
        $lockedUntil = $_SESSION['login_locked_until'] ?? 0;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verify_csrf($_POST['csrf'] ?? null)) die('CSRF non valido');

            if ($lockedUntil > time()) {
                $error = 'Troppi tentativi non riusciti. Riprova tra qualche minuto.';
            } else {
                $login = trim($_POST['login'] ?? '');
                $password = $_POST['password'] ?? '';
                $user = (new User(db()))->findByLogin($login);

                if ($user && password_verify($password, $user['password']) && $user['role'] === 'admin') {
                    session_regenerate_id(true);
                    $_SESSION['admin_id'] = (int)$user['id'];
                    $_SESSION['admin_name'] = $user['username'];
                    unset($_SESSION['login_attempts'], $_SESSION['login_locked_until']);
                    header('Location: ' . url('/admin')); exit;
                }

                $attempts++;
                $_SESSION['login_attempts'] = $attempts;
                if ($attempts >= self::MAX_ATTEMPTS) {
                    $_SESSION['login_locked_until'] = time() + self::LOCK_SECONDS;
                }
                $error = 'Credenziali non valide.';
            }
        }

        require __DIR__ . '/../views/auth/login.php';
    }

    public function logout(): void
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $p = session_get_cookie_params();
            setcookie(session_name(), '', time()-42000, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
        }
        session_destroy();
        header('Location: ' . url('/admin/login')); exit;
    }
}