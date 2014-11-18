<?php
require_once '../includes/specific_bdd.php';

if (filter_input(INPUT_POST, 'login')) {
    $pseudo = filter_input(INPUT_POST, 'username');
    $pass = filter_input(INPUT_POST, 'password');
    
    userConnect($pseudo, $pass);
}
debug($_SESSION);

?>

<form method="post" action="login_Test.php">
    <label>Pseudo:</label>
    <input name="username" type="text"/> 
    <input name="password" type="password"/>
    <input name="login" type="submit"/>

</form>

