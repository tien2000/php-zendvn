<?php
	$arr = array("name" => "PHP", "time" => 130, "HTML", "CSS");
	
	function showArr($val, $key, $param){
		echo $key . $param .$val . "<br>"; 
	}

	array_walk($arr, "showArr", " - ");
?>