<?php 
    /*
    *  mysqli_real_escape_string($conn, $id): Kiểm tra dữ liệu nhập vào
    */
?>

<?php 
    @$conn = mysqli_connect('localhost', 'root', '', 'db_manage_user') or die('Cannot connect to Database');

    mysqli_query($conn, 'SET NAMES "utf8"');
    mysqli_query($conn, 'SET CHARATER SET "utf8"');

    echo $id = $_GET['id'] . "<br>";
    echo $id = mysqli_real_escape_string($conn, $id);
    echo $query = "SELECT * FROM `group` WHERE `id` = $id";

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }
    

    mysqli_close($conn);
?>