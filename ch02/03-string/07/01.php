<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="../styles.css">
    <title>Xác định vị trí</title>
</head>
<?php
    $str = "NeoTien is me";
?>
<body>
    <div class="content1">
        <h1>Change text to UPPERCASE</h1>
        <ul class="function">
            <li><span>Source: </span><?php echo $str; ?></li>            
            <li><span>stripos: </span><?php echo stripos($str, "i"); ?></li>            
            <li><span>strripos: </span><?php echo strripos($str, "i"); ?></li>            
        </ul>
    </div>
</body>
</html>

