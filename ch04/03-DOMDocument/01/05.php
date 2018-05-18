<?php
    $book = array(
        'id'        => 1,
        'author'    => 'ZendVN',
        'title'     => 'Lập trình PHP',
        'pages'     => 500
    );

    $xml = new DOMDocument('1.0', 'UTF-8');

    $root = $xml->createElement('book');
    $xml->appendChild($root);

    foreach ($book as $key => $value) {
        $node = $xml->createElement($key, $value);
        $root->appendChild($node);
    }

    $xml->formatOutput = true;
    $xml->save('../files/tlsBook-05.xml') or die("Error");
?>