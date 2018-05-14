<?php
    session_start();

    $funcCheckNumber = 'function checkNumber($number){
                            return ($number % 2 == 0)? "Số chẵn" : "Số lẻ";
                        }';

    $_SESSION['function'] = $funcCheckNumber;

    eval($_SESSION['function']);
    
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
?>