<?php
    $source = "files/abc.txt";
    $dest   = "result.txt";

    echo $result = (copy($source, $dest)) ? "Success" : "Fail" ;
?>