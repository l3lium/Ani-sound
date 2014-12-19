<?php
require_once './includes/constantes.php';
require_once './includes/specific_funtions.php';

if (filter_input(INPUT_POST, 'soundUpload')) {
    $dossierSound = realpath('.') . '/' . CONTENT_UPLOAD . SOUND_FOLDER;
    debug($_FILES);

    $file = $_FILES['sound']['name'];
    $filename = uniqid($_SESSION['id']) . '.' . pathinfo($file, PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['sound']['tmp_name'], $dossierSound . $filename);
    echo '<input type="hidden" name="srcSound" value="' . CONTENT_UPLOAD . SOUND_FOLDER . $filename . '">';
}
?>