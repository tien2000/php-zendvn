<?php 
class Group extends Controller{
    public function __construct() {
        parent::__construct();
        Auth::checkLogin();
        $this->view->title = 'Group';
    }

    public function index(){
        // echo "<h3>". __METHOD__ ."</h3>";
        $this->view->items  = $this->db->listItems();
        $this->view->js     = array('group/js/jquery-ui.min.js', 'group/js/group.js');
        $this->view->css    = array('group/css/jquery-ui.min.css');
        $this->view->render("group/index");        
    }

    public function delete(){
        if (isset($_POST['id'])) {
            $this->db->deleteItem($_POST['id']);
        }
    }
}
?>