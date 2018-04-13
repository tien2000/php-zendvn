<?php
	$course = array("htMl" => "HTML", "css" => "CSS", "php" => "PHP");

	echo "<pre>";
	print_r($course);
	echo "</pre>";

	$newArr = array_change_key_case($course, CASE_UPPER);

	echo "<pre>";
	print_r($newArr);
	echo "</pre>";
?>