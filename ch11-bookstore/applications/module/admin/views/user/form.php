<?php 
    include_once "toolbar/index.php";

    @$dataForm = $this->arrParam['form'];
    
    // Input
    $inputID         = '';
    @$inputName      = Helper::cmsInput('text', 'form[name]', 'form_name', $dataForm['name'], false, 'required', 40);
    @$inputOrdering  = Helper::cmsInput('text', 'form[ordering]', 'form_ordering', $dataForm['ordering'], false, '', 40);
    $inputToken      = Helper::cmsInput('hidden', 'form[token]', '', time());
    @$selectStatus   = Helper::cmsSelectBox('form-status', 'form[status]', array('default' => '- Select Status -', '1' => 'Publish', '0' => 'Unpublish'), $dataForm['status']);
    @$selectGroupACP = Helper::cmsSelectBox('form-group-acp', 'form[group_acp]', array('default' => '- Select Group ACP -', '1' => 'Yes', '0' => 'No'), $dataForm['group_acp']);

    // Row
    $rowID           = '';    
    $rowName         = Helper::cmsRowForm('form_name', 'hasPopover required', 'Group Name', 'Enter a Name for the Group', true, $inputName);
    $rowOrdering     = Helper::cmsRowForm('form_ordering', 'hasPopover', 'Group Ordering', 'Enter a Ordering for this Group', false, $inputOrdering);
    $rowStatus       = Helper::cmsRowForm('form_status', 'hasPopover', 'Group Status', 'Choose a Status for this Group', false, $selectStatus);
    $rowGroupACP     = Helper::cmsRowForm('form_status', 'hasPopover', 'Group ACP', 'Choose a Group ACP for this Group', false, $selectGroupACP);    

    if (isset($this->arrParam['id'])) {
        $inputID         = Helper::cmsInput('text', 'form[id]', 'form_id', $dataForm['id'], true);
        $rowID           = Helper::cmsRowForm('form_id', 'hasPopover', 'Group ID', 'Group ID', false, $inputID);
    }

    $message        = Session::get('message');
    Session::delete('message');
    $strMessage     = Helper::cmsMessage($message);
?>

<!-- container-fluid -->
<div class="container-fluid container-main">
    <section id="content">
        <!-- Begin Content -->
        <div class="row-fluid">
            <div class="span12">
                <div id="system-message-container">
                    <?php echo $strMessage. @$this->errors; ?>
                </div>
                <form action="#" method="post" name="adminForm" id="groupForm" class="form-validate form-horizontal">
                    <fieldset>
                        <legend>User Group Details</legend>
                        <?php echo $rowName . $rowOrdering, $rowStatus . $rowGroupACP . $rowID; ?>                        
                    </fieldset>
                    <?php echo $inputToken; ?>
                </form>
            </div>
        </div>
        <!-- End Content -->
    </section>
</div>