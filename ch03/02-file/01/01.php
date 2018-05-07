<?php
    // $filename = 'files';
    $filename = 'files/abc.txt';

    if (file_exists($filename)) {
        echo "File tồn tại";
    } else{
        echo "File Không tồn tại";
    }
?>