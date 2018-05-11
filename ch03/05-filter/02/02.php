<?php
    $val = "neotien200065@gmail.com";

    if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
        echo "$val is not email";
    } else {
        echo "$val is email";
    }
?>