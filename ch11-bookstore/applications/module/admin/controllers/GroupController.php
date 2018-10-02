<?php 
class GroupController extends Controller{
    public function __construct($arrParams) {
        parent::__construct($arrParams);
        
        $this->_templateObj->setFolderTemplate('admin/main');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }

    // ACTION: LIST GROUP
    public function indexAction(){
        $this->_view->_title = 'Users: Groups';        

        // Pagination
        $configPagination = array('totalItemsPerPage' => 5, 'pageRange' => 3);
        $this->setPagination($configPagination);
        $totalItems              = $this->_model->countItems($this->_arrParams, null);        
        $this->_view->pagination = new Pagination($totalItems, $this->_pagination);
        $this->_view->items      =  $this->_model->listItems($this->_arrParams, null);
        
        $this->_view->render('group/index');        
    }

    // ACTION: FORM: ADD & EDIT GROUP
    public function formAction(){
        $this->_view->_title = 'Users: New Group';

        if (isset($this->_arrParams['id'])) {
            $this->_view->_title = 'Users: Edit Group';
            $this->_arrParams['form'] = $this->_model->infoItem($this->_arrParams);       
            if(empty($this->_arrParams['form'])) URL::redirect(URL::createLink('admin', 'group', 'index'));
        }

        if (@$this->_arrParams['form']['token'] > 0) {
            $validate = new Validate($this->_arrParams['form']);
            $validate->addRule('name',      'string', array('min'  => 3, 'max' => 255))
                     ->addRule('ordering',  'int',    array('min'  => 0, 'max' => 100))
                     ->addRule('status',    'status', array('deny' => array('default')))
                     ->addRule('group_acp', 'status', array('deny' => array('default')));
            $validate->run();
            $this->_arrParams['form'] = $validate->getResult();
            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrors();
            } else {
                $task = (isset($this->_arrParams['form']['id'])) ? 'edit' : 'add';
                $id = $this->_model->saveItems($this->_arrParams, array('task' => $task));
                $type = $this->_arrParams['type'];
                if ($type == 'save-closed') URL::redirect(URL::createLink('admin', 'group', 'index'));
                if ($type == 'save-new')    URL::redirect(URL::createLink('admin', 'group', 'form'));
                if ($type == 'apply')       URL::redirect(URL::createLink('admin', 'group', 'form', array('id' => $id)));
            }
        }

        $this->_view->arrParam = $this->_arrParams;
        $this->_view->render('group/form');
    }

    // ACTION: AJAX STATUS (*)
    public function ajaxStatusAction(){
        $result = $this->_model->changeStatus($this->_arrParams, array('task' => 'ajax-change-status'));
        echo json_encode($result);
    }

    // ACTION: AJAX GROUP ACP (*)
    public function ajaxGroupACPAction(){
        $result = $this->_model->changeStatus($this->_arrParams, array('task' => 'ajax-change-group-acp'));
        echo json_encode($result);
    }

    // ACTION: STATUS (*)
    public function statusAction(){
        $result = $this->_model->changeStatus($this->_arrParams, array('task' => 'change-status'));
        URL::redirect(URL::createLink('admin', 'group', 'index'));
    }

    // ACTION: TRASH (*)
    public function trashAction(){
        $result = $this->_model->deleteItems($this->_arrParams);
        URL::redirect(URL::createLink('admin', 'group', 'index'));
    }

    // ACTION: ORDERING (*)
    public function orderingAction(){
        $result = $this->_model->ordering($this->_arrParams);
        URL::redirect(URL::createLink('admin', 'group', 'index'));
    }
}
?>