<?php
	$arr = array(2,3,1);
	
	$newArr = array();

	foreach ($arr as $key => $value) {
		// if ($value % 2 == 0) {
		// 	$newArr[] = "even";
		// } else {
		// 	$newArr[] = "odd";
		// }		

		$newArr[] = ($value % 2 == 0) ? "even" : "odd" ;
	}

	echo "<pre>";
	print_r($arr);
	echo "</pre>";

	echo "<pre>";
	print_r($newArr);
	echo "</pre>";
?>