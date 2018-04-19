<?php
    $arr = array("HTML", "CSS", "PHP", "JAVASCRIPT");

    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    
    $arr = str_replace("PHP", "WORDPRESS", $arr);

    echo "<pre>";
    print_r($arr);
    echo "</pre>";
?>