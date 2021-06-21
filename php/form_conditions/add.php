<?php
    require('php/fonctions/fonctions.php');
    
    if($_POST){
        if(isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['cepage']) && !empty($_POST['cepage'])
        && isset($_POST['pays']) && !empty($_POST['pays'])
        && isset($_POST['region']) && !empty($_POST['region'])
        && isset($_POST['image']) && !empty($_POST['image'])
        && isset($_POST['annee']) && !empty($_POST['annee'])
        && isset($_POST['description']) && !empty($_POST['description'])){

            $db;
            connexion($db);
            
            // On nettoie les données envoyées

            $nom = valid_data($_POST['nom']);
            $cepage = valid_data($_POST['cepage']);
            $pays = valid_data($_POST['pays']);
            $region = valid_data($_POST['region']);
            $image = valid_data($_POST['image']);
            $annee = valid_data($_POST['annee']);
            $description = valid_data($_POST['description']);


            addbottle($nom, $cepage, $pays, $region, $image, $description, $annee);
            

            $_SESSION['message'] = "Bouteille ajouté";
            header('Location: http://localhost/my-cave/');

            require_once('php/connect/close.php');
        }else{
            $_SESSION['erreur'] = "Le formulaire est incomplet";
        }
    }