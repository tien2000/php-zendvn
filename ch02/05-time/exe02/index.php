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
            // 2:20 PM Monday, 04/23/2018
            // 2:20 PM thứ 2, ngày 23/04/2018

            $result = date("h:i A D, d/m/Y", time());

            $arrEng = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
            $arrVi  = array('Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật');

            $result = str_replace($arrEng, $arrVi, $result);
            $result = str_replace(", ", ", ngày ", $result);

            echo $result;
        ?>
    </div>
</body>
</html>