<?php
    $dir = opendir("images");

    while (($file = readdir($dir)) != false) {
        echo "filename: " . $file . "<br>"; 
    }

    closedir($dir);