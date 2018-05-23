<?php 
    require_once 'class/Cat.class.php';

    $catA = new Cat();
    
    $catA->name = 'Morna';
    $catA->age = 10;
    $catA->color = 'Black';

    echo $catA->color . "<br>";

    $catA->showInfo();
?>