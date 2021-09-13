<?php

require('php/form_conditions/edit.php');
require('php/form_conditions/verif_id.php');

$db;
connexion($db);

$sql = 'SELECT * FROM pays';

$query = $db->prepare($sql);
$query->execute();

$result = $query->fetchAll(PDO::FETCH_ASSOC);
// var_dump($bottle);
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une bouteille</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/editform.css">
    <link rel="icon" href="design/wine-icon.jpg" />
</head>

<body>



    <main class="container">
        <div class="row">
            <?php
            if (!empty($_SESSION['message'])) {
                echo '<div class="alert alert-success" role="alert">
                ' . $_SESSION['message'] . '
              </div>';
                $_SESSION['message'] = "";
            }
            ?>
            <section class="col-12">
                <h2>Modifier les caractéristiques de la bouteille</h2>

                <p>Choisissez un pays dans la liste ou rajoutez le s'il n'est pas encore dans notre catalogue et modifiez ensuite les autres caractéristiques</p>

                <form action="addcountry" method="POST">
                    <div class="form-group">
                        <label for="pays">Pays</label>
                        <input type="text" id="pays" name="pays" class="form-control">
                    </div>
                    <button class="btn btn-primary" type="submit">Ajouter</button>
                </form>

                <form action="edit" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <select name="pays" id="">
                            <option value="">----- Choisir -----</option>
                            <?php
                            foreach ($result as $country) {
                            ?>
                                <option value="<?= $country['id'] ?>"> <?= $country['pays'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control" value="<?= $bottle['nom'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="cepage">Cépage</label>
                        <input type="text" id="cepage" name="cepage" class="form-control" value="<?= $bottle['cepage'] ?>">
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
                    <div class="form-group">
                        <label for="image">Image</label>
                        <p>Extensions acceptées : 'jpg', 'jpeg', 'gif', 'png'</p>
                        <p>Taille maximum : 4Mo</p>
                        <input type="file" id="image" name="image" class="form-control" value="<?= $bottle['image'] ?>">
                    </div>
                    <input type="hidden" value="<?= $bottle[0] ?>" name="id">
                    <p><button class="btn btn-primary" type="submit">Envoyer</button> <a href="index.php" class="btn btn-primary">Retour</a></p>
                </form>

            </section>
        </div>
    </main>

</body>

</html>