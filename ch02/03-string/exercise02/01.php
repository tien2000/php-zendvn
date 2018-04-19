<?php
    $str = "   neoTIen    iS     mE     ";

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

    $result = formatStr($str, "danh-tu");
    echo $result . "<br>";
    echo strlen($result);
?>