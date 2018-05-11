<?php
    $val = 23;

    $int_options = array("options" => array("min_range" => 5, "max_range" => 30));

    if (!filter_var($val, FILTER_VALIDATE_INT, $int_options)) {
        echo "$val is not int";
    } else {
        echo "$val is int";
    }
?>