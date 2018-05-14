<?php
    session_start();

    $_SESSION['file'] = '<!DOCTYPE html>
                            <html lang="en">
                                <head>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                                    <title>Document</title>
                                </head>
                                <body>
                                    <h1>This is a File</h1>
                                </body>
                            </html>

                            <?php
                                function checkNumber($number){
                                    return ($number % 2 == 0)? "Số chẵn" : "Số lẻ";
                                }
                            ?>';

    eval('?>' . $_SESSION['file']);

    echo checkNumber(4);
?>