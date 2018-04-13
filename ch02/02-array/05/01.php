<?php
	$course = array("name" => "PHP", "time" => 130);

	echo "<pre>";
	print_r($course);
	echo "</pre>";

	$newArr = array_values($course);

	echo "<pre>";
	print_r($newArr);
	echo "</pre>";
?>