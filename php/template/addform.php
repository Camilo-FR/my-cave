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
            header('Location: index.php');

            require_once('php/connect/close.php');
        }else{
            $_SESSION['erreur'] = "Le formulaire est incomplet";
        }
    }


       


 

    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une bouteille</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
    <h1>Hello Add-World !!</h1>


    <main class="container">
        <div class="row">
            <section class="col-12">
            <h1>Ajouter une bouteille</h1>
            <form action="" method="post">
                <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control">
                </div>
                <div class="form-group">
                <label for="cepage">Cépage</label>
                <input type="text" id="cepage" name="cepage" class="form-control">
                </div>
                <div class="form-group">
                <label for="pays">Pays</label>
                <input type="text" id="pays" name="pays" class="form-control">
                </div>
                <div class="form-group">
                <label for="region">Région</label>
                <input type="text" id="region" name="region" class="form-control">
                </div>
                <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
                </div>
                <div class="form-group">
                <label for="annee">Année</label>
                <input type="number" id="annee" name="annee" class="form-control">
                </div>
                <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" class="form-control">
                </div>
                <button class="btn btn-primary">Envoyer</button>
            </form> 
            </section>
        </div>
    </main>

</body>
</html>