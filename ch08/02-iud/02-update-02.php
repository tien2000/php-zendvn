<?php 
    // Kết nối
    @$conn = mysqli_connect('localhost', 'root', '') or die('Cannot Connect to Database');

    // UPDATE
    mysqli_select_db($conn, 'db_manage_user');

    function createUpdateSQL($data){
        $newQuery = '';
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $newQuery .= ", `$key` = '$value'";
            }
        }
        $newQuery = substr($newQuery, 2);
        return $newQuery;
    }

    $data = array('status' => 1 , 'ordering' => 100, 'name' => 'TienLS');    

    $newQuery = createUpdateSQL($data);

    $sql = "UPDATE `group` SET ". $newQuery ." WHERE `ordering` = '20'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo $total = mysqli_affected_rows($conn);
    } else{
        echo "Fail: " . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
?>