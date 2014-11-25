<?php

/*
  ======Specific Bdd======
  Auteur: 	Oliveira Stéphane & Seemuller Julien
  Classe: 	I.IN-P4B
  Date:		25/11/2014
  Version:	0.1
  Description:    Script regroupant les fonctions spécifiques au site web et la base de donnée
 */
require_once 'specific_bdd.php';

function getHeader() {
    //On affiche différents headers en fonction de la personne qui est connectée
    //Si personne n'est connecté, on affiche un header donnant la possibilité de s'inscrire et de se logger.
    if (isConnected()) {
        if (isAdmin()) {
            include 'structure/header_logged_in_admin';
        } else {
            include 'structure/header_logged_in';
        }
    } 
    else {
        include 'structure/header_not_logged_in.php';
    }
}

function getFooter() {
    //On affiche différents footers en fonction de la personne qui est connectée
    //Si personne n'est connecté, on affiche un footer par défaut
    if (isConnected()) {
        if (isAdmin()) {
            include 'structure/footer_logged_in_admin';
        } else {
            include 'structure/footer_logged_in';
        }
    } 
    else {
        include 'structure/footer_not_logged_in.php';
    }
}