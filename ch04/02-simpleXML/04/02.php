<?php

    $xml = simplexml_load_file('../files/01.xml');
    $book = $xml->book[1];
    
    $attrs = $book->attributes();

    echo $attrs->tag;

    echo "<pre>";
    print_r($attrs);
    echo "</pre>";
?>