<?php     
    // ================= PATHS ====================
    define("DS"                 , DIRECTORY_SEPARATOR);     
    define("ROOT_PATH"          , dirname(__FILE__));                                   // root Directory
    define("LIBS_PATH"          , ROOT_PATH . DS . "libs" . DS);                        // libs Directory    
    define("CONTROLLERS_PATH"   , ROOT_PATH . DS . "controllers" . DS);                 // controllers Directory    
    define("MODELS_PATH"        , ROOT_PATH . DS . "models" . DS);                      // models Directory    
    define("VIEWS_PATH"         , ROOT_PATH . DS . "views" . DS);                      // views Directory    


    // ================= PATHS ====================
    define("ROOT_URL"           , "ch10-mvc-basic" . DS);     
    define("VIEWS_URL"          , "views" . DS);     
    define("PUBLIC_URL"         , "public" . DS);     
    define("CSS_URL"            , PUBLIC_URL ."css" . DS);     
    define("JS_URL"             , PUBLIC_URL ."js" . DS);     


    // ================= DATABASE ====================
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "db_manage_user");
    define("DB_TABLE", "user");
?>