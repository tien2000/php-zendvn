<?php
    $path = '/files/abc.txt';

    $baseName = pathinfo($path, PATHINFO_BASENAME);
    $extension = pathinfo($path, PATHINFO_EXTENSION);
    $fileName = pathinfo($path, PATHINFO_FILENAME);
    $dirName = pathinfo($path, PATHINFO_DIRNAME);

    echo "<ul>";
    echo "<li>PATH: <b>" . $path . "</b></li>";
    echo "<li>PATHINFO_BASENAME: <b>" . $baseName . "</b></li>";
    echo "<li>PATHINFO_EXTENSION: <b>" . $extension . "</b></li>";
    echo "<li>PATHINFO_FILENAME: <b>" . $fileName . "</b></li>";
    echo "<li>PATHINFO_DIRNAME: <b>" . $dirName . "</b></li>";
    echo "</ul>";
?>