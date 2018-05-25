<?php
    require_once 'library/src/PHPMailer.php';
    require_once 'library/src/Exception.php';
    require_once 'library/src/SMTP.php';
    require_once 'library/src/OAuth.php';

    $tMail = new PHPMailer\PHPMailer\PHPMailer();

    // Gọi lớp SMTP
    $tMail->isSMTP();

    // Hiển thị thông báo trong quá trình kết nối SMTP
    // 1 = Hiển thị message + error
    // 2 = Hiển thị message
    $tMail->SMTPDebug   = 1;

    // Thuộc tính bắt đăng nhập
    $tMail->SMTPAuth    = true;

    // Thông tin email
    $tMail->Host        = 'smtp.gmail.com';
    $tMail->Port        = 25;
    $tMail->Username    = 'neotien200065@gmail.com';
    $tMail->Password    = 'Lesongtien@2016@';

    // Thiết lập thông tin & email người gửi
    $tMail->setFrom('neotien200065@gmail.com', 'Tien Le');

    // Thiết lập thông tin & email người nhận
    $tMail->addAddress('tienls6589@gmail.com', 'TienLS');

    // Thiết lập tiêu đề
    $tMail->Subject = 'Test PHPMailer';

    // Thiết lập Charset
    $tMail->CharSet = 'utf-8';

    // Thiết lập nội dung
    $body = 'Khóa học lập trình web với <b>PHP - ZendVN || PHPMailer</b>';
    // $tMail->Body = $body;
    $tMail->msgHTML($body);     // Nhận các thẻ HTML    

    if ($tMail->send() == false) {
        echo 'Error: ' . $tMail->ErrorInfo;
    } else {
        echo 'Success';
    }
    