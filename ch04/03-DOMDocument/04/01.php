<?php 
    $dom = new DOMDocument();
    $dom->load('../files/01.xml');

    $xPath = new DOMXPath($dom);

    // Lấy những quyển sách có thuộc tính ID
    $query  = '//book[@id]';
    $result = $xPath->query($query)->item(0);

    // Lấy những quyển sách có thuộc tính ID = 22
    $query  = '//book[@id = 22]';
    $result = $xPath->query($query)->item(0);

    echo "<pre>";
    print_r($result);
    echo "</pre>";
?>