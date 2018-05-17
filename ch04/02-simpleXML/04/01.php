<?php

    $xml = simplexml_load_file('../files/01.xml');
    
    echo "<pre>";
    print_r($xml->book[1]);
    echo "</pre>";

    $book = $xml->book[1];
    echo 'Title: ' . $book->title . "<br>";
    echo 'Sale-Off: ' . $book->price->saleoff . "<br>";
    echo 'Shipping VN: ' . $book->shipping->VN . "<br>";
?>