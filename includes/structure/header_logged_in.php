<!-- NAVBAR & LOGGED IN USER-->
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Ani'Sound</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Acceuil</a></li>
                <li><a href="miniJeu.php">Mini-jeux</a></li>
            </ul>
            <form class="navbar-form navbar-right" role="form">
                <ul class="nav nav-pills" role="tablist">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i>Username </i><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="btn btn-link" href="addAnimal.php">Proposer un animal <span class="glyphicon glyphicon-plus-sign"></span></a></li>
                            <li><a class="btn btn-link" href="logout.php">Se deconnecter <span class="glyphicon glyphicon-lock"></span></a></li>
                        </ul>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</nav>