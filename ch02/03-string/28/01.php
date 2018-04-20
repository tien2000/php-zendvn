<?php
    $str = "<strong>NeoTien</strong> is Me";
    $str1 = "<script>alert('Website bị tấn công');</script>";

    echo "Input: " . $str . "<br>";

    echo "Output: " . strip_tags($str) . "<br>";     // Loại bỏ các thẻ HTML, JS ra khỏi chuỗi.
    echo "Output: " . strip_tags($str1);     // Loại bỏ các thẻ HTML, JS ra khỏi chuỗi.
?>