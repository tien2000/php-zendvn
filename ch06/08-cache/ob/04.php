<?php 
    ob_start();         // Bật bộ nhớ đệm

    echo $xhtml = '<html>
                    <body>
                        <h1>PHP - Cache</h1>
                    </body>
                </html>';

    $data = ob_get_contents();          // Lấy thông tin bộ nhớ đệm.
    ob_clean();
?>

<?php 
    ob_end_flush();     // Tắt bộ nhớ đệm
    echo $data . ' from $data';
?>