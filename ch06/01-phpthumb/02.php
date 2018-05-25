<?php
    require_once 'library/ThumbLib.inc.php';

    $fileName = 'library/examples/test.jpg';
    $thumb = PhpThumbFactory::create($fileName);

    // Resize dựa trên % tham số truyền vào.
    $thumb->resizePercent(50);
    $thumb->show();