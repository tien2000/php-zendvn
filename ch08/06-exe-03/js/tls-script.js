$(document).ready(function(){
    $('#cancel-button').click(function(){
        window.location = 'index.php';
    });
    
    $('#multi-delete').click(function(){
        $("#main-form").submit();
    });

    $("#checkAll").change(function(){
        var checkStatus = this.checked;
        $('#main-form').find(':checkbox').each(function(){
            this.checked = checkStatus;
        });
    });

    $(".success, .error").click(function(){
        $(this).toggle("slow");
    });
});