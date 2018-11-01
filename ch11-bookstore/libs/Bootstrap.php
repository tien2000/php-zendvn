<?php 
class Bootstrap{
    private $_params;
    private $_controllerObj;

    public function init() {
        $this->setParams();
        @$controllerName = ucfirst($this->_params['controller']) . 'Controller';
        @$filePath       = MODULE_PATH . $this->_params['module'] . DS . 'controllers' . DS . $controllerName . '.php';
        if (file_exists($filePath)) {
            $this->loadExistingController($filePath, $controllerName);
            $this->callMethod();
        } else {
            URL::redirect('default', 'index', 'notice', array('type' => 'not-url'));
        }
    }

    private function loadExistingController($filePath, $controllerName){
        require_once $filePath;
        $this->_controllerObj = new $controllerName($this->_params);        
    }

    private function callMethod(){
        $actionName = $this->_params['action'] . 'Action';

        if (method_exists($this->_controllerObj, $actionName) == true) {
            $module     = $this->_params['module'];
            $controller = $this->_params['controller'];
            $action     = $this->_params['action'];
            $userInfo   = Session::get('user');
            // Session::delete('user');

            $logged     = ($userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time());

            // MODULE ADMIN
            if ($module == 'admin') {
                if ($logged == true) {
                    if ($userInfo['group_acp'] == 1) {
                        $this->_controllerObj->$actionName();
                    } else {
                        URL::redirect('default', 'index', 'notice', array('type' => 'not-permision'));
                    }                    
                } else {
                    Session::delete('user');
                    require_once(MODULE_PATH . $module . DS . 'controllers' . DS . 'IndexController.php');
                    $indexController = new IndexController($this->_params);
                    $indexController->loginAction();
                } 

            // MODULE DEFAULT               
            } else if ($module == 'default') {
                $this->_controllerObj->$actionName();
            }
        } else {
            URL::redirect('default', 'index', 'notice', array('type' => 'not-url'));
        }
    }   

    public function setParams(){
        $this->_params = array_merge($_GET, $_POST);
        $this->_params['module']        = isset($this->_params['module']) ? $this->_params['module'] : DEFAULT_MODULE;
        $this->_params['controller']    = isset($this->_params['controller']) ? $this->_params['controller'] : DEFAULT_CONTROLLER;
        $this->_params['action']        = isset($this->_params['action']) ? $this->_params['action'] : DEFAULT_ACTION;
    }

    public function _errors(){
        require_once MODULE_PATH . 'default' . DS . 'controllers' . DS . 'ErrorController.php';
        $errorsController = new ErrorController();
        $errorsController->setView('default');
        $errorsController->indexAction();
    }
}
?>