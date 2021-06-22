<?php
    require('php/fonctions/fonctions.php');
    
    if($_POST){
        if(isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['cepage']) && !empty($_POST['cepage'])
        && isset($_POST['pays']) && !empty($_POST['pays'])
        && isset($_POST['region']) && !empty($_POST['region'])
        && isset($_POST['annee']) && !empty($_POST['annee'])
        && isset($_POST['image']) && !empty($_POST['image'])
        && isset($_POST['description']) && !empty($_POST['description'])){

            $db;
            connexion($db);
            
            // On nettoie les données envoyées

            $nom = valid_data($_POST['nom']);
            $cepage = valid_data($_POST['cepage']);
            $pays = valid_data($_POST['pays']);
            $region = valid_data($_POST['region']);
            $annee = valid_data($_POST['annee']);
            $image = valid_data($_POST['image']);
            $description = valid_data($_POST['description']);


            if(isset($_FILES['image'])){
                // On vient sélectionner les différentes caractéristiques de l'image qui sont dans un tableau
                $name = $_FILES['image']['name'];
                $type = $_FILES['image']['type'];
                $tmpname = $_FILES['image']['tmp_name'];
                $error = $_FILES['image']['error'];
                $size = $_FILES['image']['size'];
            
                // décompose le nom de l'image avec d'un côté le nom et de l'autre côté l'extension
                $tabExtension = explode('.', $name);
                $extension = strtolower(end($tabExtension));
            
                // Tableau des extensions autorisées
                $extensionAutorisees = ['jpg', 'jpeg', 'gif', 'png'];
                $tailleMax = 400000;
            
                // Avec les différentes conditions on va créer un nom unique pour chaque image grâce à la fonction uniqid.
                if(in_array($extension, $extensionAutorisees) && $size <= $tailleMax && $error == 0 ){
            
                $uniqueName = uniqid('', true);
                $image= $uniqueName.'.'.$extension;
            
                    move_uploaded_file($tmpname, 'design/images/'.$image);
            
                       
                }else{
                    $_SESSION['erreur'] = 'Problème image : mauvaise extension, taille trop importante ou fichier corrompu';
                }    
            }
            
            addbottle($nom, $cepage, $pays, $region, $annee, $image, $description);
            

            $_SESSION['message'] = "Bouteille ajouté";
            header('Location: http://localhost/my-cave/');

            require_once('php/connect/close.php');
        }else{
            $_SESSION['erreur'] = "Le formulaire est incomplet";
        }
    }