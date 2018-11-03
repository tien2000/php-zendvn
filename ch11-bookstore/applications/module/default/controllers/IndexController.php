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

    public function registerAction(){
        $userInfo = Session::get('user');
        if($userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time()){
            URL::redirect('default', 'user', 'index');
        }
        
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
        $this->_view->render('index/register');
    }

    public function loginAction(){
        $userInfo = Session::get('user');
        if($userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time()){
            URL::redirect('default', 'user', 'index');
        }

        $this->_view->_title = 'Login';

        if (@$this->_arrParams['form']['token'] > 0) {      // Submitted
            $validate = new Validate($this->_arrParams['form']);
            $email = $this->_arrParams['form']['email'];
            $password = md5($this->_arrParams['form']['password']);
            $query    = "SELECT `id` FROM `user` WHERE `email` = '$email' AND `password` = '$password'";

            $validate->addRule('email', 'existRecord', array('database' => $this->_model, 'query' => $query));
            $validate->run();

            if ($validate->isValid() == true) {
                $userInfo = $this->_model->infoItems($this->_arrParams);
                $arrSession = array(
                                    'login'     => true,
                                    'info'      => $userInfo,
                                    'time'      => time(),
                                    'group_acp' => $userInfo['group_acp']
                                );
                Session::set('user', $arrSession);
                URL::redirect('default', 'user', 'index');
            } else {
                $this->_view->errors = $validate->showErrorsPublic();
            }
        } 

        $this->_view->render('index/login');
    }

    public function logoutAction(){
        Session::delete('user');
        URL::redirect('default', 'index', 'index');
    }
}
?>