<?php
abstract class Laptop{
    abstract public function keyboard();

    public function ram(){

    }

    public function chipset(){

    }
}

class Hp extends Laptop{
    public function keyboard(){
        return "Ban phim phai co phim";
    }
}

$hp = new Hp();

echo "<pre>";
print_r($hp->keyboard());
echo "</pre>";
?>