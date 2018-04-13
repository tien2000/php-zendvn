<?php
	$course = array("html" => "HTML", "css" => "CSS", "php" => "PHP");

	if (array_key_exists("php", $course)) {
		echo "Exists";
	} else {
		echo "No Exists";
	}
	
?>