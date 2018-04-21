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
                dateFormat: "dd/mm/yy",
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
        <form action="#" method="POST" id="mainForm" name="mainForm">
            <p>Date: <input readonly="readonly" value="<?php echo $date; ?>" name="datepicker" type="text" id="datepicker"></p>    
            <input type="submit" value="Submit">
        </form> 
    </div>
</body>
</html>