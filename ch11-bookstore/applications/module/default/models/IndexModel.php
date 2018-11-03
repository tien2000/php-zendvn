<?php 
    class IndexModel extends Model{    
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

    public function infoItems($arrParams, $options = null){
        if ($options == null) {
            $email = $arrParams['form']['email'];
            $password = md5($arrParams['form']['password']);
            $query[]    = "SELECT u.`id`,u.`email`, u.`fullname`, u.`email`, u.`group_id`, g.`group_acp`";
            $query[]    = "FROM `user` AS u LEFT JOIN `group` AS g ON u.group_id = g.id";
            $query[]    = "WHERE `email` = '$email' AND `password` = '$password'";

            $query = implode(' ', $query);
            $result = $this->fetchRow($query);
            return $result;
        }
    }
}
?>