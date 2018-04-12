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
            function checkNumber($val){
                echo $val . "<br>";
                if ($val % 2 == 0) {
                    return true;
                } else {
                    return false;
                }
            }

            $result = checkNumber(12);
            if ($result == true) {
                echo "Số Chẵn";
            } else {
                echo "Số Lẻ";
            }
        ?>
        
    </div>
</body>
</html>