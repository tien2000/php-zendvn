<?php
    require_once "functions.php";

    $fileUpload     = $_FILES['fileUpload'];
    $flagSize       = checkSize($fileUpload['size'], 100 * 1024, 5 * 1024 * 1024);
    $flagExtension  = checkExtension($fileUpload['name'], array('png', 'jpg', 'mp3', 'zip'));

    if ($flagSize == true && $flagExtension == true) {
        $fileName    = randomStr($fileUpload['name'], 7);
        $destination = './images/' . $fileName;
        @move_uploaded_file($fileUpload['tmp_name'], $destination);
    }
?>