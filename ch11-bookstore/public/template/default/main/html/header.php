<?php 
    $imgURL         = TEMPLATE_URL . "default/main/" . $this->_dirImg;
    $linkHome       = URL::createLink('default', 'index', 'index');
    $linkCategories = URL::createLink('default', 'categories', 'index');
    $linkMyAccount  = URL::createLink('default', 'user', 'index');
    $linkRegister   = URL::createLink('default', 'user', 'register');
    $linkLogin      = URL::createLink('default', 'user', 'login');
?>

<div class="header">
            <div class="logo"><a href="<?php echo $linkHome; ?>"><img src="<?php echo $imgURL; ?>/logo.gif"/></a></div>
            <div id="menu">
                <ul>
                    <li class="index-index"><a href="<?php echo $linkHome; ?>">Home</a></li>
                    <li class="categories-index"><a href="<?php echo $linkCategories; ?>">Categories</a></li>
                    <li class="user-index"><a href="<?php echo $linkMyAccount; ?>">My Account</a></li>
                    <li class="user-register"><a href="<?php echo $linkRegister; ?>">Register</a></li>
                    <li class="user-login"><a href="<?php echo $linkLogin; ?>">Login</a></li>
                </ul>
            </div>
        </div>
