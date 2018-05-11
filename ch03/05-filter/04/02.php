<?php
    $val = "image.zip";

    // jpg|png|gif
    $options = array(
        'options' => array('regexp' => '#\.(jpg|png|gif)$#misU')
    );

    if (!filter_var($val, FILTER_VALIDATE_REGEXP, $options)) {
        echo $val . " Không đúng định dạng";
    } else {
        echo $val . " Đúng định dạng";
    }