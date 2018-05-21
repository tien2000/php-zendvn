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
    }

    $catA = new Cat();
    $catA->setName('MeoMeo');
    $catA->setColor('Blue');
    $catA->setAge(3);
    echo 'Name: ' . $catA->getName() . "<br>";
    echo 'Color: ' . $catA->getColor() . "<br>";
    echo 'Age: ' . $catA->getAge() . "<br>";

    echo '<hr>';

    $catB = new Cat();
    $catB->setName('MiuMiu');
    $catB->setColor('Black');
    $catB->setAge(2);
    echo 'Name: ' . $catB->getName() . "<br>";
    echo 'Color: ' . $catB->getColor() . "<br>";
    echo 'Age: ' . $catB->getAge() . "<br>";
?>

