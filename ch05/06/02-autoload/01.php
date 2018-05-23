<?php 
    function __autoload($className){
        $path = 'class/';
        require_once $path . "{$className}.class.php";
    }

    $cat = new Cat('Morna');
    $cat->showInfo();

    echo '<hr>';

    $lion = new Lion('King');
    $lion->showInfo();
?>