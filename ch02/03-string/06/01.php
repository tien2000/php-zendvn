<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="../styles.css">
    <title>Change text to UPPERCASE</title>
</head>
<?php
    $str = "NeoTien is me";
?>
<body>
    <div class="content1">
        <h1>Change text to UPPERCASE</h1>
        <ul class="function">
            <li><span>Source: </span><?php echo $str; ?></li>
            <li><span>strtoupper: </span><?php echo strtoupper($str); ?></li>
            <li><span>strtolower: </span><?php echo strtolower($str); ?></li>
            <li><span>strtolower: </span><?php echo ucfirst($str); ?></li>
            <li><span>strtolower: </span><?php echo lcfirst($str); ?></li>
            <li><span>strtolower: </span><?php echo ucwords($str); ?></li>
        </ul>
    </div>
</body>
</html>

