<?php 
    // Kết nối
    @$conn = mysqli_connect('localhost', 'root', '') or die('Cannot Connect to Database');

    // INSERT
    mysqli_select_db($conn, 'db_manage_user');

    $arrData = array('name' => 'NeoTien 2', 'status' => 2, 'ordering' => 20);

    function createInsertSQL($data){
        $newQuery = array();
        $cols = '';
        $vals = '';
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $cols .= ", `$key`";
                $vals .= ", '$value'";
            }
        }

        $newQuery['cols'] = substr($cols, 2);
        $newQuery['vals'] = substr($vals, 2);
        
        return $newQuery;        
    }
    $newQuery = createInsertSQL($arrData);

    $sql = "INSERT INTO `group`(". $newQuery['cols'] .") VALUES (". $newQuery['vals'] .")";    

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo $total = mysqli_affected_rows($conn);
    } else{
        echo "Fail: " . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
?>