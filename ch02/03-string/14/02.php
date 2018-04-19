<?php
    $str = "yellow|pink|blue";

    echo $str;

    $arr = explode("|", $str);      // Chuyển mảng thành chuỗi

    echo "<pre>";
    print_r($arr);
    echo "</pre>";
?>