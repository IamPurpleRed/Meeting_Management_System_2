$(document).ready(() => {
    setInterval(hideBtnText, 100);

    $('#edit_btn').click(() => {
        $('.input').removeAttr('disabled');
        $('#save_btn').prop('disabled', false);
        $('#edit_btn').prop('disabled', true);
    });

    $('#edit_btn').hover(() => {
        $('#edit_btn').width(100);
        $('#edit_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#edit_btn > .text').hide();
        $('#edit_btn').width(50);
    });

    $('#save_btn').hover(() => {
        $('#save_btn').width(100);
        $('#save_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#save_btn > .text').hide();
        $('#save_btn').width(50);
    });

    $('#photo_area > .btn').hover(() => {
        $('#photo_area > .btn').width(180);
        $('#photo_area > .btn > .text').delay(500).fadeIn();
    }, () => {
        $('#photo_area > .btn > .text').hide();
        $('#photo_area > .btn').width(50);
    });
});

function hideBtnText() {
    if ($('#edit_btn').width() < 80) {
        $('#edit_btn > .text').hide();
    }
    if ($('#save_btn').width() < 80) {
        $('#save_btn > .text').hide();
    }
    if ($('#photo_area > .btn').width() < 160) {
        $('#photo_area > .btn > .text').hide();
    }
}
