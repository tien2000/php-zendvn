<?php 
    $format = "d/m/Y H:i:s";
    $date = date_parse_from_format($format, "12/12/12 13:13:13");    
    
    echo "<pre>";
    print_r($date);
    echo "</pre>";

    $timeStamp = mktime($date["hour"], $date["minute"], $date["second"], 
                    $date["month"], $date["day"], $date["year"]);
    echo date($format, $timeStamp);
?>