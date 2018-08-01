<?php 
class IndexController extends Controller{
    public function __construct() {
        parent::__construct();
    }

    public function indexAction(){
        // echo "<h3>Index trong Controller</h3>";
    }

    public function addAction(){
        echo "<h3>". __METHOD__ ."</h3>";
        $this->_view->render('index/index');
    }
}
?>