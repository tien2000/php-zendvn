<?php
    $str = "This is a Test";
    $str = addcslashes($str, "Tt");     // Thêm ký tự \ vào trước giá trị được truyền vào.
    
    echo $str . "<br>";
?>