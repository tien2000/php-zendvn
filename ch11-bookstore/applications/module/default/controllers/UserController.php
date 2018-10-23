<?php 
class UserController extends Controller{
    public function __construct($arrParams) {
        parent::__construct($arrParams);
        
        $this->_templateObj->setFolderTemplate('default/main');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }

    public function registerAction(){
        if (isset($this->_arrParams['form']['submit'])) {
            URL::checkRefeshPage($this->_arrParams['form']['token'], 'default', 'user', 'register');           

            $task = 'add';
            $queryUsername = "SELECT `id` FROM `" . TBL_USER . "` WHERE `username` = '" . $this->_arrParams['form']['username'] . "'";
            $queryEmail    = "SELECT `id` FROM `" . TBL_USER . "` WHERE `email`    = '" . $this->_arrParams['form']['email'] . "'";
            if (isset($this->_arrParams['form']['id'])) {
                $task             = 'edit';
                $requiredPassword = false;
                $queryUsername   .= "AND `id` <> '" .$this->_arrParams['form']['id']. "'";
                $queryEmail      .= "AND `id` <> '" .$this->_arrParams['form']['id']. "'";
            }

            $validate      = new Validate($this->_arrParams['form']);
            $validate->addRule('username' , 'string-notExistRecord', array('min' => 3, 'max' => 255, 'database' => $this->_model, 'query' => $queryUsername))
                     ->addRule('email'    , 'email-notExistRecord' , array('database' => $this->_model, 'query' => $queryEmail))
                     ->addRule('password' , 'password', array('action'  => $task));
                     
            $validate->run();

            $this->_arrParams['form'] = $validate->getResult();
            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrorsPublic();
            } else {
                $id = $this->_model->saveItems($this->_arrParams, array('task' => 'user-register'));
                URL::redirect('default', 'index', 'notice', array('type' => 'register-success'));
            }
        }
        $this->_view->render('user/register');
    }
}
?>