<?php

require_once('php/connect/connect.php');

// Enlève les espaces dans le formulaire et évite qu'il y aie du script dans les inputs

function valid_data($data) {

    $data = trim($data);
    $data = htmlspecialchars($data);

    return $data;
}

// CREATE : Ajouter des bouteilles

function addbottle(string $nom, string $cepage, string $pays, string $region, string $description, string $image, int $annee) {
    
    $db;   
    connexion($db);
    
    try {
        $query = $db->prepare("INSERT INTO bouteilles(nom, cepage, pays, region, description, image, annee)
                VALUES(:nom,:cepage,:pays, :region, :description, :image, :annee)");
                    
        $query->bindValue(':nom',$nom, PDO::PARAM_STR);
        $query->bindValue(':cepage',$cepage, PDO::PARAM_STR);
        $query->bindValue(':pays',$pays, PDO::PARAM_STR);
        $query->bindValue(':region',$region, PDO::PARAM_STR);
        $query->bindValue(':description',$description, PDO::PARAM_STR);
        $query->bindValue(':image',$image, PDO::PARAM_STR);
        $query->bindValue(':annee',$annee, PDO::PARAM_INT);

        $query->execute();


    } catch(PDOException $e){
        return "Erreur : " . $e->getMessage();
    }
}


// UPDATE : Modifier des bouteilles

function updatebottle(int $id, string $nom, string $cepage, string $pays, string $region, string $description, int $annee) {
    
    $db;
    connexion($db);
    
    try {
        $query = $db->prepare("UPDATE `bouteilles` SET `nom`=:nom, `cepage`=:cepage, `pays`=:pays, `region`=:region, `description`=:description, `annee`=:annee
                WHERE `id`=:id;");
                    
        $query->bindValue(':id',$id, PDO::PARAM_INT);
        $query->bindValue(':nom',$nom, PDO::PARAM_STR);
        $query->bindValue(':cepage',$cepage, PDO::PARAM_STR);
        $query->bindValue(':pays',$pays, PDO::PARAM_STR);
        $query->bindValue(':region',$region, PDO::PARAM_STR);
        $query->bindValue(':description',$description, PDO::PARAM_STR);
        $query->bindValue(':annee',$annee, PDO::PARAM_INT);

        $query->execute();

    } catch(PDOException $e){
        return "Erreur : " . $e->getMessage();
    }
}

// Modifier l'image

function updateimage(int $id, string $image) {
    $db;
    connexion($db);

    try {
        $query = $db->prepare("UPDATE `bouteilles` SET `image`=:image WHERE `id`=:id;");

        $query->bindValue(':id',$id, PDO::PARAM_INT);
        $query->bindValue(':image',$image, PDO::PARAM_STR);

        $query->execute();

    }catch(PDOException $e){
        return "Erreur : " . $e->getMessage();
    }
}

// LOGIN

function select_user($pseudo) {
    $db;
        
    connexion($db);
    
        try {
            $query = $db->prepare("SELECT * FROM authentification WHERE pseudo=:pseudo");
            
            $query->bindValue(':pseudo',$pseudo);
    
            $query->execute();
            
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
    }

// SUBSCRIBE

function subscribe(string $pseudo, string $password) {
    $db;

    connexion($db);

try {
    $query = $db->prepare("INSERT INTO authentification(pseudo, password) VALUES(:pseudo, :password)");

    $query->bindValue(':pseudo',$pseudo);
    $query->bindValue(':password',$password);

    $query->execute();
    
}
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}
}