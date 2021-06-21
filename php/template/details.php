<?php
// on démarre une session via le routeur

require('php/form_conditions/verif_id.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Détails de la bouteille</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <section class="col-12">
            <h1>Détails de la bouteille : <?= $bottle['nom']?></h1>
            <p>Image : <?= $bottle['image']?></p>     
            <p>Cépage : <?= $bottle['cepage']?></p>
            <p>Pays : <?= $bottle['pays']?></p>
            <p>Région : <?= $bottle['region']?></p>
            <p>Description : <?= $bottle['description']?></p>
            <p>Année : <?= $bottle['annee']?></p>
            <p><a href="edit?id=<?=$bottle['id'] ?>" class="btn btn-primary">Modifier</a> <a href="php/form_conditions/delete.php?id=<?=$bottle['id'] ?>" class="btn btn-primary">Supprimer</a> <a href="index.php" class="btn btn-primary">Retour</a> </p>
        </section>
    </div>
</div>
    
</body>
</html>