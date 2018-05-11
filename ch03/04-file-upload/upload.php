<?php
    function randomStr($length = 5){
        $arrChar = array_merge(range("A", "Z"), range("a", "z"), range("0", "9")) ;
        $arrChar = implode($arrChar);
        $arrChar = str_shuffle($arrChar);
        $result = substr($arrChar, 0, $length);
        return $result;
    }

    $fileUpload = $_FILES['fileUpload'];
    
    if (!empty($fileUpload['name'])) {
        $fileName = $fileUpload['tmp_name'];
        $random = randomStr(6);
        $destination = './images/' . $random . $fileUpload['name'];
        // move_uploaded_file($fileName, $destination);
        if (copy($fileName, $destination)) {
            echo "Success";
        }
    }
?>