<?php
    // Check file size
    function checkSize($size, $min, $max){
        $flag = false;
        if ($size >= $min && $size <= $max) {
            $flag = true;
        }
        return $flag;
    }

    // Check file extention
    function checkExtension($fileName, $arrExtension){
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $flag = false;
        if (in_array(strtolower($ext), $arrExtension) == true) {
            $flag = true;
        }
        return $flag;
    }

    // Random File Name
    function randomStr($fileName, $length = 5){
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $arrChar = array_merge(range("A", "Z"), range("a", "z"), range("0", "9")) ;
        $arrChar = implode($arrChar);
        $arrChar = str_shuffle($arrChar);
        $result = substr($arrChar, 0, $length) . "." . $ext;
        return $result;
    }
?>