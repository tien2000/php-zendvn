<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Datepicker - Default functionality</title>
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/jquery-1.12.4.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#dateStart" ).datepicker({
                dateFormat: "dd-mm-yy",
                defaultDate: +7,
                changeYear: true,
                yearRange: "1900:2018",
                changeMonth: true
            });
            $( "#dateEnd" ).datepicker({
                dateFormat: "dd-mm-yy",
                defaultDate: +7,
                changeYear: true,
                yearRange: "1900:2018",
                changeMonth: true
            });
        } );
    </script>
</head>
<body>
    <?php 
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";

        $dateStart = (isset($_POST['dateStart'])) ? $_POST['dateStart'] : "" ;
        $dateEnd = (isset($_POST['dateEnd'])) ? $_POST['dateEnd'] : "" ;
    ?>
    <div class="content">
        <h1>Exercise 06</h1>
        <form action="#" method="POST" id="mainForm" name="mainForm">
        <div class="row">
            <p>Start: <input readonly="readonly" value="<?php echo $dateStart; ?>" name="dateStart" type="text" id="dateStart"></p>    
        </div> 
        <div class="row">
            <p>End: <input readonly="readonly" value="<?php echo $dateEnd; ?>" name="dateEnd" type="text" id="dateEnd"></p>    
            <input type="submit" value="Submit">
        </div>            
        </form> 

        <div class="result">
            <?php 
                function compareTwoDay($dateStart, $dateEnd){
                    $formatDay = "d/m/Y";
                    $arrDateStart = date_parse_from_format($formatDay, $dateStart);
                    $tsStart = mktime(0, 0, 0, $arrDateStart['month'], $arrDateStart['day'], $arrDateStart["year"]);

                    $arrDateEnd = date_parse_from_format($formatDay, $dateEnd);
                    $tsEnd = mktime(0, 0, 0, $arrDateEnd['month'], $arrDateEnd['day'], $arrDateEnd["year"]);

                    $result = 0;
                    if ($tsEnd > $tsStart) {
                        $result = 1;
                    } else if ($tsEnd < $tsStart){
                        $result = -1;
                    }

                    return $result;
                }

                if (compareTwoDay($dateStart, $dateEnd) == 1) {
                    echo "Start > End";
                } else if (compareTwoDay($dateStart, $dateEnd) == -1) {
                    echo "Start < End";
                } else {
                    echo "Start = End";
                }
            ?>
        </div>
    </div>
</body>
</html>