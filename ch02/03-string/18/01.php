<?php
    $str = "name=NeoTien&age=28";

    parse_str($str);

    echo $name . "<br>";
    echo $age . "<br>";
?>