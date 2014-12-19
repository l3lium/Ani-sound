<?php
require_once 'includes/specific_funtions.php';
require_once 'includes/struct.php';

if (isConnected()) {
    header('Location: index.php');
}

if (filter_input(INPUT_POST, 'signup')) {
    $valide = true;
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $pseudo = filter_input(INPUT_POST, 'username');
    $pass = filter_input(INPUT_POST, 'password');
    $passConfirm = filter_input(INPUT_POST, 'passwordConfirm');

    if (!$pseudo) {
        $valide = FALSE;
        $erreur = 'Le pseudo n\'est pas valide.';
    } else if (!$email) {
        $valide = FALSE;
        $erreur = 'L\'adresse email n\'est pas valide.';
    } else if (!$pass) {
        $valide = FALSE;
        $erreur = 'Le mot de passe n\'est pas valide.';
    } else if ($pass != $passConfirm) {
        $valide = FALSE;
        $erreur = 'Les mots de passes ne sont pas identiques.';
    }

    if ($valide) {
        createUser($email, $pseudo, $pass);
    }
}
?>
<!DOCTYPE html>
<html lang="en"><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Ani'Sound</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/style.css" rel="stylesheet">
        <script src="./js/ie-emulation-modes-warning.js"></script>
    </head>

    <body>
        <!-- NAVBAR -->
<?php
getHeader();
?>
        <!-- CONTAINER -->
        <div class="container">
            <div class="center-block">
                <?php if (isset($valide) && $valide) { 
                    header( "refresh:5;url=index.php" ); ?>
                    <div class="alert alert-success" role="alert">
                        <p>Votre inscription a été effectué avec succès. <i>Vous allez être redirigé vers l'accueil automatiquement.</i></p>
                    </div>
                <?php } else { ?>
                <!-- CONTAINER LOGIN -->
                <form class="form-signin" method="post" action="">
                    <h3>Remplir les champs suivants</h3><hr/>
                    <label class="">Pseudo:</label><input class="form-control" name="username" type="text" value="<?php if (isset($valide) && !$valide) {echo $pseudo;} ?>" placeholder="ex : ''Johndoe''"/><br/>
                    <label>Email:</label><input class="form-control" name="email" type="text" value="<?php if (isset($valide) && !$valide) {echo $email;} ?>" placeholder="ex : ''john.doe@placeholder.com''"/><br/> 
                    <label>Password :</label><input class="form-control" name="password" type="password"/><br/>
                    <label>Password confirm :</label><input class="form-control" name="passwordConfirm" type="password"/><br/>
                    <?php
                        if (isset($valide) && !$valide){
                            echo '<p class="alert alert-danger" role="alert">' . $erreur . '</p>';
                        }
                    ?>
                    <input name="signup" class="btn btn-lg btn-primary btn-block" type="submit" value="S'inscrire"/>
                </form>
                <?php }?>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>