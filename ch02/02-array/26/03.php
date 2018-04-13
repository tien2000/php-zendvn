<?php
	$arr1 = array("name" => "PHP", "time" => 130, "HTML", "CSS");
	$arr2 = array("PHP", "time" => 130);

	$diff = array_diff_assoc($arr1, $arr2);

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