<?php 

require('php/form_conditions/edit.php');
require('php/form_conditions/editupload.php');

?>
       


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une bouteille</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
    <h1>Hello Update-World !!</h1>


    <main class="container">
        <div class="row">
            <section class="col-12">
            <h2>Veuillez d'abord modifier l'image</h2>
            <?php
            if(!empty($_SESSION['message'])) {
                echo '<div class="alert alert-success" role="alert">
                '. $_SESSION['message'].'
              </div>';
              $_SESSION['message'] = "";
            }
            ?>
            <p>Extensions acceptées : 'jpg', 'jpeg', 'gif', 'png'</p>
            <p>Taille maximum : 4Mo</p>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control" value="<?= $bottle['image'] ?>">
                <button class="btn btn-primary" type="submit">Modifier l'image</button>
                </div>
            </form>
            <h2>Modifier les caractéristiques de la bouteille</h2>
            <form action="" method="POST">
                <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control" value="<?= $bottle['nom'] ?>">
                </div>
                <div class="form-group">
                <label for="cepage">Cépage</label>
                <input type="text" id="cepage" name="cepage" class="form-control" value="<?= $bottle['cepage'] ?>">
                </div>
                <div class="form-group">
                <label for="pays">Pays</label>
                <input type="text" id="pays" name="pays" class="form-control" value="<?= $bottle['pays'] ?>">
                </div>
                <div class="form-group">
                <label for="region">Région</label>
                <input type="text" id="region" name="region" class="form-control" value="<?= $bottle['region'] ?>">
                </div>
                <div class="form-group">
                <label for="annee">Année</label>
                <input type="number" id="annee" name="annee" class="form-control" value="<?= $bottle['annee'] ?>">
                </div>
                <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" class="form-control" value="<?= $bottle['description'] ?>">
                </div>
                <input type="hidden" value="<?= $bottle['id'] ?>" name="id">
                <p><button class="btn btn-primary" type="submit">Envoyer</button> <a href="index.php" class="btn btn-primary">Retour</a></p> 
            </form>
         
            </section>
        </div>
    </main>

</body>
</html>