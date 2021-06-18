<?php 

// On se connecte à la base

function connexion(&$db) {
    try {
        
        $db = new PDO('mysql:host=localhost:3307;dbname=mycave_db', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec('SET NAMES "UTF8"');
        
    } catch (PDOException $e) {
        echo 'Erreur : '. $e->getMessage();
        die();
    }
}