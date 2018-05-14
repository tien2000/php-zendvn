<?php
    $arr = array(
        array('course' => 'PHP', 'time' => 114),
        array('course' => 'Wordpress', 'time' => 80),
        array('course' => 'HTML', 'time' => 100),
    );

    session_start();

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";

    $_SESSION['arrCourse'] = $arr;

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
?>