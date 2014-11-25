<?php

require_once 'basics_bdd.php';

$table = 'animal';

function countAnimalsPending() {
    global $table;
    return countFields($table);
}

function countAnimals() {
    global $table;
    return countFields($table);
}

function addAnimal($name, $img, $sound, $idUser) {
    $dbc = connection();
    $req = "INSERT INTO animal(name, img, sound, idUser) VALUES (:name,:img,:sound,:idUser)";
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->bindParam(':name', $email, PDO::PARAM_STR);
    $requPrep->bindParam(':img', $username, PDO::PARAM_STR);
    $requPrep->bindParam(':sound', $password, PDO::PARAM_STR);
    $requPrep->bindParam(':idUser', $password, PDO::PARAM_INT);
    $requPrep->execute();
    $requPrep->closeCursor();
    return $dbc->lastInsertId();
}

function addAnimalUser($idUser, $idAnimal) {

    $dbc = connection();
    $req = "INSERT INTO useranimals(idUser, idAnimal, date) VALUES (:idUser, :idAnimal, :date)";
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->bindParam(':name', $email, PDO::PARAM_STR);
    $requPrep->bindParam(':img', $username, PDO::PARAM_STR);
    $requPrep->bindParam(':sound', $password, PDO::PARAM_STR);
    $requPrep->bindParam(':idUser', $password, PDO::PARAM_INT);
    $requPrep->execute();
    $requPrep->closeCursor();
    return $dbc->lastInsertId();
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
