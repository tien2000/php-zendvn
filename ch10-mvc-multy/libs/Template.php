<?php 
class Template{
    // File Config (admin/main/template.ini)
    private $_fileConfig;

    // File Template (admin/main/index.php)
    private $_fileTemplate;

    // Folder Template (admin/main)
    private $_folderTemplate;

    // Controller Object
    private $_controller;

    public function __construct($controller) {
        $this->_controller = $controller;
    }

    public function load(){        
        $fileTemplate      = $this->getFileTemplate();
        $folderTemplate    = $this->getFolderTemplate();
        $fileConfig        = $this->getFileConfig();

        $pathFileConfig = TEMPLATES_PATH . $folderTemplate . DS . $fileConfig;

        if (file_exists($pathFileConfig) == true) {
            $arrConfig = parse_ini_file($pathFileConfig);
            $view = $this->_controller->getView();
            @$view->_title    = $view->getTitle($arrConfig['title']);
            @$view->_metaHTTP = $view->createMeta($arrConfig['metaHTTP'], 'http-equiv');
            @$view->_metaName = $view->createMeta($arrConfig['metaName'], 'name');
            @$view->_cssFiles = $view->createLink($this->_folderTemplate . DS . $arrConfig['dirCSS'], $arrConfig['fileCSS'], 'css');
            @$view->_jsFiles  = $view->createLink($this->_folderTemplate . DS . $arrConfig['dirJS'], $arrConfig['fileJS'], 'js');
            @$view->_dirImg   = $arrConfig['dirImg'];

            $view->setTemplatePath(TEMPLATES_PATH . $folderTemplate . DS . $fileTemplate);
        }
    }

    

    // SET FILE TEMPLATE (index.php)
    public function setFileTemplate($val = 'index.php'){
        $this->_fileTemplate = $val;
    }

    // GET FILE TEMPLATE
    public function getFileTemplate(){
        return $this->_fileTemplate;
    }

    // SET FILE CONFIG (template.ini)
    public function setFileConfig($val = 'template.ini'){
        $this->_fileConfig = $val;
    }

    // GET FILE CONFIG
    public function getFileConfig(){
        return $this->_fileConfig;
    }

    // SET FOLDER TEMPLATE (default/main)
    public function setFolderTemplate($val = 'default/main'){
        $this->_folderTemplate = $val;
    }

    // GET FOLDER TEMPLATE
    public function getFolderTemplate(){
        return $this->_folderTemplate;
    }
}
?>