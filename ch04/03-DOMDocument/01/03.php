<?php
    $xml = new DOMDocument('1.0', 'UTF-8');    

    // Create Node
    $book   = $xml->createElement('book');
    $title  = $xml->createElement('title', 'Lập trình PHP');
    $author = $xml->createElement('author', 'ZendVN');
    $pages  = $xml->createElement('pages', 500);    
    $weight  = $xml->createElement('weight', 200);    

    $unitAttr = $xml->createAttribute('units');
    $unitAttr->value = 'gram';
    $weight->appendChild($unitAttr);

    // Set relation
    $book->appendChild($title);
    $book->appendChild($author);
    $book->appendChild($pages);
    $book->appendChild($weight);
    
    $xml->appendChild($book);

    $xml->formatOutput = true;
    $xml->save('../files/tlsBook-03.xml') or die("Error");
?>