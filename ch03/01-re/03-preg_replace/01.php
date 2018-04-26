<style type="text/css">
    *{
        margin: 0;
        padding: 0;
    }

    a {
        font-weight: bold;
        color: red;
    }
</style>

<?php 
    $content = file('khoa-hoc.txt') or die("Cannot read file!");
    $content = implode("", $content);

    $pattern = "#Zend Framework#i";
    $replacement = '<a href="http://www.zendvn.com">Zend Framework</a>';

    $result = preg_replace($pattern, $replacement, $content);       // Tìm kiếm & thay thế nội dung

    echo $result;
?>