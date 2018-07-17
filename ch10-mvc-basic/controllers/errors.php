<?php 
class Errors extends Controller{
    public function index(){
        // echo "<h3>". __METHOD__ ."</h3>";
        $message = "This is an Error!!!";
        $this->view->msg = $message;
        $this->view->render("errors/index");
    }
}
?>