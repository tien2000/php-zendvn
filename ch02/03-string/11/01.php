<?php
    $str = "NeoTien is me           ";
    echo "Input: " . $str . " - length: " . strlen($str) . "<br>";

    $str = rtrim($str);

    echo "Output: " . $str . " - length: " . strlen($str) . "<br>";
?>