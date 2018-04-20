<?php
    /*
     * 100: Một Trăm
     * 101: Một trăm lẻ một
     * 105: Một trăm lẻ năm
     * 111: Một trăm mười một
     * 121: Một trăm hai mươi mốt
     * 115: Một trăm mười lăm
     * 145: Một trăm bốn mươi lăm
     */

    $arrNum = array(
        0 => "không",
        1 => "một",
        2 => "hai",
        3 => "ba",
        4 => "bốn",
        5 => "năm",
        6 => "sáu",
        7 => "bảy",
        8 => "tám",
        9 => "chín"
    );

    function readNumber3Digit($number = 123, $dictionaryNumber = array(), $readFull = true){
        // Chuyển số thành chuỗi, thêm số 0 vào trước số có ít hơn 3 chữ số.
        $number = strval($number);
        $number = str_pad($number, 3, 0, STR_PAD_LEFT);

        // 01 - Lấy chữ số ở hàng trăm, chục, đơn vị.
        $digit_0 = substr($number, 2, 1);
        $digit_00 = substr($number, 1, 1);
        $digit_000 = substr($number, 0, 1);
        
        // Hàng trăm
        $str_000 = $dictionaryNumber[$digit_000] . " trăm ";

        // Hàng chục
        // 0: linh, 1: mười, 2-9: hai-chín + mươi
        $str_00 = $dictionaryNumber[$digit_00] . " mươi ";
        if ($digit_00 == 0) $str_00 = " lẻ ";
        if ($digit_00 == 1) $str_00 = " mười "; 

        // Hàng đơn vị
        // 1: mốt : $digit_00 > 1
        // 5: lăm : $digit_00 > 0
        $str_0 = $dictionaryNumber[$digit_0];
        if ($digit_00 > 1 && $digit_0 == 1) $str_0 = " mốt ";
        if ($digit_00 > 0 && $digit_0 == 5) $str_0 = " lăm ";
        if ($digit_0 == 0) $str_0 = "";
        if ($digit_00 == 0 && $digit_0 == 0) {
            $str_0 = "";
            $str_00 = "";
        }

        if ($readFull == false) {
            if ($digit_000 == 0) $str_000 = "";
            if ($digit_00 == 0 && $digit_000 == 0) $str_00 = "";
        }
        
        $result = $str_000 . $str_00 . $str_0;
        
        return ucwords($result);
    }

    $number = 315;
    $result = readNumber3Digit($number, $arrNum, false);

    echo "Input: " . $number . "<br>";
    echo "Result: " . $result . "<br>";
?>