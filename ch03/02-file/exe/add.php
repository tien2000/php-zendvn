<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>PHP FILE - ADD</title>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#cancel-button').click(function(){
                window.location = 'index.php';
            });
        });
    </script>

</head>
<?php
    require_once "functions.php";
?>
<body>
    <?php
        $title              = "";
        $description        = "";
        $errorTitle         = "";
        $errorDescription   = "";
        $flag               = false;

        if (isset($_POST['title']) && isset($_POST['description'])) {
            $title       = $_POST['title'];
            $description = $_POST['description'];

            // Error Title            
            if (checkEmpty($title)) $errorTitle = '<p class="error">Dữ liệu không được rỗng</p>';
            if (!checkEmpty($title) && checkLength($title, 5, 100)) $errorTitle .= '<p class="error">Tiêu đề phải từ 5 đến 100 ký tự</p>'; 

            // Error Description            
            if (checkEmpty($description)) $errorDescription = '<p class="error">Dữ liệu không được rỗng</p>';
            if (!checkEmpty($description) && checkLength($description, 10, 5000)) $errorDescription .= '<p class="error">Tiêu đề phải từ 10 đến 5000 ký tự</p>'; 

            if ($errorTitle == "" && $errorDescription == "") {
                $data = $title . "||" . $description;
                $name = randomStr(5);
                $fileName = "files/" . $name. ".txt";
                if (file_put_contents($fileName, $data)) {
                    $title          = "";
                    $description    = "";
                    $flag           = true;
                }
            }
        }
    ?>

	<div id="wrapper">
    	<div class="title">PHP FILE - ADD</div>
        <div id="form">   
			<form action="add.php" method="post" name="add-form">
				<div class="row">
					<p>Title</p>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                    <?php echo $errorTitle; ?>
				</div>
				
				<div class="row">
					<p>Description</p>
                    <textarea name="description" rows="5" cols="100"><?php echo $description; ?></textarea>
                    <?php echo $errorDescription; ?>
				</div>
				
				<div class="row">
					<input type="submit" value="Save" name="submit" id="save">
					<input type="button" value="Cancel" name="cancel" id="cancel-button">
                </div>		
                
                <?php
                    if ($flag == true) {
                        echo '<p>Dữ liệu đã được ghi thành công! Click vào <a href="index.php">đây</a> để quay về trang chủ</p>';
                    }
                ?>
			</form>    
        </div>        
    </div>
</body>
</html>
