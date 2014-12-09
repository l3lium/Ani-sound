<?php
require_once 'includes/specific_funtions.php';
require_once 'includes/struct.php';

$erreur='';
//Connexion utilisateur
if (!isConnected()) {
    header("location: index.php");
}

debug($_FILES);
if (filter_input(INPUT_POST, 'imgUp')) {
    $dossierSound = realpath('.') .'/'. CONTENT_UPLOAD . IMG_FOLDER;
    debug($_FILES['imgUp']);
    $file = $_FILES['imgUp']['name'];
    $filename = uniqid($_SESSION['id']) . '.' . pathinfo($file, PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['imgUp']['tmp_name'], $dossierSound . $filename);
    
    echo '<input type="hidden" name="srcImg" value="' . CONTENT_UPLOAD . IMG_FOLDER . $filename . '">';
}

if (filter_input(INPUT_POST, 'soundUp')) {
    $dossierSound = realpath('.') . '/' . CONTENT_UPLOAD . SOUND_FOLDER;
    debug($_FILES['soundUp']);

    $file = $_FILES['soundUp']['name'];
    $filename = uniqid($_SESSION['id']) . '.' . pathinfo($file, PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['soundUp']['tmp_name'], $dossierSound . $filename);
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
        <title>Ani'Sound</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/style.css" rel="stylesheet">
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
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
                <form class="form-signin" method="post" action="" enctype="multipart/form-data">
                    <h3>Proposer un Animal</h3>
                    <label class="">Nom de l'animal:</label><input class="form-control" name="username" type="text" placeholder="ex : ''Vache''"/><br/>
                    <div>
                        <label>Image:</label><input type="file" class="form-inline" name="imgUp" type="text"/><br/> 
                    </div>
                    <div>
                        <label>Son :</label><input type="file" class="form-inline" name="soundUp" type="password"/><br/>
                    </div>
                    <!--<label>Aperçu :</label>
                    <div id="animal-container">             
                        <div id="preview-animal">
                            <article class="">
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <img class="img-thumbnail center-block img-animal" alt="" src="" data-holder-rendered="true" style="width: 200px; height: 200px;">
                                        <audio>
                                            <source src="" type="audio/mpeg" />
                                            Votre navigateur n\'est pas compatible.
                                        </audio>    
                                    </div>
                                    <div class="panel-heading">
                                        <h3 class="panel-title"></h3>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>-->
                    <button name="sendanimal" class="btn btn-lg btn-success btn-block" type="submit">Envoyer</button>
                </form>
            </div>
        </div>
    </body>
</html>