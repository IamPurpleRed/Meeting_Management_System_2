$(document).ready(() => {
    $('#user_group_toggle').click(() => {
        if ($('#user_group_toggle').text() == 'keyboard_arrow_down') {
            $('#user_group_items').slideUp();
            $('#user_group_toggle').text('keyboard_arrow_up');
        } else {
            $('#user_group_toggle').text('keyboard_arrow_down');
            $('#user_group_items').slideDown();
        }
    });

    $('#meeting_group_toggle').click(() => {
        if ($('#meeting_group_toggle').text() == 'keyboard_arrow_down') {
            $('#meeting_group_toggle').text('keyboard_arrow_up');
            $('#meeting_group_items').slideUp();
        } else {
            $('#meeting_group_toggle').text('keyboard_arrow_down');
            $('#meeting_group_items').slideDown();
        }
    });
});
