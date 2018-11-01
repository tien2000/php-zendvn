<?php 
    include_once MODULE_PATH . "admin/views/toolbar.php";   

    @$dataForm = $this->arrParam['form'];
    
    // Input
    $inputID         = '';
    @$inputPassword  = Helper::cmsInput('text', 'form[password]' , 'form_password', $dataForm['password'], false, 'required', 40);
    @$inputFullName  = Helper::cmsInput('text', 'form[fullname]' , 'form_fullname', $dataForm['fullname'], false, '', 40);
    @$inputEmail     = Helper::cmsInput('text', 'form[email]'    , 'form_email', $dataForm['email'], false, 'required', 40);
    $inputToken      = Helper::cmsInput('hidden', 'form[token]'  , '', time());

    // Row
    $rowID           = '';
    $rowPassword     = Helper::cmsRowForm('form_password', 'hasPopover required', 'Password', 'Enter a Password for the User', true, $inputPassword);
    $rowFullName     = Helper::cmsRowForm('form_fullname', 'hasPopover', 'Fullname', 'Enter Fullname for the User', false, $inputFullName);
    $rowEmail        = Helper::cmsRowForm('form_email', 'hasPopover required', 'Email', 'Enter a Email for the User', true, $inputEmail);

    if (isset($this->arrParam['id']) || @$dataForm['id']) {
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
                        <?php echo $rowFullName . $rowEmail . $rowID; ?>                        
                    </fieldset>
                    <?php echo $inputToken; ?>
                </form>
            </div>
        </div>
        <!-- End Content -->
    </section>
</div>