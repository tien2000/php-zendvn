<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Manage User</title>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#multi-delete').click(function(){
                $("#main-form").submit();
            });
        });
    </script>
</head>

<?php
    require_once "connect.php";

    $query[]  = "SELECT g.id, g.name, g.status, g.ordering, COUNT(u.id) AS total";
    $query[] .= "FROM `group` AS g LEFT JOIN `user` as u ON g.id = u.group_id";    
    $query[] .= "GROUP BY g.id";

    $query  = implode(' ', $query);

    $list = $db->listRecord($query);
    $xhtml = '';
    if (!empty($list)) {
        $i = 0;
        foreach ($list as $item) {
            $class = ($i % 2 == 0) ? 'odd' : 'even' ;
            $id = $item['id'];
            $status = ($item['status'] == 0) ? 'Inactive' : 'Active' ;
            $xhtml  .= '<div class="row '. $class .'">
                            <p class="no">
                                <input type="checkbox" name="checkbox[]" value="'. $id .'">
                            </p>
                            <p class="name">'. $item['name'] .'</p>
                            <p class="id">'. $id .'</p>
                            <p class="status">'. $status .'</p>
                            <p class="ordering">'. $item['ordering'] .'</p>
                            <p class="member">'. $item['total'] .'</p>
                            <p class="action">
                                <a href="edit.php?id='. $id .'">Edit</a> |
                                <a href="delete.php?id='. $id .'">Delete</a>
                            </p>
                        </div>';
            $i++;   
        }
        
    } else {
        $xhtml = 'Empty Data';
    }
?>

<body>
	<div id="wrapper">
    	<div class="title">Manage User</div>
        <div class="list">   
        <form action="multi-delete.php" method="post" name="main-form" id="main-form">
            <div class="row" style="text-aglign: center; font-weight: bold;">
                <p class="no">
                    <!-- <input type="checkbox" name="checkbox[]" value=""> -->
                </p>
                <p class="name">Group Name</p>
                <p class="id">Id</p>
                <p class="status">Status</p>
                <p class="ordering">Ordering</p>
                <p class="member">Member</p>
                <p class="action">Action</p>
            </div>

            <?php 
                echo $xhtml;
            ?>            
        </form>
    	</div>        
	        <div id="area-button">
	        	<a href="add.php">Add Group</a>
	        	<a id="multi-delete" href="#">Delete Group</a>
	        </div>
    
    </div>
</body>
</html>
