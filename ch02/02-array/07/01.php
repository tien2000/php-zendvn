<?php
	$course = array("HTML", "CSS", "JAVASCRIPT", "HTML", "PHP");

	echo "<pre>";
	print_r($course);
	echo "</pre>";

	$arrUni = array_unique($course);

	echo "<pre>";
	print_r($arrUni);
	echo "</pre>";
?>