<?php 
    include_once MODULE_PATH . "admin/views/toolbar.php";

    @$dataForm = $this->arrParam['form'];
    
    // Input
    $inputID         = '';
    @$inputUserName  = Helper::cmsInput('text', 'form[username]' , 'form_username', $dataForm['username'], false, 'required', 40);
    @$inputPassword  = Helper::cmsInput('text', 'form[password]' , 'form_password', $dataForm['password'], false, 'required', 40);
    @$inputFullName  = Helper::cmsInput('text', 'form[fullname]' , 'form_fullname', $dataForm['fullname'], false, '', 40);
    @$inputEmail     = Helper::cmsInput('text', 'form[email]'    , 'form_email', $dataForm['email'], false, 'required', 40);
    @$inputOrdering  = Helper::cmsInput('text', 'form[ordering]' , 'form_ordering', $dataForm['ordering'], false, '', 40);
    $inputToken      = Helper::cmsInput('hidden', 'form[token]'  , '', time());
    @$slbStatus      = Helper::cmsSelectBox('form-status', 'form[status]', array('default' => '- Select Status -', '1' => 'Publish', '0' => 'Unpublish'), $dataForm['status']);
    @$slbGroup       = Helper::cmsSelectBox('form-group-id', 'form[group_id]', $this->slbGroup, $dataForm['group_id']);

    // Row
    $rowID           = '';    
    $rowUserName     = Helper::cmsRowForm('form_username', 'hasPopover required', 'Username', 'Enter a Username for the User', true, $inputUserName);
    $rowPassword     = Helper::cmsRowForm('form_password', 'hasPopover required', 'Password', 'Enter a Password for the User', true, $inputPassword);
    $rowFullName     = Helper::cmsRowForm('form_fullname', 'hasPopover', 'Fullname', 'Enter Fullname for the User', false, $inputFullName);
    $rowEmail        = Helper::cmsRowForm('form_email', 'hasPopover required', 'Email', 'Enter a Email for the User', true, $inputEmail);
    $rowOrdering     = Helper::cmsRowForm('form_ordering', 'hasPopover', 'Group Ordering', 'Enter a Ordering for this User', false, $inputOrdering);
    $rowStatus       = Helper::cmsRowForm('form_status', 'hasPopover', 'Group Status', 'Choose a Status for this User', false, $slbStatus);
    $rowGroup     = Helper::cmsRowForm('form_group', 'hasPopover', 'Group', 'Choose a Group for this User', false, $slbGroup);    

    if (isset($this->arrParam['id']) || $dataForm['id']) {
        $inputID     = Helper::cmsInput('text', 'form[id]', 'form_id', $dataForm['id'], true);
        $rowID       = Helper::cmsRowForm('form_id', 'hasPopover', 'ID', 'Cannot Edit Here', false, $inputID);
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
                        <legend>User Details</legend>
                        <?php echo $rowUserName . $rowPassword . $rowFullName . $rowEmail . $rowStatus . $rowGroup . $rowOrdering . $rowID; ?>                        
                    </fieldset>
                    <?php echo $inputToken; ?>
                </form>
            </div>
        </div>
        <!-- End Content -->
    </section>
</div>