<?php 
class Sample{
    static $a = 1000;

    static public function showInfo(){
        echo '<h3>Show Info</h3>';
    }
}

// $sample = new Sample();
// echo 'Static $a: ' . Sample::$a . "<br>";
// $sample->showInfo();

Sample::showInfo();
?>