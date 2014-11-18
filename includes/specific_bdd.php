<?php
/*
======Specific Bdd======
Auteur: 	Oliveira Stéphane & Seemuller Julien
Classe: 	I.IN-P4B
Date:		18/11/2014
Version:	0.1
Description:    Script regroupant les fonctions spécifiques au site web et la base de donnée
*/

session_start();
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

    $data= $requPrep->fetch(PDO::FETCH_OBJ);
    $requPrep->closeCursor();
    return $data;
}

function getUserbyPseudo($pseudo) {
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

function userConnect($username, $pass) {
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

function isAdmin(){
    return ($_SESSION['usertype'] == 2);
}
function isConnected(){
    return (isset($_SESSION['id']));
}

/* * HashPerso
 * Hash le mot de passe
 * @param string $value
 * @return string
 */
function hashPerso($password, $username) {
    $derp = $password . 'SaaS';
    return sha1(md5($derp)+$username);
}

function debug($sObj = NULL) {
    echo '<pre>';
    if (is_null($sObj)) {
        echo '|Object is NULL|' . "\n";
    } elseif (is_array($sObj) || is_object($sObj)) {
        var_dump($sObj);
    } else {
        echo '|' . $sObj . '|' . "\n";
    }
    echo '</pre>';
}