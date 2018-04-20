<?php 
    $strNumber = "1, -5, 3, -6, 8, 12, 4, 9";

    $arrNum = explode(",", $strNumber);

    $min = min($arrNum);
    $max = max($arrNum);
    $sum = array_sum($arrNum);

    echo "Min: " . $min . "<br>";
    echo "Max: " . $max . "<br>";
    echo "Sum: " . $sum . "<br>";
?>