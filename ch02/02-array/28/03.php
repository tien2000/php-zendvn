<?php
	$arr1 = array(2,3,1);
	$arr2 = array(7,8,9);
	
	function tichHaiMang($num1, $num2){
		$result = $num1 * $num2;

		return $result;
	}

	$newArr = array_map("tichHaiMang", $arr1, $arr2);

	echo "<pre>";
	print_r($newArr);
	echo "</pre>";
?>