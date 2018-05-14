<?php
    // Kiểm tra biến $_SESSION['age']
    // Tồn tại: Cập nhật
    // Chưa tồn tại: $_SESSION['age'] = 28

    session_start();
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";

    if (isset($_SESSION['age'])) {
        $_SESSION['age'] = 30;
    } else {
        $_SESSION['age'] = 28;
    }

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
?>