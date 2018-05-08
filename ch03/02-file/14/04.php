<?php
    $dir = dir("images");
    $dir = dir(".");

    while (($file = $dir->read()) != false) {
        echo "filename: " . $file . "<br>";
    }