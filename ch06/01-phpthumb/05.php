<?php
    require_once 'library/ThumbLib.inc.php';

    $fileName = 'library/examples/test.jpg';
    $thumb = PhpThumbFactory::create($fileName);

    // Xoay ảnh theo tham số truyền vào.
    // CW: Xoay ngược.
    // CVV: Xoay xuôi.
    // $thumb->rotateImage('CVV');

    // Xoay ảnh theo độ
    $thumb->rotateImageNDegrees(130);
    $thumb->show();