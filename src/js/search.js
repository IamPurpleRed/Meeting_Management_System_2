$(document).ready(() => {
    $('#user_group_toggle').click(() => {
        if ($('#user_group_toggle').text() == 'keyboard_arrow_down') {
            $('#user_container').slideUp();
            $('#user_group_toggle').text('keyboard_arrow_up');
        } else {
            $('#user_group_toggle').text('keyboard_arrow_down');
            $('#user_container').slideDown();
        }
    });

    $('#meeting_group_toggle').click(() => {
        if ($('#meeting_group_toggle').text() == 'keyboard_arrow_down') {
            $('#meeting_group_toggle').text('keyboard_arrow_up');
            $('#meeting_container').slideUp();
        } else {
            $('#meeting_group_toggle').text('keyboard_arrow_down');
            $('#meeting_container').slideDown();
        }
    });
});
