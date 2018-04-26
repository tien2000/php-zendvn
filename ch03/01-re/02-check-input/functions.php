<?php	
	function checkInput($val, $type ="email"){
		switch ($type) {
			case 'email':
				$pattern = '#^[a-z][a-z0-9_\.]{4,31}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$#';
				break;

			case 'username':
				$pattern = '#^[a-z_][a-z0-9_\.\s]{4,31}$#';
				break;

			case 'password':
				$pattern = '#^(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,32}$#';
				break;

			case 'website':
				$pattern = '#^(https?://(www\.)?|(www\.))[a-z0-9\-]{3,}(\.[a-z]{2,4}){1,2}$#';
				break;
		}
		$result = preg_match($pattern, $val);
        return $result;
	}

	function createInput($class = "input", $name = "email", $type = "text", $val = "", $error = array()){
		$xhtml = '<div class="'. $class .'">
						<div class="inputtext">'. ucfirst($name) .'</div>
						<div class="inputcontent">
							<input type="'. $type .'" name="'. $name .'" id="'. $name .'" value="'. $val .'">
							<p>'. $error .'</p>
						</div>
					</div>';

		return $xhtml;
	}
?>