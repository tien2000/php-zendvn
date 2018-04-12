<?php
    function pow2($n1, $n2){
        $result = 0;
        $n1 = $n1 * $n1;
        $n2 = $n2 * $n2;

        $result = $n1 + $n2;
        return $result;
    }

    $n1 = 4;
    $n2 = 2;
    $num = pow2($n1, $n2);
    echo "Number: " . $num . "<br>";
    echo "n1: " . $n1 . "<br>";
    echo "n2: " . $n2 . "<br>";
?>