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
    <div class="content">
        <h1>Chép phạt</h1>
        <ul>
            <?php
                $n = 10;
                for ($i =  0; $i < $n; $i++) { 
                    echo "<li>I Love You!!!</li>";
                }
            ?>
        </ul>
    </div>
</body>
</html>