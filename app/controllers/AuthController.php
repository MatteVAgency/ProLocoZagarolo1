<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/LoginAttempt.php';

class AuthController
{
    private const MAX_ATTEMPTS = 5;
    private const WINDOW_MINUTES = 15;

    public function login(): void
    {
        if (!empty($_SESSION['admin_id'])) {
            header('Location: ' . url('/admin')); exit;
        }

        $error = null;
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $attempts = new LoginAttempt(db());

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verify_csrf($_POST['csrf'] ?? null)) die('CSRF non valido');

            if ($attempts->countRecent($ip, self::WINDOW_MINUTES) >= self::MAX_ATTEMPTS) {
                $error = 'Troppi tentativi di accesso. Riprova tra qualche minuto.';
                require __DIR__ . '/../views/auth/login.php';
                return;
            }

            $login = trim($_POST['login'] ?? '');
            $password = $_POST['password'] ?? '';
            $user = (new User(db()))->findByLogin($login);

            if ($user && password_verify($password, $user['password']) && $user['role'] === 'admin') {
                $attempts->clear($ip);
                session_regenerate_id(true);
                $_SESSION['admin_id'] = (int)$user['id'];
                $_SESSION['admin_name'] = $user['username'];
                header('Location: ' . url('/admin')); exit;
            }

            $attempts->record($ip);
            $error = 'Credenziali non valide.';
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