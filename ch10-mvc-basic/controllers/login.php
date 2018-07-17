<?php 
class Login extends Controller{
    public function index(){
        $this->view->render("login/index");
        $this->loadModel("index");
    }
}
?>