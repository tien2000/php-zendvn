<?php
    // Input
    $inputSubmit  = Helper::cmsInput('submit', 'form[submit]', 'form-submit', 'Login', false, 'register');
    $inputToken   = Helper::cmsInput('hidden', 'form[token]', 'form-token', time(), false);

    // Row
    $rowPassword  = Helper::cmsRow('Password', Helper::cmsInput('text', 'form[password]', 'form-password', '', false, 'contact_input', ''));
    $rowEmail     = Helper::cmsRow('Email'   , Helper::cmsInput('text', 'form[email]', 'form-email', '', false, 'contact_input', ''));
    $rowSubmit    = Helper::cmsRow('Submit'  , $inputSubmit . $inputToken, true);

    $linkAction   = URL::createLink('default', 'index', 'login');
?>

<div class="title">
    <span class="title_icon">
        <img src="<?php echo $imgURL; ?>/bullet1.gif" />
    </span>
    Login
</div>
<div class="feat_prod_box_details">
    <div class="contact_form">
        <div class="form_subtitle">Login</div>
        <?php echo @$this->errors; ?>
        <form name="adminForm" method="POST" action="<?php echo $linkAction; ?>">
            <?php echo $rowEmail . $rowPassword . $rowSubmit; ?>            
        </form>
    </div>

</div>






<div class="clear"></div>