<?php
    // SELECTBOX : Search Tools
    $arrStatus        = array(3 => '- Select Status -', 1 => 'Publish', 0 => 'Unpublish', 2 => 'All');
    @$selectBoxStatus = Helper::cmsSelectBox('status', $arrStatus, $this->_arrParams['filter']['status']);
?>

<div class="js-stools clearfix">
    <div class="clearfix">
        <div class="js-stools-container-selector">
            <div class="js-stools-field-selector">
                <select id="client_id" name="client_id" onchange="jQuery('#filter_position, #filter_module, #filter_language, #filter_menuitem').val('');this.form.submit();">
                    <option value="0" selected="selected">Site</option>
                    <option value="1">Administrator</option>
                </select>
            </div>
        </div>
        <div id="filter-bar" class="js-stools-container-bar">
            <label for="filter_search" class="element-invisible">
                Search </label>
            <div class="btn-wrapper input-append">
                <input type="text" name="filter[search]" id="filter-search" value="<?php echo @$this->_arrParams['filter']['search']?>" placeholder="Search" />
                <button name="search-keyword" style="height: 28px;" type="submit" class="btn hasTooltip" title="Search" aria-label="Search">
                    <span class="icon-search" aria-hidden="true"></span>
                </button>
            </div>
            <div class="btn-wrapper hidden-phone">
                <button type="button" class="btn hasTooltip js-stools-btn-filter" title="Filter the list items.">
                    Search Tools <span class="caret"></span>
                </button>
            </div>
            <div class="btn-wrapper">
                <button name="clear-keyword" type="submit" class="btn hasTooltip js-stools-btn-clear" title="Clear">
                    Clear </button>
            </div>
        </div>
        <div class="js-stools-container-list hidden-phone hidden-tablet shown" style="">
            <div class="ordering-select hidden-phone">
                <div class="js-stools-field-list">
                    <select id="list_fullordering" name="list[fullordering]" onchange="this.form.submit();" style="display: none;">
                        <option value="">Sort Table By:</option>
                        <option value="a.ordering ASC">Ordering ascending</option>
                        <option value="a.ordering DESC">Ordering descending</option>
                        <option value="a.published ASC">Status ascending</option>
                        <option value="a.published DESC">Status descending</option>
                        <option value="a.title ASC">Title ascending</option>
                        <option value="a.title DESC">Title descending</option>
                        <option value="a.position ASC" selected="selected">Position ascending</option>
                        <option value="a.position DESC">Position descending</option>
                        <option value="name ASC">Type ascending</option>
                        <option value="name DESC">Type descending</option>
                        <option value="pages ASC">Pages ascending</option>
                        <option value="pages DESC">Pages descending</option>
                        <option value="ag.title ASC">Access ascending</option>
                        <option value="ag.title DESC">Access descending</option>
                        <option value="l.title ASC">Language ascending</option>
                        <option value="l.title DESC">Language descending</option>
                        <option value="a.id ASC">ID ascending</option>
                        <option value="a.id DESC">ID descending</option>
                    </select>                    
                </div>
                <div class="js-stools-field-list">
                    <select id="list_limit" name="list[limit]" class="input-mini" onchange="this.form.submit();" style="display: none;">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20" selected="selected">20</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="500">500</option>
                        <option value="0">All</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- Filters div -->
    <div id="filter-select" class="js-stools-container-filters hidden-phone clearfix" style="">
        <div class="js-stools-field-filter">
            <?php echo $selectBoxStatus; ?>
        </div>
    </div>
</div>

