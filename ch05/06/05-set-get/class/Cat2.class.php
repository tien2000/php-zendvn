<?php 
class Cat2{
    private $info;

    public function __construct($name = 'Morgana', $age = 10) {
        $this->name = $name;
        $this->age = $age;
    }
    
    public function __set($name, $val){
        return $this->info[$name] = $val;
    }

    public function __get($name){
        return $this->info[$name];
    }
    
    public function showInfo(){
        echo 'Name: ' . $this->name . "<br>";
        echo 'Age: ' . $this->age . "<br>";
    }
}
?>