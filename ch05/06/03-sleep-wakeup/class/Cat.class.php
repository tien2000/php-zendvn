<?php 
    class Cat{
        // Properties
        public $name;
        public $color;
        public $age;
        public $weight;

        public function Cat($name = 'Morgana', $color = 'Black', $age = 1, $weight = '2kg') {
            $this->name  = $name;
            $this->color = $color;
            $this->age   = $age;
            $this->weight   = $weight;
        }

        public function __sleep(){
            return array('name', 'age');
        }

        public function __wakeup(){
            $this->name  = 'Dora';
            $this->color = 'Black';
            $this->age   = 10;
            $this->weight   = '4kg';
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

        public function showInfo(){
            echo 'Name: ' . $this->getName() . "<br>";
            echo 'Color: ' . $this->getColor() . "<br>";
            echo 'Age: ' . $this->getAge() . "<br>";
            echo 'Weight: ' . $this->getWeight() . "<br>";
        }
    }
?>

