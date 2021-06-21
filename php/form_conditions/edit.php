<?php

require('php/fonctions/fonctions.php');

if($_POST){
    if(isset($_POST['id']) && !empty($_POST['id'])
    && isset($_POST['nom']) && !empty($_POST['nom'])
    && isset($_POST['cepage']) && !empty($_POST['cepage'])
    && isset($_POST['pays']) && !empty($_POST['pays'])
    && isset($_POST['region']) && !empty($_POST['region'])
    && isset($_POST['image']) && !empty($_POST['image'])
    && isset($_POST['annee']) && !empty($_POST['annee'])
    && isset($_POST['description']) && !empty($_POST['description'])){

        $db;
        connexion($db);
        
        // On nettoie les données envoyées

        $id = valid_data($_POST['id']);
        $nom = valid_data($_POST['nom']);
        $cepage = valid_data($_POST['cepage']);
        $pays = valid_data($_POST['pays']);
        $region = valid_data($_POST['region']);
        $image = valid_data($_POST['image']);
        $annee = valid_data($_POST['annee']);
        $description = valid_data($_POST['description']);


        updatebottle($id, $nom, $cepage, $pays, $region, $image, $description, $annee);

        $_SESSION['message'] = "Bouteille modifiée avec succès !";
        header('Location: http://localhost/my-cave/');

        require_once('php/connect/close.php');
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}


// Est-ce que l'id existe et est-ce qu'il n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])) {

    $db;
    connexion($db);
    
    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `bouteilles` WHERE `id` = :id;';

    $query = $db->prepare($sql);
    // on "accroche" les paramètres
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    $query->execute();
    $bottle = $query->fetch();

    if(!$bottle){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: http://localhost/my-cave/');
    }
}else{
    $_SESSION['erreur'] = 'URL invalide';
    header('Location: http://localhost/my-cave/');
}