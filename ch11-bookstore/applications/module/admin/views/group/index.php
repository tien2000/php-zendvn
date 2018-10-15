<!-- Toolbar -->
<?php 
    include_once MODULE_PATH . "admin/views/toolbar.php";
?>

<!-- Sort -->
<?php
    @$columnPost    = $this->_arrParams['filter_column'];
    @$orderPost     = $this->_arrParams['filter_column_dir'];
    $lblName        = Helper::cmsLinkSort('Name', 'name', $columnPost, $orderPost);
    $lblStatus      = Helper::cmsLinkSort('Status', 'status', $columnPost, $orderPost);
    $lblGroupACP    = Helper::cmsLinkSort('Group Acp', 'group_acp', $columnPost, $orderPost);
    $lblCreated     = Helper::cmsLinkSort('Created', 'created', $columnPost, $orderPost);
    $lblCreatedBy   = Helper::cmsLinkSort('Created By', 'created_by', $columnPost, $orderPost);
    $lblModified    = Helper::cmsLinkSort('Modified', 'modified', $columnPost, $orderPost);
    $lblModifiedBy  = Helper::cmsLinkSort('Modified By', 'modified_by', $columnPost, $orderPost);
    $lblOrdering    = Helper::cmsLinkSort('Ordering', 'ordering', $columnPost, $orderPost);
    $lblId          = Helper::cmsLinkSort('Id', 'id', $columnPost, $orderPost);  
?>

<?php 
    // SESSION
    $message        = Session::get('message');
    Session::delete('message');
    $strMessage     = Helper::cmsMessage($message);    
?>

