<?php
	$course = array("html" => "HTML", "css" => "CSS", "js" => "JAVASCRIPT", "php" => "PHP");

	function removeItem(&$arr = [], $type = "first", $total = 2){
		$result = array();

		if (!empty($arr)) {
			if ($total > count($arr)) {
				$result = $arr;
				$arr   = null;
			} else {
				if ($type == "first") {
					for ($i = 1; $i <= $total; $i++) { 
						$result[] = array_shift($arr);
					}
				} else if ($type == "last") {
					for ($i = 1; $i <= $total; $i++) { 
						$result[] = array_pop($arr);
					}
				}
			}
		}

		return $result;
	}

	echo "Course: ";
	echo "<pre>";
	print_r($course);
	echo "</pre>";

	$arrTemp = removeItem($course, "first", 21);
	
	echo "arrTemp: ";
	echo "<pre>";
	print_r($arrTemp);
	echo "</pre>";

	echo "Course: ";
	echo "<pre>";
	print_r($course);
	echo "</pre>";
?>