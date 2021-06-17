<?php
        $sql = 'SELECT * FROM `bouteilles`';
// On prépare la requête puis on l'éxécute
        $query = $db->prepare($sql);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        


        require_once('php/connect/close.php');
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cave</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
    <h1>Hello World !!</h1>

    <p>Voici mes bouteilles de vins : </p>

    <main class="container">
        <div class="row">
            <section class="col-12">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Cépage</th>
                        <th>Pays</th>
                        <th>Région</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Année</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($result as $bottle) {
                        ?>
                        <tr>
                            <td><?= $bottle['id'] ?></td>
                            <td><?= $bottle['nom'] ?></td>
                            <td><?= $bottle['cepage'] ?></td>
                            <td><?= $bottle['pays'] ?></td>
                            <td><?= $bottle['region'] ?></td>
                            <td><?= $bottle['image'] ?></td>
                            <td><?= $bottle['description'] ?></td>
                            <td><?= $bottle['annee'] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="php/add/add.php" class="btn btn-primary">Ajouter une bouteille de vin</a>
            </section>
        </div>
    </main>


</body>
</html>