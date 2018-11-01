<?php 
    $arrMenu = array(
                    array('link' => URL::createLink('admin', 'book', 'add')         , 'name' => 'New Article'   , 'icon' => 'icon-pencil-2' ),
                    array('link' => URL::createLink('admin', 'book', 'index')       , 'name' => 'Article'       , 'icon' => 'icon-stack'    ),
                    array('link' => URL::createLink('admin', 'categories', 'index') , 'name' => 'Categories'    , 'icon' => 'icon-folder'   ),
                    array('link' => URL::createLink('admin', 'media', 'index')      , 'name' => 'Media'         , 'icon' => 'icon-pictures' )
                );

    $xhtml = '';
    foreach ($arrMenu as $key => $value){        
        $xhtml  .= '<li>
                        <a href="'. $value['link'] .'">
                            <span class="'. $value['icon'] .'" aria-hidden="true"></span> <span class="j-links-link">'. $value['name'] .'</span>
                        </a>
                    </li>';
    }
?>

<div style="margin-bottom: 20px">
    <!-- target for skip to content link -->
    <a id="skiptarget" class="element-invisible">Main content begins here</a>
</div>
<!-- container-fluid -->
<div class="container-fluid container-main">
    <section id="content">
        <!-- Begin Content -->

        <div class="row-fluid">
            <div class="span12">
                <div id="system-message-container">
                </div>

                <div class="row-fluid">
                    <div class="span3">
                        <div class="cpanel-links">
                            <div class="sidebar-nav quick-icons">
                                <div class="j-links-groups">
                                    <h2 class="nav-header">Content</h2>
                                    <ul class="j-links-group nav nav-list">
                                        <?php echo @$xhtml; ?>
                                    </ul>
                                    <h2 class="nav-header">Structure</h2>
                                    <ul class="j-links-group nav nav-list">
                                        <li>
                                            <a href="/Joomla/administrator/index.php?option=com_menus">
                                                <span class="icon-list-view" aria-hidden="true"></span> <span class="j-links-link">Menu(s)</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/Joomla/administrator/index.php?option=com_modules">
                                                <span class="icon-cube" aria-hidden="true"></span> <span class="j-links-link">Modules</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <h2 class="nav-header">Users</h2>
                                    <ul class="j-links-group nav nav-list">
                                        <li>
                                            <a href="/Joomla/administrator/index.php?option=com_users">
                                                <span class="icon-users" aria-hidden="true"></span> <span class="j-links-link">Users</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <h2 class="nav-header">Configuration</h2>
                                    <ul class="j-links-group nav nav-list">
                                        <li>
                                            <a href="/Joomla/administrator/index.php?option=com_config">
                                                <span class="icon-cog" aria-hidden="true"></span> <span class="j-links-link">Global</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/Joomla/administrator/index.php?option=com_templates">
                                                <span class="icon-eye" aria-hidden="true"></span> <span class="j-links-link">Templates</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/Joomla/administrator/index.php?option=com_languages">
                                                <span class="icon-comments-2" aria-hidden="true"></span> <span class="j-links-link">Language(s)</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <h2 class="nav-header">Extensions</h2>
                                    <ul class="j-links-group nav nav-list">
                                        <li>
                                            <a href="/Joomla/administrator/index.php?option=com_installer">
                                                <span class="icon-download" aria-hidden="true"></span> <span class="j-links-link">Install
                                                    Extensions</span> </a>
                                        </li>
                                    </ul>
                                    <h2 class="nav-header">Maintenance</h2>
                                    <ul class="j-links-group nav nav-list">
                                        <li id="plg_quickicon_joomlaupdate">
                                            <a href="index.php?option=com_joomlaupdate">
                                                <span class="icon-joomla" aria-hidden="true"></span> <span class="j-links-link">Checking
                                                    Joomla...</span> </a>
                                        </li>
                                        <li id="plg_quickicon_extensionupdate">
                                            <a href="index.php?option=com_installer&amp;view=update&amp;task=update.find&amp;99a80fabb3e0588efb8a8ab9adba7317=1">
                                                <span class="icon-asterisk" aria-hidden="true"></span> <span class="j-links-link">Checking
                                                    extensions ...</span> </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span9">
                        <div class="row-fluid">
                            <div class="alert alert-info">
                                <h3>
                                    You have post-installation messages </h3>
                                <p>
                                    There are important post-installation messages that require your attention. </p>
                                <p>
                                    This information area won't appear when you have hidden all the messages. </p>
                                <p>
                                    <a href="index.php?option=com_postinstall&amp;eid=700" class="btn btn-primary">
                                        Read Messages </a>
                                </p>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="well well-small">
                                <h2 class="module-title nav-header">Sample Data</h2>
                                <div class="sampledata-container">
                                    <div class="row-striped">
                                        <div class="row-fluid sampledata-blog">
                                            <div class="span4">
                                                <a href="#" onclick="sampledataApply(this)" data-type="blog" data-steps="3">
                                                    <strong class="row-title">
                                                        <span class="icon-broadcast" aria-hidden="true"> </span>
                                                        Blog Sample data </strong>
                                                </a>
                                            </div>
                                            <div class="span6">
                                                <small>
                                                    Sample data which will set up a blog site.<br>If the site is
                                                    multilingual, the data will be tagged to the active backend
                                                    language. </small>
                                            </div>
                                        </div>
                                        <!-- Progress bar -->
                                        <div class="row-fluid sampledata-progress-blog hide">
                                            <progress class="span12"></progress>
                                        </div>
                                        <!-- Progress messages -->
                                        <div class="row-fluid sampledata-progress-blog hide">
                                            <ul class="unstyled"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="well well-small">
                                <h2 class="module-title nav-header">Logged-in Users</h2>
                                <div class="row-striped">
                                    <div class="row-fluid">
                                        <div class="span8">

                                            <strong class="row-title">
                                                <a href="/Joomla/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=341"
                                                    class="hasTooltip" title="ID : 341">
                                                    Super User</a>
                                            </strong>

                                            <small class="small hasTooltip" title="Location">
                                                Administration </small>
                                        </div>
                                        <div class="span4">
                                            <div class="small pull-right hasTooltip" title="Last Activity">
                                                <span class="icon-calendar" aria-hidden="true"></span> 2018-09-30 04:46
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span8">

                                            <strong class="row-title">
                                                <a href="/Joomla/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=341"
                                                    class="hasTooltip" title="ID : 341">
                                                    Super User</a>
                                            </strong>

                                            <small class="small hasTooltip" title="Location">
                                                Administration </small>
                                        </div>
                                        <div class="span4">
                                            <div class="small pull-right hasTooltip" title="Last Activity">
                                                <span class="icon-calendar" aria-hidden="true"></span> 2018-10-12 09:40
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span8">

                                            <strong class="row-title">
                                                <a href="/Joomla/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=341"
                                                    class="hasTooltip" title="ID : 341">
                                                    Super User</a>
                                            </strong>

                                            <small class="small hasTooltip" title="Location">
                                                Administration </small>
                                        </div>
                                        <div class="span4">
                                            <div class="small pull-right hasTooltip" title="Last Activity">
                                                <span class="icon-calendar" aria-hidden="true"></span> 2018-10-03 10:39
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span8">

                                            <strong class="row-title">
                                                <a href="/Joomla/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=341"
                                                    class="hasTooltip" title="ID : 341">
                                                    Super User</a>
                                            </strong>

                                            <small class="small hasTooltip" title="Location">
                                                Administration </small>
                                        </div>
                                        <div class="span4">
                                            <div class="small pull-right hasTooltip" title="Last Activity">
                                                <span class="icon-calendar" aria-hidden="true"></span> 2018-09-29 13:10
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span8">

                                            <strong class="row-title">
                                                <a href="/Joomla/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=341"
                                                    class="hasTooltip" title="ID : 341">
                                                    Super User</a>
                                            </strong>

                                            <small class="small hasTooltip" title="Location">
                                                Administration </small>
                                        </div>
                                        <div class="span4">
                                            <div class="small pull-right hasTooltip" title="Last Activity">
                                                <span class="icon-calendar" aria-hidden="true"></span> 2018-10-02 09:16
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="well well-small">
                                <h2 class="module-title nav-header">Popular Articles</h2>
                                <div class="row-striped">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="alert">No Matching Results</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="well well-small">
                                <h2 class="module-title nav-header">Recently Added Articles</h2>
                                <div class="row-striped">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="alert">No Matching Results</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Content -->
    </section>

</div>