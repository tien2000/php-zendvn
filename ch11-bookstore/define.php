<?php     
    // ================= PATHS ====================
    define("DS"                 , "/");     
    define("ROOT_PATH"          , dirname(__FILE__));                                   // root Directory
    define("LIBS_PATH"          , ROOT_PATH . DS . "libs" . DS);                        // libs Directory    
    define("PUBLIC_PATH"        , ROOT_PATH . DS . "public" . DS);                          
    define("APPLICATIONS_PATH"  , ROOT_PATH . DS . "applications" . DS);                   
    define("MODULE_PATH"        , APPLICATIONS_PATH . "module" . DS);                   // applications/module             
    define("BLOCK_PATH"        , APPLICATIONS_PATH . "block" . DS);                     // applications/block             
    define("TEMPLATES_PATH"     , PUBLIC_PATH . "template" . DS);                   


    // ================= PATHS ====================
    define("ROOT_URL"           , "ch11-bookstore" . DS);     
    define("APPLICATIONS_URL"   , "applications" . DS);     
    define("VIEWS_URL"          , "views" . DS);     
    define("PUBLIC_URL"         , "public" . DS);     
    define("TEMPLATE_URL"       , PUBLIC_URL. "template" . DS);     
    define("CSS_URL"            , PUBLIC_URL ."css" . DS);     
    define("JS_URL"             , PUBLIC_URL ."js" . DS);     


    // ================= MODULES ====================
    define("DEFAULT_MODULE"             , 'default');     
    define("DEFAULT_CONTROLLER"         , 'index');     
    define("DEFAULT_ACTION"             , 'index');     


    // ================= DATABASE ====================
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "db_bookstore");
    define("DB_TABLE", "group");

    // ================= TABLE GROUP ====================
    define("TBL_GROUP", "group");
    define("TBL_USER", "user");
?>