<?php
    session_start();
    if (isset($_SESSION['age'])) {
        echo "Biến tồn tại";
    } else {
        echo "Biến chưa tồn tại";
    }
    
?>