<?php
    $url = "http://210.245.126.171/Music/NhacTre/TinhYeu_LyMaiTrang/wma32/06_BienTham_TinhYeu_LyMaiTrang.wma";
    /*
        URL     : 06_BienTham_TinhYeu_LyMaiTrang.wma
        ID      : 06
        NAME    : Bien Tham
        ALBUM   : Tinh Yeu
        SINGER  : LyMaiTrang
        TYPE    : wma
    */

    // Cách 03
    function getInfo03($url){
        $i = strripos($url, "/");
        // echo $i . "<br>";

        return $result = substr($url, $i + 1);
    }

    function format($str){
        $result = $str[0];
        for ($i = 1; $i < strlen($str); $i++) { 
            if (ctype_upper($str[$i]) == true) {
                $result .= " " . $str[$i];
            } else {
                $result .= $str[$i];
            }
        }
        return $result;
    }

    $info = getInfo03($url);
    $arrInfo = explode("_", $info);
    $result = array();
    // ID
    $result["id"] = $arrInfo[0];
    
    // TYPE
    $arrType = explode(".", $arrInfo[3]);
    $result["type"] = $arrType[1];

    // NAME, AUDIO, SINGER
    $arrInfo[3] = $arrType[0];
    $result["name"] = format($arrInfo[1]);
    $result["album"] = format($arrInfo[2]);
    $result["singer"] = format($arrInfo[3]);


    // echo $info;

    echo "<pre>";
    print_r($result);
    echo "</pre>";
?>