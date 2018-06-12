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
    $arrData = array('name' => 'NeoTien 2', 'status' => 2, 'ordering' => 20);
    
    $db->insert($arrData);

    echo $lastID = $db->lastID();