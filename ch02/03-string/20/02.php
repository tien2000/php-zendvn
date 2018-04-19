<?php
    $str1 = "NeoTien is me not";
    $str2 = "NeoTien is me";

    // $str1 = "NeoTien is me";
    // $str2 = "NeoTien is me not";

    // $str1 = "NeoTien is me";
    // $str2 = "NeoTien is me";

    // $str1 = "NeoTien is me";
    // $str2 = "NeoTien is Me";

    echo $result = substr_compare($str1, $str2, 0, 3);
?>