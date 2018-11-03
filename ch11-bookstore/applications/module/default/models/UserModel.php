<?php 
class UserModel extends Model{    
    private $_columns = array(
                                'id', 
                                'username', 
                                'email', 
                                'fullname', 
                                'password', 
                                'created', 
                                'created_by', 
                                'modified', 
                                'modified_by', 
                                'register_date', 
                                'register_ip', 
                                'status', 
                                'ordering', 
                                'group_id'
                            );
    
    public function __construct() {
        parent::__construct();
        $this->setTable(TBL_USER);
    }
}
?>