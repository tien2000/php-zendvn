<?php
    $n = 20;
    if ($n % 2 == 0) {
        $result = "Số Chẵn";
    } else{
        $result = "Số lẻ";
    }

    $result = ($n % 2 == 0) ? "Số Chẵn" : "Số lẻ";
    echo $result;
?>