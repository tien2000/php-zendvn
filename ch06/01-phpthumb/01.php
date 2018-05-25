<?php
    require_once 'library/ThumbLib.inc.php';

    $fileName = 'library/examples/test.jpg';
    $thumb = PhpThumbFactory::create($fileName);

    // resize dựa trên tỷ lệ tấm hình, ko nhất thiết đúng với tham số.
    $thumb->resize(200, 200);
    $thumb->show();