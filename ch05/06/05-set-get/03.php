<?php 
    require_once 'class/Cat2.class.php';

    $catA = new Cat2();
    
    $catA->name = 'Morna';
    $catA->age = 10;
    $catA->color = 'Black';
    
    echo "<pre>";
    print_r($catA);
    echo "</pre>";

    echo $catA->name;
?>