<?php
    require_once 'library/ThumbLib.inc.php';

    $fileName = 'library/examples/test.jpg';
    $thumb = PhpThumbFactory::create($fileName);

    // Cắt hinh từ tâm theo tham số truyền vào.
    // $thumb->cropFromCenter(300);
    // $thumb->cropFromCenter(300, 200);

    // Cắt hình từ tọa độ X, Y
    // $thumb->crop(0 ,0, 400, 200);
    $thumb->crop(200 ,100, 400, 200);
    $thumb->show();