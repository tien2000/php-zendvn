<?php 
    class UserModel extends Model{    
    private $_columns = array('id', 'username', 'email', 'fullname', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering', 'group_id');
    
    public function __construct() {
        parent::__construct();
        $this->setTable(TBL_USER);
    }

    public function countItems($arrParams, $options = null){
        $query[]        = "SELECT count(`id`) AS `total`";
        $query[]        = "FROM `$this->_table`";
        $query[]        = "WHERE `id` > 0";
        
        // FILTER: KEYWORD
        if (!empty($arrParams['filter']['search'])) {
            $keyword = "%" . $arrParams['filter']['search'] . "%";
            $query[]    = "AND (`username` LIKE '$keyword' OR `email` LIKE '$keyword')";
        }

        // FILTER: STATUS
        if (isset($arrParams['filter']['status']) && $arrParams['filter']['status'] != 'default') {
            $query[]    = "AND `status` = '". $arrParams['filter']['status'] ."'";
        }     
        
        // FILTER: GROUP ID
        if (isset($arrParams['filter']['group-id']) && $arrParams['filter']['group-id'] != 'default') {
            $query[]    = "AND `group_id` = '". $arrParams['filter']['group-id'] ."'";
        }     

        // FILTER: GROUP ACP
        if (isset($arrParams['filter']['group-acp']) && $arrParams['filter']['group-acp'] != 'default') {
            $query[]    = "AND `group_acp` = '". $arrParams['filter']['group-acp'] ."'";          
        }

        $query = implode(" ", $query);
        $result = $this->fetchRow($query);
        return $result['total'];
    }

    public function listItems($arrParams, $options = null){
        $query[]        = "SELECT u.`id`, u.`username`, u.`email`, u.`fullname`, u.`created`, u.`created_by`, u.`modified`, u.`modified_by`, u.`status`, u.`ordering`, g.`name` AS `group_name`";
        $query[]        = "FROM `$this->_table` AS `u`, `" . TBL_GROUP . "` AS `g`";
        $query[]        = "WHERE u.group_id = g.id ";
        
        // FILTER: KEYWORD
        if (!empty($arrParams['filter']['search'])) {
            $keyword    = "%" . $arrParams['filter']['search'] . "%";
            $query[]    = "AND (`username` LIKE '$keyword' OR `email` LIKE '$keyword')";
        }

        // FILTER: STATUS
        if (isset($arrParams['filter']['status']) && $arrParams['filter']['status'] != 'default') {
            $query[]    = "AND u.`status` = '". $arrParams['filter']['status'] ."'";
        }

        // FILTER: GROUP ID
        if (isset($arrParams['filter']['group-id']) && $arrParams['filter']['group-id'] != 'default') {
            $query[]    = "AND u.`group_id` = '". $arrParams['filter']['group-id'] ."'";
        }

        // SORT
        if (!empty(@$arrParams['filter_column']) && !empty(@$arrParams['filter_column_dir'])) {
            $column     = $arrParams['filter_column'];
            $columnDir  = $arrParams['filter_column_dir'];
            $query[]    = "ORDER BY u.`$column` $columnDir";
        } else {
            $query[]    = "ORDER BY `id` ASC";
        }        

        // PAGINATION
        $pagination         = $arrParams['pagination'];
        $totalItemsPerPage  = $pagination['totalItemsPerPage'];
        
        if ($totalItemsPerPage > 0) {
            $pos = ($pagination['currentPage'] - 1) * $totalItemsPerPage;
            $query[] = "LIMIT $pos, $totalItemsPerPage";
        }        

        $query = implode(" ", $query);
        $result = $this->fetchAll($query);
        return $result;
    }

    public function changeStatus($arrParams, $options = null){
        if ($options['task'] == 'ajax-change-status') {
            $status = ($arrParams['status'] == 0) ? 1 : 0 ;
            $id = $arrParams['id'];
            $query = "UPDATE `$this->_table` SET `status` = $status WHERE `id` = $id";
            $this->query($query);
            $result = array(
                            'id'        => $id,
                            'status'    => $status,
                            'link'      => URL::createLink('admin', 'user', 'ajaxStatus', array('id' => $id, 'status' => $status))
                        );
            return $result;
        }

        if ($options['task'] == 'change-status') {
            $status = $arrParams['type'];
            if (!empty($arrParams['cid'])) {
                $ids   = $this->createWhereDeleteSQL($arrParams['cid']);
                $query = "UPDATE `$this->_table` SET `status` = $status WHERE `id` IN ($ids)";
                $this->query($query);
                $statusMessage = ($status == 0) ? 'unpublish' : 'publish' ;
                Session::set('message', array('class' => 'success', 'content' => 'Update Successfully!', 'items' => $this->affectedRow() . ' module '. $statusMessage .' .'));
            } else {
                Session::set('message', array('class' => 'error', 'content' => 'Nothing Change, Please select any item!', 'items' => ''));
            }
        }
    }

    public function deleteItems($arrParams, $options = null){
        if ($options == null) {
            if (!empty($arrParams['cid'])) {
                $ids   = $this->createWhereDeleteSQL($arrParams['cid']);
                echo $query = "DELETE FROM `$this->_table` WHERE `id` IN ($ids)";
                $this->query($query);  
                Session::set('message', array('class' => 'success', 'content' => 'Update Successfully!', 'items' => $this->affectedRow() . ' module deleted.'));
            } else {
                Session::set('message', array('class' => 'error', 'content' => 'Nothing Change, Please select any item!', 'items' => ''));
            }
        }
    }

    public function infoItem($arrParams, $options = null){
        if ($options == null) {
            $query[] = "SELECT `id`, `name`, `group_acp`, `status`, `ordering`";
            $query[] = "FROM `$this->_table`";
            $query[] = "WHERE `id` = '". $arrParams['id'] ."'";

            $query   = implode(" ", $query);
            $result  = $this->fetchRow($query);
            return $result;
        }
    }

    public function saveItems($arrParams, $options = null){
        if ($options['task'] == 'add') {
            $arrParams['form']['created'] = date('Y-m-d', time());
            $arrParams['form']['created_by'] = 1;
            $data = array_intersect_key($arrParams['form'], array_flip($this->_columns));
            $this->insert($data);
            Session::set('message', array('class' => 'success', 'content' => 'Successfully!', 'items' => $this->affectedRow() . ' module added.'));
            return $this->lastID();
        }

        if ($options['task'] == 'edit') {
            $arrParams['form']['modified'] = date('Y-m-d', time());
            $arrParams['form']['modified_by'] = 1;
            $data = array_intersect_key($arrParams['form'], array_flip($this->_columns));
            $this->update($data, array(array('id', $arrParams['form']['id'])));
            Session::set('message', array('class' => 'success', 'content' => 'Successfully!', 'items' => $this->affectedRow() . ' module added.'));
            return $arrParams['form']['id'];
        }
    }

    public function ordering($arrParams, $options = null){
        if ($options == null) {
            if (!empty($arrParams['order'])) {
                $i = 0;
                foreach ($arrParams['order'] as $id => $ordering) {
                    $i++;
                    $query = "UPDATE `$this->_table` SET `ordering` = $ordering WHERE `id` = $id";    
                    $this->query($query);                
                }
                Session::set('message', array('class' => 'success', 'content' => 'Update Successfully!', 'items' => ''));
            }
        }
    }    

    public function itemsInSelectBox($arrParams, $options = null){
        if ($options == null) {
            $query = "SELECT `id`, `name` FROM `". TBL_GROUP ."`";            
            $result = $this->fetchPairs($query);
            $result['default'] = '- Select Group -';
            ksort($result);
        }
        return $result;
    }
}
?>