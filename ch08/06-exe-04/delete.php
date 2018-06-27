<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>PHP FILE</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/tls-script.js"></script>
</head>

    <?php
        require_once "connect.php";        
        $id     = $_GET['id'];
        $query  = "SELECT u.`id`, CONCAT(u.`firstname`, ' ', u.`lastname`) AS fullname, u.`username`, u.`email`, u.`birthday`, u.`status`, u.`ordering`, u.`address` FROM `$params[table]` AS u WHERE `id` = '$id'";
        $notice = '';
        $xhtml  = '';
        $item   = $db->singleRecord($query);    
        
        if (!empty($item)) {
            $status = ($item['status'] == 0) ? 'Inactive' : 'Active';
            $xhtml  = '<div class="row">
                            <p>Id:</p>
                            <span>'.$item['id'].'</span>
                        </div>
                        <div class="row">
                            <p>Username:</p>
                            <span>'.$item['username'].'</span>
                        </div>
                        <div class="row">
                            <p>Fullname:</p>                            
                            <span>'.$item['fullname'].'</span>
                        </div>
                        <div class="row">
                            <p>Email:</p>                            
                            <span>'.$item['email'].'</span>
                        </div>
                        <div class="row">
                            <p>Birthday:</p>                            
                            <span>'. date('d/m/Y', strtotime($item['birthday'])).'</span>
                        </div>
                        <div class="row">
                            <p>Address:</p>                            
                            <span>'.$item['address'].'</span>
                        </div>
                        <div class="row">
                            <p>Status:</p>                            
                            <span>'.$status.'</span>
                        </div>
                        <div class="row">
                            <p>Ordering:</p>
                            <span>'.$item['ordering'].'</span>
                        </div>
                        <div class="row">
                            <input type="hidden" name="id" value="'.$id.'">
                            <input type="submit" value="Delete" name="submit">
                            <input type="button" value="Cancel" name="cancel" id="cancel-button">
                        </div>';
        } else {
            header('location: errors.php');
            exit();
        }
        
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $query = "DELETE FROM `$params[table]` WHERE `id` = '$id'";
            $db->query($query);
            $notice = "Success";
        }
    ?>

<body>
	<div id="wrapper">
    	<div class="title">PHP FILE</div>
        <div id="form">   
        <?php if($notice == null) { ?>
            <form action="" method="post" name="main-form">
                <?php echo $xhtml; ?>     
                           
            </form>    
		<?php
			}else{
				echo '<div class="success">Dữ liệu đã được xóa thành công! Click vào <a href="index.php">đây</a> để quay về trang chủ</div>';
			} 
		?>     
        </div>
        
    </div>
</body>
</html>
