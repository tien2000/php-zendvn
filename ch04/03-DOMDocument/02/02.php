<?php
    $dom = new DOMDocument();
    $dom->load('../files/01.xml');

    $books = $dom->getElementsByTagName('book');
    
    $bookPHP = $books->item(0);    

    $currentNode = $bookPHP->tagName;    
    $parentNode = $bookPHP->parentNode->tagName;
    
    $titleNode = $bookPHP->getElementsByTagName('title')->item(0)->nodeValue;

    foreach ($bookPHP->attributes as $value) {
        echo 'Name: ' . $value->name. ' - Value: ' . $value->value . "<br>";
    }
?>