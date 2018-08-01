<?php 
class Bootstrap{
    private $_params;
    private $_controllerObj;

    public function init() {
        $this->setParams();
        @$controllerName = ucfirst($this->_params['controller']) . 'Controller';
        @$filePath       = APPLICATIONS_PATH . $this->_params['module'] . DS . 'controllers' . DS . $controllerName . '.php';
        if (file_exists($filePath)) {
            $this->loadExistingController($filePath, $controllerName);
            $this->callMethod();
        }
    }

    private function loadExistingController($filePath, $controllerName){
        require_once $filePath;
        $this->_controllerObj = new $controllerName($this->_params);        
    }

    private function callMethod(){
        $actionName = $this->_params['action'] . 'Action';
        if (method_exists($this->_controllerObj, $actionName)) {
            $this->_controllerObj->$actionName();
        } else {
            $this->_errors();
        }
    }   

    public function setParams(){
        $this->_params = array_merge($_GET, $_POST);
        $this->_params['module']        = isset($this->_params['module']) ? $this->_params['module'] : DEFAULT_MODULE;
        $this->_params['controller']    = isset($this->_params['controller']) ? $this->_params['controller'] : DEFAULT_CONTROLLER;
        $this->_params['action']        = isset($this->_params['action']) ? $this->_params['action'] : DEFAULT_ACTION;
    }

    public function _errors(){
        require_once APPLICATIONS_PATH . 'default' . DS . 'controllers' . DS . 'ErrorController.php';
        $errorsController = new ErrorController();
        $errorsController->setView('default');
        $errorsController->indexAction();
    }
}
?>