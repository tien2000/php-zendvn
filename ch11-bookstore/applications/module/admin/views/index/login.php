<?php 
    $linkAction = URL::createLink('admin', 'index', 'login');
?>

<!-- Container -->
<div class="container">
        <div id="content">
            <!-- Begin Content -->
            <div id="element-box" class="login well">
                <img src="/Joomla/administrator/templates/isis/images/joomla.png" alt="demo-joomla" />
                <hr />
                <div id="system-message-container">
                    <?php echo @$this->errors; ?>
                </div>

                <form action="<?php echo $linkAction; ?>" method="post" id="form-login" class="form-inline">
                    <fieldset class="loginform">
                        <div class="control-group">
                            <div class="controls">
                                <div class="input-prepend input-append">
                                    <span class="add-on">
                                        <span class="icon-user hasTooltip" title="Username"></span>
                                        <label for="mod-login-username" class="element-invisible">
                                            Username </label>
                                    </span>
                                    <input name="form[username]" tabindex="1" id="form-username" type="text" class="input-medium"
                                        placeholder="Username" size="15" autofocus="true" />
                                    <a href="http://localhost/Joomla/index.php?option=com_users&view=remind" class="btn width-auto hasTooltip"
                                        title="Forgot your username?">
                                        <span class="icon-help"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <div class="input-prepend input-append">
                                    <span class="add-on">
                                        <span class="icon-lock hasTooltip" title="Password"></span>
                                        <label for="mod-login-password" class="element-invisible">
                                            Password </label>
                                    </span>
                                    <input name="form[password]" tabindex="2" id="form-password" type="text" class="input-medium"
                                        placeholder="Password" size="15" />
                                    <a href="http://localhost/Joomla/index.php?option=com_users&view=reset" class="btn width-auto hasTooltip"
                                        title="Forgot your password?">
                                        <span class="icon-help"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <div class="btn-group">
                                    <button tabindex="5" class="btn btn-primary btn-block btn-large login-button">
                                        <span class="icon-lock icon-white"></span> Log in </button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="form[token]" value="<?php echo time(); ?>" />                        
                    </fieldset>
                </form>

            </div>
            <noscript>
                Warning! JavaScript must be enabled for proper operation of the Administrator Backend. </noscript>
            <!-- End Content -->
        </div>
    </div>
    <div class="navbar navbar-fixed-bottom hidden-phone">
        <p class="pull-right">
            &copy; 2018 demo-joomla </p>
        <a class="login-joomla hasTooltip" href="https://www.joomla.org" target="_blank" rel="noopener noreferrer"
            title="Joomla is free software released under the GNU General Public License."><span class="icon-joomla"></span></a>
        <a href="http://localhost/Joomla/" target="_blank" class="pull-left"><span class="icon-out-2"></span>Go to site
            home page</a>
    </div>