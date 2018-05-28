<?php
    require_once 'Mobile_Detect.php';

    $detect = new Mobile_Detect();

    // Any Mobile device (phone or tablet)
    // if ($detect->isMobile()) {
    //     echo 'Phone' . "<br>";
    // } else {
    //     echo 'PC' . "<br>";
    // }

    // if ($detect->isTablet()) {
    //     echo 'Tablet' . "<br>";
    // } else {
    //     echo 'Laptop' . "<br>";
    // }

    $device = ($detect->isMobile()) ? ($detect->isTablet() ? 'Tablet' : "Mobile") : "PC" ;

    if ($device == 'Tablet') {
        // Load Tablet Template
    } else if ($device == 'Mobile') {
        // Load Mobile Template
    } else {
        // Load PC Template
    }

    echo $device;

    if ($detect->isiOS()) {
        echo 'iOS device';
    }

    if ($detect->isAndroidOS()) {
        echo 'AndroidOS device';
    }

    // echo "<pre>";
    // print_r($detect);
    // echo "</pre>";
?>