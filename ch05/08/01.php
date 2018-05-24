<?php 
interface People{
    public function eat();
    public function sleep();
}

interface Bird{
    public function fly();
}

class Lion{
    public function shout(){
        echo __FUNCTION__ . "<br>";
    }
}

class Programmer extends Lion implements People, Bird{
    public function eat(){
        echo __METHOD__ . "<br>";
    }
    public function sleep(){
        echo __FILE__ . "<br>";
    }

    public function fly(){
        echo "Hút cần hay sao mà bay được vậy???";
    }

    public function shout(){
        echo "Kêu la như Sư Tử???";
    }
}

$programmer = new Programmer();
$programmer->eat();
$programmer->fly();
$programmer->shout();
?>