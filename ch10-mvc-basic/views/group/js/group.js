function deleteItem(id) {
    $("#dialog-confirm").dialog({
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
            "Yes": function () {
                $.post('index.php?controller=group&action=delete', {
                    'id': id
                }, function (data) {
                    $('div#item-' + id).hide('slow');
                });
                $(this).dialog("close");
            },
            Cancel: function () {
                $(this).dialog("close");
            }
        }
    });
    // $.post('index.php?controller=group&action=delete', {
    //     'id': id
    // }, function (data) {
    //     $('div#item-' + id).hide('slow');
    // });
};