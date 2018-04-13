<?php
	$course = array("HTML", "CSS", "JAVASCRIPT", "HTML", "PHP");

	echo "<pre>";
	print_r($course);
	echo "</pre>";

	echo $length = array_push($course, "WORDPRESS", "ANGULAR");

	echo "<pre>";
	print_r($course);
	echo "</pre>";
?>