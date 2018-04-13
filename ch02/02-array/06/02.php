<?php
	$course = array("html" => "HTML", "css" => "CSS", "php" => "PHP");

	echo "<pre>";
	print_r($course);
	echo "</pre>";

	$lastItem = array_shift($course);

	echo "<pre>";
	print_r($lastItem);
	echo "</pre>";

	echo "<pre>";
	print_r($course);
	echo "</pre>";
?>