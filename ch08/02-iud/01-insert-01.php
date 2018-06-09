<?php 
    // Kết nối
    @$conn = mysqli_connect('localhost', 'root', '') or die('Cannot Connect to Database');

    // INSERT
    mysqli_select_db($conn, 'db_manage_user');

    $sql = "INSERT INTO `group`(`name`, `ordering`, `status`) VALUES
                                    ('TienLS', '1', '20'),
                                    ('NeoTien', '2', '30')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo $total = mysqli_affected_rows($conn);
    } else{
        echo "Fail: " . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
?>