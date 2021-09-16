<?php

require_once('php/connect/connect.php');

// Enlève les espaces dans le formulaire et évite qu'il y aie du script dans les inputs

function valid_data($data)
{

    $data = trim($data);
    $data = htmlspecialchars($data);

    return $data;
}

// CREATE : Ajouter des bouteilles

function addbottle(string $nom, string $cepage, int $pays, string $region, string $description, string $image, int $annee)
{

    $db;
    connexion($db);

    try {
        $query = $db->prepare("INSERT INTO bouteilles(nom, cepage, id_pays, region, description, image, annee)
                VALUES(:nom, :cepage, :pays, :region, :description, :image, :annee)");

        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':cepage', $cepage, PDO::PARAM_STR);
        $query->bindValue(':pays', $pays, PDO::PARAM_INT);
        $query->bindValue(':region', $region, PDO::PARAM_STR);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        $query->bindValue(':image', $image, PDO::PARAM_STR);
        $query->bindValue(':annee', $annee, PDO::PARAM_INT);

        $query->execute();
    } catch (PDOException $e) {
        return "Erreur : " . $e->getMessage();
    }
}

// ADDCOUNTRY : rajouter un pays

function addcountry(string $pays)
{

    $db;
    connexion($db);

    try {
        $query = $db->prepare("INSERT INTO pays(pays) VALUES(:pays)");

        $query->bindValue(':pays', $pays, PDO::PARAM_STR);

        $query->execute();
    } catch (PDOException $e) {
        return "Erreur : " . $e->getMessage();
    }
}


// UPDATE : Modifier des bouteilles

function updatebottle(int $id, string $nom, string $cepage, int $pays, string $region, string $description, string $image, int $annee)
{

    $db;
    connexion($db);

    try {
        $query = $db->prepare("UPDATE `bouteilles` SET `nom`=:nom, `cepage`=:cepage, `id_pays`=:pays, `region`=:region, `description`=:description, `image`=:image, `annee`=:annee
                WHERE `id`=:id;");

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':cepage', $cepage, PDO::PARAM_STR);
        $query->bindValue(':pays', $pays, PDO::PARAM_INT);
        $query->bindValue(':region', $region, PDO::PARAM_STR);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        $query->bindValue(':image', $image, PDO::PARAM_STR);
        $query->bindValue(':annee', $annee, PDO::PARAM_INT);

        $query->execute();
    } catch (PDOException $e) {
        return "Erreur : " . $e->getMessage();
    }
}


// LOGIN

function select_user($pseudo)
{
    $db;

    connexion($db);

    try {
        $query = $db->prepare("SELECT * FROM utilisateurs INNER JOIN role ON utilisateurs.id_role = role.id WHERE pseudo=:pseudo");

        $query->bindValue(':pseudo', $pseudo);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// SUBSCRIBE

function subscribe(string $pseudo, string $password, int $id_role)
{
    $db;

    connexion($db);

    try {
        $query = $db->prepare("INSERT INTO utilisateurs(pseudo, password, id_role) VALUES(:pseudo, :password, :role)");

        $query->bindValue(':pseudo', $pseudo);
        $query->bindValue(':password', $password);
        $query->bindValue(':role', $id_role);

        $query->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
