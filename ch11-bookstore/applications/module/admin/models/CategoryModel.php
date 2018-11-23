<?php 
    class CategoryModel extends Model{    
    private $_columns = array('id', 'name', 'picture', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering');
    private $_userInfo;

    public function __construct() {
        parent::__construct();
        $this->setTable(TBL_CATEGORY);

        $userObj         = Session::get('user');
        $this->_userInfo = $userObj['info'];
    }

    public function countItems($arrParams, $options = null){
        $query[]        = "SELECT count(`id`) AS `total`";
        $query[]        = "FROM `$this->_table`";
        $query[]        = "WHERE `id` > 0";
        
        // FILTER: KEYWORD
        if (!empty($arrParams['filter']['search'])) {
            $keyword    = "%" . $arrParams['filter']['search'] . "%";
            $query[]    = "AND `name` LIKE '". $keyword ."'";
        }

        // FILTER: STATUS
        if (isset($arrParams['filter']['status']) && $arrParams['filter']['status'] != 'default') {
            $query[]    = "AND `status` = '". $arrParams['filter']['status'] ."'";
        }

        $query = implode(" ", $query);
        $result = $this->fetchRow($query);
        return $result['total'];
    }

    public function listItems($arrParams, $options = null){
        $flagWhere      = false;
        $query[]        = "SELECT `id`, `name`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`";
        $query[]        = "FROM `$this->_table`";
        $query[]        = "WHERE `id` > 0";
        
        // FILTER: KEYWORD
        if (!empty($arrParams['filter']['search'])) {
            $keyword = "%" . $arrParams['filter']['search'] . "%";
            $query[]    = "AND `name` LIKE '". $keyword ."'";
        }

        // FILTER: STATUS
        if (isset($arrParams['filter']['status']) && $arrParams['filter']['status'] != 'default') {
            $query[]    = "AND `status` = '". $arrParams['filter']['status'] ."'";         
        }

        // SORT
        if (!empty(@$arrParams['filter_column']) && !empty(@$arrParams['filter_column_dir'])) {
            $column     = $arrParams['filter_column'];
            $columnDir  = $arrParams['filter_column_dir'];
            $query[]    = "ORDER BY `$column` $columnDir";
        } else {
            $query[]    = "ORDER BY `name` ASC";
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
        $modified    = date('Y-m-d', time());
        $modified_by = $this->_userInfo['username'];
        if ($options['task'] == 'ajax-change-status') {
            $status      = ($arrParams['status'] == 0) ? 1 : 0 ;
            
            $id          = $arrParams['id'];
            $query       = "UPDATE `$this->_table` SET `status` = $status, `modified` = '$modified', `modified_by` = '$modified_by' WHERE `id` = $id";
            $this->query($query);
            $result = array(
                            'id'        => $id,
                            'status'    => $status,
                            'link'      => URL::createLink('admin', 'category', 'ajaxStatus', array('id' => $id, 'status' => $status))
                        );
            return $result;
        }

        if ($options['task'] == 'change-status') {
            $status      = $arrParams['type'];
            if (!empty($arrParams['cid'])) {
                $ids   = $this->createWhereDeleteSQL($arrParams['cid']);
                $query = "UPDATE `$this->_table` SET `status` = $status, `modified` = '$modified', `modified_by` = '$modified_by' WHERE `id` IN ($ids)";
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
            $query[] = "SELECT `id`, `name`, `picture`, `status`, `ordering`";
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
            $arrParams['form']['created_by'] = $this->_userInfo['username'];
            $data = array_intersect_key($arrParams['form'], array_flip($this->_columns));
            $this->insert($data);
            Session::set('message', array('class' => 'success', 'content' => 'Successfully!', 'items' => $this->affectedRow() . ' module added.'));
            return $this->lastID();
        }

        if ($options['task'] == 'edit') {
            $arrParams['form']['modified'] = date('Y-m-d', time());
            $arrParams['form']['modified_by'] = $this->_userInfo['username'];
            $data = array_intersect_key($arrParams['form'], array_flip($this->_columns));
            $this->update($data, array(array('id', $arrParams['form']['id'])));
            Session::set('message', array('class' => 'success', 'content' => 'Successfully!', 'items' => $this->affectedRow() . ' module added.'));
            return $arrParams['form']['id'];
        }
    }

    public function ordering($arrParams, $options = null){
        $modified    = date('Y-m-d', time());
        $modified_by = $this->_userInfo['username'];
        if ($options == null) {
            if (!empty($arrParams['order'])) {
                $i = 0;
                foreach ($arrParams['order'] as $id => $ordering) {
                    $i++;
                    $query = "UPDATE `$this->_table` SET `ordering` = $ordering, `modified` = '$modified', `modified_by` = '$modified_by' WHERE `id` = $id";    
                    $this->query($query);
                }
                Session::set('message', array('class' => 'success', 'content' => 'Update Successfully!', 'items' => ''));
            }
        }
    }
}
?>