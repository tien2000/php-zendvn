<?php 
class Controller{
    public function __construct() {
        $this->view = new View();
        
    }

    public function loadModel($name){
        $path = MODELS_PATH . $name . "_model.php";
        $modelName = ucfirst($name). "_Model";

        if (file_exists($path)) {
            require_once $path;
            $this->db = new $modelName();
        }
    }
}