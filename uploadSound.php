<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './includes/constantes.php';
require_once './includes/specific_funtions.php';

if (filter_input(INPUT_POST, 'soundUpload')) {
    $dossierSound = realpath('.') . CONTENT_UPLOAD . SOUND_FOLDER;
    $date = date("dmYHis");

    $file = $_FILES['sound']['name'][0];
    print_r($_FILES['sound']);
    $filename = $date . $_SESSION['id'] . '.' . pathinfo($file, PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['sound']['tmp_name'][0], $dossierSound . $filename);
}
?>
<form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="sound[]">
    <input type="submit" name="soundUpload">
</form>