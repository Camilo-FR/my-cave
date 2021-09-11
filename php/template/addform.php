<?php

require('php/form_conditions/add.php');

$db;
connexion($db);

$sql = 'SELECT * FROM pays';

$query = $db->prepare($sql);
$query->execute();

$result = $query->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une bouteille</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/addform.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="icon" href="design/wine-icon.jpg" />
</head>
<body>

    <main class="container">
        <div class="row">
            <section class="col-12">
            <h1>Je rajoute ma bouteille</h1>
            <h3>Chaque pays possède ses propres saveurs et caractéristiques</h3>
            <p>Commençons donc par le pays : rajoutez le manuellement ou sélectionnez le parmis ceux déjà présent !</p>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="pays">Pays</label>
                    <input type="text" id="pays" name="pays" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit">Ajouter</button>
            </form>

            <form action="addbottle" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <select name="pays" id="">
                        <option value="">----- Choisir -----</option>
                        <?php 
                    foreach($result as $country) {
                        ?>
                        <option value="<?= $country['id'] ?>"> <?= $country['pays'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control">
                </div>
                <div class="form-group">
                <label for="cepage">Cépage</label>
                <input type="text" id="cepage" name="cepage" class="form-control">
                </div>
                <div class="form-group">
                <label for="region">Région</label>
                <input type="text" id="region" name="region" class="form-control">
                </div>
                <div class="form-group">
                <label for="annee">Année</label>
                <input type="number" id="annee" name="annee" class="form-control">
                </div>
                <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" class="form-control">
                </div>
                <div class="form-group">
                <label for="image">Image</label>
                <p class="text-image">Extensions acceptées : 'jpg', 'jpeg', 'gif', 'png'</p>
                <p class="text-image">Taille maximum : 4Mo</p>
                <input type="file" id="image" name="image" class="form-control" >
                </div>
                <p><button class="btn btn-primary" type="submit">Ajouter</button> <a href="index.php" class="btn btn-primary">Retour</a></p> 
            </form> 
            </section>
        </div>
    </main>

</body>
</html>