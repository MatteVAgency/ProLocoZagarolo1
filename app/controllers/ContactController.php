<?php
class ContactController
{
    public function index(): void
    {
        require __DIR__ . '/../views/contact/index.php';
    }

    public function send(): void
    {
        if (!verify_csrf($_POST['csrf'] ?? null)) die('CSRF non valido');

        $name = trim($_POST['nome'] ?? '');
        $surname = trim($_POST['cognome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $subject = trim($_POST['oggetto'] ?? '');
        $message = trim($_POST['messaggio'] ?? '');

        if ($name==='' || $surname==='' || !filter_var($email,FILTER_VALIDATE_EMAIL) || $message==='') {
            $error='Controlla i dati inseriti.';
            require __DIR__ . '/../views/contact/index.php';
            return;
        }

        // DEMO: qui andrà il servizio email reale.
        $success='Richiesta ricevuta. In produzione verrà inoltrata alla casella della Pro Loco.';
        require __DIR__ . '/../views/contact/index.php';
    }
}
