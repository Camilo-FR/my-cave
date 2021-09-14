<?php

require('php/form_conditions/verif_id.php');


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmer la supression</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="icon" href="design/wine-icon.jpg" />
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/deleteconfirmation.css">
</head>

<body class="bg-dark-color">
    <div class="main">
        <div class="box">
            <h2 class="red-color">Êtes vous sur de vouloir supprimer cette bouteille ?</h2>

            <p><a href="delete?id=<?= $bottle[0] ?>" class="btn btn-primary">Supprimer</a> <a href="details?id=<?= $bottle[0] ?>" class="btn btn-primary">Retour</a> </p>
        </div>
    </div>
</body>

</html>