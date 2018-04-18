<?php
	$data = file("question.txt") or die("Cannot Read File");

	array_shift($data);		// Xóa phần tử đầu tiên trong mảng.

	$arrQuestion = array();
	foreach ($data as $key => $value) {
		$tmp = explode("|", $value);

		// echo "<pre>";
		// print_r($tmp);
		// echo "</pre>";

		$id = $tmp[0];
		$question = $tmp[1];

		$arrQuestion[$id] = array("question" => $question);
	}

	// echo "<pre>";
	// print_r($arrQuestion);
	// echo "</pre>";
?>