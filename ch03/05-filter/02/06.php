<?php
    $val = "http://zendvn.com";

    if (!filter_var($val, FILTER_VALIDATE_URL)) {
        echo "$val is not url";
    } else {
        echo "$val is url";
    }
?>