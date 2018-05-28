<?php 
    function callback($buffer){
        return str_replace('PHP', 'ZendVN', $buffer);
    }

    ob_start('callback');         // Bật bộ nhớ đệm
?>

<html>
    <body>
        <h1>PHP - Cache</h1>
    </body>
</html>

<?php 
    ob_end_flush();     // Tắt bộ nhớ đệm
?>