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
require_once 'crud_User.php';
require_once 'crud_Animal.php';

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