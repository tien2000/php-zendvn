<?php 
    $sub = "NeoTien NeoTien is Me";
    $pattern = '/NeoTien/';
    if (preg_match_all($pattern, $sub, $match) == true){
        echo "Tìm thấy";
    } else {
        echo "Không tìm thấy";
    }

    echo "<pre>";
    print_r($match[0]);
    echo "</pre>";
?>