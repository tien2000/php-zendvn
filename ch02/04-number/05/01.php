<?php 
    $arrNum = array(1, -5, 3, -6, 8, 12, 4, 9);

    sort($arrNum);

    // echo "<pre>";
    // print_r($arrNum);
    // echo "</pre>";
    
    $sum = 0;
    foreach ($arrNum as $value) {
        $sum += $value;
    }

    $min = $arrNum[0];
    $max = $arrNum[count($arrNum) - 1];

    echo "Min: " . $min . "<br>";
    echo "Max: " . $max . "<br>";
    echo "Sum: " . $sum . "<br>";
?>