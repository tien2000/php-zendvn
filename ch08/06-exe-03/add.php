<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>ADD GROUP</title>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/tls-script.js"></script>
</head>
<?php
    require_once "class/Validate.class.php";
    require_once "class/HTML.class.php";
    require_once "connect.php";

    $error   = '';
    $success = '';
    $status  = '';
    $outputValidate = array();

    if (!empty($_POST)) {
        $validate = new Validate($_POST);
        $validate->addRule('name', 'string', 2, 50)
                 ->addRule('status', 'status')
                 ->addRule('ordering', 'int', 1, 10);

        $validate->run();
        $outputValidate = $validate->getResult();

        if (!$validate->isValid()) {
            $error = $validate->showErrors();
        } else {
            $db->insert($outputValidate);
            $success = '<div class="success">Success</div>';
            $outputValidate = '';
        }        
    }

    $arrStatus = array(2 => 'Select Status', 0 => 'InActive', 1 => 'Active');    
    @$status = HTML::createSelecbox($arrStatus, 'status', $outputValidate['status']);
?>
<body>
    <div id="wrapper">
        <div class="title">ADD GROUP</div>
        <div id="form">
            <?php echo $error . $success; ?>
            <?php if($success == null){ ?>
            <form action="add.php" method="post" name="add-form">
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
                </div>
            </form>
            <?php } else{
                echo '<p>Dữ liệu đã được thêm thành công! Click vào <a href="index.php">đây</a> để quay về trang chủ</p>';
            } ?>
        </div>
    </div>
</body>
</html>