<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>This is title</title>

	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}

		.content{
			width: 500px;
			height: auto;
			padding: 10px;
			border: 2px solid #ddd;
			margin: 10px auto;
		}
	</style>

</head>
<body>
	<div class="content">
	<?php
		$group = array("1" => "Admin", "2" => "Manager", "3" => "Member", "4" => "Guest");
		$city  = array("1" => "Sài Gòn", "2" => "Gia Định", "3" => "Chợ Lớn");

		function createSelectBox($name = "", $attr, $arr, $keySelect = 0){
			$xhtml = "";
			if (!empty($arr)) {
				$xhtml = '<select name="'. $name .'" id="'. $name .'" style="'. $attr .'">';
				foreach ($arr as $key => $value) {
					if ($key == $keySelect) {
						$xhtml .= '<option selected value="'. $key .'">'. $value .'</option>';
					} else {
						$xhtml .= '<option value="'. $key .'">'. $value .'</option>';
					}
				}			
				$xhtml .= '</select>';
			}
			return $xhtml;
		}
		
		$groupSelect = createSelectBox("group", "width: 200px", $group, 3);
		$citySelect  = createSelectBox("city", "width: 200px", $city, 2);
		echo $groupSelect . " " . $citySelect;
	?>
	</div>
</body>
</html>