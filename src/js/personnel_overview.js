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
        confirm('即將把該用戶密碼重設為123，確定要繼續？');
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
