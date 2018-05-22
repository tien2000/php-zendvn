<?php 
class Sample{
    public $a       = 'A';
    private $b      = 'B';
    protected $c    = 'C';

    public function showInfo(){
        echo 'Truy cập trong lớp: ' . "<br>";
        echo 'public $a: ' . $this->a . "<br>";
        echo 'private $b: ' . $this->b . "<br>";
        echo 'protected $c: ' . $this->c . "<br>";
    }
}

class Sample2 extends Sample{
    public function showInfo(){
        echo 'Truy cập trong lớp con: ' . "<br>";
        echo 'public $a: ' . $this->a . "<br>";
        echo 'private $b: ' . $this->b . "<br>";
        echo 'protected $c: ' . $this->c . "<br>";
    }
}

$sample = new Sample();
$sample2 = new Sample2();

echo '<hr>';

$sample2->showInfo();