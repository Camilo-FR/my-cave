<?php

// connexion et session_start lancé par le routeur


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