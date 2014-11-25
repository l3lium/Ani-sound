<?php
/*
======Crud Animal=======
Auteur: 	Oliveira Stéphane & Seemuller Julien
Classe: 	I.IN-P4B
Date:		25/11/2014
Version:	1
Description:    Script contenant les fonctions en relation avec le crud animal 
                    (create, read, update, delete)
*/

require_once 'basics_bdd.php';

$table = 'animal';
$pendingC="WHERE pending=false";
$notPendingC="WHERE pending=true";

/** countAnimals
 * Retourne le nombre d'animaux qui y ont été validés
 * @global string $table
 * @global string $notPendingC
 * @return integer
 */
function countAnimals() {
    global $table;
    global $notPendingC;   

    return countFieldsCondition($table, $notPendingC);
}

/** countAnimalsPending
 * Retourne le nombre d'animaux qui sont en attente de validation par l'administrateur
 * @global string $table
 * @global string $pendingC
 * @return integer
 */
function countAnimalsPending() {
    global $table;
    global $pendingC;
     
    return countFieldsCondition($table, $pendingC);
}

/**addAnimal
 * Ajoute un animal dans la base de donnée et retourne l'identifiant si réussis
 * @param string $name
 * @param string $img
 * @param string $sound
 * @param boolean $pending
 * @return integer
 */
function addAnimal($name, $img, $sound, $pending=true) {
    $dbc = connection();
    $req = "INSERT INTO animal (name, img, sound, pending, idUser) VALUES (:name, :img, :sound, :pending, :idUser)";
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->bindParam(':name', $name, PDO::PARAM_STR);
    $requPrep->bindParam(':img', $img, PDO::PARAM_STR);
    $requPrep->bindParam(':sound', $sound, PDO::PARAM_STR);
    $requPrep->bindParam(':pending', $pending, PDO::PARAM_BOOL);
    $requPrep->bindParam(':idUser', $_SESSION['id'], PDO::PARAM_INT);
    $requPrep->execute();
    $requPrep->closeCursor();
    return $dbc->lastInsertId();
}

/** updateAnimal
 * Met à jour les champs de l'animal dont l'id est passé en parametre
 * @param integer $id
 * @param string $name
 * @param string $img
 * @param string $sound
 * @param boolean $pending
 */
function updateAnimal($id, $name, $img, $sound, $pending=true){
    $dbc = connection();
    $req = "UPDATE animal SET name=:name, img=:img, sound=:sound, pending=:pending WHERE id=$id";
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->bindParam(':name', $name, PDO::PARAM_STR);
    $requPrep->bindParam(':img', $img, PDO::PARAM_STR);
    $requPrep->bindParam(':sound', $sound, PDO::PARAM_STR);
    $requPrep->bindParam(':pending', $pending, PDO::PARAM_BOOL);
    $requPrep->execute();
    $requPrep->closeCursor();
}

/** validateAnimal
 * Valide l'animal dont l'id est passé en parametre
 * @param integer $id
 */
function validateAnimal($id){
    $dbc = connection();
    $req = "UPDATE animal SET pending=false WHERE id=$id";
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->execute();
    $requPrep->closeCursor();
}

/** getPageAnimals
 * Retourne la liste des animaux validés d'une page passé en parametre
 * @global string $pendingC
 * @param int $page
 * @return PDO::FETCH_OBJ
 */
function getPageAnimals($page) {
    global $pendingC;
    
    $req = "SELECT * FROM animal $pendingC";

    return getPaginationQuerry($page, NB_PAGINATION, $req);
}

/** getPageAnimalsPending
 * Retourne la liste des animaux en attente d'une page passé en parametre
 * @global string $pendingC
 * @param int $page
 * @return PDO::FETCH_OBJ
 */
function getPageAnimalsPending($page) {
    global $notPendingC;
    
    $req = "SELECT * FROM animal $notPendingC";

    return getPaginationQuerry($page, NB_PAGINATION, $req);
}

/** getAnimalById
 * Retourne un animal selon un id passé en parametre
 * @global string $table
 * @param type $id
 * @return PDO::FETCH_OBJ
 */
function getAnimalById($id) {
    global $table;
    return getFieldById($id, $table);
}

/** deleteAnimalById
 * Supprime un animal dans la base de donnée selon un id passé en parametre
 * @global string $table
 * @param type $id
 */
function deleteAnimalById($id) {
    global $table;
    deleteFieldById($id, $table);
}