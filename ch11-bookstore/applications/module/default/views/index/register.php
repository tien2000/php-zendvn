<?php
    @$dataForm = $this->_arrParams['form'];

    // Input
    $inputSubmit  = Helper::cmsInput('submit', 'form[submit]', 'form-submit', 'Register', false, 'register');
    $inputToken   = Helper::cmsInput('hidden', 'form[token]', 'form-token', time(), false);

    // Row
    $rowUsername  = Helper::cmsRow('Username', Helper::cmsInput('text', 'form[username]', 'form-username', $dataForm['username'], false, 'contact_input', ''));
    $rowPassword  = Helper::cmsRow('Password', Helper::cmsInput('text', 'form[password]', 'form-password', $dataForm['password'], false, 'contact_input', ''));
    $rowFullname  = Helper::cmsRow('Fullname', Helper::cmsInput('text', 'form[fullname]', 'form-fullname', $dataForm['fullname'], false, 'contact_input', ''));
    $rowEmail     = Helper::cmsRow('Email'   , Helper::cmsInput('text', 'form[email]', 'form-email', $dataForm['email'], false, 'contact_input', ''));
    $rowSubmit    = Helper::cmsRow('Submit'  , $inputSubmit . $inputToken, true);

    $linkAction   = URL::createLink('default', 'index', 'register');
?>

<div class="title">
    <span class="title_icon">
        <img src="<?php echo $imgURL; ?>/bullet1.gif" />
    </span>
    Register
</div>
<div class="feat_prod_box_details">
    <div class="contact_form">
        <div class="form_subtitle">Create New Account</div>
        <?php echo @$this->errors; ?>
        <form name="adminForm" method="POST" action="<?php echo $linkAction; ?>">
            <?php echo $rowUsername .$rowPassword . $rowFullname. $rowEmail . $rowSubmit; ?>            
        </form>
    </div>

</div>






<div class="clear"></div>