<?php
	$arr = array("php" => "PHP", "css" => "CSS", "html" => "HTML", 100, 89);

	echo "<pre>";
	print_r($arr);
	echo "</pre>";

	krsort($arr);

	echo "<pre>";
	print_r($arr);
	echo "</pre>";
?>