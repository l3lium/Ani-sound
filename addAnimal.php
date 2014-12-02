<?php
require_once 'includes/specific_funtions.php';
require_once 'includes/struct.php';

//Connexion utilisateur
if (!isConnected()) {
    header("location: index.php");
};
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
        <script src="./js/ie-emulation-modes-warning.js"></script>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/ie10-viewport-bug-workaround.js"></script>
        <script src="./js/query_animals.js"></script>
    </head>

    <body>
        <?php
        getHeader();
        ?>
        <!-- CONTAINER -->
        <div class="container">
            <div class="center-block">
                <!-- CONTAINER LOGIN -->
                <form class="form-signin" method="post" action="signup_test.php">
                    <h3>Proposer un Animal</h3>
                    <label class="">Nom de l'animal:</label><input class="form-control" name="username" type="text" placeholder="ex : ''Vache''"/><br/>
                    <div>
                        <label>Image:</label><input type="file" class="form-inline" name="image" type="text" placeholder="ex : ''john.doe@placeholder.com''"/><br/> 
                    </div>
                    <label>Son :</label><input type="file" class="form-inline" name="sound" type="password"/><br/>
                    <button name="sendanimal" class="btn btn-lg btn-success btn-block" type="submit">Envoyer</button>
                </form>
            </div>
        </div>
    </body>
</html>