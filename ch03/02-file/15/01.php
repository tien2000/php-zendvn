<ul>
    <li>D: abc</li>
    <li>D: files
        <ul>
            <li>D: child</li>
            <li>F: abc.ini</li>
            <li>F: abc.txt</li>
            <li>F: def.txt</li>
        </ul>
    </li>
    <li>D: images</li>
    <li>F: abc.ies</li>
    <li>F: abc.ini</li>
    <li>F: abc.txt</li>
    <li>F: 01.php</li>
</ul>

<hr>

<?php
    $data = scandir(".");

    $result = "<ul>";
    foreach ($data as $key => $value) {
        if ($value != "." && $value != "..") {
            if (is_dir("./$value")) {
                $result .= "<li>D: $value<ul>";

                $dataChild = scandir("./$value");

                foreach ($dataChild as $keyChild => $valueChild) {
                    if ($valueChild != "." && $valueChild != "..") {
                        if (is_dir("./$value./$valueChild")) {
                            $result .= "<li>D: $valueChild</li>";
                        }else {
                            $result .= "<li>F: $valueChild</li>";
                        }
                    }                    
                }
                $result .= "</ul></li>";
            }else {
                $result .= "<li>F: $value</li>";    
            }
            
        }
    }
    $result .= "</ul>";

    echo $result;
?>