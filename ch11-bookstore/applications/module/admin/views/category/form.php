<?php 
    include_once MODULE_PATH . "admin/views/toolbar.php";

    @$dataForm = $this->arrParam['form'];
    
    // Input
    $inputID         = '';
    @$inputName      = Helper::cmsInput('text', 'form[name]', 'form_name', $dataForm['name'], false, 'required', 40);
    @$inputOrdering  = Helper::cmsInput('text', 'form[ordering]', 'form_ordering', $dataForm['ordering'], false, '', 40);
    $inputToken      = Helper::cmsInput('hidden', 'form[token]', '', time());
    @$selectStatus   = Helper::cmsSelectBox('form-status', 'form[status]', array('default' => '- Select Status -', '1' => 'Publish', '0' => 'Unpublish'), $dataForm['status']);

    // Row
    $rowID           = '';    
    $rowName         = Helper::cmsRowForm('form_name', 'hasPopover required', 'Category Name', 'Enter a Name for the Category', true, $inputName);
    $rowOrdering     = Helper::cmsRowForm('form_ordering', 'hasPopover', 'Category Ordering', 'Enter a Ordering for this Category', false, $inputOrdering);
    $rowStatus       = Helper::cmsRowForm('form_status', 'hasPopover', 'Category Status', 'Choose a Status for this Category', false, $selectStatus);

    if (isset($this->arrParam['id'])) {
        $inputID         = Helper::cmsInput('text', 'form[id]', 'form_id', $dataForm['id'], true);
        $rowID           = Helper::cmsRowForm('form_id', 'hasPopover', 'Category ID', 'Category ID', false, $inputID);
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
                <form action="#" method="post" name="categoryForm" id="categoryForm" class="form-validate form-horizontal">
                    <fieldset>
                        <legend>User Category Details</legend>
                        <?php echo $rowName . $rowOrdering, $rowStatus . $rowID; ?>                        
                    </fieldset>
                    <?php echo $inputToken; ?>
                </form>
            </div>
        </div>
        <!-- End Content -->
    </section>
</div>