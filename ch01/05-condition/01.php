<?php
    $n = 20;
    if ($n % 2 == 0) {
        $result = "Số Chẵn";
    }

    $result = ($n % 2 == 0) ? "Số Chẵn" : "";
    echo $result;
?>