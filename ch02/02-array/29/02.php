<?php
	$arr = array("a" , "b", "c", "d", "e");

	$newArr = array_slice($arr, 2, 2, false);		 // c(0), d(1)
	$newArr = array_slice($arr, 2, 2, true);		 // c(2), d(3)

	echo "<pre>";
	print_r($arr);
	echo "</pre>";

	echo "<pre>";
	print_r($newArr);
	echo "</pre>";
?>