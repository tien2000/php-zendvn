<?php 
    // Kết nối
    @$conn = mysqli_connect('localhost', 'root', '');

    if (!$conn) {
        die('<h3>Fail</h3>');
    } else {
        echo '<h3>Success</h3>';
    }  

    // Chọn database
    $db = mysqli_select_db($conn, 'db_manage_user');


    // Đóng kết nối
    mysqli_close($conn);
?>