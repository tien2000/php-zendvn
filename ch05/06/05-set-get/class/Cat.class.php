<?php 
class Cat{
    private $name;
    private $age;

    public function __construct($name = 'Morgana', $age = 2) {
        $this->name = $name;
        $this->age = $age;
    }
    
    public function __set($name, $val){
        return $this->$name = $val;
    }

    public function __get($val){
        return $this->$val;
    }
    
    public function showInfo(){
        echo 'Name: ' . $this->name . "<br>";
        echo 'Age: ' . $this->age;
    }
}
?>