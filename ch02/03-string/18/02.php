<?php
    $str = "name=NeoTien&age=28";

    parse_str($str, $arr);
    
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
?>