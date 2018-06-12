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
    
    $query[] = "SELECT * ";
    $query[] .= "FROM `group`";
    $query[] .= "ORDER BY `ordering` ASC";
    $query = implode(' ', $query);
    
    $db->query($query);
    $list = $db->singleRecord();

    echo "<pre>";
    print_r($list);
    echo "</pre>";

    // echo $lastID = $db->lastID();