<?php
    $dom = new DOMDocument();

    $dom->load('../files/tlsBook-01.xml');

    $bookNode = $dom->getElementsByTagName('book')->item(0);
    $authorNode = $dom->getElementsByTagName('author')->item(0);

    $weightNode = $dom->createElement('weigth', 100);

    $bookNode->insertBefore($weightNode, $authorNode);

    $dom->formatOutput = true;
    $dom->save('01.xml') or die("Cannot Save");

    echo "<pre>";
    print_r($bookNode);
    echo "</pre>";
?>