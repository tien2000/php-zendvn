<?php 
    if (!empty($this->items)) {
        $xhtml = '';
        foreach ($this->items as $key => $value) {
            $id = $value['id'];
            $status = ($value['status'] % 2 == 0) ? "Inactive" : "Active" ;
            $xhtml .= '<div class="row" id="item-'.$id.'">
                        <p class="w-10"><input type="checkbox" name="checkbox[]" value="'. $id .'"></p>
                        <p>'. $value['name'] .'</p>
                        <p class="w-10">'. $id .'</p>
                        <p class="w-10">'. $status .'</p>
                        <p class="w-10">'. $value['ordering'] .'</p>
                        <p class="w-10">Member</p>
                        <p class="w-10">
                            <a href="#">Edit</a> |
                            <a href="javascript:deleteItem('.$id.');">Delete</a>
                        </p>
                    </div>';
        }
    }
?>
<div class="content">
    <h3>Group Content</h3>
    <div style="display: none;" id="dialog-confirm" title="Notice!">
        <p>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
    </div>
    <div class="list">
        <div class="row head">
            <p class="w-10"><input type="checkbox" name="checkAll" id="checkAll"></p>
            <p>Group Name</p>
            <p class="w-10">ID</p>
            <p class="w-10">Status</p>
            <p class="w-10">Ordering</p>
            <p class="w-10">Member</p>
            <p class="w-10">Action</p>
        </div>
        <?php echo $xhtml; ?>        
    </div>
</div>