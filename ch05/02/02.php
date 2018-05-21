<?php 
    class Cat{
        // Properties
        public $name        = 'Mimi';
        private $color      = 'yellow-white';
        protected $age      = 1;
    }

    $catA = new Cat();

    echo "<pre>";
    print_r($catA);
    echo "</pre>";

    echo "<br>Name: "   . $catA->name;
    echo "<br>Color: "  . $catA->color;
    echo "<br>Age: "    . $catA->age;
?>