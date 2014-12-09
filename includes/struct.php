<?php

/*
  ======Structure PHP======
  Auteur: 	Oliveira Stéphane & Seemuller Julien
  Classe: 	I.IN-P4B
  Date:		25/11/2014
  Version:	0.1
  Description:  Script permettant de définir quel include a utiliser dépendamment de l'utilisateur
 */
require_once 'specific_funtions.php';

function getHeader() {
    //On affiche différents headers en fonction de la personne qui est connectée
    //Si personne n'est connecté, on affiche un header donnant la possibilité de s'inscrire et de se logger.
    if (isConnected()) {
        if (isAdmin()) {
            include 'structure/header_logged_in_admin.php';
        } else {
            include 'structure/header_logged_in.php';
        }
    } else {
        include 'structure/header_not_logged_in.php';
    }
}

function getFooter() {
    //On affiche différents footers en fonction de la personne qui est connectée
    //Si personne n'est connecté, on affiche un footer par défaut
    if (isConnected()) {
        if (isAdmin()) {
            include 'structure/footer_logged_in_admin.php';
        } else {
            include 'structure/footer_logged_in.php';
        }
    } else {
        include 'structure/footer_not_logged_in.php';
    }
}

function structPageAnimals($page) {
    $animals = getPageAnimals($page);
    $str='';
    
    //On crée un panel pour chaque animaux de la page
    foreach ($animals as $animal) {
        $str.= '<div class="col-sm-3">
            <div class="panel panel-success">
                <div class="panel-body">
                    <img class="img-thumbnail center-block img-animal" alt="thumbnail" src="' . $animal->img . '" data-holder-rendered="true" style="width: 200px; height: 200px;">
                    <audio>
                        <source src="' . $animal->sound . '" type="audio/mpeg" />
                        Votre navigateur n\'est pas compatible.
                    </audio>    
                </div>
                <div class="panel-heading">
                    <h3 class="panel-title">' . $animal->name . '</h3>
                </div>
            </div>
          </div>';
    }
    return $str;
}

function structPageRequestAnimals($page) {
    $animals = getPageAnimalsPending($page);
    $str='';
    
    //On crée un panel pour chaque animaux de la page
    foreach ($animals as $animal) {
        $str.= '<div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img class="img-thumbnail center-block img-animal" alt="thumbnail" src="' . $animal->img . '" data-holder-rendered="true" style="width: 200px; height: 200px;">
                    <audio>
                        <source src="' . $animal->sound . '" type="audio/mpeg" />
                        Votre navigateur n\'est pas compatible.
                    </audio>    
                </div>
                <div class="panel-heading pending-image">
                    <h3 class="panel-title">' . $animal->name . '</h3>
                    <div id="pending-image">
                        <a href="?delete='. $animal->id .'"><img src="img/cross.svg" alt="crossmark" height="50" width="50"/></a>
                        <a href="?update='. $animal->id .'"><img src="img/check.svg" alt="checkmark" height="50" width="50"/></a>
                    </div>
                </div>
            </div>
          </div>';
    }
    return $str;
}
