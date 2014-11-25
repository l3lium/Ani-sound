<!-- NAVBAR & LOGIN, SIGNUP-->
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="maquette.html">Ani'Sound</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
            <ul class="nav navbar-nav">
                <li class="active"><a href="maquette.html">Acceuil</a></li>
                <li><a href="#game">Mini-jeux</a></li>
            </ul>
            <form action="index.php" method="post" class="navbar-form navbar-right" role="form">
                <div class="form-group">
                    <input name="username" type="text" placeholder="Username" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Mot-de-passe" class="form-control">
                </div>
                <button name="login" type="submit" class="btn btn-success">Se connecter  <span class="glyphicon glyphicon-lock"></span></button>
                <a class="btn btn-primary" href="signup.php">S'enregistrer <span class="glyphicon glyphicon-user"></span></a>
            </form>
        </div>
    </div>
</nav>