<?php 
    // New
    $linkNew        = URL::createLink('admin', 'group', 'add');
    $btnNew         = Helper::cmsButton('new', 'toolbar-new', 'icon-plus icon-white', 'btn-success', $linkNew, 'new');

    // Publish
    $linkPublish    = URL::createLink('admin', 'group', 'status', array('type' => 1));
    $btnPublish     = Helper::cmsButton('publish', 'toolbar-publish', 'icon-publish', 'button-publish', $linkPublish, 'submit');

    // Unpublish
    $linkUnpublish  = URL::createLink('admin', 'group', 'status', array('type' => 0));
    $btnUnpublish   = Helper::cmsButton('unpublish', 'toolbar-unpublish', 'icon-unpublish', 'button-unpublish', $linkUnpublish, 'submit');

    // Trash
    $linkTrash      = URL::createLink('admin', 'group', 'trash');
    $btnTrash       = Helper::cmsButton('trash', 'toolbar-trash', 'icon-trash', 'button-trash', $linkTrash, 'submit');

    // Apply
    $linkApply      = URL::createLink('admin', 'group', 'apply');
    $btnApply       = Helper::cmsButton('save', 'toolbar-apply', 'icon-apply icon-white', 'btn-success', $linkApply);

    // Save&Closed
    $linkSaveClosed = URL::createLink('admin', 'group', 'save-closed');
    $btnSaveClosed  = Helper::cmsButton('save & Closed', 'toolbar-save', 'icon-save', 'button-save', $linkSaveClosed);

    // Save&New
    $linkSaveNew    = URL::createLink('admin', 'group', 'save-new');
    $btnSaveNew     = Helper::cmsButton('save & New', 'toolbar-save-new', 'icon-save-new', 'button-save-new', $linkSaveNew);

    // Cancel
    $linkCancel     = URL::createLink('admin', 'group', 'cancel');
    $btnCancel      = Helper::cmsButton('cancel', 'toolbar-cancel', 'icon-cancel', 'button-cancel', $linkCancel);

    switch ($this->_arrPagams['action']) {
        case 'index':
            $strBtn = $btnNew . $btnPublish . $btnUnpublish . $btnTrash;
            break;

        case 'add':
            $strBtn = $btnApply . $btnSaveClosed . $btnSaveNew . $btnCancel;
            break;
        
        default:
            $strBtn = $btnNew . $btnPublish . $btnUnpublish . $btnTrash;
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