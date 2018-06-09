<?php 
    // Kết nối
    @$conn = mysqli_connect('localhost', 'root', '') or die('Cannot Connect to Database');

    // DELETE
    mysqli_select_db($conn, 'db_manage_user');

    $arrId = array(25, 26);
    $deleteID = '';

    foreach ($arrId as $id) {
        $deleteID .= ", '". $id ."'";
        $deleteID = substr($deleteID, 1);
    }

    $sql = "DELETE FROM `group` WHERE `id` IN ($deleteID)";
    $result = mysqli_query($conn, $sql);    
    if ($result) {
        echo $total = mysqli_affected_rows($conn);
    } else{
        echo "Fail: " . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
?>