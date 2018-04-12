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
    <?php
        for ($i = 0; $i <= 10 ; $i++) { 
            if ($i == 3 || $i == 8) continue;
            echo $i . " ";
        }
    ?>
</body>
</html>