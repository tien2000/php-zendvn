<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    $mes = array();

    if (empty($username)) {
        $mes['username'] = 'Username is not empty';
    } else if($username != 'tienls'){
        $mes['username'] = 'Username is not exist';
    }

    if (empty($password)) {
        $mes['password'] = 'Password is not empty';
    } else if($password != '123456'){
        $mes['password'] = 'Wrong password';
    }

    $status = 'error';
    if (count($mes) == 0)  $status = 'success';

    $reponse = array(
        'status' => $status,
        'mes'    => $mes
    );

    echo $jsonStr = json_encode($reponse);
?>