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
            // Tìm số ngày trong tháng của năm
            $month = 2;
            $year  = 2020;
            $timeStamp = mktime(0,0,0, $month, 1, $year);

            echo $totalDays = date("t", $timeStamp);
        ?>
    </div>
</body>
</html>