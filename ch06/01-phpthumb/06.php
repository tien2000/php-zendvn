<?php
    require_once 'library/ThumbLib.inc.php';

    $fileName = 'library/examples/test.jpg';
    $thumb = PhpThumbFactory::create($fileName);
    
    $thumb->resize(110, 110);
    $thumb->save('img110/snake110.png');
    $thumb->show();