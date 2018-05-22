<?php 
class Sample{
    const money = 1000;
    public $money = 'This is money';

    public function showInfo(){
        echo '<h2>C1: '. Sample::money .'</h2>';
        echo '<h2>C2: '. self::money .'</h2>';
        echo '<h2>C2: '. $this::money .'</h2>';
    }
}

$sample = new Sample();

echo $sample->money . "<br>";

echo $sample::money . "<br>";
echo Sample::money . "<br>";

$sample->showInfo();
?>