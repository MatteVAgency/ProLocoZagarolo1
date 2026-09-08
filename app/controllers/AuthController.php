<?php
require_once __DIR__ . '/../models/User.php';

class AuthController
{
    public function login(): void
    {
        if (!empty($_SESSION['admin_id'])) {
            header('Location: ' . url('/admin')); exit;
        }
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verify_csrf($_POST['csrf'] ?? null)) die('CSRF non valido');
            $login = trim($_POST['login'] ?? '');
            $password = $_POST['password'] ?? '';
            $user = (new User(db()))->findByLogin($login);
            if ($user && password_verify($password, $user['password']) && $user['role'] === 'admin') {
                session_regenerate_id(true);
                $_SESSION['admin_id'] = (int)$user['id'];
                $_SESSION['admin_name'] = $user['username'];
                header('Location: ' . url('/admin')); exit;
            }
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
