<?php
    $to = "neotien200065@gmail.com";
    $subject = "Test Email 3";
    $message = '<h3 style="color: red;">This is a Test 3</h3>';
    $header = "From: neotien200065@gmail.com \r\n";
    $header .= "Content-type: text/html; charset=utf-8 \r\n";

    if (mail($to, $subject, $message, $header) == true) {
        echo "Success";
    } else {
        echo "Fail";
    }
    