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
            $( "#date" ).datepicker({
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

        require_once "functions.php";

        $arrType = array("-- Select Type --", "Day", "Month", "Year");        

        // Lấy giá trị người dùng nhập vào
        $date = (isset($_POST['date'])) ? $_POST['date'] : "";
        $type = (isset($_POST['selectType'])) ? $_POST['selectType'] : "";
        $value = (isset($_POST['value'])) ? $_POST['value'] : "";

        $strType = createSelectBox($arrType, "selectType", $type);
    ?>
    <div class="content">
        <h1>Exercise 07</h1>
        <form action="#" method="POST" id="mainForm" name="mainForm">            
            <div class="row">
                <p>Date: <input readonly="readonly" value="<?php echo $date; ?>" name="date" type="text" id="date"></p>                    
            </div> 
            <div class="row">
                <?php echo $strType; ?>                
            </div>  
            <div class="row">
                <p>Type: <input value="<?php echo $value; ?>" name="value" type="text" id="value"></p>                    
            </div> 
            <div class="row">
                <input type="submit" value="Submit">
            </div>       
        </form>

        <div class="result">
            <?php 
                 echo addTime("d/m/Y", $date, $arrType[$type], $value);
            ?>
        </div>
    </div>
</body>
</html>