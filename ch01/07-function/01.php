<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Function</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="content">
        <?php
            function createBox($boxName, $width, $height){
                echo '<div style="width: '. $width .'px; height: '. $height .'px">
                    <p>Box '. $boxName .' <span>('. $width .'x'. $height .')</span></p>
                </div>';
            }
            createBox("A", 200, 50);
            createBox("B", 300, 100);
        ?>
        
    </div>
</body>
</html>