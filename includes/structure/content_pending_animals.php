<?php
require_once '../crud_Animal.php';
require_once '../specific_funtions.php';
require_once '../struct.php';

$_SESSION["offset"] = $_SESSION["offset"] + 1;


$page=$_SESSION["offset"];

echo structPageRequestAnimals($page);