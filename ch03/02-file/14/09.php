<?php
    // Hiển thị tất cả các thư mục có kết thúc là es
    $dir = opendir(".");
    $result = array();
    while (($file = readdir($dir)) != false) {
        if (is_dir($file)) {
            if (preg_match("#es$#misU", $file)) {
                $result[] = $file;
            }            
        }
    }

    closedir($dir);

    echo "<pre>";
    print_r($result);
    echo "</pre>";