<?php 
    $time = time();
    $time = mktime(13,12,12,5,6,1989);

    echo date('d/n/Y - h:i:s A', $time);
?>