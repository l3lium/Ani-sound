<?php
require_once 'includes/specific_funtions.php';
require_once 'includes/struct.php';
require_once 'includes/crud_Animal.php';

//Connexion utilisateur
if (filter_input(INPUT_POST, 'login')) {
    $pseudo = filter_input(INPUT_POST, 'username');
    $pass = filter_input(INPUT_POST, 'password');

    userConnect($pseudo, $pass);
}

if ($id = filter_input(INPUT_GET, 'delete')) {
    deleteAnimalById($id);
}

if ($id = filter_input(INPUT_GET, 'update')) {
    validateAnimal($id);
}

//Si l'offset n'existe pas, on l'initialise (pagination)
$_SESSION["offset"] = 0;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Ani'Sound</title>
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
    </head>

    <body>
        <?php
        getHeader();
        ?>
        <!-- CONTAINER -->
        <div class="container">
            <div class="center-block">
                <!-- CONTAINER PANELS ANIMAUX -->
                <div id="animal-container" class="row">
                    <?php
                    $page = $_SESSION["offset"];

                    echo structPageRequestAnimals($page);
                    ?>
                </div>
                <button id="showmore" type="button" data-url="includes/structure/content_pending_animals.php" class="btn btn-lg btn-info center-block">Afficher Plus<span class="glyphicon glyphicon-chevron-down"></span></button>
            </div>
        </div>
    </body>
</html>