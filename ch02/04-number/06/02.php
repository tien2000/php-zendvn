<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="../styles.css">
    <title>Hình ảnh ngẫu nhiên</title>

    <script type="text/javascript">
        function refeshPage(){
            window.location.reload();
        }
    </script>
</head>
<?php
    $n = 8.5;
?>
<body>
    <div class="content3">
        <h1>Hình ảnh ngẫu nhiên</h1>
        <h3>rand()</h3>
        <div class="image">
            <?php 
                $num = rand(1, 4);
                echo '<img src="images/nature-0'. $num .'.jpg" alt="">';
            ?>            
        </div>
        <a href="javascript:refeshPage();">Random image</a>
    </div>
</body>
</html>

