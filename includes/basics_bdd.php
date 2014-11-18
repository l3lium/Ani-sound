<?php
/*
======BDD Function======
Auteur: 	Oliveira Stéphane & Seemuller Julien
Classe: 	I.IN-P4B
Date:		18/11/2014
Version:	0.2
*/

require_once 'constantes.php';

/** connection
 * Fonction qui retourne une connexion PDO à une base de donnée mysql ou une erreur.
 * @return PDO
 */
function connection() {
    try {
        $bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_LOGIN,
                DB_PASS, array(PDO::ATTR_PERSISTENT => true));
        
        return $bdd;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

/** countFields
 * Fonction qui retourne le nombre total d'enregistrement d'une table 
 * passée en paramètre
 * @param $table string 
 * @return Integer
 */
function countFields($table) {
    $dbc = connection();
    $req = "SELECT COUNT(*) FROM $table";
    
    $requPrep = $dbc->prepare($req);
    $requPrep->execute();
    
    $number=$requPrep->fetch();
    $requPrep->closeCursor();
    return $number[0];
}

/** getFieldbyId
 * Cette fonction récupère un enregistrement de la table donnée en paramètre grâce à 
 * l'id également donnée en paramètre
 * @param Integer $id
 * @param String $table
 * @return array OBJ
 */
function getFieldbyId($id, $table){
    $dbc = connection();
    $req = "SELECT * FROM $table WHERE id=:id";
    // preparation de la requete
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->bindParam(':id', $id, PDO::PARAM_INT);
    $requPrep->execute();

    return $requPrep->fetch(PDO::FETCH_OBJ);
}

/** getAllFields
 * Cette fonction retourne tous les enregistrements de la table passée en paramètre
 * @param String $table
 * @return array OBJ
 */
function getAllFields($table){
    $dbc= connection();
    $req = "SELECT * FROM $table";
	
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->execute();
    $data= $requPrep->fetchAll(PDO::FETCH_OBJ);
    $requPrep->closeCursor();
    return $data;
}

/** deleteFieldById
 * Cette fonction supprime un enregistrement de la table donnée en paramètre grâce à 
 * l'id également donnée en paramètre
 * @param Integer $id
 * @param String $table
 */
function deleteFieldById($id, $table){
    $dbc= connection();
    $req = "DELETE FROM $table WHERE id=:id";
	
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->bindParam(':id', $id, PDO::PARAM_INT);
    $requPrep->execute();
    $data= $requPrep->fetchAll(PDO::FETCH_OBJ);
    $requPrep->closeCursor();
    return $data;
}


 /*=========================WORK IN PROGRESS============================
/** updateFieldById
 * Cette fonction met à jour un enregistrement de la table donnée en paramètre grâce à 
 * l'id donnée en paramètre et les données passées en paramètre sous la forme 
 * d'un tableau assiocatif avec comme clé les noms des champs exact dans la base de donnée.
 * @param Integer $id
 * @param String $table
 * @param Array $data
 *//*
function updateFieldById($id, $table, $data) {
    $dbc= connection();
    $req = "UPDATE images SET "
	$nbRow=count($data);
	foreach ($data as $key => $value){
		if ($nbRow-1 ==)
		$req .= "$key=$value,";
		
	}
	$req .= " WHERE id=$id";
    // preparation de la requete
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->execute();
    
}
*/