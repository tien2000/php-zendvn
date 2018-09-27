<?php 
class GroupModel extends Model{
    public function __construct() {
        parent::__construct();
        $this->setTable(TBL_GROUP);
    }

    public function countItems($arrParams, $options = null){
        $flagWhere      = false;
        $query[]        = "SELECT count(`id`) AS `total`";
        $query[]        = "FROM `$this->_table`";
        
        // FILTER: KEYWORD
        if (!empty($arrParams['filter']['search'])) {
            $keyword = "%" . $arrParams['filter']['search'] . "%";
            $query[]    = "WHERE `name` LIKE '". $keyword ."'";
            $flagWhere  = true;
        }

        // FILTER: STATUS
        if (isset($arrParams['filter']['status']) && $arrParams['filter']['status'] != 'default') {
            $status = ($arrParams['filter']['status'] == 'unpublish') ? 0 : 1 ;
            if ($flagWhere == true) {
                $query[]    = "AND `status` = '". $status ."'";
            } else {
                $query[]    = "WHERE `status` = '". $status ."'";
            }
        }      

        $query = implode(" ", $query);
        $result = $this->singleRecord($query);
        return $result['total'];
    }

    public function listItems($arrParams, $options = null){
        $flagWhere      = false;
        $query[]        = "SELECT `id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`";
        $query[]        = "FROM `$this->_table`";
        
        // FILTER: KEYWORD
        if (!empty($arrParams['filter']['search'])) {
            $keyword = "%" . $arrParams['filter']['search'] . "%";
            $query[]    = "WHERE `name` LIKE '". $keyword ."'";
            $flagWhere  = true;
        }

        // FILTER: STATUS
        if (isset($arrParams['filter']['status']) && $arrParams['filter']['status'] != 'default') {
            $status = ($arrParams['filter']['status'] == 'unpublish') ? 0 : 1 ;
            if ($flagWhere == true) {
                $query[]    = "AND `status` = '". $status ."'";
            } else {
                $query[]    = "WHERE `status` = '". $status ."'";
            }            
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
        $result = $this->listRecord($query);
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
                            'link'      => URL::createLink('admin', 'group', 'ajaxStatus', array('id' => $id, 'status' => $status))
                        );
            Session::set('message', array('class' => 'success', 'content' => 'Update Successfully!', 'items' => ''));
            return $result;
        }

        if ($options['task'] == 'ajax-change-group-acp') {
            $group_acp = ($arrParams['group_acp'] == 0) ? 1 : 0 ;
            $id = $arrParams['id'];
            $query = "UPDATE `$this->_table` SET `group_acp` = $group_acp WHERE `id` = $id";
            $this->query($query);

            $result = array(
                                'id'            => $id,
                                'group_acp'     => $group_acp,
                                'link'          => URL::createLink('admin', 'group', 'ajaxGroupACP', array('id' => $id, 'group_acp' => $group_acp))
                            );
            Session::set('message', array('class' => 'success', 'content' => 'Update Successfully!', 'items' => ''));
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
}
?>