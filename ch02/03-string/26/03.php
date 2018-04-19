<?php
    $str = "'This' is a \\Test";
    $str = stripslashes($str);      // Bỏ ký tự \ ra khỏi chuỗi.
    
    echo $str . "<br>";
?>