<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'basics_bdd.php';

function addAnimal($name, $img, $sound, $idUser){
    $dbc = connection();
    $req="INSERT INTO animal(name, img, sound, idUser) VALUES (:name,:img,:sound,:idUser)";
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->bindParam(':name', $email, PDO::PARAM_STR);
    $requPrep->bindParam(':img', $username, PDO::PARAM_STR);
    $requPrep->bindParam(':sound', $password, PDO::PARAM_STR);
    $requPrep->bindParam(':idUser', $password, PDO::PARAM_INT);
    $requPrep->execute();
    $requPrep->closeCursor();
    return $dbc->lastInsertId();
}

