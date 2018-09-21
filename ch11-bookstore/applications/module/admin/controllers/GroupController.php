<?php 
class GroupController extends Controller{
    public function __construct($arrParams) {
        parent::__construct($arrParams);
        
        $this->_templateObj->setFolderTemplate('admin/main');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }

    public function indexAction(){
        $this->_view->_title = 'Users: Groups';        

        // Pagination
        $configPagination = array('totalItemsPerPage' => 5, 'pageRange' => 3);
        $this->setPagination($configPagination);
        $totalItems              = $this->_model->countItems($this->_arrParams, null);        
        $this->_view->pagination = new Pagination($totalItems, $this->_pagination);
        $this->_view->Items      =  $this->_model->listItems($this->_arrParams, null);
        
        $this->_view->render('group/index');        
    }

    public function addAction(){
        $this->_view->_title = 'Users: Groups: Add';
        $this->_view->render('group/add');
    }

    public function ajaxStatusAction(){
        $result = $this->_model->changeStatus($this->_arrParams, array('task' => 'ajax-change-status'));
        echo json_encode($result);
    }

    public function ajaxGroupACPAction(){
        $result = $this->_model->changeStatus($this->_arrParams, array('task' => 'ajax-change-group-acp'));
        echo json_encode($result);
    }

    public function statusAction(){
        $result = $this->_model->changeStatus($this->_arrParams, array('task' => 'change-status'));
        URL::redirect(URL::createLink('admin', 'group', 'index'));
    }

    public function trashAction(){
        $result = $this->_model->deleteItems($this->_arrParams);
        URL::redirect(URL::createLink('admin', 'group', 'index'));
    }
}
?>