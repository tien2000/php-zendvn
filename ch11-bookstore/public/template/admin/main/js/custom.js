function changeStatus(url) {
    $.get(url, function(data) {
        var elemt = "a#status-" + data['id'];
        var classRemove = 'icon-publish';
        var classAdd = 'icon-unpublish';
        if (data['status'] == 1) {
            classRemove = 'icon-unpublish';
            classAdd = 'icon-publish';
        }
        $(elemt).attr('href', "javascript:changeStatus('" + data['link'] + "')");
        $(elemt + ' span').removeClass(classRemove).addClass(classAdd);
    }, 'json');
};

function changeGroupACP(url) {
    $.get(url, function(data) {
        var elemt = "a#group-acp-" + data['id'];
        var classRemove = 'icon-publish';
        var classAdd = 'icon-unpublish';
        if (data['group_acp'] == 1) {
            classRemove = 'icon-unpublish';
            classAdd = 'icon-publish';
        }
        $(elemt).attr('href', "javascript:changeGroupACP('" + data['link'] + "')");
        $(elemt + ' span').removeClass(classRemove).addClass(classAdd);
    }, 'json');
};

function submitForm(url) {
    // console.log(url);
    $('#adminForm').attr('action', url);
    $('#adminForm').submit();
}

function sortList(column, order) {
    $('input[name=filter_column]').val(column);
    $('input[name=filter_column_dir]').val(order);
    $('#adminForm').submit();
}

function changePage(page) {
    $('input[name=filter_page]').val(page);
    $('#adminForm').submit();
}

jQuery(document).ready(function($) {
    $('input[name=checkall-toggle]').change(function() {
        var checkAll = this.checked;
        $('#adminForm').find(':checkbox').each(function() {
            this.checked = checkAll;
        });
    });

    $("#filter-bar button[name=search-keyword]").click(function (e) { 
        $('#adminForm').submit();
        
    });

    $("#filter-bar button[name=clear-keyword]").click(function (e) {
        $("#filter-bar input[id=filter-search]").val('');
        $('#adminForm').submit();
    });

    $("#filter-select select[id=filter_status]").change(function (e) {
        $('#adminForm').submit();
    });
});
