<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="../styles.css">
    <title>Trích xuất nội dung chuỗi</title>
</head>
<?php
    $str = "NeoTien is me";
?>
<body>
    <div class="content1">
        <h1>Trích xuất nội dung chuỗi</h1>
        <ul class="function">
            <li><span>Source: </span><?php echo $str; ?></li>           
            <li><span>substr(0, 3): </span><?php echo substr($str, 0, 3) ?></li>           
            <li><span>substr(3, 3): </span><?php echo substr($str, 3, 3) ?></li>           
            <li><span>substr(3, -3): </span><?php echo substr($str, 3, -3) ?></li>           
            <li><span>substr(-3, 3): </span><?php echo substr($str, -3, 3) ?></li>           
            <li><span>substr(-3, -3): </span><?php echo substr($str, -3, -3) ?></li>           
            <li><span>substr(-3, 0): </span><?php echo substr($str, -3, 0) ?></li>           
        </ul>
    </div>
</body>
</html>

