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
    <div class="content5">
        <?php
            $money = 0;
			if(isset($_POST["money"])) $money = $_POST["money"];
        ?>
        <div class="demoChangeMoney">
            <img src="images/atm.jpg" alt="">
            <h1>Mô phỏng máy ATM</h1>
            <p>Vui lòng nhập số tiền cần giao dịch</p>
            <form action="#" method="POST">
                <input type="text" name="money" value="<?php echo number_format($money);?>" />
                <input type="submit" value="Rút tiền">
            </form>
        </div>
        <div class="clr"></div>
        <?php
            define("ONE", 1000);
            define("TWO", 2000);
            define("FIVE", 5000);
            define("ONE_0", 10000);
            define("TWO_0", 20000);
            define("FIVE_0", 50000);
            define("ONE_00", 100000);
            define("TWO_00", 200000);
            define("FIVE_00", 500000);
        ?>
        <div class="result">
            <table>
                <tbody style="text-align: center;">
                    <tr>
                        <th style="width: 25%">Mệnh giá</th>
                        <th style="width: 25%">Số Lượng</th>
                        <th style="width: 18%">Thành Tiền</th>
                    </tr>
                    <?php
                        $five00 = 0;
                        $two00  = 0;
                        $one00  = 0;
                        $five0  = 0;
                        $totalPrice = 0;
                        $flagShow = false;                       

                        if (is_numeric($money) && $money >= 1000 ) {
                            $flagShow = true;
                            while ($money >= FIVE_00 ) {
                                $five00++;
                                $money = $money - FIVE_00;   
                            }
                            while ($money >= TWO_00 ) {
                                $two00++;
                                $money = $money - TWO_00;
                            }
                            while ($money >= ONE_00 ) {
                                $one00++;
                                $money = $money - ONE_00;
                            }
                            while ($money >= FIVE_0 ) {
                                $five0++;
                                $money = $money - FIVE_0;
                            }
                        }                                                     
                    ?>
                    <?php
                        if ($five00 > 0) {
                            echo '<tr>
                                    <td>'. number_format(FIVE_00) .'</td>
                                    <td>'. $five00 .'</td>
                                    <td>'. number_format(FIVE_00 * $five00) .'</td>
                                  </tr>';
                        }
                        if ($two00 > 0) {
                            echo '<tr>
                                    <td>'. number_format(TWO_00) .'</td>
                                    <td>'. $two00 .'</td>
                                    <td>'. number_format(TWO_00 * $two00) .'</td>
                                  </tr>';
                        }  
                        if ($one00 > 0) {
                            echo '<tr>
                                    <td>'. number_format(ONE_00) .'</td>
                                    <td>'. $one00 .'</td>
                                    <td>'. number_format(ONE_00 * $one00) .'</td>
                                  </tr>';
                        }  
                        if ($five0 > 0) {
                            echo '<tr>
                                    <td>'. number_format(FIVE_0) .'</td>
                                    <td>'. $five0 .'</td>
                                    <td>'. number_format(FIVE_0 * $five0) .'</td>
                                  </tr>';
                        }              
                        $totalPrice = FIVE_00 * $five00 + TWO_00 * $two00 + ONE_00 * $one00 + FIVE_0 * $five0;
                           
                    ?>
                </tbody>
            </table>
        </div>
        <hr>
        <div class="totalPrice">
            <?php
                if ($flagShow == true) {
                    echo '<p>Tổng tiền: <strong>'. number_format($totalPrice) .'</strong></p>';
                    echo '<p>Số dư: <strong>'. number_format($money) .'</strong></p>';
                }                            
            ?>   
        </div>
    </div>
</body>
</html>