<?php 
class Controller{
    // View Object
    protected $_view;

    // Model Object
    protected $_model;

    // Params ($_GET, $_POST)
    protected $_arrParams;

    // Template Object
    protected $_templateObj;

    public function __construct($arrParams) {
        $this->setModel($arrParams['module'], $arrParams['controller']);
        $this->setView($arrParams['module']);
        $this->setTemplate($this);
        $this->setParams($arrParams);
        $this->_view->_arrPagams = $arrParams;
    }

    // SET MODEL
    public function setModel($moduleName = 'admin', $modelName = 'index'){
        $modelName = ucfirst($modelName) . 'Model';
        $path      = MODULE_PATH . $moduleName . DS . 'models' . DS . $modelName . ".php";
        if (file_exists($path)) {
            require_once $path;
            $this->_model = new $modelName();
        }
    }

    // GET MODEL
    public function getModel(){
        return $this->_model;
    }

    // SET VIEW
    public function setView($modelName){
        $this->_view = new View($modelName);
    }

    // GET VIEW
    public function getView(){
        return $this->_view;
    }

    // SET TEMPLATE
    public function setTemplate(){
        $this->_templateObj = new Template($this);
    }

    // GET TEMPLATE
    public function getTemplate(){
        return $this->_templateObj;
    }

    // SET PARAMS
    public function setParams($arrParams){
        $this->_arrParams = $arrParams;
    }

    // GET PARAMS
    public function getParams(){
        return $this->_arrParams;
    }
}