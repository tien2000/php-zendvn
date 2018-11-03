<?php 
    $imgURL         = TEMPLATE_URL . "default/main/" . $this->_dirImg;
    $userObj        = Session::get('user');
    
    $arrMenu        = array();
    $arrMenu[]      = array('class' => 'index-index'      , 'link' => URL::createLink('default', 'index', 'index')      , 'name' => 'Home');
    $arrMenu[]      = array('class' => 'categories-index' , 'link' => URL::createLink('default', 'categories', 'index') , 'name' => 'Categories');
    
    if($userObj['login'] == true){
        $arrMenu[]  = array('class' => 'user-index'       , 'link' => URL::createLink('default', 'user', 'index')    , 'name' => 'My Account');
        $arrMenu[]  = array('class' => 'index-logout'     , 'link' => URL::createLink('default', 'index', 'logout')  , 'name' => 'Logout');
    } else {
        $arrMenu[]  = array('class' => 'index-register'   , 'link' => URL::createLink('default', 'index', 'register') , 'name' => 'Register');
        $arrMenu[]  = array('class' => 'index-login'      , 'link' => URL::createLink('default', 'index', 'login')    , 'name' => 'Login');
    }

    if($userObj['group_acp'] == true){
        $arrMenu[]  = array('class' => '', 'link' => URL::createLink('admin', 'index', 'index')    , 'name' => 'Admin Control Panel');
    }

    $xhtml          = '';    
    foreach ($arrMenu as $key => $value) {
        $xhtml .= '<li class="'. $value['class'] .'"><a href="'. $value['link'] .'">'. $value['name'] .'</a></li>';
    }
?>

<div class="header">
    <div class="logo"><a href="<?php echo $linkHome; ?>"><img src="<?php echo $imgURL; ?>/logo.gif"/></a></div>
    <div id="menu">
        <ul>
            <?php echo $xhtml; ?>
        </ul>
    </div>
</div>
