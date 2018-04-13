<?php
	$course = array("html" => "HTML", "css" => "CSS", "javascript" => "JAVASCRIPT", "php" => "PHP", "time" => 80, 100);
	
	echo "<pre>";
	print_r($course);
	echo "</pre>";

	$result = serialize($course);

	echo $result;
?>