<?php
require_once 'includes/specific_funtions.php';
require_once 'includes/struct.php';

//Connexion utilisateur
if (!isConnected()) {
    header("location: index.php");
}

if (filter_input(INPUT_POST, 'sendAnimal')) {
    $erreur = '';
    if (filter_input(INPUT_POST, 'username')) {
        $name = filter_input(INPUT_POST, 'username');
    } else {
        $erreur = 'Veuillez indiquer un nom d\'animal';
    }

    if (/* !empty($_FILES['imgUp']) && */ $_FILES['imgUp']['size'] > 0 /* && empty($erreur) */) {
        if (!checkImageType($_FILES['imgUp']['type'])) {
            $erreur = 'L\'image n\'est pas valide (formats valides: png/jpeg/gif)';
        } else if ($_FILES['imgUp']['size'] > 4194304) {
            $erreur = 'La taille de l\'image ne doit pas dépasser 4Mo';
        }
        $dossierImg = CONTENT_UPLOAD . IMG_FOLDER;
        $file = $_FILES['imgUp']['name'];
        $imgFilename = uniqid($_SESSION['id']) . '.' . pathinfo($file, PATHINFO_EXTENSION);
        $imgPath = $dossierImg . $imgFilename;
    } else if (empty($erreur)) {
        $erreur = 'Veuillez choisir une image valide';
    }

    if ($_FILES['soundUp']['size'] > 0 && empty($erreur)) {
        $dossierSound = CONTENT_UPLOAD . SOUND_FOLDER;
        if (!checkSoundType($_FILES['soundUp']['type'])) {
            $erreur = 'Le fichier audio n\'est pas valide (formats valides: mp3/wav)';
        } else if ($_FILES['soundUp']['size'] > 4194304) {
            $erreur = 'La taille du fichier audio ne doit pas dépasser 4Mo';
        }

        $file = $_FILES['soundUp']['name'];
        $soundFilename = uniqid($_SESSION['id']) . '.' . pathinfo($file, PATHINFO_EXTENSION);
        $soundPath = $dossierSound . $soundFilename;
    } else if (empty($erreur)) {
        $erreur = 'Veuillez choisir un son valide';
    }

    if (empty($erreur)) {
        if (move_uploaded_file($_FILES ['imgUp']['tmp_name'], realpath('.') . '/' . $imgPath) &&
                move_uploaded_file($_FILES ['soundUp']['tmp_name'], realpath('.') . '/' . $soundPath)) {
            if (isAdmin()) {
                addAnimal($name, $imgPath, $soundPath, FALSE);
            } else {
                addAnimal($name, $imgPath, $soundPath);
            }
        } else {
            $erreur = 'Une erreur est survenue';
        }
    }
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
                <?php if (empty($erreur) && isset($erreur)) { 
                    header( "refresh:5;url=index.php" ); ?>
                    <div class="alert alert-success" role="alert">
                        <p>Votre animal à été ajouté avec succès. <i>Vous allez être redirigé vers l'accueil automatiquement.</i></p>
                        
                    </div>
                <?php } else { ?>
                    <!-- FORM ADDANIMAL -->
                    <form class="form-signin" method="post" action="" enctype="multipart/form-data">
                        <h3>Proposer un Animal</h3>
                        <label class="">Nom de l'animal:</label><input class="form-control" name="username" type="text" value="<?php
                        if (isset($erreur)) {
                            echo $name;
                        }
                        ?>" placeholder="ex : ''Vache''"/><br/>
                        <div>
                            <label>Image:</label><input type="file" class="form-inline" name="imgUp" type="text"/><br/> 
                        </div>
                        <div>
                            <label>Son :</label><input type="file" class="form-inline" name="soundUp" type="password"/><br/>
                        </div>
                        <?php
                        if (!empty($erreur)) {
                            echo '<p class="alert alert-danger" role="alert">' . $erreur . '</p>';
                        }
                        ?>
                        <input type="submit" name="sendAnimal" class="btn btn-lg btn-success btn-block" value="Envoyer">
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </body>
</html>