<?php
    $str = "NeoTien is me";
    echo "Input: " . $str . " - length: " . strlen($str) . "<br>";

    $str = ltrim($str, "NeoTien");

    echo "Output: " . $str . " - length: " . strlen($str) . "<br>";
?>