<?php
    $variable = "Tien LS";

    function convertString($str){
        $str = str_replace(" ", "_", $str);
        return $str;
    }

    echo filter_var($variable, FILTER_CALLBACK, array("options" => "convertString"));