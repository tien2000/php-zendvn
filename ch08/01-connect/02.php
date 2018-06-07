<?php 
    // Kết nối
    @$conn = mysqli_connect('localhost', 'root', '');

    if (!$conn) {
        die('<h3>Fail</h3>');
    } else {
        echo '<h3>Success</h3>';
    }  

    $db = mysqli_query($conn, 'SHOW DATABASES');

    // while( $row = mysqli_fetch_array( $db ) ){
    //     echo "<pre>";
    //     print_r($row);
    //     echo "</pre>";
    // }

    while( $row = mysqli_fetch_object($db) ){
        echo '<h3>'. $row->Database .'</h3>';
    }



    // Đóng kết nối
    mysqli_close($conn);
?>