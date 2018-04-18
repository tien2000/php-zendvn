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
    $str = "NeoTien is me, TienLS is me too";
?>
<body>
    <div class="content1">
        <h1>Change text to UPPERCASE</h1>
        <ul class="function">
            <li><span>Source: </span><?php echo $str; ?></li>
            <li><span>substr(2): </span><?php echo substr($str, 2); ?></li>
            <li><span>substr(2, 5): </span><?php echo substr($str, 2, 5); ?></li>
            <li><span>substr(0, 5): </span><?php echo substr($str, 0, 5); ?></li>
            <li><span>substr(-1): </span><?php echo substr($str, -1); ?></li>
            <li><span>substr(-3, 2): </span><?php echo substr($str, -3, 2); ?></li>
        </ul>
    </div>
</body>
</html>

