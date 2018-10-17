<?php
    $rowUsername  = Helper::cmsRow('Username', Helper::cmsInput('text', 'form[username]', 'form-username', '', false, 'contact_input', ''));
    $rowPassword  = Helper::cmsRow('Password', Helper::cmsInput('text', 'form[assword]', 'form-assword', '', false, 'contact_input', ''));
    $rowFullname  = Helper::cmsRow('Fullname', Helper::cmsInput('text', 'form[ullname]', 'form-ullname', '', false, 'contact_input', ''));
    $rowEmail     = Helper::cmsRow('Email'   , Helper::cmsInput('text', 'form[mail]', 'form-mail', '', false, 'contact_input', ''));
    $rowSubmit    = Helper::cmsRow('Submit'  , Helper::cmsInput('submit', 'form[submit]', 'form-submit', 'Register', false, 'register', ''), true);
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
        <form name="register" action="#">
            <?php echo $rowUsername .$rowPassword . $rowFullname. $rowEmail . $rowSubmit; ?>            
        </form>
    </div>

</div>






<div class="clear"></div>