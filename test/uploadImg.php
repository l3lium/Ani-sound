<?php
require_once './includes/constantes.php';
require_once './includes/specific_funtions.php';

if (filter_input(INPUT_POST, 'imgUpload')) {
    $dossierSound = realpath('.') .'/'. CONTENT_UPLOAD . IMG_FOLDER;

    $file = $_FILES['sound']['name'];
    $filename = uniqid($_SESSION['id']) . '.' . pathinfo($file, PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['sound']['tmp_name'], $dossierSound . $filename);
    
    echo '<input type="hidden" name="srcImg" value="' . CONTENT_UPLOAD . IMG_FOLDER . $filename . '">';
}
?>
