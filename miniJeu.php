<?php
require_once 'includes/specific_funtions.php';
require_once 'includes/struct.php';

//Connexion utilisateur
if (filter_input(INPUT_POST, 'login')) {
    $pseudo = filter_input(INPUT_POST, 'username');
    $pass = filter_input(INPUT_POST, 'password');

    userConnect($pseudo, $pass);
}
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
                        <div id="instructions">
                            <h2>Instructions</h2><hr/>
                            <p>
                                Pour jouer au jeu, appuyez sur le bouton rouge. Soyez sur d'avoir une source audio a disposition.
                                Puis, écoutez le cri de l'animal, cliquez ensuite sur l'animal auquel le cri appartient.
                                Si le cri correspond bien à l'animal choisi, le jeu vous affichera une confirmation, sinon un
                                écran "Game Over" vous donnera la possibilité de rejouer
                            </p><br>
                            <button id="startGame" type="button" data-url="includes/structure/allAnimals.php" class="btn btn-lg btn-danger center-block">Démarrer le jeu</button>
                        </div>
                        <div id="game">
                            <audio>

                            </audio>
                            <div id="victory" class="alert-success">
                                <h1>Bravo les copains !</h1>
                                <button type="button" data-url="includes/structure/content_animals.php" class="btn btn-lg btn-warning center-block replay">Rejouer  <span class="glyphicon glyphicon-refresh"></span></button>
                            </div>
                            <div id="defeat" class="alert-danger">
                                <h1>Perdu les amis !</h1>
                                <button type="button" data-url="includes/structure/content_animals.php" class="btn btn-lg btn-warning center-block replay">Rejouer  <span class="glyphicon glyphicon-refresh"></span></button>
                            </div>
                            <h2>Déposez un animal dans le cadre</h2>
                            <div class="panel-body" id="dropzone" class="row">

                            </div>
                            <button id="replaySound" type="button" data-url="includes/structure/content_animals.php" class="btn btn-lg btn-success center-block">Rejouer le son  <span class="glyphicon glyphicon-repeat"></span></button>
                            <div id="animals" class="row">
                            </div>
                        </div>
                    </div>
            </div>
        </article>
    </div>
    <?php
    getFooter();
    ?>
</div>

</body>
</html>