<?php


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
    $fileName = $uniqueName.'.'.$extension;

        move_uploaded_file($tmpname, 'design/images/'.$fileName);

        updateimage($id, $fileName);

        $_SESSION['message'] = "Image modifiée avec succès !";
        
        
    }else{
        echo 'Mauvaise extension, taille trop importante ou fichier corrompu';
    }


    
}


