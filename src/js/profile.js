$(document).ready(() => {
    $('#edit_btn').click(() => {
        $('.input').removeAttr('disabled');
        $('#edit_btn').prop('disabled', true);
    });

    $('#edit_btn > .text').hide();
    $('#edit_btn').hover(() => {
        $('#edit_btn').width(100);
        $('#edit_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#edit_btn > .text').hide();
        $('#edit_btn').width(50);
    });

    $('#save_btn > .text').hide();
    $('#save_btn').hover(() => {
        $('#save_btn').width(100);
        $('#save_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#save_btn > .text').hide();
        $('#save_btn').width(50);
    });

    $('#photo_area > .btn > .text').hide();
    $('#photo_area > .btn').hover(() => {
        $('#photo_area > .btn').width(180);
        $('#photo_area > .btn > .text').delay(500).fadeIn();
    }, () => {
        $('#photo_area > .btn > .text').hide();
        $('#photo_area > .btn').width(50);
    });
});
