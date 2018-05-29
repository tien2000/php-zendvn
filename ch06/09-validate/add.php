<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>PHP FILE - ADD</title>
</head>

<?php 
if (!empty($_POST)) {
        require_once 'Validate.class.php';

        $errors = array();
        $result = array();

        $validate = new Validate($_POST);

        $validate->addRule('name', 'string', 5, 100)
                 ->addRule('age', 'int', 1, 90)
                 ->addRule('url', 'url')
                 ->addRule('email', 'email');

        $validate->run();

        $errors = $validate->showErrors();
        $result = $validate->getResult();        
        
    }
?>

<body>
    <div id="wrapper">
        <div class="title">VALIDATE EXERCISE</div>
        <div id="form">
            <?php echo $errors; ?>
            <form action="add.php" method="post" name="add-form">
                <div class="row">
                    <p>Name</p>
                    <input type="text" name="name" value="<?php echo @$result['name'] ?>">
                </div>

                <div class="row">
                    <p>Age</p>
                    <input type="text" name="age" value="<?php echo @$result['age'] ?>">
                </div>

                <div class="row">
                    <p>Website</p>
                    <input type="text" name="url" value="<?php echo @$result['url'] ?>">
                </div>

                <div class="row">
                    <p>Email</p>
                    <input type="text" name="email" value="<?php echo @$result['email'] ?>">
                </div>

                <div class="row">
                    <input type="submit" value="Save" name="submit" id="save">
                    <input type="button" value="Cancel" name="cancel" id="cancel-button">
                </div>
            </form>
        </div>
    </div>
</body>

</html>