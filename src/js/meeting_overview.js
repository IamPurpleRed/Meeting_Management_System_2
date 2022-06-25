$(document).ready(() => {
    setInterval(hideBtnText, 100);

    $('#edit_btn').hover(() => {
        $('#edit_btn').width(100);
        $('#edit_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#edit_btn > .text').hide();
        $('#edit_btn').width(50);
    });

    $('#del_btn').hover(() => {
        $('#del_btn').width(100);
        $('#del_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#del_btn > .text').hide();
        $('#del_btn').width(50);
    });

});

function hideBtnText() {
    if ($('#edit_btn').width() < 80) {
        $('#edit_btn > .text').hide();
    }
    if ($('#del_btn').width() < 80) {
        $('#del_btn > .text').hide();
    }
}
