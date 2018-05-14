<?php
    $to = "neotien200065@gmail.com";
    $subject = "Test Email";
    $message = "This is a Test";
    $header = "From: neotien200065@gmail.com";

    if (mail($to, $subject, $message, $header) == true) {
        echo "Success";
    } else {
        echo "Fail";
    }
    