<?php
    $to = "neotien200065@gmail.com, tienls6589@gmail.com";
    $subject = "Test Email 2";
    $message = "This is a Test 2";
    $header = "From: neotien200065@gmail.com";

    if (mail($to, $subject, $message, $header) == true) {
        echo "Success";
    } else {
        echo "Fail";
    }
    