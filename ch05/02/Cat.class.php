<?php 
    class Cat{
        // Properties
        public $name;
        public $color;
        public $age;

        // Method
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

        public function showInfoOfCat(){
            echo 'Name: ' . $this->getName() . "<br>";
            echo 'Color: ' . $this->getColor() . "<br>";
            echo 'Age: ' . $this->getAge() . "<br>";
        }
    }
?>

