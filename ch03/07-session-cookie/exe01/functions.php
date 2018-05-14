<?php
    // Check Empty
    function checkEmpty($val){
        $flag = false;
        if (!isset($val) || trim($val) == "") {
            $flag = true;
        }
        return $flag;
    }

    // Check Length
    function checkLength($val, $min, $max){
        $flag = false;
        $length = strlen($val);
        if ($length <= $min || $length >= $max) {
            $flag = true;
        }
        return $flag;
    }

    function randomStr($length = 5){
        $arrChar = array_merge(range("A", "Z"), range("a", "z"), range("0", "9")) ;
        $arrChar = implode($arrChar);
        $arrChar = str_shuffle($arrChar);
        $result = substr($arrChar, 0, $length);
        return $result;
    }

    // Size
    function convertSize($size, $totalDigits = 2, $ditance = " "){
        $units = array("B", "KB", "MB", "GB", "TB");

        for ($i = 0; $i < count($units); $i++) { 
            if ($size > 1024) {
                $size = $size / 1024;
            }else {
                $unit = $units[$i];
                break;
            }
        }

        $result = round($size, $totalDigits) . $ditance . $unit;
        return $result;
    }
?>
