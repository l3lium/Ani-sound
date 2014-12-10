<?php
require_once 'includes/specific_funtions.php';
require_once 'includes/struct.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Ani'Sound - Mini Jeu</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/style.css" rel="stylesheet">
        <!--<script src="./js/ie-emulation-modes-warning.js"></script>-->
        <!--<script src="./js/ie10-viewport-bug-workaround.js"></script>-->
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <!-- Script Perso
        ================================================== -->
        <script src="./js/query_animals.js"></script>
        <script src="./js/playSound.js"></script>
        <script src="./js/minigame.js"></script>
    </head>
    <body>
        <?php
        getHeader();
        ?>
        <!-- CONTAINER -->
        <div class="container">
            <div class="center-block">
                <!-- CONTAINER PANELS ANIMAUX -->
                <h1>Trouvez l'animal</h1><hr/>
                <article class="center-block">
                    <div class="jumbotron">
                        <h2>Instructions</h2><hr/>
                        <p>
                            Pour jouer au jeu, appuyez sur le bouton rouge. Soyez sur d'avoir une source audio a disposition.
                            Puis, écoutez le cri de l'animal, cliquez ensuite sur l'animal auquel le cri appartient.
                            Si le cri correspond bien à l'animal choisi, le jeu vous affichera une confirmation, sinon un
                            écran "Game Over" vous donnera la possibilité de rejouer
                        </p><br>
                        <button id="startGame" type="button" data-url="includes/structure/allAnimals.php" class="btn btn-lg btn-danger center-block">Démarrer le jeu</button>
                    </div>
                </article>
            </div>
        </div>
        <?php
        getFooter();
        ?>
    </body>
</html>