<?php
    require_once "Cat.class.php";

    $catA = new Cat();
    $catA->setName('MeoMeo');
    $catA->setColor('Blue');
    $catA->setAge(3);
    $catA->showInfoOfCat();

    echo '<hr>';

    $catB = new Cat();
    $catB->setName('MiuMiu');
    $catB->setColor('Black');
    $catB->setAge(2);
    $catB->showInfoOfCat();
?>

