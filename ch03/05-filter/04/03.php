<?php
    $val = "imagezip";

    // jpg|png|gif
    $options = array(
        'options' => array('regexp' => '#^[A-Za-z0-9]+$#misU')
    );

    if (!filter_var($val, FILTER_VALIDATE_REGEXP, $options)) {
        echo $val . " Không phải chữ và số";
    } else {
        echo $val . " Chữ và số";
    }