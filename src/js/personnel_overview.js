$(document).ready(() => {
    setInterval(hideBtnText, 100);

    $('#edit_btn').hover(() => {
        $('#edit_btn').width(150);
        $('#edit_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#edit_btn > .text').hide();
        $('#edit_btn').width(50);
    });

    $('#reset_pwd_btn').hover(() => {
        $('#reset_pwd_btn').width(150);
        $('#reset_pwd_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#reset_pwd_btn > .text').hide();
        $('#reset_pwd_btn').width(50);
    });

    $('#reset_pwd_btn').click(() => {
        confirm('即將把該用戶密碼重設為123，確定要繼續？');
    });
});

function hideBtnText() {
    if ($('#edit_btn').width() < 130) {
        $('#edit_btn > .text').hide();
    }
    if ($('#reset_pwd_btn').width() < 130) {
        $('#reset_pwd_btn > .text').hide();
    }
}


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
    var PageToSendTo = "components/personnel_content.php?";
    var MyVariable = clicking.id;
    var VariablePlaceholder = "ID=";
    var UrlToSend = PageToSendTo + VariablePlaceholder + MyVariable;

    xmlhttp.open("GET", UrlToSend, false);
    xmlhttp.send();
    console.log(xmlhttp.responseText);

    $("#content").html(xmlhttp.responseText);
}
