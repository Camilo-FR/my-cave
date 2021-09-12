<?php
require('php/fonctions/fonctions.php');

if($_POST) {
    if(isset($_POST['pays']) && !empty($_POST['pays'])) {

        $pays = valid_data($_POST['pays']);

        addcountry($pays);

        $last_url = $_SERVER['HTTP_REFERER'];

            $_SESSION['message'] = "pays ajouté";
            header("Location: $last_url");
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}