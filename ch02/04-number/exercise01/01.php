<?php
    require_once "fractions.php";
    
    $fractions = "52/6";

    $result = optimizeFractions($fractions);
    $result = implode("/", $result);

    echo $result;
?>