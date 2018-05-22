<?php
require_once 'Cat.class.php'; 
class Lion extends Cat{
    public $maxSpeed = '50km/h';

    public function showInfo(){
        echo 'Name: ' . parent::getName() . "<br>";
        echo 'Color: ' . parent::getColor() . "<br>";
        echo 'Age: ' . parent::getAge() . "<br>";
        echo 'Weight: ' . parent::getWeight() . "<br>";
        echo 'Max Speed: ' . $this->maxSpeed . "<br>";
        echo 'Lion';
    }
}
?>