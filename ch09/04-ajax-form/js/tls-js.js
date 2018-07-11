// Khai báo tên form
var formID  = "#contact-form";

// Khai báo vùng hiển thị dữ liệu
var formMes = "#content-load";

// Khai báo cấu hình
var options = {
    target  : formMes,
    dataType : 'json',
    success : processData
};

function processData(data) {
    if (data.type == undefined) {
        $(formMes).html("Has an error occurred in process").removeClass().addClass('error');
    } else {
        if (data.type == true) {
            $(formMes).html("Success").removeClass().addClass('success');
            $(formID).resetForm();
        } else {
            var error = '';
            for (var x in data.errors) {
                error += data.errors[x] + "<br />";
                $('input[name="'+ x +'"]').val('');
            }
            $(formMes).html(error).removeClass().addClass('error');           
        }
    }
}

$(document).ready(function() {
    $(formID).submit(function() {
        $(this).ajaxSubmit(options);
        return false;
    });
});