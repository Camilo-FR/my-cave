<?php
    

    $db;
    connexion($db);
       


    require_once('php/connect/close.php');

    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une bouteille</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
    <h1>Hello Add-World !!</h1>


    <main class="container">
        <div class="row">
            <section class="col-12">
            <h1>Ajouter une bouteille</h1>
            <form action="" method="post">
                <div class="form-group">
                <label for="bouteille">Bouteille</label>
                <input type="text" id="produit" name="bouteille">
                </div>
                <div class="form-group">
                <label for=""></label>
                </div>
                <div class="form-group">
                <label for=""></label>
                </div>
            </form> 
            </section>
        </div>
    </main>
<?php


?>

</body>
</html>