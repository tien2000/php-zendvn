<?php
    $fileName   = "files/abc.txt";
    $data       = file_get_contents("files/abc.txt");
    $record     = file($fileName);
    $space      = substr_count($data, " ");

    echo "<pre>";
    print_r($record);
    echo "</pre>";

    echo "<ul>";
    echo "<li>Tổng số dòng: " . count($record) . "</li>";
    echo "<li>Tổng số từ: " . str_word_count($data) . "</li>";
    echo "<li>Tổng số khoảng trắng: " . $space . "</li>";
    echo "<li>Tổng số ký tự: " . strlen($data) . "</li>";
    echo "</ul>";
?>