<?php
    $str = "NeoTien is me";
    echo "Input: " . $str . " - length: " . strlen($str) . "<br>";

    $str = rtrim($str, "me");

    echo "Output: " . $str . " - length: " . strlen($str) . "<br>";
?>