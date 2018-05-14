<?php
    $variable = "This is a String";

    session_start();

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";

    $_SESSION['variable'] = $variable;

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
?>