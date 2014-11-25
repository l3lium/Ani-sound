<?php

require_once 'basics_bdd.php';

$table = 'animal';
$tablelink = 'useranimals';

function countAnimalsPending() {
    global $tablelink;
    $dbc = connection();
    $dbc->quote($tablelink);
    $req = "SELECT COUNT(*) FROM $tablelink WHERE pending = true";
    
    $requPrep = $dbc->prepare($req);
    $requPrep->execute();
    
    $number=$requPrep->fetch();
    $requPrep->closeCursor();
    return $number[0];
}

function countAnimals() {
    global $tablelink;
    $dbc = connection();
    $dbc->quote($tablelink);
    $req = "SELECT COUNT(*) FROM $tablelink WHERE pending = false";
    
    $requPrep = $dbc->prepare($req);
    $requPrep->execute();
    
    $number=$requPrep->fetch();
    $requPrep->closeCursor();
    return $number[0];
}

function addAnimal($name, $img, $sound) {
    $dbc = connection();
    $req = "INSERT INTO animal(name, img, sound, idUser) VALUES (:name,:img,:sound)";
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->bindParam(':name', $name, PDO::PARAM_STR);
    $requPrep->bindParam(':img', $img, PDO::PARAM_STR);
    $requPrep->bindParam(':sound', $sound, PDO::PARAM_STR);
    $requPrep->execute();
    $requPrep->closeCursor();
    $id=$dbc->lastInsertId();
    
    if ($id=0){
        if (addAnimalUser($_SESSION['id'], $idAnimal)){
            return $id;
        }else{
            return false;
        }
    }
    return false;
}

function addAnimalUser($idUser, $idAnimal) {

    $dbc = connection();
    $req = "INSERT INTO useranimals(idUser, idAnimal) VALUES (:idUser, :idAnimal)";
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->bindParam(':idUser', $idUser, PDO::PARAM_INT);
    $requPrep->bindParam(':idAnimal', $idAnimal, PDO::PARAM_INT);
    $requPrep->execute();
    $requPrep->closeCursor();
    $id=$dbc->lastInsertId();
            
    if ($id=0){
        deleteAnimalUserById($id);
        return false;
    }  else {
        return $id;
    }
    
}

function getPageAnimals($page) {
    global $table;
    
    $req = "SELECT a.id, a.name, a.img, a.sound FROM animal as a, useranimals as ua
    WHERE a.id = ua.idAnimal AND pending = false";

    return getPaginationQuerry(0, NB_PAGINATION, $req);
}

function getPageAnimalsPending($page) {
    global $table;
    
    $req = "SELECT a.id, a.name, a.img, a.sound FROM animal as a, useranimals as ua
    WHERE a.id = ua.idAnimal AND pending = true";

    return getPaginationQuerry(0, NB_PAGINATION, $req);
}

function getAnimalById($id) {
    global $table;
    return getFieldById($id, $table);
}

function deleteAnimalById($id) {
    global $table;
    deleteFieldById($id, $table);
}

function deleteAnimalUserById($id) {
    global $table;
    deleteFieldById($id, $tablelink);
}
