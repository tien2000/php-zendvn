<?php 
    function checkEmail($val){
        $flag = false;
        $pattern = '#^[a-z][a-z0-9_\.]{4,31}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$#';
        if (preg_match($pattern, $val) == true){
            $flag = true;
        }
        return $flag;
    } 

    function checkUser($val){
        $flag = false;
        $pattern = '#^[a-z_][a-z0-9_\.\s]{4,31}$#';
        if (preg_match($pattern, $val) == true){
            $flag = true;
        }
        return $flag;
    }

    function checkPassword($val){
        $flag = false;
        $pattern = '#^(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,32}$#';
        if (preg_match($pattern, $val) == true){
            $flag = true;
        }
        return $flag;
    }

    function checkWebsite($val){
        $flag = false;
        $pattern = '#^(https?://(www\.)?|(www\.))[a-z0-9\-]{3,}(\.[a-z]{2,4}){1,2}$#';
        if (preg_match($pattern, $val) == true){
            $flag = true;
        }
        return $flag;
    }


    $result     = checkEmail("neotien200065@gmail.com");
    $user       = checkUser("tienls6589");
    $pass       = checkPassword("Lesongtien@2015@");
    $website    = checkWebsite("www.zendvn.com");
    echo $website;
?>