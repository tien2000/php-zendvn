<?php
    $str = "   NeoTien     is    me          ";
    echo "Input: " . $str . " - length: " . strlen($str) . "<br>";

    // Khoảng trắng thừa trái phải
    $str = trim($str);

    // Khoảng trắng giữa các từ
    $arr = explode(" ", $str);

    echo "<pre>";
    print_r($arr);
    echo "</pre>";

    foreach ($arr as $key => $value) {
        if (trim($value) == null) unset($arr[$key]);
    }

    echo "<pre>";
    print_r($arr);
    echo "</pre>";

    $str = implode(" ", $arr);

    echo "Output: " . $str . " - length: " . strlen($str) . "<br>";
?>