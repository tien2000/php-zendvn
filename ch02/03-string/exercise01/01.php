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

    // Cách 01
    function getInfo01($url){
        $info = explode("/", $url);
        $result = $info[count($info) - 1];
        return $result;
    }   

    // Cách 02
    function getInfo02($url){
        $arrUrl = parse_url($url);
        $info   = explode("/", $arrUrl["path"]);
        $result = $info[count($info) - 1];
    }

    function getInfo03($url){
        $i = strripos($url, "/");
        echo $i . "<br>";

        echo $reuslt = substr($url, $i + 1);
    }

    getInfo03($url);
?>