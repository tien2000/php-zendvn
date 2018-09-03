<?php 
    $linkControlPanel   = URL::createLink("admin", "control", "index");
    $linkConfiguration  = URL::createLink("admin", "configuration", "index");
    $linkUserManager    = URL::createLink("admin", "user", "index");
    $linkAddUser        = URL::createLink("admin", "user", "add");
    $linkGroupManager   = URL::createLink("admin", "group", "index");
    $linkAddGroup       = URL::createLink("admin", "group", "add");
?>

<body class="admin com_modules view- layout- task- itemid-0" data-basepath="/joomla" cz-shortcut-listen="true">
    <!-- Top Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a href="#" class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="element-invisible">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <!-- skip to content -->
                <a class="element-invisible" href="#skiptarget">Skip to Main Content</a>

                <a class="admin-logo " href="/joomla/administrator/index.php">
                    <span class="icon-joomla"></span>
                    <div class="element-invisible">
                        Control Panel </div>
                </a>

                <a class="brand hidden-desktop hidden-tablet" href="http://localhost/joomla/" title="Preview demo-joomla" target="_blank">demo-joomla
                    <span class="icon-out-2 small"></span>
                </a>

                <div class="nav-collapse collapse">
                    <ul id="menu" class="nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">System
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu scroll-menu">
                                <li>
                                    <a class="no-dropdown menu-cpanel" href="<?php echo $linkControlPanel; ?>">Control Panel</a>
                                </li>
                                <li class="divider">
                                    <span></span>
                                </li>
                                <li>
                                    <a class="no-dropdown menu-config" href="<?php echo $linkConfiguration; ?>">Global Configuration</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Users
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu scroll-menu">
                                <li class="dropdown-submenu">
                                    <a class="dropdown-toggle menu-user" data-toggle="dropdown" href="<?php echo $linkUserManager; ?>">Manage</a>
                                    <ul class="dropdown-menu menu-scrollable">
                                        <li>
                                            <a class="no-dropdown menu-newarticle" href="<?php echo $linkAddUser; ?>">Add New User</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-toggle menu-groups" data-toggle="dropdown" href="<?php echo $linkGroupManager; ?>">Groups</a>
                                    <ul class="dropdown-menu menu-scrollable">
                                        <li>
                                            <a class="no-dropdown menu-newarticle" href="<?php echo $linkAddGroup; ?>">Add New Group</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul id="nav-empty" class="dropdown-menu nav-empty hidden-phone" style="top: 118px; left: 648px; display: none;"></ul>
                    <ul class="nav nav-user pull-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="icon-user"></span>
                                <span class="caret"></span>
                                <div class="element-invisible">
                                    User Menu </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <span>
                                        <span class="icon-user"></span>
                                        <strong>Super User</strong>
                                    </span>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="index.php?option=com_admin&amp;task=profile.edit&amp;id=280">Edit Account</a>
                                </li>
                                <li class="divider"></li>
                                <li class="">
                                    <a href="/joomla/administrator/index.php?option=com_login&amp;task=logout&amp;672f8d0f9c93314ebc379d01cc71b827=1">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <a class="brand visible-desktop visible-tablet" href="http://localhost/joomla/" title="Preview demo-joomla" target="_blank">demo-joomla
                        <span class="icon-out-2 small"></span>
                    </a>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </nav>
    <!-- Header -->
    <header class="header">
        <div class="container-logo">
            <img src="/joomla/administrator/templates/isis/images/logo.png" class="logo" alt="demo-joomla">
        </div>
        <div class="container-title">
            <h1 class="page-title">
                <span class="icon-users groups" aria-hidden="true"></span>
                <?php echo $this->_title; ?></h1>
        </div>
    </header>