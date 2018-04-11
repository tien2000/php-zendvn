<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mô phỏng máy tính điện tử</title>
    <link rel="stylesheet" href="styles.css">
</head>

<?php
    $n1  = "";
    $n2  = "";
    $cal = "";
    $result = 0;
    $flag = true;

    if (isset($_POST["num1"]) && isset($_POST["num2"]) && isset($_POST["caculate"])) {
        $n1  = $_POST["num1"];
        $n2  = $_POST["num2"];
        $cal = $_POST["caculate"];       

        if (is_numeric($n1) && is_numeric($n2)) {
            switch ($cal) {
                case '+':
                    $result = $n1 + $n2;
                    break;
                
                case '-':
                    $result = $n1 - $n2;
                    break;
    
                case '*':
                case 'x':
                    $result = $n1 * $n2;
                    break;
    
                case '/':
                case ':':
                    $result = $n1 / $n2;
                    break;
    
                case '%':
                    $result = $n1 % $n2;
                    break;
                
                default:
                    $result = $n1 + $n2;
                    $cal = "+";
                    break;
            }
        }else{
            $flag = false;
            $result = "Không thực hiện được phép toán!";
        }        
    }    
?>

<body>
    <div class="content">
        <h1>Mô phỏng máy tính điện tử</h1>

        <form action="#" method="post" name="main-form">
            <div class="row">
                <span>Số thứ nhất</span>
                <input type="text" name="num1" id="" value="<?php echo $n1 ?>">
            </div>
            <div class="row">
                <span>Phép toán</span>
                <input type="text" name="caculate" id="" value="<?php echo $cal ?>">
            </div>
            <div class="row">
                <span>Số thứ hai</span>
                <input type="text" name="num2" id="" value="<?php echo $n2 ?>">
            </div>

            <div class="row">
                <input type="submit" name="btnSubmit" value="Xem kết quả">   
            </div>           

            <div class="row">
                <p>
                    <?php
                        if ($flag == true) {
                            echo "Kết quả: " . $n1 . " " . $cal . " " . $n2 . " = " . $result;
                        } else{
                            echo $result;
                        }
                    ?>
                </p>
            </div>
        </form>
    </div>
</body>
</html>