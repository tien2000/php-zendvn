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

 echo "<pre>";
 print_r($db);
 echo "</pre>";