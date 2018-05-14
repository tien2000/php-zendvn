<?php
    $arr = array(
        array('name' => "TienLS", 'age' => 28),
        array('name' => "NeoTien", 'age' => 29),
        array('name' => "NeoNeo", 'age' => 30),
        array('name' => "Kurama", 'age' => 31),
        array('name' => "Tien", 'age' => 32)
    );

    foreach ($arr as $key => $value) {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
        die("Function die is call");
    }
?>