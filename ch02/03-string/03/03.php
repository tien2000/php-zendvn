<?php
    function joinStr($str1, $str2, $joinChar = " "){
        $result = $str1 . $joinChar . $str2;
        return $result;
    }

    $result = joinStr("PHP", "is easy", "----");
    echo $result;

?>