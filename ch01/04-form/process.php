<?php
    $username = $_POST["username"];
    $password = $_POST["pass"];

    $result = ($username == "admin" && $password == "12345") ? "Đăng nhập thành công" : "Đăng nhập thất bại";

    echo $result;
?>