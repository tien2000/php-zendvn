<?php
    $x = "on";  // 1, true, on

    filter_var($x, FILTER_VALIDATE_BOOLEAN);

    if (!filter_var($x, FILTER_VALIDATE_BOOLEAN)) {
        echo "$x Not Boolean";
    } else{
        echo "$x Is Boolean";
    }
?>