<?php
    $str = "This is a Test";

    $result = substr_count($str, "is");    
    $result = substr_count($str, "is", 2);
    
    echo $result;
?>