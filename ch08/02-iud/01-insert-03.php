<?php 
    // Kết nối
    @$conn = mysqli_connect('localhost', 'root', '') or die('Cannot Connect to Database');

    // INSERT
    mysqli_select_db($conn, 'db_manage_user');

    $arrData = array(
        array('name' => 'NeoTien 2', 'status' => 2, 'ordering' => 20),
        array('name' => 'Admin'),
        array('name' => 'Admin 2','ordering' => 20),
        array('id' => 20, 'name' => 'Admin 2','ordering' => 20, 'status' => 5),
    );
    

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
    
    foreach ($arrData as $value) {
        $newQuery = createInsertSQL($value);
        $sql = "INSERT INTO `group`(". $newQuery['cols'] .") VALUES (". $newQuery['vals'] .")";    
        mysqli_query($conn, $sql);
    }

    // Đóng kết nối
    mysqli_close($conn);
?>