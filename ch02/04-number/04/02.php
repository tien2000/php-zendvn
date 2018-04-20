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
    // ceil: Làm tròn đến số nguyên gần nhất & lớn nhất.
    $n = 8.5;
?>
<body>
    <div class="content1">
        <h1>Làm tròn số</h1>
        <h3>ceil: Làm tròn đến số nguyên gần nhất và lớn nhất.</h3>
        <ul class="function">
            <li><span>Source: </span><?php echo $n; ?></li>
            <li><span>ceil(n): </span><?php echo ceil($n); ?></li>
        </ul>
    </div>
</body>
</html>

