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
    $data = array('status' => 1, 'ordering' => 50, 'name' => 'Steve');    
    
    $where = array(
        array('status', 0, strtoupper('and')),
        array('ordering', 5)
    );
    $db->update($data, $where);

    // echo $lastID = $db->lastID();