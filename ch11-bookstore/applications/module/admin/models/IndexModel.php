<?php 
class IndexModel extends Model{
    public function __construct() {
        parent::__construct();
    }

    public function infoItems($arrParams, $options = null){
        if ($options == null) {
            $username = $arrParams['form']['username'];
            $password = md5($arrParams['form']['password']);
            $query[]    = "SELECT u.`id`,u.`username`, u.`fullname`, u.`email`, u.`group_id`, g.`group_acp`, g.`privilege_id`";
            $query[]    = "FROM `user` AS u LEFT JOIN `group` AS g ON u.group_id = g.id";
            $query[]    = "WHERE `username` = '$username' AND `password` = '$password'";

            $query = implode(' ', $query);
            $result = $this->fetchRow($query);

            if ($result['group_acp'] == 1) {
                $arrPrivilege = explode(',', $result['privilege_id']);
                $strPrivilege = '';

                foreach ($arrPrivilege as $value) $strPrivilege .= "'$value',";

                $queryPrivilege[]    = "SELECT `id`, CONCAT(`module`, '-', `controller`, '-', `action`) AS `name`";
                $queryPrivilege[]    = "FROM `" . TBL_PRIVILEGE. "` AS p";
                $queryPrivilege[]    = "WHERE `id` IN ($strPrivilege'0')";

                $queryPrivilege      = implode(' ', $queryPrivilege);
                $result['privilege'] = $this->fetchPairs($queryPrivilege);
            } else {
                # code...
            }
            return $result;
        }
    }
}
?>