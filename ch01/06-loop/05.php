<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="content3">
        <h1>Images Gallery</h1>
        <div class="image">
            <?php
                $i = 1;
                do {
                    echo '<img src="images/nature-0'. $i .'.jpg" alt="nature-0'. $i .'">';
                    $flagShow = 0;
                    if (isset($_GET["show"])) {
                        $flagShow = $_GET["show"];
                        $i++;
                    }
                } while ($i <= 4 && $flagShow == 1);
            ?>
            <a href="05.php?show=1">Show All</a>
            <a href="05.php?show=0">Show Demo</a>
        </div>
    </div>
</body>
</html>