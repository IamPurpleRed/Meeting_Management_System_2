$(document).ready(() => {
    setInterval(hideBtnText, 100);

    $('#edit_btn').hover(() => {
        $('#edit_btn').width(150);
        $('#edit_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#edit_btn > .text').hide();
        $('#edit_btn').width(50);
    });

    $('#edit_btn').click(() => {
        // window.location.href = "personnel_management.php";
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

        document.getElementsByName('insertContent')[0].id = 'content2';
        $("#content2").html(xmlhttp.responseText);
    });

    $('#reset_pwd_btn').hover(() => {
        $('#reset_pwd_btn').width(150);
        $('#reset_pwd_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#reset_pwd_btn > .text').hide();
        $('#reset_pwd_btn').width(50);
    });

    $('#reset_pwd_btn').click(() => {
        if (confirm('即將把該用戶密碼重設為123，確定要繼續？')) {
            $.ajax({
            url: 'src/php/reset_pswd.php',
            type: 'POST',
            data: { ID: uID },
            success: function(server_response){
                var str = server_response.split(" \r\n<meta charset=\"utf-8\">\r\n");
                alert(str[1]);
            }
            
        })
        }
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