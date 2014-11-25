<?php
require_once 'includes/specific_bdd.php';
require_once 'includes/struct.php';

if (isConnected()) {
    header('Location: index.php');
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
                <!-- CONTAINER LOGIN -->
                <form class="form-signin" method="post" action="signup_test.php">
                    <h3>Remplir les champs suivants</h3><hr/>
                    <label class="">Pseudo:</label><input class="form-control" name="username" type="text" placeholder="ex : ''Johndoe''"/><br/>
                    <label>Email:</label><input class="form-control" name="email" type="text" placeholder="ex : ''john.doe@placeholder.com''"/><br/> 
                    <label>Password :</label><input class="form-control" name="password" type="password"/><br/>
                    <label>Password confirm :</label><input class="form-control" name="passwordConfirm" type="password"/><br/>
                    <button name="signup" class="btn btn-lg btn-primary btn-block" type="submit">S'inscrire</button>
                </form>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/ie10-viewport-bug-workaround.js"></script>
    </body>
    <?php
    getFooter();
    ?>
</html>