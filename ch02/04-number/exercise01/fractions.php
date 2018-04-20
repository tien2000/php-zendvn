<?php 
    function UCLN($n1, $n2){
        for ($i = 1; $i < $n1; $i++) if ($n1 % $i == 0) $uclnN1[] = $i;
        for ($i = 1; $i < $n2; $i++) if ($n2 % $i == 0) $uclnN2[] = $i;

        $tmp = array_intersect($uclnN1, $uclnN2);

        $result = max($tmp);

        return $result;
    }
    
    function optimizeFractions($fractions){
        $arrFractions = explode("/", $fractions);    
        $ucln = UCLN($arrFractions[0], $arrFractions[1]);
        $arrFractions[0] /= $ucln;
        $arrFractions[1] /= $ucln;

        return $arrFractions;
    }
?>