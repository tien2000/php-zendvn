$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results == null){
       return null;
    } else{
       return decodeURI( results[1] ) || 0;
    }
}

$(document).ready(function(){
    var controller = ($.urlParam('controller') == null) ? "index" : $.urlParam('controller');
    
    // console.log(controller);
    $("div.header a." + controller).addClass('active');
});