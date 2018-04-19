<?php
    $str = "\This i\s \n a \Test";
    echo $str . "<br>";

    $str1 = stripslashes($str);
    echo nl2br($str1) . "<br>";

    $str2 = stripcslashes($str);
    echo nl2br($str2) . "<br>";
?>