<div id="collapseModal" tabindex="-1" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close novalidate" data-dismiss="modal">×</button>
        <h3>Batch process the selected modules</h3>
    </div>
    <div class="modal-body">
        <div class="container-fluid">
            <p>If choosing to copy a module, any other actions selected will be applied to the copied module.
                Otherwise, all
                actions are applied to the selected module. When copying and not changing position, it is nevertheless
                necessary
                to select 'Keep Original Position' in the dropdown.</p>
            <div class="row-fluid">
                <div class="control-group span6">
                    <div class="controls">
                        <label id="batch-language-lbl" for="batch-language-id" class="modalTooltip" title="<strong>Set Language</strong><br />Not making a selection will keep the original language when processing.">
                            Set Language</label>
                        <select name="batch[language_id]" class="inputbox" id="batch-language-id" style="display: none;">
                            <option value="">- Keep original Language -</option>
                            <option value="*">All</option>
                            <option value="en-GB">English (en-GB)</option>
                        </select>
                        <div class="chzn-container chzn-container-single chzn-container-single-nosearch" style="width: 220px;"
                            title="" id="batch_language_id_chzn">
                            <a class="chzn-single">
                                <span>- Keep original Language -</span>
                                <div>
                                    <b></b>
                                </div>
                            </a>
                            <div class="chzn-drop">
                                <div class="chzn-search">
                                    <input type="text" autocomplete="off" readonly="">
                                </div>
                                <ul class="chzn-results"></ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="control-group span6">
                    <div class="controls">
                        <label id="batch-access-lbl" for="batch-access" class="modalTooltip" title="<strong>Set Access Level</strong><br />Not making a selection will keep the original access levels when processing.">
                            Set Access Level</label>
                        <select id="batch-access" name="batch[assetgroup_id]" class="inputbox" style="display: none;">
                            <option value="">- Keep original Access Levels -</option>
                            <option value="1">Public</option>
                            <option value="5">Guest</option>
                            <option value="2">Registered</option>
                            <option value="3">Special</option>
                            <option value="6">Super Users</option>
                        </select>
                        <div class="chzn-container chzn-container-single chzn-container-single-nosearch" style="width: 220px;"
                            title="" id="batch_access_chzn">
                            <a class="chzn-single">
                                <span>- Keep original Access Levels -</span>
                                <div>
                                    <b></b>
                                </div>
                            </a>
                            <div class="chzn-drop">
                                <div class="chzn-search">
                                    <input type="text" autocomplete="off" readonly="">
                                </div>
                                <ul class="chzn-results"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="controls">
                        <label id="batch-choose-action-lbl" for="batch-choose-action">
                            Set Position </label>
                        <div id="batch-choose-action" class="control-group">
                            <select id="batch-position-id" name="batch[position_id]" class="chzn-custom-value input-xlarge"
                                data-custom_group_text="Active Positions" data-no_results_text="Add custom position"
                                data-placeholder="Type or Select a Position" style="display: none;">
                                <optgroup label="">
                                    <option value="" selected="selected"></option>
                                    <option value="nochange">Keep original Position</option>
                                    <option value="noposition">No Module Position</option>
                                </optgroup>
                                <optgroup label="Beez3">
                                    <option value="position-2">Breadcrumbs [position-2]</option>
                                    <option value="debug">Debug [debug]</option>
                                    <option value="position-11">Footer bottom [position-11]</option>
                                    <option value="position-14">Footer last [position-14]</option>
                                    <option value="position-10">Footer middle [position-10]</option>
                                    <option value="position-9">Footer top [position-9]</option>
                                    <option value="position-5">Left bottom [position-5]</option>
                                    <option value="position-4">Left middle [position-4]</option>
                                    <option value="position-7">Left top [position-7]</option>
                                    <option value="position-12">Middle top [position-12]</option>
                                    <option value="position-3">Right bottom [position-3]</option>
                                    <option value="position-8">Right middle [position-8]</option>
                                    <option value="position-6">Right top [position-6]</option>
                                    <option value="position-0">Search [position-0]</option>
                                    <option value="position-1">Top [position-1]</option>
                                    <option value="position-13">Unused [position-13]</option>
                                </optgroup>
                                <optgroup label="Protostar">
                                    <option value="banner">Banner [banner]</option>
                                    <option value="position-2">Breadcrumbs [position-2]</option>
                                    <option value="debug">Debug [debug]</option>
                                    <option value="footer">Footer [footer]</option>
                                    <option value="position-8">Left [position-8]</option>
                                    <option value="position-1">Navigation [position-1]</option>
                                    <option value="position-7">Right [position-7]</option>
                                    <option value="position-0">Search [position-0]</option>
                                    <option value="position-3">Top centre [position-3]</option>
                                    <option value="position-10">Unused [position-10]</option>
                                    <option value="position-11">Unused [position-11]</option>
                                    <option value="position-12">Unused [position-12]</option>
                                    <option value="position-13">Unused [position-13]</option>
                                    <option value="position-14">Unused [position-14]</option>
                                    <option value="position-4">Unused [position-4]</option>
                                    <option value="position-5">Unused [position-5]</option>
                                    <option value="position-6">Unused [position-6]</option>
                                    <option value="position-9">Unused [position-9]</option>
                                </optgroup>
                                <optgroup label="Active Positions">
                                    <option value="position-2">position-2</option>
                                    <option value="position-7">position-7</option>
                                </optgroup>
                            </select>
                            <div class="chzn-container chzn-container-single" style="width: 270px;" title="" id="batch_position_id_chzn">
                                <a class="chzn-single chzn-default">
                                    <span>Type or Select a Position</span>
                                    <div>
                                        <b></b>
                                    </div>
                                </a>
                                <div class="chzn-drop">
                                    <div class="chzn-search">
                                        <input type="text" autocomplete="off">
                                    </div>
                                    <ul class="chzn-results"></ul>
                                </div>
                            </div>
                            <div id="batch-copy-move" class="control-group radio" style="display: none;">
                                <div class="controls">
                                    <label for="batch[move_copy]c" id="batch[move_copy]c-lbl" class="radio">

                                        <input type="radio" name="batch[move_copy]" id="batch[move_copy]c" value="c">Copy
                                    </label>
                                    <label for="batch[move_copy]m" id="batch[move_copy]m-lbl" class="radio">

                                        <input type="radio" name="batch[move_copy]" id="batch[move_copy]m" value="m"
                                            checked="checked">Move
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a class="btn" type="button" onclick="document.getElementById('batch-position-id').value='';document.getElementById('batch-access').value='';document.getElementById('batch-language-id').value=''"
            data-dismiss="modal">
            Cancel</a>
        <button class="btn btn-success" type="submit" onclick="Joomla.submitbutton('module.batch');">
            Process</button>
    </div>
</div>