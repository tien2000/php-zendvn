<?php
    // Hiển thị tất cả các thư mục có kết thúc là es
    $data = scandir(".");
    $result = array();
    foreach ($data as $key => $value) {        
        if (is_dir($value)) {
            if (preg_match("#es$#misU", $value)) {
                $result[$key] = $value;
            }            
        }
    }

    echo "<pre>";
    print_r($result);
    echo "</pre>";