<?php
require_once '../basics_bdd.php';
header("Content-Type: application/json");
echo json_encode(getAllFields("animal"));