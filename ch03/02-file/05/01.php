<?php
    $fileName = "files/test.txt";
    $data     = "DEF";
    echo file_put_contents($fileName, $data, FILE_APPEND);
?>