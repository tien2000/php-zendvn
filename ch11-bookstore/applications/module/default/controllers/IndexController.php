<?php 
class IndexController extends Controller{
    public function __construct($arrParams) {
        parent::__construct($arrParams);
        
        $this->_templateObj->setFolderTemplate('default/main');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }

    public function noticeAction(){
        $this->_view->render('index/notice');
    }

    public function indexAction(){
        $this->_view->render('index/index');
    }
}
?>