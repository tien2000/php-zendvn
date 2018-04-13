<?php
	$arr = array("a" , "b", "c", "d", "e");

	$newArr = array_slice($arr, 2);		 // c, d, e
	$newArr = array_slice($arr, 2, 2);		 // c, d
	$newArr = array_slice($arr, 2, 0);		 // null

	echo "<pre>";
	print_r($arr);
	echo "</pre>";

	echo "<pre>";
	print_r($newArr);
	echo "</pre>";
?>