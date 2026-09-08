<?php
class ContactController
{
    public function index(): void
    {
        $pageTitle = 'Contatti — Pro Loco Zagarolo';
        $pageDescription = 'Contatta la Pro Loco di Zagarolo: indirizzo, telefono, email, social e form di contatto.';
        $error = null;
        $success = null;
        require __DIR__ . '/../views/contact/index.php';
    }

    public function send(): void
    {
        $pageTitle = 'Contatti — Pro Loco Zagarolo';
        $pageDescription = 'Contatta la Pro Loco di Zagarolo: indirizzo, telefono, email, social e form di contatto.';

        if (!verify_csrf($_POST['csrf'] ?? null)) die('CSRF non valido');

        $name = trim($_POST['nome'] ?? '');
        $surname = trim($_POST['cognome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $subject = trim($_POST['oggetto'] ?? '');
        $message = trim($_POST['messaggio'] ?? '');
        $consent = isset($_POST['consenso']);

        $error = null;
        $success = null;

        if ($name === '' || $surname === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $message === '' || !$consent) {
            $error = 'Controlla i dati inseriti: nome, cognome, email, messaggio e consenso sono obbligatori.';
            require __DIR__ . '/../views/contact/index.php';
            return;
        }

        // DEMO: qui andrà il servizio email reale (RF-09 / interfaccia email 6.3).
        $success = 'Richiesta ricevuta. In produzione verrà inoltrata alla casella email della Pro Loco.';
        require __DIR__ . '/../views/contact/index.php';
    }
}