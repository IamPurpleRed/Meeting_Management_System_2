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
        var answer = confirm('即將把該用戶密碼重設為123，確定要繼續？');
        if (answer){
            document.getElementByID("reset_pwd_btn").value='true';
        }
        else{
            document.getElementByID("reset_pwd_btn").value='false';
        }
    });
});