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
            $( "#datepicker" ).datepicker({
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

        $date = (isset($_POST['datepicker'])) ? $_POST['datepicker'] : "" ;
    ?>
    <div class="content">
        <h1>Exercise 01</h1>
        <form action="#" method="POST" id="mainForm" name="mainForm">
        <div class="row">
            <p>Date: <input readonly="readonly" value="<?php echo $date; ?>" name="datepicker" type="text" id="datepicker"></p>    
            <input type="submit" value="Submit">
        </div>            
        </form> 

        <div class="result">
            <?php 
                echo " Input: " . $date . "<br>";

                $format = "d/m/Y H:i:s";
                $date = date_parse_from_format($format, $date);    
                $timeStamp = mktime(0, 0, 0, $date["month"], $date["day"], $date["year"]);

                echo "Output: " .date("d-m-Y", $timeStamp);
            ?>
        </div>
    </div>
</body>
</html>