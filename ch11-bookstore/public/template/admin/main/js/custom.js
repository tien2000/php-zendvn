function changeStatus(url) {
    $.get(url, function(data) {
        var id = data[0];
        var status = data[1];
        var link = data[2];
        var elemt = "a#status-" + id;
        var classRemove = 'icon-publish';
        var classAdd = 'icon-unpublish';
        if (status == 1) {
            classRemove = 'icon-unpublish';
            classAdd = 'icon-publish';
        }
        $(elemt).attr('href', "javascript:changeStatus('" + link + "')");
        $(elemt + ' span').removeClass(classRemove).addClass(classAdd);
    }, 'json');
};

function changeGroupACP(url) {
    $.get(url, function(data) {
        var id = data[0];
        var group_acp = data[1];
        var link = data[2];
        var elemt = "a#group-acp-" + id;
        var classRemove = 'icon-publish';
        var classAdd = 'icon-unpublish';
        if (group_acp == 1) {
            classRemove = 'icon-unpublish';
            classAdd = 'icon-publish';
        }
        $(elemt).attr('href', "javascript:changeGroupACP('" + link + "')");
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
