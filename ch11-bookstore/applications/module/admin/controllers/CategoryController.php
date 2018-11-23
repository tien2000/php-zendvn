<?php 
class CategoryController extends Controller{
    public function __construct($arrParams) {
        parent::__construct($arrParams);
        
        $this->_templateObj->setFolderTemplate('admin/main');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }

    // ACTION: LIST CATEGORY
    public function indexAction(){
        $this->_view->_title = 'Category Manager: List';

        // Pagination
        $configPagination = array('totalItemsPerPage' => 5, 'pageRange' => 3);
        $this->setPagination($configPagination);
        $totalItems              = $this->_model->countItems($this->_arrParams, null);        
        $this->_view->pagination = new Pagination($totalItems, $this->_pagination);
        $this->_view->items      =  $this->_model->listItems($this->_arrParams, null);
        
        $this->_view->render('category/index');        
    }

    // ACTION: FORM: ADD & EDIT Category
    public function formAction(){
        $this->_view->_title = 'Category Manager: Add';

        if (isset($this->_arrParams['id'])) {
            $this->_view->_title = 'Category Manager: Edit';
            $this->_arrParams['form'] = $this->_model->infoItem($this->_arrParams);       
            if(empty($this->_arrParams['form'])) URL::redirect('admin', 'category', 'index');
        }

        if (@$this->_arrParams['form']['token'] > 0) {
            $validate = new Validate($this->_arrParams['form']);
            $validate->addRule('name',      'string', array('min'  => 3, 'max' => 255))
                     ->addRule('ordering',  'int',    array('min'  => 0, 'max' => 100))
                     ->addRule('status',    'status', array('deny' => array('default')));
            $validate->run();
            $this->_arrParams['form'] = $validate->getResult();
            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrors();
            } else {
                $task = (isset($this->_arrParams['form']['id'])) ? 'edit' : 'add';
                $id = $this->_model->saveItems($this->_arrParams, array('task' => $task));
                $type = $this->_arrParams['type'];
                if ($type == 'save-closed') URL::redirect('admin', 'category', 'index');
                if ($type == 'save-new')    URL::redirect('admin', 'category', 'form');
                if ($type == 'apply')       URL::redirect('admin', 'category', 'form', array('id' => $id));
            }
        }

        $this->_view->arrParam = $this->_arrParams;
        $this->_view->render('category/form');
    }

    // ACTION: AJAX STATUS (*)
    public function ajaxStatusAction(){
        $result = $this->_model->changeStatus($this->_arrParams, array('task' => 'ajax-change-status'));
        echo json_encode($result);
    }

    // ACTION: STATUS (*)
    public function statusAction(){
        $result = $this->_model->changeStatus($this->_arrParams, array('task' => 'change-status'));
        URL::redirect('admin', 'category', 'index');
    }

    // ACTION: TRASH (*)
    public function trashAction(){
        $result = $this->_model->deleteItems($this->_arrParams);
        URL::redirect('admin', 'category', 'index');
    }

    // ACTION: ORDERING (*)
    public function orderingAction(){
        $result = $this->_model->ordering($this->_arrParams);
        URL::redirect('admin', 'category', 'index');
    }
}
?>