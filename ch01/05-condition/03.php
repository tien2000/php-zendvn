<?php
    $n = -20;
    $num = $n % 2;
    
    if ($n >= 0 && $num == 0) {
        $result = "Nguyên Dương Chẵn";
    }else if ($n >= 0 && $num != 0) {
        $result = "Nguyên Dương Lẻ";
    }else if ($n <= 0 && $num == 0) {
        $result = "Nguyên Âm Chẵn";
    }else if ($n <= 0 && $num != 0) {
        $result = "Nguyên Âm Lẻ";
    }
    echo $result;
?>