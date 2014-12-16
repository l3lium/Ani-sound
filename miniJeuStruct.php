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
                        <div id="game" class="row">
                            <div id="draganddrop" class="center-block" ondragover="allowDrop(event)" ondrop="drop(event)"></div>
                            <hr/>
                            <div id="animal1" class="col-sm-4 animal" draggable="true" ondragstart="drag(event)">
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <img class="img-thumbnail center-block img-animal" alt="thumbnail" src="up-content/img/animal/cheval.jpg" data-holder-rendered="true" style="width: 200px; height: 200px;">
                                        <audio>
                                            <source src="up-content/sound/animal/cheval.mp3" type="audio/mpeg">
                                            Votre navigateur n'est pas compatible.
                                        </audio>    
                                    </div>
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Cheval</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="animal2" class="col-sm-4 animal" draggable="true" ondragstart="drag(event)">
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <img class="img-thumbnail center-block img-animal" alt="thumbnail" src="up-content/img/animal/cheval.jpg" data-holder-rendered="true" style="width: 200px; height: 200px;">
                                        <audio>
                                            <source src="up-content/sound/animal/cheval.mp3" type="audio/mpeg">
                                            Votre navigateur n'est pas compatible.
                                        </audio>    
                                    </div>
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Cheval</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="animal3" class="col-sm-4 animal" draggable="true" ondragstart="drag(event)">
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <img class="img-thumbnail center-block img-animal" alt="thumbnail" src="up-content/img/animal/cheval.jpg" data-holder-rendered="true" style="width: 200px; height: 200px;">
                                        <audio>
                                            <source src="up-content/sound/animal/cheval.mp3" type="audio/mpeg">
                                            Votre navigateur n'est pas compatible.
                                        </audio>    
                                    </div>
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Cheval</h3>
                                    </div>
                                </div>
                            </div>
                            <button id="showmore" type="button" data-url="includes/structure/content_animals.php" class="btn btn-lg btn-success center-block">Rejouer le son  <span class="glyphicon glyphicon-repeat"></span></button>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <?php
        getFooter();
        ?>
    </body>
</html>