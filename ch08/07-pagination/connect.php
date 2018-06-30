<?php 
    require_once "class/Database.class.php";

    $params = array(
        'server' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'db_manage_user',
        'table' => 'user',
    );

    $db = new Database($params);
?>