<?php
    function tlsError($err_level, $err_mes, $err_file, $err_line, $err_context){
        echo "<pre>";
        print_r($err_context);
        echo "</pre>";

        $result[] = '<b>Error Number: </b>' . $err_level;
        $result[] = '<b>Error Message: </b>' . $err_mes;
        $result[] = '<b>Error File: </b>' . $err_file;
        $result[] = '<b>Error Line: </b>' . $err_line;

        $result = implode("<br>", $result);

        die($result);
    }

    set_error_handler("tlsError");

    echo $test;
?>