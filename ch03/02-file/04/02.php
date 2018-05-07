<?php
    $fileName   = "files/abc.txt";
    $data       = file_get_contents("files/abc.txt");
    $record     = file($fileName);
    $space      = substr_count($data, " ");

    preg_match_all("#\S#misU", $data, $noSpace);
    preg_match_all("#\S\s\S#misU", $data, $spaces);

    $charNoSpace = count($noSpace[0]);

    echo "<ul>";
        echo "<li>Tổng số dòng: " . count($record) . "</li>";
        echo "<li>Tổng số từ: " . str_word_count($data) . "</li>";
        echo "<li>Tổng số ký tự: " . strlen($data) . "</li>";
        echo "<li>Tổng số khoảng trắng: " . count($spaces[0]) . "</li>";
        echo "<li>Tổng số ký tự (no space): " . $charNoSpace . "</li>";
    echo "</ul>";
?>