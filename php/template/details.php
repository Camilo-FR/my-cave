<?php
// on démarre une session via le routeur

require('php/form_conditions/verif_id.php');


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Détails de la bouteille</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/details.css">
    <link rel="icon" href="design/wine-icon.jpg" />
</head>

<body>

    <div class="container">
        <div class="row">
            <section class="col-12">
                <div class="card-body">
                    <h2 class="card-title"><?= $bottle['nom'] ?></h2>
                    <img src="design/images/<?= $bottle['image'] ?>" alt="nouvelle-bouteille" class="img-fluid card-img-top">
                    <p class="card-text">
                    <ul>
                        <li><?= $bottle['cepage'] ?> <?= $bottle['annee'] ?></li>
                        <li><?= $bottle['pays'] ?></li>
                        <li><?= $bottle['region'] ?></li>
                    </ul>
                    <?= $bottle['description'] ?>
                    </p>
                    <p><a href="edit?id=<?= $bottle[0] ?>" class="btn btn-primary">Modifier</a> <a href="deleteconfirmation?id=<?= $bottle[0] ?>" class="btn btn-primary">Supprimer</a> <a href="index.php" class="btn btn-primary">Retour</a> </p>
            </section>
        </div>
    </div>

</body>

</html>