<!-- container-fluid -->
<div class="container-fluid container-main" style="top: 82px;">
    <section id="content">
        <!-- Begin Content -->
        <div class="row-fluid">
            <div class="span12">
                <div id="system-message-container">
                    <?php echo $strMessage; ?>
                </div>
                <form action="#" method="post" name="adminForm" id="adminForm">
                    <div id="j-main-container">
                        <!-- SubToolbar -->
                        <?php 
                            include_once "subtoolbar/index.php";
                        ?>
                        <!-- End SubToolbar -->
                        <table class="table table-striped" id="moduleList">
                            <thead>
                                <tr>
                                    <th width="1%" class="nowrap center hidden-phone">
                                        <a href="#" onclick="return false;" class="js-stools-column-order hasPopover"
                                            data-order="a.ordering" data-direction="ASC" data-name="" title=""
                                            data-content="Select to sort by this column" data-placement="top"
                                            data-original-title="Ordering">
                                            <span class="icon-menu-2"></span>
                                        </a>
                                    </th>
                                    <th width="1%" class="nowrap center">
                                        <input type="checkbox" name="checkall-toggle" value="" class="hasTooltip"
                                            data-original-title="Check All Items"> </th>
                                    <th width="1%" class="nowrap center" style="min-width:55px">
                                        <?php echo $lblStatus; ?>
                                    </th>
                                    <th width="35%" class="title">
                                        <?php echo $lblName; ?>
                                    </th>
                                    <th width="15%" class="nowrap hidden-phone">
                                        <?php echo $lblGroupACP; ?>
                                    </th>
                                    <th width="10%" class="nowrap hidden-phone hidden-tablet">
                                        <?php echo $lblCreated; ?>
                                    </th>
                                    <th width="10%" class="nowrap hidden-phone hidden-tablet">
                                        <?php echo $lblCreatedBy; ?>
                                    </th>
                                    <th width="10%" class="nowrap hidden-phone">
                                        <?php echo $lblModified; ?>
                                    </th>
                                    <th width="10%" class="nowrap hidden-phone">
                                        <?php echo $lblModifiedBy; ?>
                                    </th>
                                    <th width="10%" class="nowrap hidden-phone">
                                        <?php echo $lblOrdering; ?>
                                    </th>
                                    <th width="1%" class="nowrap center hidden-phone">
                                        <?php echo $lblId; ?>
                                    </th>
                                </tr>
                            </thead>
                            <!-- Start PAGINATION -->
                            <?php include_once "pagination.php"; ?>
                            <!-- End PAGINATION -->
                            <tbody>
                                <?php 
                                    if (!empty($this->items)) {
                                        $i = 0;
                                        foreach ($this->items as $value) {
                                            $id             = $value['id'];                                            
                                            $name           = $value['name'];   
                                            $row            = ($i % 2 == 0) ? 'row0' : 'row1' ;
                                            $ckb            = '<input type="checkbox" name="cid[]" value="'. $id .'">';
                                            $ordering       = '<input style="width: 30%; text-align: center; margin-bottom: auto;" type="text" name="order['. $id .']" value="'. $value['ordering'] .'"/>';                                            
                                            $created_by     = $value['created_by'];                                            
                                            $modified_by    = $value['modified_by'];
                                            $created        = Helper::dateFormat('d-m-Y', $value['created']);
                                            $modified       = Helper::dateFormat('d-m-Y', $value['modified']);                                            
                                            $status         = Helper::cmsStatus($value['status'],      URL::createLink('admin', 'group', 'ajaxStatus', array('id' => $id, 'status' => $value['status'])), $id);
                                            $group_acp      = Helper::cmsGroupACP($value['group_acp'], URL::createLink('admin', 'group', 'ajaxGroupACP', array('id' => $id, 'group_acp' => $value['group_acp'])), $id);
                                            $linkEdit      = URL::createLink('admin', 'group', 'form', array('id' => $id));
                                            
                                ?>
                                <tr class="<?php echo $row; ?>" sortable-group-id="position-<?php echo $id; ?>">
                                    <td class="order nowrap center hidden-phone">
                                        <span class="sortable-handler inactive tip-top hasTooltip" title=""
                                            data-original-title="Please sort by order to enable reordering"><span class="icon-menu"></span></span>
                                    </td>
                                    <td class="center">
                                        <?php echo $ckb; ?>
                                    </td>
                                    <td class="center">
                                        <div class="btn-group">
                                            <?php echo $status; ?>
                                            <button data-toggle="dropdown" class="dropdown-toggle btn btn-micro">
                                                <span class="caret"></span>
                                                <span class="element-invisible">Actions for:
                                                    <?php echo $name; ?></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" onclick="listItemTask('<?php echo $id; ?>', 'modules.duplicate')"><span
                                                            class="icon-copy" aria-hidden="true"></span> Duplicate</a></li>
                                                <li><a href="#" onclick="listItemTask('<?php echo $id; ?>', 'modules.trash')"><span
                                                            class="icon-trash" aria-hidden="true"></span> Trash</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td> <a href="<?php echo $linkEdit; ?>">
                                            <?php echo $name; ?></a></td>
                                    <td class="small hidden-phone">
                                        <?php echo $group_acp; ?> </span></td>
                                    <td class="small hidden-phone hidden-tablet">
                                        <?php echo $created; ?>
                                    </td>
                                    <td class="small hidden-phone hidden-tablet">
                                        <?php echo $created_by; ?>
                                    </td>
                                    <td class="small hidden-phone">
                                        <?php echo $modified; ?>
                                    </td>
                                    <td class="small hidden-phone">
                                        <?php echo $modified_by; ?>
                                    </td>
                                    <td class="hidden-phone">
                                        <?php echo $ordering; ?>
                                    </td>
                                    <td class="hidden-phone">
                                        <?php echo $id; ?>
                                    </td>
                                </tr>
                                <?php 
                                            $i++;
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                        <div>
                            <input type="hidden" name="filter_column" value="name">
                            <input type="hidden" name="filter_page" value="1">
                            <input type="hidden" name="filter_column_dir" value="desc">
                        </div>
                </form>
            </div>
        </div>
        <!-- End Content -->
    </section>
</div>