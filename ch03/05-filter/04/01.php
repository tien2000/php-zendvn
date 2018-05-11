<?php
    $val = "084-08-34.546786";
    $options = array(
        'options' => array('regexp' => '#^084-[0-9]{2}-[0-9]{2}\.[0-9]{6}$#misU')
    );

    if (!filter_var($val, FILTER_VALIDATE_REGEXP, $options)) {
        echo $val . " Không phải số phone";
    } else {
        echo $val . " Là số phone";
    }