<?php
    require_once "define.php";
    
    function __autoload($className){
        require_once LIBS_PATH . "{$className}.php";
    }

    $bootstrap = new Bootstrap;
    $bootstrap->init();
?>