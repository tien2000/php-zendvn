<?php
	$arr = array(2,3,1);
	
	function checkNumber($num){
		$result = ($num % 2 == 0) ? "even" : "odd" ;

		return $result;
	}

	$newArr = array_map("checkNumber", $arr);

	echo "<pre>";
	print_r($arr);
	echo "</pre>";

	echo "<pre>";
	print_r($newArr);
	echo "</pre>";
?>