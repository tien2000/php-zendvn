<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="../styles.css">
    <title>Làm tròn số</title>
</head>
<?php
    // floor: Làm tròn đến số nguyên gần nhất & nhỏ nhất.
    $n = 8.5;
?>
<body>
    <div class="content1">
        <h1>Làm tròn số</h1>
        <h3>floor: Làm tròn đến số nguyên gần nhất và nhỏ nhất.</h3>
        <ul class="function">
            <li><span>Source: </span><?php echo $n; ?></li>
            <li><span>floor(n): </span><?php echo floor($n); ?></li>
        </ul>
    </div>
</body>
</html>

