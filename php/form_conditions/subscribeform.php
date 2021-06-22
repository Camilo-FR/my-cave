<?php

require('php/fonctions/fonctions.php');

if(isset($_POST['pseudo'], $_POST['password']))
{
    if(!empty($_POST['pseudo']) && !empty($_POST['password']))
    {
        $pseudo = valid_data($_POST['pseudo']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        subscribe($pseudo, $password);

        $_SESSION['message'] = "Bienvenue ! Souscription effectuée !";
        header('Location: http://localhost/my-cave/');
    } else {
        $_SESSION['erreur'] = "Il manque des éléments";
        header('Location: http://localhost/my-cave/');
    }
} else {
    $_SESSION['erreur'] = "Erreur lors du remplissage des champs";
    header('Location: http://localhost/my-cave/');
}