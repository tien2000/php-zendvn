<?php
    $fileName = "files/test.txt";
    
    if (file_exists($fileName)) {
        $data = file($fileName);
        unset($data[2]);

        file_put_contents($fileName, $data);
    }else {
        echo "Tập tin không tồn tại";
    }
?>