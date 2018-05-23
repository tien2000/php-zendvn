<?php
    require_once "functions.php";
    $configs = parse_ini_file('config.ini');

    $fileUpload     = $_FILES['fileUpload'];
    $flagSize       = checkSize($fileUpload['size'], $configs['min_size'], $configs['max_size']);
    $flagExtension  = checkExtension($fileUpload['name'], explode("|", $configs['extension']));
    $fileName    = randomStr($fileUpload['name'], 7);

    if ($flagSize == true && $flagExtension == true) {        
        $destination = './images/' . $fileName;
        @move_uploaded_file($fileUpload['tmp_name'], $destination);
    }
?>