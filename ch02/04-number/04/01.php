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
    $n = 8.5;
?>
<body>
    <div class="content1">
        <h1>Làm tròn số</h1>
        <h3>Round: Làm tròn</h3>
        <ul class="function">
            <li><span>Source: </span><?php echo $n; ?></li>
            <li><span>round(n): </span><?php echo round($n); ?></li>
            <li><span>round(n, 0): </span><?php echo round($n, 0); ?></li>
            <li><span>round(n, 0): </span><?php echo round($n, 0); ?></li>
            <li><span>round(n, 0, PHP_ROUND_HALF_UP): </span><?php echo round($n, 0, PHP_ROUND_HALF_UP); ?></li>
            <li><span>round(n, 0, PHP_ROUND_HALF_DOWN): </span><?php echo round($n, 0, PHP_ROUND_HALF_DOWN); ?></li>
            <li><span>round(n, 0, PHP_ROUND_HALF_ODD): </span><?php echo round($n, 0, PHP_ROUND_HALF_ODD); ?></li>
            <li><span>round(n, 0, PHP_ROUND_HALF_EVEN): </span><?php echo round($n, 0, PHP_ROUND_HALF_EVEN); ?></li>
        </ul>
    </div>
</body>
</html>

