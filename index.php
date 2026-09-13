<?php
/**
 * Questo file esiste SOLO per comodità quando il Document Root di Apache
 * punta alla cartella principale del progetto invece che a "public/"
 * (es. l'hai messo dentro htdocs senza configurare un Virtual Host).
 *
 * Reindirizza chi apre la root del progetto alla vera home del sito,
 * che vive dentro public/index.php. In questo modo tutti i path di
 * asset (CSS/JS) e le rotte continuano a funzionare correttamente,
 * perché il browser si troverà davvero sotto /public/.
 *
 * Soluzione consigliata per uno sviluppo pulito: configura comunque
 * un Virtual Host con Document Root = "public/" (vedi README) ed
 * elimina questo file. Per una demo/scuola va bene tenerlo.
 */
declare(strict_types=1);

$target = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/app/views/';
header('Location: ' . $target);
exit;