<?php 
class View{
    public function render($name, $full = true){
        if ($full == true) {
            include_once VIEWS_PATH . "header.php";
            require_once VIEWS_PATH .  $name . '.php';
            include_once VIEWS_PATH . "footer.php";
        } else {
            require_once VIEWS_PATH . $name . '.php';
        }
    }
}
?>