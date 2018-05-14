<?php
    ini_set("display_errors", "off");
    ini_set("log_errors", "on");
    ini_set("error_log", "php_error.log");

    foreach ($arr as $key => $value) {
        $xhtml .= $value;
    }
?>