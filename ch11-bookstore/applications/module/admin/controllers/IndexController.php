<?php 
class IndexController extends Controller{
    public function __construct($arrParams) {
        parent::__construct($arrParams);
    }

    public function loginAction(){
        $userInfo = Session::get('user');
        if($userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time()){
            URL::redirect('admin', 'index', 'index');
        }

        $this->_templateObj->setFolderTemplate('admin/main');
        $this->_templateObj->setFileTemplate('login.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();

        $this->_view->_title = 'Login';

        if (@$this->_arrParams['form']['token'] > 0) {
            $validate = new Validate($this->_arrParams['form']);
            $username = $this->_arrParams['form']['username'];
            $password = md5($this->_arrParams['form']['password']);
            $query    = "SELECT `id` FROM `user` WHERE `username` = '$username' AND `password` = '$password'";

            $validate->addRule('username', 'existRecord', array('database' => $this->_model, 'query' => $query));
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
                URL::redirect('admin', 'index', 'index');
            } else {
                $this->_view->errors = $validate->showErrors();
            }
        } 

        $this->_view->render('index/login');
    }

    public function logoutAction(){
        Session::delete('user');
        URL::redirect('admin', 'index', 'login');
    }

    public function indexAction(){
        $this->_templateObj->setFolderTemplate('admin/main');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();

        $this->_view->_title = 'Index';
        $this->_view->render('index/index');
    }

    public function profileAction(){
        $this->_templateObj->setFolderTemplate('admin/main');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();

        $userObj = Session::get('user');

        $this->_view->_title = 'Edit Profile';
        $this->_view->arrParam['form'] = $userObj['info'];
        $this->_view->render('index/profile');
    }
}
?>