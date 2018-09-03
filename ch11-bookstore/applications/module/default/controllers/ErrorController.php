<?php 
class ErrorController extends Controller{
    public function __construct() {
        parent::__construct();
    }

    public function indexAction(){
        $this->_view->data = 'Có lỗi rồi kìa!!!';
        $this->_view->render('error/index');
    }
}
?>