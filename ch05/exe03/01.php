<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <title>File Upload</title>
</head>
<body>
    <div class="content" style="text-align: left;">
        <h1>PHP OOP</h1>
        <?php 
            require_once 'PhanSo.class.php';

            $phanso1 = new PhanSo(5, 4);
            $phanso2 = new PhanSo(4, 6);
            $phanso1->thuongPS($phanso2);

            echo 'ShowPS: ' . $phanso1->showPS() . "<br>";
        ?>
    </div>
</body>
</html>