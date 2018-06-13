<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Process</title>
</head>
<?php
    require_once "functions.php";
    require_once "class/Database.class.php";
?>
<body>
	<div id="wrapper">
        <div class="title">Process</div>
        <div id="form">
            <?php
                session_start();
                if (@$_SESSION['flagPermision'] == true) {
                    if ($_SESSION['timeout'] + 300 > time()) {
                        echo '<h3>Xin chào: '. $_SESSION['userInfo']['fullname'] .'</h3>';
                        echo '<a href="logout.php">Đăng xuất</a>';
                    } else {
                        session_unset();
                        header('location: login.php');
                    }                    
                } else {
                    if (!checkEmpty($_POST['username']) && !checkEmpty($_POST['password'])) {
                        $username   = $_POST['username'];
                        $password   = md5($_POST['password']);

                        $params = array(
                            'server' => 'localhost',
                            'username' => 'root',
                            'password' => '',
                            'database' => 'db_manage_user',
                            'table' => 'user',
                        );

                        $db = new Database($params);

                        $query[]  = "SELECT `id`, CONCAT(`firstname`, ' ', `lastname`) AS `fullname`, `username`, `email`, `birthday`, `address`";
                        $query[] .= "FROM `user`";
                        $query[] .= "WHERE `username` = '$username'";
                        $query[] .= "AND `password` = '$password'";

                        $query    = implode(' ', $query);
                        $db->query($query);
                        $userInfo = $db->singleRecord();
                        
                        if (!empty($userInfo)) {                            
                            $_SESSION['userInfo']       = $userInfo;
                            $_SESSION['flagPermision']  = true;
                            $_SESSION['timeout']        = time();
                            echo '<h3>Xin chào: '. $_SESSION['userInfo']['fullname'] .'</h3>';
                            echo '<a href="logout.php">Đăng xuất</a>';
                        } else{
                            header('location: login.php');
                        }
                    } else {
                        header('location: login.php');
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
