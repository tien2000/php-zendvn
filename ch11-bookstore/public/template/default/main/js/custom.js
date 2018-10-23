function getUrlVar(key){
    var result = new RegExp(key + "=([^&]*)", "i").exec(window.location.search);
    return result && unescape(result[1]) || "";
}

jQuery(document).ready(function(){
    var controller  = (getUrlVar("controller") == '') ? 'index' : getUrlVar("controller");
    var action      = (getUrlVar("action") == '')     ? 'index' : getUrlVar("action");
    var classSelect = controller + '-' + action;
    $("#menu ul li." + classSelect).addClass("selected");
});