# Pro Loco Zagarolo — MVC Demo

Bozza completa del sito organizzata secondo il pattern **Model–View–Controller (MVC)**.

## Requisiti
- PHP 8+
- MySQL/MariaDB
- Apache (XAMPP/Laragon) oppure server PHP
- PDO MySQL

## Struttura

```text
ProLoco_Zagarolo_MVC/
├── app/
│   ├── controllers/
│   ├── models/
│   └── views/
├── config/
├── database/
├── public/
├── routes/
├── .env.example
└── README.md
```

### MVC
- **Model**: accesso ai dati tramite PDO.
- **View**: HTML/PHP per la presentazione.
- **Controller**: coordina richieste, Model e View.
- **Database**: file SQL separati.
- **Frontend**: CSS/JS/immagini dentro `public/assets`.

## Installazione rapida

1. Crea un database MySQL/MariaDB.
2. Importa `database/schema.sql`.
3. Importa `database/seed.sql`.
4. Modifica `config/database.php` con le credenziali del database.
5. Imposta come document root la cartella `public/`.
6. Apri il sito dal browser.

### XAMPP
Se il progetto viene messo in `htdocs/ProLoco_Zagarolo_MVC`, è consigliato configurare un VirtualHost con document root:

```text
.../ProLoco_Zagarolo_MVC/public
```

In alternativa, per una demo locale, dalla cartella `public`:

```bash
php -S localhost:8000
```

e aprire `http://localhost:8000`.

## Login demo

Username: `admin`
Password: `admin`

Le credenziali sono solo per la demo. In produzione vanno cambiate.

## Funzionalità già presenti

- Homepage
- Chi siamo
- News dinamiche da database
- Dettaglio news
- Form contatti
- Login amministratore
- Dashboard
- CRUD delle news
- Logout
- Upload immagini con controlli di base
- Sessioni
- Password hashate
- Query PDO parametrizzate
- CSRF token per il form di contatto e per le operazioni admin
- Separazione MVC

## Da completare prima della produzione

- Configurazione reale dell'email del form contatti.
- HTTPS.
- Rate limiting/login protection.
- Backup database.
- Gestione ruoli più avanzata.
- Validazione e moderazione contenuti.
- Cookie/privacy policy e gestione GDPR da definire con il titolare del trattamento.
- Contenuti definitivi della Pro Loco.
