<?php
require_once './includes/specific_bdd.php';

if (filter_input(INPUT_POST, 'login')) {
    $pseudo = filter_input(INPUT_POST, 'username');
    $pass = filter_input(INPUT_POST, 'password');
    
    debug(userConnect($pseudo, $pass));
}