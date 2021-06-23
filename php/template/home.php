<?php

// require('php/form_conditions/upload.php');

    $db;
    connexion($db);
       
// On récupère les informations dans notre table

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

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
</head>
<body>
    <section>
        <div class="container-fluid">
            <div class="row">
               
                <video src="design/video/top-mycave.ogg" autoplay loop></video>
                <h1 class="top-video">MyCave</h1>

            </div>
        </div>
    </section>
    <main class="container">
        <div class="row">
            <section class="col-12">
            <?php
            if(!empty($_SESSION['erreur'])) {
                echo '<div class="alert alert-danger" role="alert">
                '. $_SESSION['erreur'].'
              </div>';
              $_SESSION['erreur'] = "";
            }

            if(!empty($_SESSION['message'])) {
                echo '<div class="alert alert-success" role="alert">
                '. $_SESSION['message'].'
              </div>';
              $_SESSION['message'] = "";
            }
            ?>
            <h1>Liste des bouteilles</h1>
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
                        <?php if(isset($_SESSION['user'])) { ?><th>Actions</th> <?php } ?>
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
                            <td> <img src="design/images/<?= $bottle['image'] ?>" alt="nouvelle-bouteille" class="img-fluid"> </td>
                            <td><?= $bottle['description'] ?></td>
                            <td><?= $bottle['annee'] ?></td>
                            <?php if(isset($_SESSION['user'])) { ?><td>  <a href="details?id=<?=$bottle['id']?>" class="btn btn-primary"> Voir </a> </td> <?php } ?>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php if(isset($_SESSION['user'])) { ?><p><a href="addform" class="btn btn-primary">Ajouter une bouteille de vin</a>  <a href="logout" class="btn btn-danger">Déconnexion</a></p> <?php } ?>
            </section>
        </div>
    </main>


    <div class="container">
        <div class="row">
            <div class="col-6">
                        <h1>Connectez-vous pour gérer votre cave !</h1>
                <form action="loginform" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Pseudonyme" name="pseudo" required>
                        <label for="floatingInput">Pseudonyme</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                        <label for="password">Mot de Passe</label>
                    </div>
                    <button class="btn btn-primary" type="submit">Se Connecter</button>
                </form>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-6">
                        <h1>Pas encore membre ? Inscrivez-vous içi !</h1>
                <form action="subscribeform" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Pseudonyme" name="pseudo">
                        <label for="floatingInput">Pseudonyme</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                        <label for="password">Mot de Passe</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                        <label for="password">Confirmer le Mot de Passe</label>
                    </div>
                    <button class="btn btn-primary" type="submit">Se Connecter</button>
                </form>
            </div>
        </div>
    </div>

<script src="assets/js/script.js"></script>
</body>
</html>