<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="content2">
        <h1>Xếp hình</h1>
        <ul>
           <li><a href="03.php?type=1"><img src="images/01.png" alt=""></a></li>
           <li><a href="03.php?type=2"><img src="images/02.png" alt=""></a></li>
           <li><a href="03.php?type=3"><img src="images/03.png" alt=""></a></li>
        </ul>
        <div class="result">
            <?php
                if (isset($_GET["type"])) {
                    $type = $_GET["type"];
                    switch ($type) {
                        case 1:
                                    /**
                                         *
                                         **
                                        ***
                                        ****  
                                    */
                            $i      = 1;
                            $n      = 6;
                            $result = "";
                            while ($i <= $n) {
                                echo $result = str_repeat("*", $i) . "<br>";
                                $i++;
                            }
                            break;

                        case 2:
                                    /**
                                        *****
                                        ****
                                        **
                                        * 
                                    */
                            $i      = 6;
                            $n      = 0;
                            $result = "";
                            while ($i >= $n) {
                                echo $result = str_repeat("*", $i) . "<br>";
                                $i--;
                            }
                            break;

                        case 3:
                                    /**
                                            *
                                           ***
                                          *****
                                         ******* 
                                    */
                            $i      = 1;
                            $n      = 6;
                            $space = "";
                            $charater = "";
                            $result = "";
                            while ($i <= $n) {
                                $space = str_repeat("&nbsp;&nbsp;", $n - $i);
                                $charater = str_repeat("*", 2 * $i - 1);
                                echo $result = $space . $charater . "<br>"; 
                                $i++;
                            }
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                }
            ?>
        </div>
    </div>

    
</body>
</html>