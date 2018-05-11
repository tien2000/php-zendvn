<?php
    if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
        echo "Email không hợp lệ";
    } else {
        echo "Email hợp lệ";
    }