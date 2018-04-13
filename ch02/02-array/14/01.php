<?php
	$arr1 = array("a", "b", "c");
	$arr2 = array(2, 4, 6);
	$arr3 = array("html" => "HTML", "css" => "CSS", "php" => "PHP");
	
	$newArr = array_merge($arr1, $arr2, $arr3);

	echo "<pre>";
	print_r($newArr);
	echo "</pre>";
?>