<?php
abstract class Laptop{
    abstract protected function keyboard(array $color);

    public function ram(){

    }

    public function chipset(){

    }
}

class Hp extends Laptop{
    public function keyboard(array $color){
        $strColor = '';
        for ($i = 0; $i < count($color); $i++) $strColor .= $color[$i] . ' ';
        return $strColor;
    }
}

$hp = new Hp();
echo $hp->keyboard(array('White', 'Black', 'Yellow'));
?>