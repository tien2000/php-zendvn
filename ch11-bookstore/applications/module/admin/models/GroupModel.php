<?php 
class GroupModel extends Model{
    public function __construct() {
        parent::__construct();
        $this->setTable(TBL_GROUP);
    }

    public function listItems($arrParams, $options = null){
        $query[] = "SELECT `id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`";
        $query[] = "FROM `$this->_table`";

        $query = implode(" ", $query);
        $result = $this->listRecord($query);
        return $result;
    }

    public function changeStatus($arrParams, $options = null){
        if ($options['task'] == 'ajax-change-status') {
            $status = ($arrParams['status'] == 0) ? 1 : 0 ;
            $id = $arrParams['id'];
            $query = "UPDATE `$this->_table` SET `status` = $status WHERE `id` = $id";
            $this->query($query);

            return array($id, $status, URL::createLink('admin', 'group', 'ajaxStatus', array('id' => $id, 'status' => $status)));
        }

        if ($options['task'] == 'ajax-change-group-acp') {
            $group_acp = ($arrParams['group_acp'] == 0) ? 1 : 0 ;
            $id = $arrParams['id'];
            $query = "UPDATE `$this->_table` SET `group_acp` = $group_acp WHERE `id` = $id";
            $this->query($query);

            return array($id, $group_acp, URL::createLink('admin', 'group', 'ajaxGroupACP', array('id' => $id, 'group_acp' => $group_acp)));
        }

        if ($options['task'] == 'change-status') {
            $status = $arrParams['type'];
            if (!empty($arrParams['cid'])) {
                $ids   = $this->createWhereDeleteSQL($arrParams['cid']);
                $query = "UPDATE `$this->_table` SET `status` = $status WHERE `id` IN ($ids)";
                $this->query($query);    
            }            
        }
    }

    public function deleteItems($arrParams, $options = null){
        if ($options == null) {
            if (!empty($arrParams['cid'])) {
                $ids   = $this->createWhereDeleteSQL($arrParams['cid']);
                echo $query = "DELETE FROM `$this->_table` WHERE `id` IN ($ids)";
                $this->query($query);  
            }
        }
    }
}
?>