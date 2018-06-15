<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>EDIT GROUP</title>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/tls-script.js"></script>
</head>
<?php
    require_once "class/Validate.class.php";
    require_once "class/HTML.class.php";
    require_once "connect.php";
    session_start();

    $error   = '';
    $success = '';
    $status  = '';
    $outputValidate = array();
    $id      = $_GET['id'];
    $id      = $db->realEscapeString($id);

    $query = "SELECT `name`, `status`, `ordering` FROM `$params[table]` WHERE `id` = '$id'";
    $outputValidate = $db->singleRecord($query);

    if (empty($outputValidate)) {
        header('location: errors.php');
        exit();
    }

    if (!empty($_POST)) {
        if (@$_SESSION['token'] == $_POST['token']) {        // refesh page
            unset($_SESSION['token']);
            header('location: ' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            $_SESSION['token'] = $_POST['token'];
        }

        $source = array('name' => $_POST['name'], 'status' => $_POST['status'], 'ordering' => $_POST['ordering']);
        $validate = new Validate($source);
        $validate->addRule('name', 'string', 2, 50)
                 ->addRule('status', 'status')
                 ->addRule('ordering', 'int', 1, 10);

        $validate->run();
        $outputValidate = $validate->getResult();

        if (!$validate->isValid()) {
            $error = $validate->showErrors();
        } else {
            $where = array(array('id', $id));
            $db->update($outputValidate, $where);
            $success = '<div class="success">Success</div>
                        <p>Dữ liệu đã được sửa thành công! Click vào <a href="index.php">đây</a> để quay về trang chủ</p>';
        }        
    }

    $arrStatus = array(2 => 'Select Status', 0 => 'InActive', 1 => 'Active');    
    @$status = HTML::createSelecbox($arrStatus, 'status', $outputValidate['status']);
?>
<body>
    <div id="wrapper">
        <div class="title">EDIT GROUP</div>
        <div id="form">
            <?php echo $error . $success; ?>
            <form action="#" method="post" name="add-form">
                <div class="row">
                    <p>Name</p>
                    <input type="text" name="name" value="<?php echo @$outputValidate['name'] ?>">
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