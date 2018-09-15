jQuery(document).ready(function($) {
    $('#collapseModal').on('show.bs.modal', function() {
        $('body').addClass('modal-open');
        $('.modalTooltip').each(function(){;
            var attr = $(this).attr('data-placement');
            if ( attr === undefined || attr === false ) $(this).attr('data-placement', 'auto-dir top-left')
        });
        $('.modalTooltip').tooltip({'html': true, 'container': '#collapseModal'});
    }).on('shown.bs.modal', function() {
        var modalHeight = $('div.modal:visible').outerHeight(true),
            modalHeaderHeight = $('div.modal-header:visible').outerHeight(true),
            modalBodyHeightOuter = $('div.modal-body:visible').outerHeight(true),
            modalBodyHeight = $('div.modal-body:visible').height(),
            modalFooterHeight = $('div.modal-footer:visible').outerHeight(true),
            padding = document.getElementById('collapseModal').offsetTop,
            maxModalHeight = ($(window).height()-(padding*2)),
            modalBodyPadding = (modalBodyHeightOuter-modalBodyHeight),
            maxModalBodyHeight = maxModalHeight-(modalHeaderHeight+modalFooterHeight+modalBodyPadding);
        if (modalHeight > maxModalHeight){;
            $('.modal-body').css({'max-height': maxModalBodyHeight, 'overflow-y': 'auto'});
        }
    }).on('hide.bs.modal', function () {
        $('body').removeClass('modal-open');
        $('.modal-body').css({'max-height': 'initial', 'overflow-y': 'initial'});
        $('.modalTooltip').tooltip('destroy');
    });
 });
 jQuery(function($){ initTooltips(); $("body").on("subform-row-add", initTooltips); function initTooltips (event, container) { container = container || document;$(container).find(".hasTooltip").tooltip({"html": true,"container": "body"});} });
 jQuery(document).ready(function() {
                 Joomla.JMultiSelect('adminForm');
             });
     jQuery(function ($) {
         initChosen();
         $("body").on("subform-row-add", initChosen);
 
         function initChosen(event, container)
         {
             container = container || document;
             $(container).find("select").chosen({"disable_search_threshold":10,"search_contains":true,"allow_single_deselect":true,"placeholder_text_multiple":"Type or select some options","placeholder_text_single":"Select an option","no_results_text":"No results match"});
         }
     });
     
                 (function($){
                     $(document).ready(function() {
                         $('#adminForm').searchtools(
                             {"filtersHidden":true,"filterButton":true,"defaultLimit":"20","searchFieldSelector":"#filter_search","selectorFieldName":"client_id","showSelector":true,"orderFieldSelector":"#list_fullordering","showNoResults":false,"noResultsText":"","formSelector":"#adminForm"}
                         );
                     });
                 })(jQuery);
             
 jQuery(function($){ initTooltips(); $("body").on("subform-row-add", initTooltips); function initTooltips (event, container) { container = container || document;$(container).find("#filter_search").tooltip({"html": true,"title": "Search in module title and note. Prefix with ID: to search for a module ID.","container": "body"});} });
 jQuery(function($){ initPopovers(); $("body").on("subform-row-add", initPopovers); function initPopovers (event, container) { $(container || document).find(".hasPopover").popover({"html": true,"trigger": "hover focus","container": "body"});} });
         jQuery(document).ready(function($){
             if ($("#batch-category-id").length){var batchSelector = $("#batch-category-id");}
             if ($("#batch-menu-id").length){var batchSelector = $("#batch-menu-id");}
             if ($("#batch-position-id").length){var batchSelector = $("#batch-position-id");}
             if ($("#batch-copy-move").length && batchSelector) {
                 $("#batch-copy-move").hide();
                 batchSelector.on("change", function(){
                     if (batchSelector.val() != 0 || batchSelector.val() != "") {
                         $("#batch-copy-move").show();
                     } else {
                         $("#batch-copy-move").hide();
                     }
                 });
             }
         });
             
 jQuery(document).ready(function($) {
    $('#collapseModal').on('show.bs.modal', function() {
        $('body').addClass('modal-open');
        $('.modalTooltip').each(function(){;
            var attr = $(this).attr('data-placement');
            if ( attr === undefined || attr === false ) $(this).attr('data-placement', 'auto-dir top-left')
        });
        $('.modalTooltip').tooltip({'html': true, 'container': '#collapseModal'});
    }).on('shown.bs.modal', function() {
        var modalHeight = $('div.modal:visible').outerHeight(true),
            modalHeaderHeight = $('div.modal-header:visible').outerHeight(true),
            modalBodyHeightOuter = $('div.modal-body:visible').outerHeight(true),
            modalBodyHeight = $('div.modal-body:visible').height(),
            modalFooterHeight = $('div.modal-footer:visible').outerHeight(true),
            padding = document.getElementById('collapseModal').offsetTop,
            maxModalHeight = ($(window).height()-(padding*2)),
            modalBodyPadding = (modalBodyHeightOuter-modalBodyHeight),
            maxModalBodyHeight = maxModalHeight-(modalHeaderHeight+modalFooterHeight+modalBodyPadding);
        if (modalHeight > maxModalHeight){;
            $('.modal-body').css({'max-height': maxModalBodyHeight, 'overflow-y': 'auto'});
        }
    }).on('hide.bs.modal', function () {
        $('body').removeClass('modal-open');
        $('.modal-body').css({'max-height': 'initial', 'overflow-y': 'initial'});
        $('.modalTooltip').tooltip('destroy');
    });
 });