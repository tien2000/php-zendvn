<?php
    $config = ini_get_all();
    
    $timeZone = ini_get("date.timezone");
    echo $timeZone . "<br>";

    ini_set("date.timezone", "Asia/Ho_Chi_Minh");

    $timeZone = ini_get("date.timezone");
    echo $timeZone;

    // echo "<pre>";
    // print_r($config);
    // echo "</pre>";

?>