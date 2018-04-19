<?php
    $str = "Khóa học lập trình PHP chuyên sâu version 2015 của ZendVN là một khóa học PHP Online. Khóa học PHP này cung cấp cho các bạn kiến thức về lập trình PHP từ căn bản đến nâng cao.";

    echo $str . "<br>";
    
    function truncateStr($str, $maxChars = 50, $holder = "..."){
        $result = $str;
        if (strlen($str) > $maxChars) {
            $result = substr($str, 0, $maxChars) . $holder;
        }

        return $result;
    }

    $str = truncateStr($str, 50, "...");
    echo $str . "<br>";
?>