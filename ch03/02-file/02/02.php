<?php
    $filename = 'files/abc.txt';

    $size = filesize($filename);

    // echo $size;     // dir: Thư mục, file: Tập tin.

    function convertSize($size, $totalDigits = 2, $ditance = " "){
        $units = array("B", "KB", "MB", "GB", "TB");

        for ($i = 0; $i < count($units); $i++) { 
            if ($size > 1024) {
                $size = $size / 1024;
            }else {
                $unit = $units[$i];
                break;
            }
        }

        $result = round($size, $totalDigits) . $ditance . $unit;
        return $result;
    }

    echo convertSize($size, 3, " | ");
?>