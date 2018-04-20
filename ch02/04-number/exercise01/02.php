<?php
    require_once "fractions.php";
    
    $fractions1 = "52/6";
    $fractions2 = "34/8";

    echo "<hr> Input: " . "<br>";
    echo "PS1: " . $fractions1 . "<br>";
    echo "PS2: " . $fractions2 . "<br>";

    echo "<hr> Tối giản: " . "<br>";
    echo "PS1: " . implode("/", optimizeFractions($fractions1)) . "<br>";
    echo "PS1: " . implode("/", optimizeFractions($fractions2)) . "<br>";
    
    $result[0]	= $fractions1[0] * $fractions2[0];
	$result[1]	= $fractions1[1] * $fractions2[1];
	
	$result	= implode("/",$result);
    $result	= optimizeFractions($result);
    
    echo "<hr> Kết quả: " . "<br>";
	echo "Tích: " . implode("/", $result) . "<br />";
?>