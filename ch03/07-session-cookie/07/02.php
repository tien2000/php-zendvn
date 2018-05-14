<?php
    echo "<pre>";
    print_r($_COOKIE);
    echo "</pre>";

    setcookie('name');

    echo "<pre>";
    print_r($_COOKIE);
    echo "</pre>";
?>