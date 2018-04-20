<?php
    $str = "&lt;strong&gt;NeoTien&lt;/strong&gt; is Me<br>";

    echo "Input: " . $str . "<br>";

    $str = htmlspecialchars_decode($str);    // Ngược lại với htmlspecialchars

    echo "Output: " . $str . "<br>";
?>