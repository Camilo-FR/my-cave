<?php 

try {

    $db = new PDO('mysql:host=localhost:3307;dbname=mycave_db', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec('SET NAMES "UTF8"');

    echo 'Connexion réussie !! <br>';
    
} catch (PDOException $e) {
    echo 'Erreur : '. $e->getMessage();
    die();
}