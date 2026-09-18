<?php
declare(strict_types=1);

/**
 * Contenuti statici per la sezione "Turismo".
 *
 * Non è stata creata una tabella nel database: si tratta di contenuti
 * semi-fissi (monumenti, B&B) più simili a "pagine" che a "news", quindi
 * per ora vengono gestiti qui, in un unico file facile da modificare.
 * Se in futuro servirà un CRUD da admin, questi array possono diventare
 * tabelle (es. `monumenti`, `strutture_ricettive`) seguendo lo stesso
 * schema già usato per `news`.
 *
 * OGNI VOCE "immagini" è una lista di slide per il carosello.
 * Due tipi possibili:
 *   ['tipo' => 'placeholder', 'classe' => 'ph-1']   -> box colorato via CSS
 *   ['tipo' => 'file', 'src' => '/assets/img/monumenti/foo-1.jpg']
 *
 * Per sostituire un placeholder con una foto vera basta:
 *  1. Mettere il file in public/assets/img/monumenti/ (o /bnb/)
 *  2. Cambiare la voce corrispondente in 'tipo' => 'file' + 'src' => '...'
 * Le classi ph-1..ph-6 sono definite in assets/css/turismo.css con
 * gradienti diversi, così i placeholder risultano "sparsi" e non tutti uguali.
 */

function turismo_monumenti(): array
{
    return [
        [
            'slug' => 'palazzo-rospigliosi',
            'nome' => 'Palazzo Rospigliosi',
            'sottotitolo' => 'Il cuore storico di Zagarolo',
            'descrizione' => 'Antica residenza fortificata dei Colonna, trasformata poi in palazzo signorile, domina il centro di Zagarolo. Oggi ospita il Museo del Giocattolo e la biblioteca comunale, oltre a conservare affreschi e decorazioni di epoca rinascimentale.',
            'indirizzo' => 'Piazza Indipendenza, 6 — Zagarolo',
            'immagini' => [
                ['tipo' => 'placeholder', 'classe' => 'ph-1'],
                ['tipo' => 'placeholder', 'classe' => 'ph-2'],
                ['tipo' => 'placeholder', 'classe' => 'ph-3'],
            ],
        ],
        [
            'slug' => 'collegiata-san-lorenzo',
            'nome' => 'Collegiata di San Lorenzo Martire',
            'sottotitolo' => 'La chiesa principale del paese',
            'descrizione' => 'Chiesa principale di Zagarolo, sorge sullo stesso asse del salone del trono di Palazzo Rospigliosi, a simboleggiare il legame tra potere religioso e civile. Conserva opere e decorazioni di pregio raccolte nei secoli.',
            'indirizzo' => 'Piazza Indipendenza — Zagarolo',
            'immagini' => [
                ['tipo' => 'placeholder', 'classe' => 'ph-4'],
                ['tipo' => 'placeholder', 'classe' => 'ph-5'],
                ['tipo' => 'placeholder', 'classe' => 'ph-1'],
            ],
        ],
        [
            'slug' => 'convento-santa-maria-delle-grazie',
            'nome' => 'Convento di Santa Maria delle Grazie',
            'sottotitolo' => 'Spiritualità e quiete',
            'descrizione' => 'Antico convento francescano immerso nel verde ai margini del centro storico, meta di visite per chi cerca un angolo di quiete e tradizione religiosa a due passi dal paese.',
            'indirizzo' => 'Zagarolo',
            'immagini' => [
                ['tipo' => 'placeholder', 'classe' => 'ph-6'],
                ['tipo' => 'placeholder', 'classe' => 'ph-3'],
            ],
        ],
        [
            'slug' => 'chiesa-san-pietro-apostolo',
            'nome' => 'Parrocchiale di San Pietro Apostolo',
            'sottotitolo' => 'Un altro tassello del centro storico',
            'descrizione' => 'Chiesa parrocchiale che, insieme alla Collegiata e a Palazzo Rospigliosi, completa il percorso religioso e architettonico del centro storico di Zagarolo.',
            'indirizzo' => 'Zagarolo',
            'immagini' => [
                ['tipo' => 'placeholder', 'classe' => 'ph-2'],
                ['tipo' => 'placeholder', 'classe' => 'ph-6'],
            ],
        ],
        [
            'slug' => 'fontana-delle-tre-cannelle',
            'nome' => 'Fontana delle Tre Cannelle',
            'sottotitolo' => 'Descrizione in aggiornamento',
            // NOTA: la descrizione precedente di questo monumento risultava
            // errata. In attesa dei testi corretti dalla Pro Loco, la
            // lasciamo volutamente vuota/sospesa: NON scrivere qui
            // informazioni storiche non verificate.
            'descrizione' => null,
            'indirizzo' => 'Zagarolo',
            'immagini' => [
                ['tipo' => 'placeholder', 'classe' => 'ph-5'],
                ['tipo' => 'placeholder', 'classe' => 'ph-4'],
            ],
        ],
    ];
}

function turismo_bnb(): array
{
    // Dati di esempio: la Pro Loco fornirà l'elenco reale delle strutture
    // ricettive convenzionate. Struttura pensata per essere compilata
    // facilmente una volta ricevuti i contenuti definitivi.
    return [
        [
            'nome' => 'B&B Da Compilare 1',
            'descrizione' => 'Testo descrittivo da inserire (posizione, ambiente, punti di forza della struttura).',
            'indirizzo' => 'Via da definire, Zagarolo',
            'contatti' => '000 000 0000',
            'immagine' => ['tipo' => 'placeholder', 'classe' => 'ph-2'],
        ],
        [
            'nome' => 'B&B Da Compilare 2',
            'descrizione' => 'Testo descrittivo da inserire (posizione, ambiente, punti di forza della struttura).',
            'indirizzo' => 'Via da definire, Zagarolo',
            'contatti' => '000 000 0000',
            'immagine' => ['tipo' => 'placeholder', 'classe' => 'ph-4'],
        ],
        [
            'nome' => 'B&B Da Compilare 3',
            'descrizione' => 'Testo descrittivo da inserire (posizione, ambiente, punti di forza della struttura).',
            'indirizzo' => 'Via da definire, Zagarolo',
            'contatti' => '000 000 0000',
            'immagine' => ['tipo' => 'placeholder', 'classe' => 'ph-6'],
        ],
    ];
}