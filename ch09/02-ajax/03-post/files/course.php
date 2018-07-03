<?php 
    $course = array();
    $course[0] = array('id' => 1, 'name' => 'HTML');
    $course[1] = array('id' => 2, 'name' => 'CSS');
    $course[2] = array('id' => 3, 'name' => 'JS');

    if (isset($_POST['key'])) {
        echo json_encode($course[$_POST['key']]);
    }
?>