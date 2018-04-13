<?php
	$arr = array("name" => "PHP", "time" => 130, "HTML", "CSS");
	
	function showArr($val, $key){
		echo $key . ": " .$val . "<br>"; 
	}

	array_walk($arr, "showArr");
?>