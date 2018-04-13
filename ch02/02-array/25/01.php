<?php
	$key = array("name", "time", "total");
	$val = array("PHP", 100, 2000);

	$newArr = array_combine($key, $val);

	echo "<pre>";
	print_r($newArr);
	echo "</pre>";
?>