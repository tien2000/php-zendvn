<?php
    $to = "neotien200065@gmail.com";
    $subject = "Test Email 4";
    $message = '<h3 style="color: red;">This is a Test 4</h3>';
    $header = "From: neotien200065@gmail.com \r\n";
    $header .= "Content-type: text/html; charset=utf-8 \r\n";
    $header .= "Cc: tienls6589@gmail.com \r\n";
    $header .= "Bcc: lesongtien6589@gmail.com \r\n";

    if (mail($to, $subject, $message, $header) == true) {
        echo "Success";
    } else {
        echo "Fail";
    }
    