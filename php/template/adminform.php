<?php $db;
    connexion($db);
       
// On récupère les informations dans notre table

        $sql = 'SELECT * FROM `utilisateurs` INNER JOIN `role` ON utilisateurs.id_role = role.id';

// On prépare la requête puis on l'éxécute
        
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
    <title>Consulter les utilisateurs</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="icon" href="design/wine-icon.jpg" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
</head>
<body>
    <?php foreach($result as $user) {
        ?>

        <ul>
            <li><?= $user['pseudo'] ?> <?= $user['role'] ?></li>
        </ul>
        <?php
    }
?>
</body>
</html>