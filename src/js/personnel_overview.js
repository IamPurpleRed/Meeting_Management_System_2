var clicking = null;

function makeActive(which) {
    $(which).attr("class", "item active");
    if (clicking && clicking != which) {
        $(clicking).attr("class", "item");
    }
    clicking = which;

    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var PageToSendTo = "components/personnel_content.php?";
    var MyVariable = clicking.id;
    var VariablePlaceholder = "ID=";
    var UrlToSend = PageToSendTo + VariablePlaceholder + MyVariable;

    xmlhttp.open("GET", UrlToSend, false);
    xmlhttp.send();
    console.log(xmlhttp.responseText);

    document.getElementsByName('insertContent')[0].id = 'content';
    $("#content").html(xmlhttp.responseText);
}
