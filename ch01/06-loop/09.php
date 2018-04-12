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
    <div class="content4">
        <h1>Giải câu đố bằng vòng lặp</h1>
        <div class="question">
            <p>Yêu nhau cau sáu bổ ba</p>
            <p>Ghét nhau cau sáu bổ ra làm mười</p>
            <p>Mỗi người một miếng trăm người</p>
            <p>Có mười bảy quả hỏi người ghét nhau</p>
            <p>Hỏi có bao nhiêu người yêu nhau, ghét nhau?</p>            
        </div>
        <div class="answer">
            <p>Đáp án</p>
            <ul>
                <?php
                    for ($x=0; $x < 16; $x++) { 
                        for ($y=0; $y < 9; $y++) { 
                            if ($x + $y == 17 && $x*3 + $y*10 == 100) {
                                echo '<li>'. $x .' người yêu nhau, '. $y .' người ghét nhau</li>';
                            }
                        }
                    }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>