<?php
    $n = -21;
    $num = $n % 2;

    $resultFirst = ($n >= 0) ? "Nguyên Dương" : "Nguyên Âm";
    $resultLast = ($num == 0) ? "Chẵn" : "Lẻ";
    $result = $resultFirst . " " . $resultLast;
    echo $result;
?>