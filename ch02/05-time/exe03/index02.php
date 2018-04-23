<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Làm việc với thời gian</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="content">
        <h1>Làm việc với thời gian</h1>
        <?php 
            checkdate(2, 29, 2012);

            $year = 2020;
            if (checkdate(2, 29, $year)) {
                echo "Năm nhuận";
            } else {
                echo "Không là năm nhuận";
            }
        ?>
    </div>
</body>
</html>