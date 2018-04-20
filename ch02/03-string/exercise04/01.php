<?php

    $dictionaryNumbers = array(
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

    $dictionaryUnits = array(
        0 => "tỷ",
        1 => "triệu",
        2 => "nghìn",
        3 => "đồng",
    );

    function formatStr($str, $type = null){
        // Chuyển thành chữ thường.
        $str = strtolower($str);

        // Loại bỏ khoảng trắng left | right.
        $str = trim($str);

        
        $arr = explode(" ", $str);

        foreach ($arr as $key => $value) {
            // Loại bỏ khoẳng trắng thừa giữa các từ.
            if(trim($value) == null) {
                unset ($arr[$key]);
                continue;
            }
            
            // Xử lý danh từ
            if ($type == "danh-tu") {
                $arr[$key] = ucfirst($value);
            }
        }

        $str = implode(" ", $arr);

        // Chuyển ký tự đầu tiên thành chữ HOA.
        $str = ucfirst($str);
        
        return $str;
    }

    function readNumber3Digit($number = 123, $dictionaryNumbers = array(), $readFull = true){
        // Chuyển số thành chuỗi, thêm số 0 vào trước số có ít hơn 3 chữ số.
        $number = strval($number);
        $number = str_pad($number, 3, 0, STR_PAD_LEFT);

        // 01 - Lấy chữ số ở hàng trăm, chục, đơn vị.
        $digit_0 = substr($number, 2, 1);
        $digit_00 = substr($number, 1, 1);
        $digit_000 = substr($number, 0, 1);
        
        // Hàng trăm
        $str_000 = $dictionaryNumbers[$digit_000] . " trăm ";

        // Hàng chục
        // 0: linh, 1: mười, 2-9: hai-chín + mươi
        $str_00 = $dictionaryNumbers[$digit_00] . " mươi ";
        if ($digit_00 == 0) $str_00 = " lẻ ";
        if ($digit_00 == 1) $str_00 = " mười "; 

        // Hàng đơn vị
        // 1: mốt : $digit_00 > 1
        // 5: lăm : $digit_00 > 0
        $str_0 = $dictionaryNumbers[$digit_0];
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
        
        return ucfirst($result);
    }

    function readNumber12Digits($number = 123, $dictionaryNumbers = array(), $dictionaryUnits = array()){
        $number     = strval($number);
        $number     = str_pad($number, 12, 0, STR_PAD_LEFT);
        $arrNumbers = str_split($number, 3);

        foreach ($arrNumbers as $key => $value) {
            if ($value != "000") {
                $index = $key;
                break;
            }
        }

        foreach ($arrNumbers as $key => $value) {
            if ($key >= $index) {
                $readFull = true;
                if ($key == $index) $readFull = false;
                $result[$key] = readNumber3Digit($value, $dictionaryNumbers, $readFull) . " " . $dictionaryUnits[$key];
            }
        }
        $result = implode(" ", $result);
        $result = formatStr($result);

        $result = str_replace("không đồng", "đồng", $result);
        $result = str_replace("không trăm đồng", "đồng", $result);
        $result = str_replace("không trăm nghìn đồng", "đồng", $result);
        $result = str_replace("không triệu đồng", "đồng", $result);
        $result = str_replace("không trăm triệu đồng", "đồng", $result);
        $result = str_replace("không tỷ đồng", "đồng", $result);
        $result = str_replace("không trăm tỷ đồng", "đồng", $result);

        return $result;
    }

    $number = 100000000000;
    echo "Input: " . $number . "<br>";

    $result = readNumber12Digits($number, $dictionaryNumbers, $dictionaryUnits);

    echo "Result: " . $result . "<br>";
?>