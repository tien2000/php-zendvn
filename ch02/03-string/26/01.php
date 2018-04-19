<?php
    $str = "This is a 'Test'";
    $str = "This is a \"Test\"";

    $str = "'This' is a \\Test";
    $str = addslashes($str);        // Hiển thi ký tự \ trong chuỗi
    
    echo $str . "<br>";
?>