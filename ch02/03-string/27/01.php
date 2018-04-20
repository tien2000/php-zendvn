<?php
    $str = "<strong>NeoTien</strong> is Me";

    echo "Input: " . $str . "<br>";

    $str = htmlspecialchars($str);  // Chuyển đổi ký tự đặc biệt thành html entity.

    echo "Output: " . $str . "<br>";
?>