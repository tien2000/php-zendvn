<?php 
class Index extends Controller{
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->view->render("index/index");
    }

    public function add(){
        $this->view->render("index/add");
    }
}
?>