<?php
    require_once "Cat.class.php";

    $arrCatA = array(
        'name' => 'Mona',
        'color' => 'white',
        'age'   => 1,
        'weight' => '3kg'
    );

    $catA = new Cat($arrCatA);
    $catA->showInfoOfCat();


?>

