<?php 
    // Kết nối
    @$conn = mysqli_connect('localhost', 'root', '');

    if (!$conn) {
        die('<h3>Fail</h3>');
    } else {
        echo '<h3>Success</h3>';
    }  

    // Danh sách table
    // $tables = mysqli_list_tables('db_manage_user', $conn);
    $sql = "SHOW TABLES FROM db_manage_user";
    $result = mysqli_query($conn, $sql);

    while( $row = mysqli_fetch_array($result) ){        
        // echo "<pre>";
        // print_r($row);
        // echo "</pre>";
        // echo '<h3>'. $row->Tables_in_db_manage_user .'</h3>';
        echo '<h3>'. $row[0] .'</h3>';
    }


    // Đóng kết nối
    mysqli_close($conn);
?>