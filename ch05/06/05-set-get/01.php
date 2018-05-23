<?php 
    require_once 'class/Cat.class.php';

    $catA = new Cat();
    
    $catA->name = 'Morna';
    $catA->age = 10;

    echo $catA->name . "<br>";

    $catA->showInfo();
?>