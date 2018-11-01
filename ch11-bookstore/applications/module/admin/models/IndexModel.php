<?php 
class IndexModel extends Model{
    public function __construct() {
        parent::__construct();
    }

    public function infoItems($arrParams, $options = null){
        if ($options == null) {
            $username = $arrParams['form']['username'];
            $password = md5($arrParams['form']['password']);
            $query[]    = "SELECT u.`id`,u.`username`, u.`fullname`, u.`email`, u.`group_id`, g.`group_acp`";
            $query[]    = "FROM `user` AS u LEFT JOIN `group` AS g ON u.group_id = g.id";
            $query[]    = "WHERE `username` = '$username' AND `password` = '$password'";

            $query = implode(' ', $query);
            $result = $this->fetchRow($query);
            return $result;
        }
    }
}
?>