<?php
/*
======Basic Bdd=======
Auteur: 	Oliveira Stéphane & Seemuller Julien
Classe: 	I.IN-P4B
Date:		18/11/2014
Version:	0.3
Description:    Script contenant les fonctions basiques relative à la base de donnée
                    - connexion base de donnée (PDO)
                    - retourne le nombre d'enregistrement dans la table donnée
                    - retourne un enregistrement par rapport à l'id
                    - retourne tout les enregistrements d'une table donnée
                    - retourne un nombre défini d'enregistrements pour la pagination
                    - supprime un enregistrement de la table donnée par rapport à l'id
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
    $dbc->quote($table);
    $req = "SELECT COUNT(*) FROM $table";
    
    $requPrep = $dbc->prepare($req);
    $requPrep->execute();
    
    $number=$requPrep->fetch();
    $requPrep->closeCursor();
    return $number[0];
}

/** countFieldsCondition
 * Fonction qui retourne le nombre total d'enregistrement d'une table selon une 
 * condition passée en parametre
 * @param string $table
 * @param string $condition
 * @return type
 */
function countFieldsCondition($table, $condition) {
    $dbc = connection();
    $dbc->quote($table);
    $dbc->quote($condition);
    $req = "SELECT COUNT(*) FROM $table $condition";
    
    $requPrep = $dbc->prepare($req);
    $requPrep->execute();
    
    $number=$requPrep->fetch();
    $requPrep->closeCursor();
    return $number[0];
}

/** getFieldById
 * Cette fonction récupère un enregistrement de la table donnée en paramètre grâce à 
 * l'id également donnée en paramètre
 * @param Integer $id
 * @param String $table
 * @return PDO::FETCH_OBJ
 */
function getFieldById($id, $table){
    $dbc = connection();
    $dbc->quote($table);
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
 * @return PDO::FETCH_OBJ
 */
function getAllFields($table){
    $dbc= connection();
    $dbc->quote($table);
    $req = "SELECT * FROM $table";
	
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->execute();
    $data= $requPrep->fetchAll(PDO::FETCH_OBJ);
    $requPrep->closeCursor();
    return $data;
}

/** getPaginationQuerry
 * Retourne la liste des enregistrement d'une page donnée en paramètre selon la 
 * requette egalement passée en parametre 
 * @param Integer $page
 * @param Integer $nbRow
 * @param String $table
 * @return PDO::FETCH_OBJ
 */
function getPaginationQuerry($page = 0, $nbRow = 0, $query) {
    $dbc = connection();
    $offset= $page*$nbRow;

    $req = $query." LIMIT :offset , :max ";//Ajout de la limite pour la pagination
    // preparation de la requete
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->bindParam(':offset', $offset, PDO::PARAM_INT);
    $requPrep->bindParam(':max', $nbRow, PDO::PARAM_INT);
    
    $requPrep->execute();
    $clients = $requPrep->fetchAll(PDO::FETCH_OBJ);
    $requPrep->closeCursor();
    return $clients;
}

/** getFieldsPagination
 * Retourne la liste des enregistrement d'une page donnée en paramètre selon la 
 * table egalement passée en parametre 
 * @param Integer $page
 * @param Integer $nbRow
 * @param String $table
 * @return PDO::FETCH_OBJ
 */
function getFieldsPagination($page = 0, $nbRow = 0, $table) {
    $dbc = connection();
    $dbc->quote($table);
    $offset= $page*$nbRow;
    
    $req = "SELECT * FROM $table LIMIT :offset , :max ";//Ajout de la limite pour la pagination
    // preparation de la requete
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->bindParam(':offset', $offset, PDO::PARAM_INT);
    $requPrep->bindParam(':max', $nbRow, PDO::PARAM_INT);  
    $requPrep->execute();
    $clients = $requPrep->fetchAll(PDO::FETCH_OBJ);
    $requPrep->closeCursor();
    return $clients;
}

/** deleteFieldById
 * Cette fonction supprime un enregistrement de la table donnée en paramètre grâce à 
 * l'id également donnée en paramètre
 * @param Integer $id
 * @param String $table
 */
function deleteFieldById($id, $table){
    $dbc= connection();
    $dbc->quote($table);
    $req = "DELETE FROM $table WHERE id=:id";
	
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->bindParam(':id', $id, PDO::PARAM_INT);
    $requPrep->execute();
    $data= $requPrep->fetchAll(PDO::FETCH_OBJ);
    $requPrep->closeCursor();
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