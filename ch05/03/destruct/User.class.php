<?php 
    class User{
        private $name;
        private $pass;
        private $fullName;
        
        public function __construct() {
             $this->name = 'TienLS';
             $this->pass = '123456';
             $this->fullName = 'TienLE';

        }

        public function __destruct(){
            $_SESSION['userA'] = serialize($this);
        }
    }
    
?>