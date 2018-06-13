<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>User Online</title>
</head>

<?php 
    require_once "class/Database.class.php";

    $params = array(
        'server' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'db_manage_user',
        'table' => 'online',
    );

    $db = new Database($params);

    $ip     = $_SERVER['REMOTE_ADDR'];
    $url    = $_SERVER['PHP_SELF'];

    // Tìm kiếm userInfo trong Online
    $query[] = "SELECT `id`";
    $query[] .= "FROM `online`";
    $query[] .= "WHERE `ip` = '$ip'";
    $query[] .= "AND `url` = '$url'";

    $query      = implode(' ', $query);
    $flagExist  = $db->isExist($query);

    $arrData    = array('ip' => $ip, 'url' => $url, 'time' => time());

    if ($flagExist) {
        // update
        $where = array(
            array('ip', $ip, strtoupper('and')),
            array('url', $url)
        );
        $db->update($arrData, $where);
    } else {
        // insert
        $db->insert($arrData);
    }
    // DELETE: time() + 10*60 < time()
    $query = "DELETE FROM `$params[table]` WHERE `time` + 30 < $arrData[time]";
    $db->query($query);   

    // SELECT
    $query = "SELECT * FROM $params[table] WHERE `url` = '$url'";
    $list = $db->listRecord($query);

    echo "<pre>";
    print_r($list);
    echo "</pre>"; 
?>

<body>
	<div id="wrapper">        
        <div class="title">User Online</div>
        <div id="form">
        <?php 
            echo __FILE__;
        ?>
        </div>              
    </div>
</body>
</html>
