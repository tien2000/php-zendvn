<?php
    $val = "127.0.0.1";

    if (!filter_var($val, FILTER_VALIDATE_IP)) {
        echo "$val is not ip";
    } else {
        echo "$val is ip";
    }
?>