<?php
	$course = array("html" => "HTML", "css" => "CSS", "php" => "PHP");

	echo "<pre>";
	print_r($course);
	echo "</pre>";
	
	$keyArr = array_rand($course, 2);

	echo "<pre>";
	print_r($keyArr);
	echo "</pre>";
?>