<?php 
    require_once 'class/Cat.class.php';

    $catA = new Cat('Morna');

    $catA->showInfo();

    $strCatA = serialize($catA);

    echo "<br>" . $strCatA;
?>