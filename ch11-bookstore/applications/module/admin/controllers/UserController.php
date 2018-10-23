<?php 
class UserController extends Controller{
    public function __construct($arrParams) {
        parent::__construct($arrParams);
        
        $this->_templateObj->setFolderTemplate('admin/main');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }

    // ACTION: LIST USER
    public function indexAction(){
        $this->_view->_title = 'Users Manager: List';

        // Pagination
        $configPagination = array('totalItemsPerPage' => 5, 'pageRange' => 3);
        $this->setPagination($configPagination);
        $totalItems              = $this->_model->countItems($this->_arrParams, null);        
        $this->_view->pagination = new Pagination($totalItems, $this->_pagination);
        $this->_view->items      = $this->_model->listItems($this->_arrParams, null);
        $this->_view->slbGroup   = $this->_model->itemsInSelectBox($this->_arrParams, null);
        
        $this->_view->render('user/index');        
    }

    // ACTION: FORM: ADD & EDIT USER
    public function formAction(){
        $this->_view->_title     = 'Users: New User';
        $this->_view->slbGroup   = $this->_model->itemsInSelectBox($this->_arrParams, null);        

        if (isset($this->_arrParams['id'])) {
            $this->_view->_title = 'Users: Edit User';
            $this->_arrParams['form'] = $this->_model->infoItem($this->_arrParams);       
            if(empty($this->_arrParams['form'])) URL::redirect('admin', 'user', 'index');
        }

        if (@$this->_arrParams['form']['token'] > 0) {
            $queryUsername = "SELECT `id` FROM `" . TBL_USER . "` WHERE `username` = '" . $this->_arrParams['form']['username'] . "'";
            $queryEmail    = "SELECT `id` FROM `" . TBL_USER . "` WHERE `email` = '" . $this->_arrParams['form']['email'] . "'";
            $task          = 'add';
            $requiredPassword = true;

            if (isset($this->_arrParams['form']['id'])) {
                $task             = 'edit';
                $requiredPassword = false;
                $queryUsername   .= "AND `id` <> '" .$this->_arrParams['form']['id']. "'";
                $queryEmail      .= "AND `id` <> '" .$this->_arrParams['form']['id']. "'";
            }

            $validate      = new Validate($this->_arrParams['form']);
            $validate->addRule('username' , 'string-notExistRecord', array('min' => 3, 'max' => 255, 'database' => $this->_model, 'query' => $queryUsername))
                     ->addRule('email'    , 'email-notExistRecord' , array('database' => $this->_model, 'query' => $queryEmail))
                     ->addRule('password' , 'password', array('action'  => $task), $requiredPassword)
                     ->addRule('ordering' , 'int'     , array('min'     => 0, 'max' => 100))
                     ->addRule('status'   , 'status'  , array('deny'    => array('default')))
                     ->addRule('group_id' , 'status'  , array('deny'    => array('default')));
            $validate->run();
            $this->_arrParams['form'] = $validate->getResult();
            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrors();
            } else {                
                $id = $this->_model->saveItems($this->_arrParams, array('task' => $task));
                $type = $this->_arrParams['type'];
                if ($type == 'save-closed') URL::redirect('admin', 'user', 'index');
                if ($type == 'save-new')    URL::redirect('admin', 'user', 'form');
                if ($type == 'apply')       URL::redirect('admin', 'user', 'form', array('id' => $id));
            }
        }
        $this->_view->arrParam = $this->_arrParams;
        $this->_view->render('user/form');
    }

    // ACTION: AJAX STATUS (*)
    public function ajaxStatusAction(){
        $result = $this->_model->changeStatus($this->_arrParams, array('task' => 'ajax-change-status'));
        echo json_encode($result);
    }

    // ACTION: AJAX user ACP (*)
    public function ajaxGroupACPAction(){
        $result = $this->_model->changeStatus($this->_arrParams, array('task' => 'ajax-change-group-acp'));
        echo json_encode($result);
    }

    // ACTION: STATUS (*)
    public function statusAction(){
        $result = $this->_model->changeStatus($this->_arrParams, array('task' => 'change-status'));
        URL::redirect('admin', 'user', 'index');
    }

    // ACTION: TRASH (*)
    public function trashAction(){
        $result = $this->_model->deleteItems($this->_arrParams);
        URL::redirect('admin', 'user', 'index');
    }

    // ACTION: ORDERING (*)
    public function orderingAction(){
        $result = $this->_model->ordering($this->_arrParams);
        URL::redirect('admin', 'user', 'index');
    }
}
?>