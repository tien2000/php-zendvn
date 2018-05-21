<?php
    $dom = new DOMDocument();

    $dom->load('../files/tlsBook-01.xml');

    $bookNode = $dom->getElementsByTagName('book')->item(0);
    $authorNode = $dom->getElementsByTagName('author')->item(0);

    $bookNode->removeChild($authorNode);

    $dom->formatOutput = true;
    $dom->save('03.xml') or die("Cannot Save");
?>