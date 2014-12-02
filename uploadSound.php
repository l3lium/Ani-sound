<?php
require_once './includes/constantes.php';
require_once './includes/specific_funtions.php';

if (filter_input(INPUT_POST, 'soundUpload')) {
    $dossierSound = realpath('.') . '/' . CONTENT_UPLOAD . SOUND_FOLDER;
    debug($_FILES);
    $date = date("dmYHis");
    echo $_FILES['sound']['tmp_name'];

    $file = $_FILES['sound']['name'];
    $filename = $date . $_SESSION['id'] . '.' . pathinfo($file, PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['sound']['tmp_name'], $dossierSound . $filename);

    echo '<input type="hidden" name="srcSound" value="' . CONTENT_UPLOAD . SOUND_FOLDER . $filename . '">';
}
?>
<form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="sound">
    <input type="submit" name="soundUpload">
</form>