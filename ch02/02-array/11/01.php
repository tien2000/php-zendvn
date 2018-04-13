<?php
	$course = array("HTML", "CSS", "JAVASCRIPT", "PHP");

	echo "<pre>";
	print_r($course);
	echo "</pre>";

	 $newArr = array_flip($course);

	echo "<pre>";
	print_r($newArr);
	echo "</pre>";
?>