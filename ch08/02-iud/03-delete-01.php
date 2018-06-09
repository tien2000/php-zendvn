<?php 
    // Kết nối
    @$conn = mysqli_connect('localhost', 'root', '') or die('Cannot Connect to Database');

    // DELETE
    mysqli_select_db($conn, 'db_manage_user');

    $id = '13';
    $sql = "DELETE FROM `group` WHERE `id` = '". $id ."'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo $total = mysqli_affected_rows($conn);
    } else{
        echo "Fail: " . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
?>