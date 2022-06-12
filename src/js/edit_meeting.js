$(document).ready(() => {
    setInterval(hideBtnText, 100);

    $('#add_btn').hover(() => {
        $('#add_btn').width(100);
        $('#add_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#add_btn > .text').hide();
        $('#add_btn').width(50);
    });
});

function hideBtnText() {
    if ($('#add_btn').width() < 80) {
        $('#add_btn > .text').hide();
    }
}
