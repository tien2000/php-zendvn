<?php
    require_once 'library/src/PHPMailer.php';
    require_once 'library/src/Exception.php';

    $tMail = new PHPMailer\PHPMailer\PHPMailer();

    // Thiết lập thông tin & email người gửi
    $tMail->setFrom('neotien200065@gmail.com', 'Tien Le');

    // Thiết lập thông tin & email người nhận
    $tMail->addAddress('tienls6589@gmail.com', 'TienLS');

    // Thiết lập tiêu đề
    $tMail->Subject = 'Test PHPMailer';

    // Thiết lập Charset
    $tMail->CharSet = 'utf-8';

    // Thiết lập nội dung
    $tMail->Body = 'Khóa học lập trình web với PHP - ZendVN || PHPMailer';

    if ($tMail->send() == false) {
        echo 'Error: ' . $tMail->ErrorInfo;
    } else {
        echo 'Success';
    }
    