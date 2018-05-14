<?php
    if (isset($_COOKIE['lastLogin'])) {
        $time = $_COOKIE['lastLogin'];
        echo 'Last Login: ' . date('d/m/Y H:i:s', $time);
        setcookie('lastLogin', time());
    } else {
        setcookie('lastLogin', time(), time() + 3600);
    }
    
?>