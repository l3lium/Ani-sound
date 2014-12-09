<?php

require_once 'includes/basics_bdd.php';
header("Content-Type: application/json");
echo json_encode(getAllFields("animal"));