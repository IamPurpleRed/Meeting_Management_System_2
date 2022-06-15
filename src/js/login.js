$(document).ready(() => {
    setInterval(hideBtnText, 100);

    $('#login_btn').hover(() => {
        $('#login_btn').width(100);
        $('#login_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#login_btn > .text').hide();
        $('#login_btn').width(50);
    });
});

function hideBtnText() {
    if ($('#login_btn').width() < 80) {
        $('#login_btn > .text').hide();
    }
}
