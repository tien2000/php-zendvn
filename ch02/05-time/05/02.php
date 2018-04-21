<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thao tác với thời gian</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<?php 
    $arrDays   = range(1, 31);
    $arrMonths = range(1, 12);
    $arrYears  = range(1970, 2018);

    function createSelectBox($arrData = array(), $selectBoxName, $keySelected){
        if (!empty($arrData)) {
            $str = '<select name="'. $selectBoxName .'" id="'. $selectBoxName .'">';
                for ($i = 0; $i <= count($arrData) - 1; $i++) { 
                    if ($keySelected == $i) {
                        $str .= '<option selected value="'. $i .'">'. $arrData[$i] .'</option>';
                    } else {
                        $str .= '<option value="'. $i .'">'. $arrData[$i] .'</option>';
                    }
                }
            $str .= '</select>';
        }
        return $str;
    }

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    $days = (isset($_POST['daysSelect'])) ? $_POST['daysSelect'] : 0;
    $months = (isset($_POST['monthsSelect'])) ? $_POST['monthsSelect'] : 0;
    $years = (isset($_POST['yearsSelect'])) ? $_POST['yearsSelect'] : 0;
?>

<body>
    <div class="content">
    <h1>Thao tác với thời gian</h1>
        <form action="#" method="POST" id="mainForm" name="mainForm">            
            <div class="row">
                <span>Ngày</span>
                <?php echo createSelectBox($arrDays, "daysSelect", $days); ?>
            </div>
            <div class="row">
                <span>Tháng</span>
                <?php echo createSelectBox($arrMonths, "monthsSelect", $months); ?>
            </div>
            <div class="row">
                <span>Năm</span>
                <?php echo createSelectBox($arrYears, "yearsSelect", $years); ?>
            </div>

            <div class="row">
                <input type="submit" value="Check Date">
            </div>

            <div class="result">
                <span>Kết quả: </span>
                <?php 
                    echo "$arrDays[$days]/$arrMonths[$months]/$arrYears[$years]"; 
                    if (checkdate($arrMonths[$months], $arrDays[$days], $arrYears[$years])) {
                        echo "<p>Ngày hợp lệ</p>";
                    } else {
                        echo "<p>Ngày không hợp lệ</p>";
                    }
                ?>
            </div>
        </form>
    </div>
</body>
</html>