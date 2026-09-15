<?php
class ContactController
{
    private const TO = 'info@prolocozagarolo.it';

    public function index(): void
    {
        require __DIR__ . '/../views/contact/index.php';
    }

    public function send(): void
    {
        if (!verify_csrf($_POST['csrf'] ?? null)) die('CSRF non valido');

        $name = $this->clean($_POST['nome'] ?? '');
        $surname = $this->clean($_POST['cognome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $subject = $this->clean($_POST['oggetto'] ?? '') ?: 'Nuovo messaggio dal sito';
        $message = trim($_POST['messaggio'] ?? '');

        if ($name === '' || $surname === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $message === '') {
            $error = 'Controlla i dati inseriti.';
            require __DIR__ . '/../views/contact/index.php';
            return;
        }

        $mailSubject = '=?UTF-8?B?' . base64_encode('Richiesta dal sito — ' . $subject) . '?=';

        $body = "Nuova richiesta dal form contatti del sito.\n\n"
              . "Nome: {$name} {$surname}\n"
              . "Email: {$email}\n"
              . "Oggetto: {$subject}\n\n"
              . "Messaggio:\n{$message}\n";

        $headers = [
            'From: Sito Pro Loco Zagarolo <no-reply@prolocozagarolo.it>',
            'Reply-To: ' . $name . ' ' . $surname . ' <' . $email . '>',
            'Content-Type: text/plain; charset=UTF-8',
            'X-Mailer: PHP/' . phpversion(),
        ];

        $sent = @mail(self::TO, $mailSubject, $body, implode("\r\n", $headers));

        if ($sent) {
            $success = 'Richiesta ricevuta. Ti risponderemo il prima possibile.';
        } else {
            $error = 'Non è stato possibile inviare il messaggio in questo momento. Riprova più tardi o scrivici direttamente a ' . self::TO . '.';
        }

        require __DIR__ . '/../views/contact/index.php';
    }

    // Toglie ritorni a capo/caratteri di controllo per evitare header injection nelle email
    private function clean(string $value): string
    {
        return trim(preg_replace('/[\r\n]+/', ' ', $value));
    }
}