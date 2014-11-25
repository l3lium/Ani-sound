<?php

require_once 'basics_bdd.php';

$table = 'animal';

function countAnimals() {
    global $table;

    return countFields($table);
}

function addAnimal($name, $img, $sound) {
    $dbc = connection();
    $req = "INSERT INTO animal(name, img, sound) VALUES (:name,:img,:sound)";
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->bindParam(':name', $name, PDO::PARAM_STR);
    $requPrep->bindParam(':img', $img, PDO::PARAM_STR);
    $requPrep->bindParam(':sound', $sound, PDO::PARAM_STR);
    $requPrep->execute();
    $requPrep->closeCursor();
    
    return $dbc->lastInsertId();
}

function getPageAnimals($page) {
    global $table;
    
    $req = "SELECT * FROM animal WHERE pending = false";

    return getFieldsPagination($page, NB_PAGINATION, $req);
}

function getPageAnimalsPending($page) {
    global $table;
    
    $req = "SELECT * FROM animal WHERE pending = true";

    return getPaginationQuerry($page, NB_PAGINATION, $req);
}

function getAnimalById($id) {
    global $table;
    return getFieldById($id, $table);
}

function deleteAnimalById($id) {
    global $table;
    deleteFieldById($id, $table);
}