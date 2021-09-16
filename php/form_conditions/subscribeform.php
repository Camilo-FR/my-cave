<?php

require('php/fonctions/fonctions.php');

if (isset($_POST['pseudo'], $_POST['password'], $_POST['confirmpassword'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['confirmpassword'])) {
        if ($_POST['password'] === $_POST['confirmpassword']) {

            $pseudo = valid_data($_POST['pseudo']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $id_role = 2;

            subscribe($pseudo, $password, $id_role);

            $_SESSION['message'] = "Bienvenue ! Souscription effectuée !";
            header('Location: http://localhost/my-cave/');
        } else {
            $_SESSION['erreur'] = "Les mots de passe ne correspondent pas";
            header('Location: http://localhost/my-cave/');
        }
    } else {
        $_SESSION['erreur'] = "Il manque des éléments";
        header('Location: http://localhost/my-cave/');
    }
} else {
    $_SESSION['erreur'] = "Erreur lors du remplissage des champs";
    header('Location: http://localhost/my-cave/');
}
