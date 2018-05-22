<?php 
    require_once 'Lion.class.php';

    $arrInfo = array('name' => 'Lion A', 'color' => 'yellow', 'age' => 2, 'weight' => '30kg');
    $lionA = new Lion($arrInfo);

    $lionA->showInfoOfCat();
?>