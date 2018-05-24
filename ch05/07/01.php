<?php
abstract class Laptop{
    public function keyboard(){

    }
}

class Hp extends Laptop{

}

$hp = new Hp();

echo "<pre>";
print_r($hp);
echo "</pre>";
?>