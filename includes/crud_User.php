<?php
/*
======Crud Animal=======
Auteur: 	Oliveira Stéphane & Seemuller Julien
Classe: 	I.IN-P4B
Date:		25/11/2014
Version:	1.0
Description:    Script contenant les fonctions en relation avec le 
                l'identification et le crud user (create, read, update, delete)
*/

require_once 'basics_bdd.php';

function createUser($email, $username, $password){
    $dbc = connection();
    $password=hashPerso($password, $username);
    $req = "INSERT INTO user (email, username, password) VALUES (:email, :username, :password)";
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->bindParam(':email', $email, PDO::PARAM_STR);
    $requPrep->bindParam(':username', $username, PDO::PARAM_STR);
    $requPrep->bindParam(':password', $password, PDO::PARAM_STR);
    $requPrep->execute();
    $requPrep->closeCursor();
    return $dbc->lastInsertId();
}

function getUserByPseudo($pseudo) {
    $dbc = connection();
    $req = "SELECT * FROM user WHERE username=:pseudo";
    // preparation de la requete
    $requPrep = $dbc->prepare($req); // on prépare notre requête
    $requPrep->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $requPrep->execute();
    $data= $requPrep->fetch(PDO::FETCH_OBJ);
    $requPrep->closeCursor();
    return $data;
}

function userConnect($username, $password) {
    $connect = false;
    $_SESSION['username']= $username;
    $user = getUserbyPseudo($username);
    if ($user != NULL && $user->password === hashPerso($password, $username)) {
        $_SESSION['id'] = $user->id;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $user->email;
        $_SESSION['usertype'] = $user->userType;
        $connect = TRUE;
    }
    return $connect;
}