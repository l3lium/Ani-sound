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
        <script>
            function allowDrop(ev) {
                ev.preventDefault();
            }

            function drag(ev) {
                ev.dataTransfer.setData("text", ev.target.id);
            }

            function drop(ev) {
                ev.preventDefault();
                var data = ev.dataTransfer.getData("text");
                ev.target.appendChild(document.getElementById(data));
            }
        </script>
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
                        <div id="game">
                            <div id="victory" class="alert-success">
                                <h1>Bravo les copains !</h1>
                                <button type="button" data-url="includes/structure/content_animals.php" class="btn btn-lg btn-warning center-block">Rejouer  <span class="glyphicon glyphicon-refresh"></span></button>
                            </div>
                            <div id="defeat" class="alert-danger">
                                <h1>Perdu les amis !</h1>
                                <button type="button" data-url="includes/structure/content_animals.php" class="btn btn-lg btn-warning center-block">Rejouer  <span class="glyphicon glyphicon-refresh"></span></button>
                            </div>
                            <div id="draganddrop" ondragover="allowDrop(event)" ondrop="drop(event)">
                                <h2>Déposer ici</h2>
                            </div>
                            <button id="replaySound" type="button" data-url="includes/structure/content_animals.php" class="btn btn-lg btn-success center-block">Rejouer le son  <span class="glyphicon glyphicon-repeat"></span></button>
                            <div id="animals" class="row" ondragover="allowDrop(event)" ondrop="drop(event)">
                                <div id="animal1" class="col-sm-4 animal" draggable="true" ondragstart="drag(event)">
                                    <div class="panel panel-success">
                                        <div class="panel-body">
                                            <img class="img-thumbnail center-block img-animal" alt="thumbnail" src="up-content/img/animal/cheval.jpg" data-holder-rendered="true" style="width: 200px; height: 200px;">  
                                        </div>
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Cheval</h3>
                                        </div>
                                    </div>
                                </div>
                                <div id="animal2" class="col-sm-4 animal" draggable="true" ondragstart="drag(event)">
                                    <div class="panel panel-success">
                                        <div class="panel-body">
                                            <img class="img-thumbnail center-block img-animal" alt="thumbnail" src="up-content/img/animal/seal.jpg" data-holder-rendered="true" style="width: 200px; height: 200px;">   
                                        </div>
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Phoque</h3>
                                        </div>
                                    </div>
                                </div>
                                <div id="animal3" class="col-sm-4 animal" draggable="true" ondragstart="drag(event)">
                                    <div class="panel panel-success">
                                        <div class="panel-body">
                                            <img class="img-thumbnail center-block img-animal" alt="thumbnail" src="up-content/img/animal/loutre.jpg" data-holder-rendered="true" style="width: 200px; height: 200px;">   
                                        </div>
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Loutre</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </body>
</html>