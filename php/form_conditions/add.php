<?php
    require('php/fonctions/fonctions.php');
    // var_dump($_POST);
    if($_POST){
        if(isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['cepage']) && !empty($_POST['cepage'])
        && isset($_POST['pays']) && !empty($_POST['pays'])
        && isset($_POST['region']) && !empty($_POST['region'])
        && isset($_POST['annee']) && !empty($_POST['annee'])
        && isset($_FILES['image'])
        && isset($_POST['description']) && !empty($_POST['description'])){

            $db;
            connexion($db);
            
            // On nettoie les données envoyées

            $nom = valid_data($_POST['nom']);
            $cepage = valid_data($_POST['cepage']);
            $pays = valid_data($_POST['pays']);
            $region = valid_data($_POST['region']);
            $annee = valid_data($_POST['annee']);
            $description = valid_data($_POST['description']);


           
            // On vient sélectionner les différentes caractéristiques de l'image qui sont dans un tableau
            $name = $_FILES['image']['name'];
            $type = $_FILES['image']['type'];
            $tmpname = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];
            $size = $_FILES['image']['size'];
            
            //On décompose le nom de l'image avec d'un côté le nom et de l'autre côté l'extension
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
           
            
            addbottle($nom, $cepage, $pays, $region, $description, $image, $annee);
            
            $_SESSION['message'] = "Bouteille ajouté";
            header('Location: http://localhost/my-cave/#msg');

            }else{
            $_SESSION['erreur'] = "Le formulaire est incomplet";
            }
        }
    }    