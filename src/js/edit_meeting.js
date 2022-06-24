let discussionCounter = 0;
let attachmentCounter = 0;

$(document).ready(() => {
    setInterval(hideBtnText, 100);

    $('#add_discussion_btn').hover(() => {
        $('#add_discussion_btn').width(200);
        $('#add_discussion_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#add_discussion_btn > .text').hide();
        $('#add_discussion_btn').width(50);
    });

    $('#add_discussion_btn').click(addDiscussionItem);

    for (let i = 0; i < $('#members > tr').length; i++) {
        $(`#edit${i + 1}`).click(() => {
            checkEditLogic(i + 1);
        });

        $(`#append${i + 1}_yes`).click(() => {
            checkAppendLogic(i + 1);
        });
        $(`#append${i + 1}_no`).click(() => {
            checkAppendLogic(i + 1);
        });
    }

    $('#add_attachment_btn').hover(() => {
        $('#add_attachment_btn').width(150);
        $('#add_attachment_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#add_attachment_btn > .text').hide();
        $('#add_attachment_btn').width(50);
    });

    $('#add_attachment_btn').click(addAttachment);

    $('#send_meeting_btn').hover(() => {
        $('#send_meeting_btn').width(150);
        $('#send_meeting_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#send_meeting_btn > .text').hide();
        $('#send_meeting_btn').width(50);
    });
});

function hideBtnText() {
    if ($('#add_discussion_btn').width() < 180) {
        $('#add_discussion_btn > .text').hide();
    }

    if ($('#add_attachment_btn').width() < 130) {
        $('#add_attachment_btn > .text').hide();
    }

    if ($('#send_meeting_btn').width() < 130) {
        $('#send_meeting_btn > .text').hide();
    }
}

function checkEditLogic(i) {
    if ($(`#edit${i}`).is(':checked')) {
        $(`#view${i}`).prop('checked', true);
        $(`#view${i}`).prop('disabled', true);
    } else {
        $(`#view${i}`).prop('disabled', false);
    }
}

function checkAppendLogic(i) {
    let value = ($(`input[name=append${i}]:checked`).val() == 1) ? true : false;
    if (value) {
        $(`#role${i}`).prop('disabled', false);
    } else {
        $(`#role${i}`).prop('disabled', true);
    }
}

function addDiscussionItem() {
    discussionCounter++;
    const i = discussionCounter; // 使以下項目不會隨著discussionCounter改變
    let item = `
    <div class="discussion_item" id="discussion${i}">
        <button class="btn del" id="del_discussion${i}_btn" type="button">
            <span class="material-icons">delete</span>
            <span class="text">刪除</span>
        </button>
        <div class="text_area">
            <textarea class="input" id="discussion${i}_title" name="discussion${i}Title" value="" required></textarea>
            <span class="label">案由</span>
        </div>
        <div class="text_area">
            <textarea class="input" id="discussion${i}_content" name="discussion${i}Content" value="" required></textarea>
            <span class="label">說明</span>
        </div>
        <div class="text_area">
            <textarea class="input" id="discussion${i}_resolution" name="discussion${i}Resolution" value="" required></textarea>
            <span class="label">決議事項</span>
        </div>
        <div class="text_area">
            <textarea class="input" id="discussion${i}_implementation" name="discussion${i}Implementation" value="" required></textarea>
            <span class="label">執行情況</span>
        </div>
    </div>`;

    $('#discussion_container').append(item);

    setInterval(() => {
        if ($(`#del_discussion${i}_btn`).width() < 80) {
            $(`#del_discussion${i}_btn > .text`).hide();
        }
    }, 100);

    $(`#del_discussion${i}_btn`).hover(() => {
        $(`#del_discussion${i}_btn`).width(100);
        $(`#del_discussion${i}_btn > .text`).delay(500).fadeIn();
    }, () => {
        $(`#del_discussion${i}_btn > .text`).hide();
        $(`#del_discussion${i}_btn`).width(50);
    });

    $(`#del_discussion${i}_btn`).click(() => {
        $(`#discussion${i}`).remove();
    });
}

function addAttachment() {
    attachmentCounter++;
    const i = attachmentCounter; // 使以下項目不會隨著attachmentCounter改變
    $('#file_area').append(`
        <li id="attachment${i}">
            <input type="file" name="attachment${i}">
            <button class="btn del" id="del_attachment${i}_btn" type="button">
                <span class="material-icons">delete</span>
                <span class="text">刪除</span>
            </button>
        </li>
    `);

    setInterval(() => {
        if ($(`#del_attachment${i}_btn`).width() < 80) {
            $(`#del_attachment${i}_btn > .text`).hide();
        }
    }, 100);

    $(`#del_attachment${i}_btn`).hover(() => {
        $(`#del_attachment${i}_btn`).width(100);
        $(`#del_attachment${i}_btn > .text`).delay(500).fadeIn();
    }, () => {
        $(`#del_attachment${i}_btn > .text`).hide();
        $(`#del_attachment${i}_btn`).width(50);
    });

    $(`#del_attachment${i}_btn`).click(() => {
        $(`#attachment${i}`).remove();
    });
}
