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

    public function saveItems($arrParams, $options = null){
        if ($options['task'] == 'user-register') {
            $arrParams['form']['password']      = md5($arrParams['form']['password']);
            $arrParams['form']['register_date'] = date('Y-m-d H:m:s', time());
            @$arrParams['form']['register_ip']  = $_SERVER[REMOTE_ADDR];
            $arrParams['form']['status']        = 0;
            $data = array_intersect_key($arrParams['form'], array_flip($this->_columns));
            $this->insert($data);
            return $this->lastID();
        }
    }
}
?>