<?php
    $controller = $this->_arrParams['controller'];
    
    // New
    $linkNew        = URL::createLink('admin', $controller, 'form');
    $btnNew         = Helper::cmsButton('new', 'toolbar-new', 'icon-plus icon-white', 'btn-success', $linkNew, 'new');

    // Publish
    $linkPublish    = URL::createLink('admin', $controller, 'status', array('type' => 1));
    $btnPublish     = Helper::cmsButton('publish', 'toolbar-publish', 'icon-publish', 'button-publish', $linkPublish, 'submit');

    // Unpublish
    $linkUnpublish  = URL::createLink('admin', $controller, 'status', array('type' => 0));
    $btnUnpublish   = Helper::cmsButton('unpublish', 'toolbar-unpublish', 'icon-unpublish', 'button-unpublish', $linkUnpublish, 'submit');

    // Ordering
    $linkOrdering   = URL::createLink('admin', $controller, 'ordering');
    $btnOrdering    = Helper::cmsButton('ordering', 'toolbar-checkin', 'icon-checkin', 'button-checkin', $linkOrdering, 'submit');

    // Trash
    $linkTrash      = URL::createLink('admin', $controller, 'trash');
    $btnTrash       = Helper::cmsButton('trash', 'toolbar-trash', 'icon-trash', 'button-trash', $linkTrash, 'submit');

    // Apply
    $linkApply      = URL::createLink('admin', $controller, 'form', array('type' => 'apply'));
    $btnApply       = Helper::cmsButton('save', 'toolbar-apply', 'icon-apply icon-white', 'btn-success', $linkApply, 'submit');

    // Save&Closed
    $linkSaveClosed = URL::createLink('admin', $controller, 'form', array('type' => 'save-closed'));
    $btnSaveClosed  = Helper::cmsButton('save & Closed', 'toolbar-save', 'icon-save', 'button-save', $linkSaveClosed, 'submit');

    // Save&New
    $linkSaveNew    = URL::createLink('admin', $controller, 'form', array('type' => 'save-new'));
    $btnSaveNew     = Helper::cmsButton('save & New', 'toolbar-save-new', 'icon-save-new', 'button-save-new', $linkSaveNew, 'submit');

    // Cancel
    $linkCancel     = URL::createLink('admin', $controller, 'index');
    $btnCancel      = Helper::cmsButton('cancel', 'toolbar-cancel', 'icon-cancel', 'button-cancel', $linkCancel);

    switch ($this->_arrParams['action']) {
        case 'index':
        if ($controller == 'group') {
            $strBtn = $btnPublish . $btnUnpublish . $btnOrdering;
        } else {
            $strBtn = $btnNew . $btnPublish . $btnUnpublish . $btnOrdering . $btnTrash;
        }
            break;

        case 'form':
            $strBtn = $btnApply . $btnSaveClosed . $btnSaveNew . $btnCancel;
            break;

        case 'profile':
            $strBtn = $btnApply . $btnSaveClosed . $btnCancel;
            break;
        
        default:
            $strBtn = $btnNew . $btnPublish . $btnUnpublish . $btnOrdering . $btnTrash;
            break;
    }    
?>

<!-- Subheader -->
<a class="btn btn-subhead" data-toggle="collapse" data-target=".subhead-collapse">Toolbar
    <span class="icon-wrench"></span>
</a>
<div class="subhead-collapse collapse" id="isisJsData" data-tmpl-sticky="true" data-tmpl-offset="30" style="height: 51px;">
    <div class="subhead">
        <div class="container-fluid">
            <div id="container-collapse" class="container-collapse"></div>
            <div class="row-fluid">
                <div class="span12">
                    <!-- target for skip to content link -->
                    <a id="skiptarget" class="element-invisible">Main content begins here</a>
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar" id="toolbar">                        
                        <?php echo $strBtn; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>