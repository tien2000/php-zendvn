<?php 
    Session::init();
    $menu = '<a class="index" href="index.php?controller=index&action=index">Home</a>';
    if (Session::get('loggedIn') == true) {
        $menu .= '<a class="group" href="index.php?controller=group&action=index">Group</a>';
        $menu .= '<a class="user" href="index.php?controller=user&action=logout">Logout</a>';
    } else {
        $menu .= '<a class="user" href="index.php?controller=user&action=login">Login</a>';
    }
    
    if (!empty($this->js)) {
        foreach ($this->js as $js) {
            @$fileJS .= '<script type="text/javascript" src="'. VIEWS_URL . $js .'"></script>';
        }
    }

    if (!empty($this->css)) {
        foreach ($this->css as $css) {
            @$fileCSS .= '<link rel="stylesheet" href="'. VIEWS_URL . $css .'">';
        }
    }

    $title = isset($this->title) ? $this->title : 'MVC BASIC';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>

    <link rel="stylesheet" href="<?php echo CSS_URL; ?>styles.css">
    <?php echo @$fileCSS; ?>
    <script type="text/javascript" src="<?php echo JS_URL; ?>jquery.js"></script>
    <script type="text/javascript" src="<?php echo JS_URL; ?>custom.js"></script>
    <?php echo @$fileJS; ?>
    
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h3>Header</h3>
            <?php echo $menu; ?>
        </div>