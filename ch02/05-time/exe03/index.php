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
            // Leap Year: Năm nhuận
            // year % 400 == 0 && (year % 400 == 0 || year % 100 != 0)
            function is_leap_year($year) {
                $flag = false;
                if ((($year % 4) == 0) && ((($year % 100) != 0) || (($year % 400) == 0))) {
                    $flag = true;
                }
                return $flag;
            }

            $year = 2016;
            if (is_leap_year($year)) {
                echo "Năm nhuận";
            } else {
                echo "Không là năm nhuận";
            }
        ?>
    </div>
</body>
</html>