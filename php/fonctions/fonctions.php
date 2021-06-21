<?php

require_once('php/connect/connect.php');

// Enlève les espaces dans le formulaire et évite qu'il y aie du script dans les inputs

function valid_data($data) {

    $data = trim($data);
    $data = htmlspecialchars($data);

    return $data;
}

// Ajouter des bouteilles

function addbottle(string $nom, string $cepage, string $pays, string $region, string $image, string $description, int $annee) {
    
    $db;   
    connexion($db);
    
    try {
        $query = $db->prepare("INSERT INTO bouteilles(nom, cepage, pays, region, image, description, annee)
                VALUES(:nom,:cepage,:pays, :region, :image, :description, :annee)");
                    
        $query->bindValue(':nom',$nom, PDO::PARAM_STR);
        $query->bindValue(':cepage',$cepage, PDO::PARAM_STR);
        $query->bindValue(':pays',$pays, PDO::PARAM_STR);
        $query->bindValue(':region',$region, PDO::PARAM_STR);
        $query->bindValue(':image',$image, PDO::PARAM_STR);
        $query->bindValue(':description',$description, PDO::PARAM_STR);
        $query->bindValue(':annee',$annee, PDO::PARAM_INT);

        $query->execute();


    } catch(PDOException $e){
        return "Erreur : " . $e->getMessage();
    }
}

// UPDATE

function updatebottle(string $nom, string $cepage, string $pays, string $region, string $image, string $description, int $annee) {
    
    $db;
    connexion($db);
    
    try {
        $query = $db->prepare("UPDATE `bouteilles` SET `nom`=:nom, `cepage`=:cepage, `pays`=:pays, `region`=:region, `image`=:image, `description`=:description, `annee`=:annee
                WHERE `id`=:id;");
                    
        $query->bindValue(':id',$id, PDO::PARAM_INT);
        $query->bindValue(':nom',$nom, PDO::PARAM_STR);
        $query->bindValue(':cepage',$cepage, PDO::PARAM_STR);
        $query->bindValue(':pays',$pays, PDO::PARAM_STR);
        $query->bindValue(':region',$region, PDO::PARAM_STR);
        $query->bindValue(':image',$image, PDO::PARAM_STR);
        $query->bindValue(':description',$description, PDO::PARAM_STR);
        $query->bindValue(':annee',$annee, PDO::PARAM_INT);

        $query->execute();

    } catch(PDOException $e){
        return "Erreur : " . $e->getMessage();
    }
}
