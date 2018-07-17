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
            <a class="index" href="index.php?controller=index&amp;action=index">Home</a>
            <a class="login" href="index.php?controller=login&amp;action=index">Login</a>
            <a class="group" href="index.php?controller=group&amp;action=index">Group</a>
        </div>