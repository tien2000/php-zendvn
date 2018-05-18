<?php
    $xml = new DOMDocument('1.0', 'UTF-8');    

    // Create Node
    $book   = $xml->createElement('book');
    $title  = $xml->createElement('title', 'Lập trình PHP');
    $author = $xml->createElement('author', 'ZendVN');
    $pages  = $xml->createElement('pages', 500);    
    $weight  = $xml->createElement('weight', 200);    
    $price  = $xml->createElement('price');    
    $real  = $xml->createElement('real', 100.50);    
    $saleoff  = $xml->createElement('saleoff', 60);    

    $unitAttr = $xml->createAttribute('units');
    $unitAttr->value = 'gram';
    $weight->appendChild($unitAttr);

    // Set relation
    $book->appendChild($title);
    $book->appendChild($author);
    $book->appendChild($pages);
    $book->appendChild($weight);

    $price->appendChild($real);
    $price->appendChild($saleoff);
    $book->appendChild($price);
    
    $xml->appendChild($book);

    $xml->formatOutput = true;
    $xml->save('../files/tlsBook-04.xml') or die("Error");
?>