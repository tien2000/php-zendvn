<?php
    require_once 'library/ThumbLib.inc.php';

    $fileName = 'library/examples/test.jpg';
    $thumb = PhpThumbFactory::create($fileName);

    // Cắt hình theo tham số tính từ tâm của hình theo top, bottom, left, right.
    $thumb->adaptiveResize(300, 100);
    $thumb->show();