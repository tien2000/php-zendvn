<?php 
class Bootstrap{
    private $_url;
    private $_controller;

    public function init() {
        $this->setURL();        
        if (!isset($this->_url['controller'])) {
            $this->loadDefaultController();
            exit();
        }

        $this->loadExistController();
        $this->callControllerMethod();
    }

    private function setURL(){
        $this->_url = isset($_GET) ? $_GET : null;
    }

    private function loadDefaultController(){
        require_once CONTROLLERS_PATH . "index.php";
        $this->_controller = new Index();
        $this->_controller->index();
    }

    private function loadExistController(){
        $controllerName = ucfirst($this->_url['controller']);
        $file = CONTROLLERS_PATH. $this->_url['controller'] .".php";

        if (file_exists($file)) {
            require_once $file;
            $this->_controller = new $controllerName();    
            $this->_controller->loadModel($this->_url['controller']);
        } else {
            $this->errors();
        }
    }

    private function callControllerMethod(){
        $controllerName = ucfirst($this->_url['controller']);
        $actionURL      = $this->_url['action'];
        if (method_exists($controllerName, $actionURL)) {
            $this->_controller->$actionURL();
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