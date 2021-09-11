<?php



    $db;
    connexion($db);
       
// On récupère les informations dans notre table

        $sql = 'SELECT * FROM `bouteilles` INNER JOIN `pays` ON bouteilles.id_pays = pays.id';

// On prépare la requête puis on l'éxécute
        
        $query = $db->prepare($sql);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

// Requête pour la barre de recherche

        if(isset($_GET['search']) AND !empty($_GET['search'])) {
        $recherche = htmlspecialchars($_GET['search']);
        $result = $db->query('SELECT * FROM bouteilles INNER JOIN pays ON bouteilles.id_pays = pays.id WHERE pays LIKE "%'.$recherche.'%" ');
        }
        
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cave</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="icon" href="design/wine-icon.jpg" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
</head>
<body>

    <!--*****Section avec vidéo*****-->
    
    <section class="top">
        <div class="container-fluid">
            <div class="row">
               
                <video src="design/video/top-mycave.ogg" autoplay loop></video>
                <h1 class="top-video">MyCave</h1>

            </div>
        </div>
    </section>

<!--******Section avec cards********-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="design/logo.png" alt="logo-my-cave"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#home">Accueil</a>
        <a class="nav-link active" aria-current="page" href="#login">Se connecter</a>
        <a class="nav-link active" aria-current="page" href="#subscribe">Souscrire</a>
        </div>
    </div>
  </div>
</nav>
<div class="container-fluid" class="nav-mobile">
<div  id="nav-m">
        <a aria-current="page" href="#home">Accueil</a>
        <a aria-current="page" href="#login">Se connecter</a>
        <a aria-current="page" href="#subscribe">Souscrire</a>
    </div>
</div>

    <main class="container" id="home">
        <div class="row">
            
                
            <!-- Affichage des messages -->

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

            <h1 class="title-card-section">Votre cave à vins</h1>
            <!-- barre de recherche -->
            <form action="" method="GET">
                <input type="search" name="search" placeholder="rechercher un pays" autocomplete="off">
                <input class="btn btn-primary" type="submit" value="rechercher">
            </form>

            <!-- Différentes Cards -->
           
            <?php
                    foreach($result as $bottle) {
            ?>
            <div class="card bg-light col-lg-3 col-md-6">
                        <img src="design/images/<?= $bottle['image'] ?>" alt="nouvelle-bouteille" class="img-fluid" class="card-img-top">
                <div class="card-body">
                        <h5 class="card-title"><?= $bottle['nom'] ?></h5>
                        <p class="card-text">
                            <ul>
                            <li><?= $bottle['cepage'] ?> <?= $bottle['annee'] ?></li>
                            <li><?= $bottle['pays']; ?></li>
                            <li><?= $bottle['region'] ?></li>
                            </ul>
                            <?= $bottle['description'] ?>
                        </p>
                        <?php if(isset($_SESSION['user'])) { ?> <a href="details?id=<?=$bottle['id']?>" class="btn btn-primary">Voir les détails</a> <?php } ?>
                </div>
            </div>
            <?php
        }
        ?>             
        </div>
        <?php
        if(isset($_SESSION['user'])) { ?><div class="btn-catalogue"><a href="addform" class="btn btn-primary">Ajouter une bouteille de vin</a>  <a href="logout" class="btn btn-danger">Déconnexion</a></div> <?php } 
        ?>  
    </main>

    <!--*******Section Login******-->

    <div class="container login" id="login">
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
            
        <div class="col-3 svg-login">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_dXT5lD.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
        </div>
            
        </div>
    </div>

    <!--*******Section Subscribe******-->

    <div class="container subscribe" id="subscribe">
        <div class="row">
            <div class="col-6">
                        <h1>Pas encore membre ? Inscrivez-vous ici !</h1>
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
        <div class="col-3 svg-subscribe">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets4.lottiefiles.com/packages/lf20_RFHPja.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
        </div>
        </div>
    </div>

<script src="assets/js/script.js"></script>
</body>
</html>