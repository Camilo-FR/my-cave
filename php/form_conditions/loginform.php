<?php

require('php/fonctions/fonctions.php');

if (isset($_POST['pseudo'], $_POST['password'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
        $user = select_user($_POST['pseudo']);

        $hash = $user[0]['password'];

        if (password_verify($_POST['password'], $hash)) {

            session_start();

            $_SESSION['user'] = $user[0]['pseudo'];
            $_SESSION['role'] = $user[0]['role'];

            $_SESSION['message'] = "Bienvenue ! Vous êtes bien connecté !";
            header('Location: http://localhost/my-cave/#msg');
        } else {
            $_SESSION['erreur'] = "Le mot de passe est invalide";
            header('Location: http://localhost/my-cave/#msg');
        }
    } else {
        $_SESSION['erreur'] = "Il manque des éléments";
        header('Location: http://localhost/my-cave/#msg');
    }
} else {
    $_SESSION['erreur'] = "Erreur";
    header('Location: http://localhost/my-cave/#search');
}
