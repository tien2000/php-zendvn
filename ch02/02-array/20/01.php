<?php
	$course = array("HTML", "CSS", "JAVASCRIPT", "PHP");
	
	echo "<pre>";
	print_r($course);
	echo "</pre>";

	echo "Current: " . current($course) . "<br>";
	echo "Next: " . next($course) . "<br>";
	echo "Next: " . next($course) . "<br>";
	echo "Prev: " . prev($course) . "<br>";
	echo "Reset: " . reset($course) . "<br>";
	echo "End: " . end($course) . "<br>";
?>