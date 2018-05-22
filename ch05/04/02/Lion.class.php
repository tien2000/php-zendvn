<?php 
    require_once 'Cat.class.php';

    class Lion extends Cat{
        public $height = '1m2';

        public function getHeight(){
            return $this->height;
        }

        public function setHeight($val){
            $this->height = $val;
        }

        public function showInfoOfCat(){
            echo 'Name: ' . $this->getName() . "<br>";
            echo 'Color: ' . $this->getColor() . "<br>";
            echo 'Age: ' . $this->getAge() . "<br>";
            echo 'Weight: ' . $this->getWeight() . "<br>";
            echo 'Height: ' . $this->getHeight() . "<br>";
        }
    }
    
?>

