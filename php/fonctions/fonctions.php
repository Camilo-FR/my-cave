<?php

require_once('php/connect/connect.php');

// Ajouter des bouteilles

function addbottle(string $nom, string $cepage, string $pays, string $region, string $image, string $description, int $annee) {
    $dbco="";
    
    connexion($dbco);
    
    try {
        $query = $dbco->prepare("INSERT INTO bouteilles(nom, cepage, pays, region, image, description, annee)
                VALUES(:nom,:cepage,:pays, :region, :image, :description, :annee)");
                    
        $query->bindValue(':nom',$nom);
        $query->bindValue(':cepage',$cepage);
        $query->bindValue(':pays',$pays);
        $query->bindValue(':region',$region);
        $query->bindValue(':image',$image);
        $query->bindValue(':description',$description);
        $query->bindValue(':annee',$annee, PDO::PARAM_INT);

        $query->execute();

        echo "Fonction add ok ! ";
       

    } catch(PDOException $e){
        return "Erreur : " . $e->getMessage();
    }
}