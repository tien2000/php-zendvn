<?php
    $arr = array("yellow", "pink", "blue");
    
    echo "<pre>";
    print_r($arr);
    echo "</pre>";

    $str = implode("+", $arr);      // Chuyển mảng thành chuỗi

    echo $str;
?>