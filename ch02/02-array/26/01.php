<?php
	$arr1 = array("name" => "PHP", "time" => 130, "html" => "HTML", "css" => "CSS");
	$arr2 = array("PHP", 100);

	$diff = array_diff($arr1, $arr2);

	echo "<pre>";
	print_r($arr1);
	echo "</pre>";

	echo "<pre>";
	print_r($arr2);
	echo "</pre>";

	echo "<pre>";
	print_r($diff);
	echo "</pre>";
?>