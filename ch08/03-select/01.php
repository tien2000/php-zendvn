<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/styles.css">
<title>PHP & MySQL - Select</title>
</head>
<body>
	<div id="wrapper">
    	<div class="title">PHP & MySQL - Select</div>
        <div class="list">           
        	<div class="row header">
            	<p class="no">No</p>
                <p class="name">Group Name</p>
                <p class="status">Status</p>
                <p class="ordering">Ordering</p>
                <p class="id">ID</p>
            </div>

<?php 
    // Kết nối
    @$conn = mysqli_connect('localhost', 'root', '') or die('Cannot Connect to Database');
    mysqli_select_db($conn, 'db_manage_user');
    mysqli_query($conn, "SET NAMES 'utf8'");
    mysqli_query($conn, "SET CHARATER SET 'utf8'");

    $sql    = "SELECT * FROM `group`";
    $sql    .= " ORDER BY `ordering` ASC";

    $query[] = "SELECT * ";
    $query[] .= "FROM `group`";
    $query[] .= "ORDER BY `ordering` ASC";

    $query = implode(' ', $query);

    $result = mysqli_query($conn, $query);

    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $class = ($i % 2 == 0) ? 'odd' : 'even' ;
        $status = ($i % 2 == 0) ? 'Active' : 'Inactive' ;
        if (!empty($result)) {
            @$xhtml .= '<div class="row '. $class .'">
                    <p class="no">'. $i .'</p>
                    <p class="name">'. $row['name'] .'</p>
                    <p class="status">'. $status .'</p>
                    <p class="ordering">'. $row['ordering'] .'</p>
                    <p class="id">'. $row['id'] .'</p>
                </div>';
        } else{
            $xhtml .= 'Data Empty';
        }       
        
        $i++;
    }
    echo $xhtml;

    // Đóng kết nối
    mysqli_close($conn);
?>

            
    	</div>
    </div>
</body>
</html>


	
	
	
	
	
	