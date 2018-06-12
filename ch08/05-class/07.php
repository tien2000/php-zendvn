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
    
    $query[]  = "SELECT g.id, g.name, g.ordering, COUNT(u.id) AS total";
    $query[] .= "FROM `group` AS g LEFT JOIN `user` as u ON g.id = u.group_id";
    // $query[] .= "WHERE g.id > 20";
    $query[] .= "GROUP BY g.id";

    $query  = implode(' ', $query);
    
    $db->query($query);
    $list = $db->listRecord();

    echo "<pre>";
    print_r($list);
    echo "</pre>";

    // echo $lastID = $db->lastID();