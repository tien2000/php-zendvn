<?php
    $dom = new DOMDocument();

    $dom->load('../files/tlsBook-01.xml');

    $bookNode = $dom->getElementsByTagName('book')->item(0);
    $authorNode = $dom->getElementsByTagName('author')->item(0);

    $weightNode = $dom->createElement('weigth', 100);

    $units = $dom->createAttribute('units');
    $units->value = 'gram';
    $weightNode->appendChild($units);

    $bookNode->insertBefore($weightNode, $authorNode);

    $dom->formatOutput = true;
    $dom->save('02.xml') or die("Cannot Save");
?>