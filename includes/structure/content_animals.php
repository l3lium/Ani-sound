<?php

require_once '../crud_Animal.php';
require_once '../specific_funtions.php';

if (filter_input("POST", 'next')){
    $_SESSION["offset"] = $_SESSION["offset"] + 1;
} 

//On récupère les animaux par page
$page = $_SESSION["offset"];
$animals = getPageAnimals($page);

//On crée un panel pour chaque animaux de la page
foreach ($animals as $animal) {
    echo '<div class="col-sm-3">
            <div class="panel panel-success">
                <div class="panel-body">
                    <img class="img-thumbnail center-block" alt="thumbnail" src="'. $animal->img .'" data-holder-rendered="true" style="width: 200px; height: 200px;">
                    <audio>
                        <source scr="'. $animal->sound .' type="audio/mp3" />
                        Votre navigateur n\'est pas compatible.
                    </audio>    
                </div>
                <div class="panel-heading">
                    <h3 class="panel-title">'. $animal->name .'</h3>
                </div>
            </div>
          </div>';
}
