<?php 
class Auth{
    public static function checkLogin(){
        Session::init();
        if (Session::get("loggedIn") == false) {
            Session::destroy();
            $controller = new Controller();
            $controller->redirect('user', 'login');
        }
    }
}
?>