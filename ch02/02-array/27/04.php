<?php
	$arr = array(2,4,6,8);
	
	function showArr(&$val, $key, $param = 2){
		$val = $val * $param;
	}

	array_walk($arr, "showArr", 3);

	echo "<pre>";
	print_r($arr);
	echo "</pre>";
?>