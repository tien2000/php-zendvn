<?php
	$course = array("html" => "HTML", "css" => "CSS", "php" => "PHP");

	if (in_array("PHP", $course)) {
		echo "Exists";
	} else {
		echo "No Exists";
	}
	
?>