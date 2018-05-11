<?php
    $val = 23.21;
    if (!filter_var($val, FILTER_VALIDATE_FLOAT)) {
        echo "$val is not float";
    } else {
        echo "$val is float";
    }
?>