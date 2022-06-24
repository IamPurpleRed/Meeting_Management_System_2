var clicking = null;

function makeActive(which) {
    $(which).attr("class", "item active");
    if (clicking) {
        $(clicking).attr("class", "item");
    }
    clicking = which;

    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var PageToSendTo = "components/profile.php?";
    var MyVariable = clicking.id;
    var VariablePlaceholder = "ID=";
    var UrlToSend = PageToSendTo + VariablePlaceholder + MyVariable;

    xmlhttp.open("GET", UrlToSend, false);
    xmlhttp.send();

    $("#content").html(xmlhttp.responseText);
}
