<?php
	$data = file("options.txt") or die("Cannot Read File");

	array_shift($data);		// Xóa phần tử đầu tiên trong mảng.

	// echo "<pre>";
	// print_r($data);
	// echo "</pre>";

	$arrOption = array();

	foreach ($data as $key => $value) {
		$tmp = explode("|", $value);

		// echo "<pre>";
		// print_r($tmp);
		// echo "</pre>";

		$questionId 	= $tmp[0];
		$optionId		= $tmp[1];
		$anwser   		= $tmp[2];
		$point   		= $tmp[3];

		$arrOption[$questionId][$optionId]["option"] = $anwser;
		$arrOption[$questionId][$optionId]["point"] = $point;
	}	

	// echo "<pre>";
	// print_r($arrOption);
	// echo "</pre>";
?>