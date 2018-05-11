<?php
    $variable = 13;

    function checkNumber($number){
        $flag = false;
        if ($number % 2 == 0) $flag = true;
        return $flag;
    }

    if (!filter_var($variable, FILTER_CALLBACK, array("options" => "checkNumber"))) {
        echo "Số lẻ";
    } else {
        echo "Số chẵn";
    }
    