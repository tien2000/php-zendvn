<?php

    $xml = simplexml_load_file('../files/01.xml');

    echo gettype($xml) . "<br>";

    echo $strXML = $xml->asXML() . "<br>";

    echo gettype($strXML) . "<br>";
?>