<?php

    $xml = simplexml_load_file('../files/01.xml');

    foreach ($xml as $value) {
        echo 'Title: ' . $value->title . "<br>";
        echo 'Author: ' . $value->author . "<br>";
        echo 'Pages: ' . $value->pages . "<br>";
        echo 'Weight: ' . $value->weight . ' ' . $value->weight->attributes() . "<br>";

        echo '<hr />>';
    }
?>