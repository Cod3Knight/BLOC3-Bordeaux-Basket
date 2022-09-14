<?php

/* ESSAI DE CONNECTION A DB + MESSAGE D'ERREUR DANS l'OBJET: PDO EXEPTION.
PDO CAR ONT POURRA SWITCHER DE BASE DE DONNEE (oracle..) UTF-8 POUR
PASSER TOUS LES ECHANGES DE BASE DE DONNEE PAR INTERIM DE LA TABLE UTF-8*/

try {
    $db = new PDO('mysql:host=localhost;dbname=gestion', 'root', 'root');
    $db->exec('SET NAMES "UTF8"');

} catch (PDOException $e) {
    echo 'Erreur: '. $e->getMessage();
    die();
}