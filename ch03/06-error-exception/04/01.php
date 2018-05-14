<?php
    error_reporting(E_ALL ^ E_NOTICE);
    // ini_set("error_reporting", 0);
    foreach ($arr as $key => $value) {
        $xhtml .= $value;
    }
?>