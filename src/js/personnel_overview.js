$(document).ready(() => {
    $('#std_group .toggle').click(() => {
        if ($('#std_group .toggle').text() == 'keyboard_arrow_down') {
            $('#std_group .container').slideUp();
            $('#std_group .toggle').text('keyboard_arrow_up');
        } else {
            $('#std_group .toggle').text('keyboard_arrow_down');
            $('#std_group .container').slideDown();
        }
    });

    $('#assistant_group .toggle').click(() => {
        if ($('#assistant_group .toggle').text() == 'keyboard_arrow_down') {
            $('#assistant_group .container').slideUp();
            $('#assistant_group .toggle').text('keyboard_arrow_up');
        } else {
            $('#assistant_group .toggle').text('keyboard_arrow_down');
            $('#assistant_group .container').slideDown();
        }
    });

    $('#school_teacher_group .toggle').click(() => {
        if ($('#school_teacher_group .toggle').text() == 'keyboard_arrow_down') {
            $('#school_teacher_group .container').slideUp();
            $('#school_teacher_group .toggle').text('keyboard_arrow_up');
        } else {
            $('#school_teacher_group .toggle').text('keyboard_arrow_down');
            $('#school_teacher_group .container').slideDown();
        }
    });

    $('#outside_teacher_group .toggle').click(() => {
        if ($('#outside_teacher_group .toggle').text() == 'keyboard_arrow_down') {
            $('#outside_teacher_group .container').slideUp();
            $('#outside_teacher_group .toggle').text('keyboard_arrow_up');
        } else {
            $('#outside_teacher_group .toggle').text('keyboard_arrow_down');
            $('#outside_teacher_group .container').slideDown();
        }
    });

    $('#expert_group .toggle').click(() => {
        if ($('#expert_group .toggle').text() == 'keyboard_arrow_down') {
            $('#expert_group .container').slideUp();
            $('#expert_group .toggle').text('keyboard_arrow_up');
        } else {
            $('#expert_group .toggle').text('keyboard_arrow_down');
            $('#expert_group .container').slideDown();
        }
    });
});
