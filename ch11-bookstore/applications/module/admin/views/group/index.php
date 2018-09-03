<!-- Toolbar -->
<?php 
    include_once "toolbar/index.php";
?>
<!-- container-fluid -->
<div class="container-fluid container-main" style="top: 82px;">
    <section id="content">
        <!-- Begin Content -->
        <div class="row-fluid">
            <div class="span12">
                <div id="system-message-container">
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
                                        <a href="#" onclick="return false;" class="js-stools-column-order hasPopover" data-order="a.ordering" data-direction="ASC"
                                            data-name="" title="" data-content="Select to sort by this column" data-placement="top"
                                            data-original-title="Ordering">
                                            <span class="icon-menu-2"></span>
                                        </a>
                                    </th>
                                    <th width="1%" class="nowrap center">
                                        <input type="checkbox" name="checkall-toggle" value="" class="hasTooltip" data-original-title="Check All Items"> </th>
                                    <th width="1%" class="nowrap center" style="min-width:55px">
                                        <a href="#" onclick="return false;" class="js-stools-column-order hasPopover" data-order="a.published" data-direction="ASC"
                                            data-name="Status" title="" data-content="Select to sort by this column" data-placement="top"
                                            data-original-title="Status">
                                            Status</a>
                                    </th>
                                    <th width="35%" class="title">
                                        <a href="#" onclick="return false;" class="js-stools-column-order hasPopover" data-order="a.title" data-direction="ASC" data-name="Name"
                                            title="" data-content="Select to sort by this column" data-placement="top" data-original-title="Name">
                                            Name</a>
                                    </th>
                                    <th width="15%" class="nowrap hidden-phone">
                                        <a href="#" onclick="return false;" class="js-stools-column-order hasPopover" data-order="a.position" data-direction="DESC"
                                            data-name="Group Acp" title="" data-content="Select to sort by this column" data-placement="top"
                                            data-original-title="Group Acp">
                                            Group Acp
                                        </a>
                                    </th>
                                    <th width="10%" class="nowrap hidden-phone hidden-tablet">
                                        <a href="#" onclick="return false;" class="js-stools-column-order hasPopover" data-order="name" data-direction="ASC" data-name="Created"
                                            title="" data-content="Select to sort by this column" data-placement="top" data-original-title="Created">
                                            Created</a>
                                    </th>
                                    <th width="10%" class="nowrap hidden-phone hidden-tablet">
                                        <a href="#" onclick="return false;" class="js-stools-column-order hasPopover" data-order="pages" data-direction="ASC" data-name="Created By"
                                            title="" data-content="Select to sort by this column" data-placement="top" data-original-title="Created By">
                                            Created By</a>
                                    </th>
                                    <th width="10%" class="nowrap hidden-phone">
                                        <a href="#" onclick="return false;" class="js-stools-column-order hasPopover" data-order="ag.title" data-direction="ASC"
                                            data-name="Modified" title="" data-content="Select to sort by this column" data-placement="top"
                                            data-original-title="Modified">
                                            Modified</a>
                                    </th>
                                    <th width="10%" class="nowrap hidden-phone">
                                        <a href="#" onclick="return false;" class="js-stools-column-order hasPopover" data-order="l.title" data-direction="ASC" data-name="Modified By"
                                            title="" data-content="Select to sort by this column" data-placement="top" data-original-title="Modified By">
                                            Modified By</a>
                                    </th>
                                    <th width="10%" class="nowrap hidden-phone">
                                        <a href="#" onclick="return false;" class="js-stools-column-order hasPopover" data-order="a.id" data-direction="ASC" data-name="Ordering"
                                            title="" data-content="Select to sort by this column" data-placement="top" data-original-title="Ordering">
                                            Ordering</a>
                                    </th>
                                    <th width="1%" class="nowrap center hidden-phone">
                                        <a href="#" onclick="return false;" class="js-stools-column-order hasPopover" data-order="a.id" data-direction="ASC" data-name="ID"
                                            title="" data-content="Select to sort by this column" data-placement="top" data-original-title="ID">
                                            ID</a>
                                    </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td colspan="10">
                                        <div class="pagination pagination-toolbar clearfix">
                                            <input type="hidden" name="limitstart" value="0">
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
                                    if (!empty($this->Items)) {
                                        $i = 0;
                                        foreach ($this->Items as $value) {
                                            $id             = $value['id'];                                            
                                            $name           = $value['name'];   
                                            $row            = ($i % 2 == 0) ? 'row0' : 'row1' ;
                                            $ckb            = '<input type="checkbox" name="cid[]" value="'. $id .'">';
                                            $ordering       = '<input style="width: 30%; text-align: center; margin-bottom: auto;" type="text" value="'. $value['ordering'] .'"/>';                                            
                                            $created_by     = $value['created_by'];                                            
                                            $modified_by    = $value['modified_by'];
                                            $created        = Helper::dateFormat('d-m-Y', $value['created']);
                                            $modified       = Helper::dateFormat('d-m-Y', $value['modified']);                                            
                                            $status         = Helper::cmsStatus($value['status'],      URL::createLink('admin', 'group', 'ajaxStatus', array('id' => $id, 'status' => $value['status'])), $id);
                                            $group_acp      = Helper::cmsGroupACP($value['group_acp'], URL::createLink('admin', 'group', 'ajaxGroupACP', array('id' => $id, 'group_acp' => $value['group_acp'])), $id);
                                            
                                ?>
                                    <tr class="<?php echo $row; ?>" sortable-group-id="position-<?php echo $id; ?>">
                                        <td class="order nowrap center hidden-phone">
                                            <span class="sortable-handler inactive tip-top hasTooltip" title="" data-original-title="Please sort by order to enable reordering"><span class="icon-menu"></span></span>
                                        </td>
                                        <td class="center"><?php echo $ckb; ?></td>
                                        <td class="center">
                                            <div class="btn-group">
                                                <?php echo $status; ?>
                                                <button data-toggle="dropdown" class="dropdown-toggle btn btn-micro">
                                                    <span class="caret"></span>
                                                    <span class="element-invisible">Actions for: <?php echo $name; ?></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" onclick="listItemTask('<?php echo $id; ?>', 'modules.duplicate')"><span class="icon-copy" aria-hidden="true"></span> Duplicate</a></li>
                                                    <li><a href="#" onclick="listItemTask('<?php echo $id; ?>', 'modules.trash')"><span class="icon-trash" aria-hidden="true"></span> Trash</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td> <a href="#"><?php echo $name; ?></a></td>
                                        <td class="small hidden-phone"> <?php echo $group_acp; ?> </span></td>
                                        <td class="small hidden-phone hidden-tablet"><?php echo $created; ?></td>
                                        <td class="small hidden-phone hidden-tablet"><?php echo $created_by; ?></td>
                                        <td class="small hidden-phone"><?php echo $modified; ?></td>
                                        <td class="small hidden-phone"><?php echo $modified_by; ?></td>
                                        <td class="hidden-phone"><?php echo $ordering; ?></td>
                                        <td class="hidden-phone"><?php echo $id; ?></td>
                                    </tr>
                                <?php 
                                            $i++;
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                </form>
                </div>
            </div>
            <!-- End Content -->
    </section>
    </div>