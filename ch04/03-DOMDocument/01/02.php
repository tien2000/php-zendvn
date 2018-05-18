<?php
    $xml = new DOMDocument('1.0', 'UTF-8');    

    // Create Node
    $book   = $xml->createElement('book');
    $title  = $xml->createElement('title', 'Lập trình PHP');
    $author = $xml->createElement('author', 'ZendVN');
    $pages  = $xml->createElement('pages', 500);

    

    // Set relation
    $book->appendChild($title);
    $book->appendChild($author);
    $book->appendChild($pages);
    
    $xml->appendChild($book);

    $xml->formatOutput = true;
    $xml->save('../files/tlsBook-02.xml') or die("Error");
?>