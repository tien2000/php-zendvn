<?php
	$course = array("HTML", "CSS", "JAVASCRIPT", "HTML", "PHP");

	echo "<pre>";
	print_r($course);
	echo "</pre>";

	// unset($course[0], $course[2]);
	unset($course);
	
	echo "<pre>";
	print_r($course);
	echo "</pre>";
?>