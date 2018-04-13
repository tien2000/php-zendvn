<?php
	$scoreList = array(1,3,5,7,2);

	echo "<pre>";
	print_r($scoreList);
	echo "</pre>";

	$sum = array_sum($scoreList);
	$length = count($scoreList);
	$max = max($scoreList);
	$min = min($scoreList);

	echo "Tổng: " . $sum . "<br>";
	echo "Trung bình: " . $sum/$length . "<br>";
	echo "Max: " . $max . "<br>";
	echo "Min: " . $min . "<br>";
?>