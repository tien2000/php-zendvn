<?php 
    final class Cat{
        // Properties
        public $name;
        public $color;
        public $age;
        public $weight;

        public function __construct($arrInfo) {
            echo '__construct là array' . "<br>";
            $this->name     = $arrInfo['name'];
            $this->color    = $arrInfo['color'];
            $this->age      = $arrInfo['age'];
            $this->weight   = $arrInfo['weight'];
        }

        public function getColor(){
            return $this->color;
        }

        public function setColor($val){
            $this->color = $val;
        }

        public function getName(){
            return $this->name;
        }

        public function setName($val){
            $this->name = $val;
        }

        public function getAge(){
            return $this->age;
        }

        public function setAge($val){
            $this->age = $val;
        }

        public function getWeight(){
            return $this->weight;
        }

        public function setWeight($val){
            $this->weight = $val;
        }

        public function showInfoOfCat(){
            echo 'Name: ' . $this->getName() . "<br>";
            echo 'Color: ' . $this->getColor() . "<br>";
            echo 'Age: ' . $this->getAge() . "<br>";
            echo 'Weight: ' . $this->getWeight() . "<br>";
        }
    }
?>

