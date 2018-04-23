<?php 
    $timeStamp = strtotime("now");
    $timeStamp = strtotime("30 May 2018");
    $timeStamp = strtotime("Next Sunday");
    $timeStamp = strtotime("12-12-2018");
    $timeStamp = strtotime("13/12/2018");       // Not Working!!!

    echo date("d-m-Y", $timeStamp)
?>