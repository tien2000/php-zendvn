<?php 
    require_once 'Database.class.php';

    $params = array(
        'server' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'db_manage_user',
        'table' => 'group',
    );

    $db = new Database($params);
    $arrData = array(
        array('name' => 'NeoTien 2', 'status' => 2, 'ordering' => 20),
        array('name' => 'Admin'),
        array('name' => 'Admin 2','ordering' => 20),
        array('id' => 20, 'name' => 'Admin 2','ordering' => 20, 'status' => 5),
    );
    
    $db->insert($arrData, 'multi');

    // echo $lastID = $db->lastID();