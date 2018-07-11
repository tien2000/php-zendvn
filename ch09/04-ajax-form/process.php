<?php 
	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>";

	// echo "<pre>";
	// print_r($_FILES);
	// echo "</pre>";
	
	require_once "class/Validate.class.php";

	$flagType = false;

	$source = array(
		'name' 			=> $_POST['name'],
		'email' 		=> $_POST['email'],
		'message' 		=> $_POST['message'],
		'file' 			=> @$_FILES['attach']
	);
	$errors = '';

	$validate = new Validate($source);

	$validate->addRule('name', 'string', array('min' => 2, 'max' => 50))
			 ->addRule('email', 'email')
			 ->addRule('message', 'string', array('min' => 5, 'max' => 500))
			 ->addRule('file', 'file', array('extension' => array('png', 'jpg', 'gif'), 'min' => 50, 'max' => 5000000), false);

	$validate->run();

	if ($validate->isValid() == false) {
		$errors = $validate->getError();
	} else {
		$flagType = true;
	}

	$reponse = array(
		'type' 		=> $flagType,
		'errors' 	=> $errors
	);

	echo $result = json_encode($reponse);