<?php
	$scoreList = array(1,3,2,5,2,7,2,5);

	echo "<pre>";
	print_r($scoreList);
	echo "</pre>";

	$newArr = array_count_values($scoreList);

	echo "<pre>";
	print_r($newArr);
	echo "</pre>";
?>