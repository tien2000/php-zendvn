<?php
    require_once "functions.php";
    $configs = parse_ini_file('config.ini');

    $fileUpload     = $_FILES['fileUpload'];

    foreach ($fileUpload['name'] as $key => $value) {
        if ($value != null) {
            $flagSize    = checkSize($fileUpload['size'][$key], $configs['min_size'], $configs['max_size']);
            $flagExtension  = checkExtension($value, explode("|", $configs['extension']));
            if ($flagSize == true && $flagExtension == true) {
                $fileName    = randomStr($value, 7);
                $destination = './images/' . $fileName;
                @move_uploaded_file($fileUpload['tmp_name'][$key], $destination);
            }
        }
    }  
?>