<?php 
class View{
    public function __construct() {
        echo '<h3>'. __METHOD__ .'</h3>';
    }

    public function render($name){
        require_once 'views/' . $name . '.php';
    }
}
?>