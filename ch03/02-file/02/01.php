<?php
    $filename = 'files/abc.txt';

    $type = filetype($filename);

    echo $type;     // dir: Thư mục, file: Tập tin.
?>