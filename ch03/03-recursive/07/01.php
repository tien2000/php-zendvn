<?php
    function showAll($path, &$newStr){
        $data = scandir($path);

        $newStr .= "<ul>";
        foreach ($data as $key => $value) {
            if ($value != "." && $value != "..") {
                $dir = $path . "/" . $value;
                if (is_dir($dir)) {
                    $newStr .= '<li>D:' . $value;
                    showAll($dir, $newStr);
                    $newStr .= "</li>";
                }else {
                    $newStr .= '<li>F:'. $value .'</li>';    
                }                
            }
        }
        $newStr .= "</ul>";
    }    

    showAll('./files', $newStr);
    echo $newStr;
    
?>