<?php
	$arr = array("a" , "b", "c", "d", "e");

	echo "<pre>";
	print_r($arr);
	echo "</pre>";

	$newArr = array_splice($arr, 2, 1, array(7,8));

	echo "<pre>";
	print_r($newArr);
	echo "</pre>";

	echo "<pre>";
	print_r($arr);
	echo "</pre>";
?>