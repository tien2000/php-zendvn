<?php 
    $n = "02,000,000";

    $n = str_replace(",", "", $n);

    $result = (is_numeric($n)) ? "Number" : "Not Number";

    echo $result;
?>