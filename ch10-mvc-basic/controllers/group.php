<?php 
class Group extends Controller{
    public function index(){
        // echo "<h3>". __METHOD__ ."</h3>";

        $this->view->render("group/index", false);
    }

    public function add(){
        // echo "<h3>". __METHOD__ ."</h3>";
    }
}
?>