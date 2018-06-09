<?php 
    // Kết nối
    @$conn = mysqli_connect('localhost', 'root', '') or die('Cannot Connect to Database');

    // UPDATE
    mysqli_select_db($conn, 'db_manage_user');

    $sql = "UPDATE `group` SET `status` = '1', `ordering` = '10'
            WHERE `ordering` = '20'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo $total = mysqli_affected_rows($conn);
    } else{
        echo "Fail: " . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
?>