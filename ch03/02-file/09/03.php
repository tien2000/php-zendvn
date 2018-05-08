<?php    
    $path = "abc/ghi";

    if (file_exists($path) == false) {
        mkdir($path, 0666);
    }

    // echo fileperms($path);
    chmod($path, 555);
    echo substr(sprintf('%o', fileperms($path)), -4);
?>