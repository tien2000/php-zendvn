<?php
    require_once "class/Validate.class.php";
    require_once "class/HTML.class.php";
    require_once "connect.php";
    session_start();

    $error          = '';
    $success        = '';
    $status         = '';
    $group          = '';
    $outputValidate = array();
    @$id            = $_GET['id'];
    $action         = $_GET['action'];
    $flagRedirect   = false;
    $linkForm       = '';
    $titlePage      = '';
    $requiredPass   = true;

    if ($action == 'edit') {
        $id          = $db->realEscapeString($id);
        $query       = "SELECT `username`, CONCAT(`firstname`,' ' , `lastname`) AS `fullname`, 
                                `email`, `birthday`, `group_id`, `status`, `ordering` 
                        FROM `$params[table]` WHERE `id` = '$id'";        
        $outputValidate = $db->singleRecord($query);        
        $linkForm       = 'form.php?action=edit&id=' . $id;        
        if (empty($outputValidate)) $flagRedirect = true;
        $titlePage      = 'EDIT USER';
        @$queryExistRecord = "SELECT `username` FROM `user` WHERE `username` = '" . $_POST['username'] . "' AND `id` != '" . $id . "'";
        $requiredPass   = false;
    } else if($action == 'add'){
        $linkForm       = 'form.php?action=add';
        $titlePage      = 'ADD USER';
        @$queryExistRecord = "SELECT `username` FROM `user` WHERE `username` = '" . $_POST['username'] . "'";
    } else {
        $flagRedirect   = true;        
    }
    
    // Redirect page
    if ($flagRedirect == true) {
        header('location: errors.php');
        exit();
    }    

    if (!empty($_POST)) {
        if (@$_SESSION['token'] == $_POST['token']) {        // refesh page
            unset($_SESSION['token']);
            header('location: ' . $linkForm);
            exit();
        } else {
            $_SESSION['token'] = $_POST['token'];
        }

        $source = array(
            'username'  => $_POST['username'], 
            'email'     => $_POST['email'],             
            'password'  => $_POST['password'],  // Tien123!@#
            'birthday'  => $_POST['birthday'], 
            'group_id'  => $_POST['group_id'], 
            'status'    => $_POST['status'], 
            'ordering'  => $_POST['ordering']
        );

        $validate = new Validate($source);
        $validate->addRule('username', 'existRecord', array('database' => $db, 'query' => $queryExistRecord))
                 ->addRule('email', 'email')
                 ->addRule('password', 'password', array('action' => $action), $requiredPass)
                 ->addRule('birthday', 'date', array('start' => '01/01/1970', 'end' => date('d/m/Y', time())))
                 ->addRule('group_id', 'group')
                 ->addRule('status', 'status')
                 ->addRule('ordering', 'int', array('min' => 1, 'max' => 10));

        $validate->run();
        $outputValidate = $validate->getResult();

        if (!$validate->isValid()) {
            $error = $validate->showErrors();
        } else {
            $outputValidate['birthday'] = date("Y-m-d", strtotime($outputValidate['birthday']));
            if ($action == 'edit') {
                if ($outputValidate['password'] != null) {
                    $outputValidate['password'] = md5($outputValidate['password']);
                } else {
                    unset($outputValidate['password']);
                }                
                $where = array(array('id', $id));
                $db->update($outputValidate, $where);
                $success = '<div class="success">Success</div>
                            <p>Dữ liệu đã được sửa thành công! Click vào <a href="index.php">đây</a> để quay về trang chủ</p>';
            } else if($action == 'add') {
                $outputValidate['password'] = md5($outputValidate['password']);
                $db->insert($outputValidate);
                $success = '<div class="success">Success</div>
                            <p>Dữ liệu đã được thêm thành công! Click vào <a href="index.php">đây</a> để quay về trang chủ</p>';
                $outputValidate = array();
            }
        }        
    }

    // SELECT STATUS
    $arrStatus = array(0 => 'InActive', 1 => 'Active');    
    @$status   = HTML::createSelectbox($arrStatus, 'status', $outputValidate['status']);

    // SELECT GROUP
    $query    = "SELECT `id`, `name` FROM `group`";
    @$group = $db->createSelectbox($query, 'group_id', $outputValidate['group_id']);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/images">
    <title><?php echo $titlePage; ?></title>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/tls-script.js"></script>    
</head>
<body>
    <div id="wrapper">
        <div class="title"><?php echo $titlePage; ?></div>
        <div id="form">
            <?php echo $error . $success; ?>
            <form action="<?php echo $linkForm; ?>" method="post" name="add-form">
                <div class="row">
                    <p>Username</p>
                    <input type="text" name="username" value="<?php echo @$outputValidate['username'] ?>">
                </div>
                <div class="row">
                    <p>Email</p>
                    <input type="text" name="email" value="<?php echo @$outputValidate['email'] ?>">
                </div>
                <div class="row">
                    <p>Password</p>
                    <input type="password" name="password" value="">
                </div>
                <div class="row">
                    <p>Birthday</p>
                    <input type="text" id="birthday" name="birthday" value="<?php echo date("d/m/Y", strtotime(@$outputValidate['birthday']))?>">
                </div>
                <div class="row">
                    <p>Group Name</p>
                    <?php echo $group; ?>
                </div>
                <div class="row">
                    <p>Status</p>
                    <?php echo $status; ?>
                </div>
                <div class="row">
                    <p>Ordering</p>
                    <input type="text" name="ordering" value="<?php echo @$outputValidate['ordering'] ?>">
                </div>
                <div class="row">
                    <input type="submit" value="Save" name="submit" id="save">
                    <input type="button" value="Cancel" name="cancel" id="cancel-button">
                    <input type="hidden" value="<?php echo time(); ?>" name="token" />
                </div>
            </form>
        </div>
    </div>
</body>
</html>