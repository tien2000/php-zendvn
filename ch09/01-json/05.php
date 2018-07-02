<?php 
    $tlsCourse = array(
        array( 'id' => 2, 'name' => 'HTML' ),
        array( 'id' => 3, 'name' => 'CSS' ),
        array( 'id' => 4, 'name' => 'PHP' )
    );

    echo $tlsCourseEncode = json_encode($tlsCourse);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JSON</title>
    <script type="text/javascript" src="js/json2.js"></script>
    <script type="text/javascript">
        var str = '<?php echo $tlsCourseEncode; ?>';
        var tlsObj = JSON.parse(str);
        console.log(tlsObj[0].id);
        console.log(tlsObj[0].name);
    </script>
</head>
<body>
    
</body>
</html>