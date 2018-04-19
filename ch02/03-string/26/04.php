<?php
    $str = "\This i\s a \Test";
    $str = stripcslashes($str);     // Thêm ký tự \ vào trước giá trị được truyền vào.
    
    echo $str . "<br>";
?>