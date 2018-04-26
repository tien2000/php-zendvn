<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>Register Form</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<?php
	error_reporting(0);
	require_once 'functions.php';
	if (!empty($_POST)) {	
		$error = array();

		// Email
		$email = $_POST['email'];	
		if (trim($email) == "") {
			$error['email'] = "Giá trị không được rỗng";
		} else if (checkInput($email, 'email') == false) {			
			$error['email'] = "Giá trị ko hợp lệ";
			$email = "";
		}

		// Username
		$username = $_POST['username'];	
		if (trim($username) == "") {
			$error['username'] = "Giá trị không được rỗng";
		} else if (checkInput($username, 'username') == false) {
			$error['username'] = "Giá trị ko hợp lệ";
			$username = "";
		}

		// Password
		$password = $_POST['password'];	
		if (trim($password) == "") {
			$error['password'] = "Giá trị không được rỗng";
		} else if (checkInput($password, 'password') == false) {
			$error['password'] = "Giá trị ko hợp lệ";
			$password = "";
		}

		// Website
		$website = $_POST['website'];	
		if (trim($website) == "") {
			$error['website'] = "Giá trị không được rỗng";
		} else if (checkInput($website, 'website') == false) {
			$error['website'] = "Giá trị ko hợp lệ";
			$website = "";
		}
	}

	$strEmail 		= createInput("input", "email", "email", $email, $error['email']);
	$strUsername 	= createInput("input", "username", "text", $username, $error['username']);
	$strPassword 	= createInput("input", "password", "password", $password, $error['password']);
	$strWebsite 	= createInput("input nobottomborder", "website", "text", $website, $error['website']);
?>
	<div class="wrapper">
		<form class="form1" action="#" method="post">
			<div class="formtitle">Login to your account</div>
				<?php echo $strEmail . $strUsername. $strPassword . $strWebsite; ?>
				
			<div class="buttons">
				<input class="orangebutton" type="submit" value="Login" />
			</div>
		</form>
	</div>
</body>
</html>