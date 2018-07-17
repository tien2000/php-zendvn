<?php 
class Bootstrap{
    public function __construct() {
        $controllerURL = (isset($_GET['controller'])) ? $_GET['controller'] : 'index' ;
        $actionURL     = (isset($_GET['action']))     ? $_GET['action']     : 'index' ;

        $controllerName = ucfirst($controllerURL);

        $file = CONTROLLERS_PATH. $controllerURL .".php";

        if (file_exists($file)) {
            require_once $file;
            $controller = new $controllerName();

            if (method_exists($controllerName, $actionURL)) {
                $controller->$actionURL();
                $controller->loadModel($controllerURL);
            } else {
                $this->errors();
            }
        } else {
            $this->errors();
        }
    }

    public function errors(){
        require_once CONTROLLERS_PATH . "errors.php";
        $errors = new Errors();
        $errors->index();
    }
}
?>