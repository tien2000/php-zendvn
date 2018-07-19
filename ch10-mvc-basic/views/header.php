<?php 
    Session::init();
    $menu = '<a class="index" href="index.php?controller=index&action=index">Home</a>';
    if (Session::get('loggedIn') == true) {
        $menu .= '<a class="group" href="index.php?controller=group&action=index">Group</a>';
        $menu .= '<a class="user" href="index.php?controller=user&action=logout">Logout</a>';
    } else {
        $menu .= '<a class="user" href="index.php?controller=user&action=login">Login</a>';
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MVC BASIC</title>

    <link rel="stylesheet" href="<?php echo CSS_URL; ?>styles.css">
    <script type="text/javascript" src="<?php echo JS_URL; ?>jquery.js"></script>
    <script type="text/javascript" src="<?php echo JS_URL; ?>custom.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h3>Header</h3>
            <?php echo $menu; ?>
        </div>