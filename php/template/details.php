<?php
// on démarre une session via le routeur

// Est-ce que l'id existe et est-ce qu'il n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])) {

    $db;
    connexion($db);
    
    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `bouteilles` WHERE `id` = :id;';

    $query = $db->prepare($sql);
    // on "accroche" les paramètres
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    $query->execute();
    $bottle = $query->fetch();

    if(!$bottle){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: http://localhost/my-cave/');
    }
}else{
    $_SESSION['erreur'] = 'URL invalide';
    header('Location: http://localhost/my-cave/');
}
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
            <p><a href="edit?id=<?=$bottle['id'] ?>" class="btn btn-primary">Modifier</a> <a href="php/delete/delete.php?id=<?=$bottle['id'] ?>" class="btn btn-primary">Supprimer</a> <a href="index.php" class="btn btn-primary">Retour</a> </p>
        </section>
    </div>
</div>
    
</body>
</html>