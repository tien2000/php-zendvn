<?php
    $path = '/files/abc.txt';

    // Hiển thị tên tập tin với phần mở rộng.
    echo basename($path) . "<br>";

    // Hiển thị tên tập tin KHÔNG có phần mở rộng.
    echo basename($path, ".txt");
?>