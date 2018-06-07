<?php 
    // Kết nối
    @$conn = mysqli_connect('localhost', 'root', '');

    if (!$conn) {
        die('<h3>Fail</h3>');
    } else {
        echo '<h3>Success</h3>';
    }

    // Đóng kết nối
    mysqli_close($conn);
?>