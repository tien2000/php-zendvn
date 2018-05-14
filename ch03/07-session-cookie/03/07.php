<?php
    // Kiểm tra biến $_SESSION['age']
    // Tồn tại: Cập nhật
    // Chưa tồn tại: $_SESSION['age'] = 28

    session_start();
    
    session_destroy();

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
?>