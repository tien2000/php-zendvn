<?php
    // Tính n!
    function factorial($number){
        $result = 1;
        if ($number > 1) {
            for ($i = 1; $i <= $number; $i++) { 
                $result = $result * $i;
            }
        }
        return $result;
    }

    echo factorial(4);
?>