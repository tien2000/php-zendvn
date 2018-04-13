<?php
	$course = array("html" => "HTML", "css" => "CSS", "php" => "PHP");

	echo "<pre>";
	print_r($course);
	echo "</pre>";
	
	$key1 = array_search("HTML", $course);

	echo $key1;
?>