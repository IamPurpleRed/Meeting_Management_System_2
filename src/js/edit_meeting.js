const area_container = document.getElementById('area_container');
const text_area = document.getElementById('meeting_items');

var delete_file_index = 0;
var area_count = 0;
var last = 0;
$(document).ready(() => {
    setInterval(hideBtnText, 100);

    $('#add_discussion_btn').hover(() => {
        $('#add_discussion_btn').width(200);
        $('#add_discussion_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#add_discussion_btn > .text').hide();
        $('#add_discussion_btn').width(50);
    });

    $('#add_discussion_btn').click(addTextArea);

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

    if ($('#send_meeting_btn').width() < 90) {
        $('#send_meeting_btn > .text').hide();
    }
}


$('input:radio[name="row1Choose"]').click(show_select1);
$('input:radio[name="row2Choose"]').click(show_select2);
$('input:radio[name="row3Choose"]').click(show_select3);
$('input:radio[name="row4Choose"]').click(show_select4);
$('input:radio[name="row5Choose"]').click(show_select5);

function show_select1() {
    var checkValue = $('input:radio[name="row1Choose"]:checked').val();
    if (checkValue == 1) {
        $("#row1_role").removeAttr("disabled");
    }
    //alert(checkValue);
}

function show_select2() {
    var checkValue = $('input:radio[name="row2Choose"]:checked').val();
    if (checkValue == 1) {
        $("#row2_role").removeAttr("disabled");
    }
    //alert(checkValue);
}

function show_select3() {
    var checkValue = $('input:radio[name="row3Choose"]:checked').val();
    if (checkValue == 1) {
        $("#row3_role").removeAttr("disabled");
    }
    //alert(checkValue);
}

function show_select4() {
    var checkValue = $('input:radio[name="row4Choose"]:checked').val();
    if (checkValue == 1) {
        $("#row4_role").removeAttr("disabled");
    }
    //alert(checkValue);
}

function show_select5() {
    var checkValue = $('input:radio[name="row5Choose"]:checked').val();
    if (checkValue == 1) {
        $("#row5_role").removeAttr("disabled");
    }
    //alert(checkValue);
}









function addTextArea() {
    const new_discuss_div = document.createElement("div");
    const new_top_div = document.createElement("div");
    const new_middle_top_div = document.createElement("div");
    const new_middle_bottom_div = document.createElement("div");
    const new_bottom_div = document.createElement("div");
    const new_discuss_div_button = document.createElement("button");
    const new_discuss_div_button_span1 = document.createElement("span");
    const new_discuss_div_button_span2 = document.createElement("span");
    const new_textarea_top = document.createElement("textarea");
    const new_textarea_middle_top = document.createElement("textarea");
    const new_textarea_middle_bottom = document.createElement("textarea");
    const new_textarea_bottom = document.createElement("textarea");
    const new_lable_top = document.createElement("span");
    const new_lable_middle_top = document.createElement("span");
    const new_lable_middle_bottom = document.createElement("span");
    const new_lable_bottom = document.createElement("span");
    const new_inner_div_ = document.createElement("div");


    new_discuss_div_button.id = 'button' + area_count;
    new_discuss_div.id = area_count;
    new_textarea_top.id = area_count + 'textareaTop';
    new_textarea_middle_top.id = area_count + 'textareaMiddleTop';
    new_textarea_middle_bottom.id = area_count + 'textareaMiddleBottom';
    new_textarea_bottom.id = area_count + 'textareaBottom';
    new_lable_top.id = area_count + 'labelTop';
    new_lable_middle_top.id = area_count + 'labelMiddleTop';
    new_lable_middle_bottom.id = area_count + 'labelMiddleBottom';
    new_lable_bottom.id = area_count + 'labelBottom';


    new_discuss_div.className = "discuss_area";
    new_top_div.className = "text_area";
    new_middle_top_div.className = "text_area";
    new_middle_bottom_div.className = "text_area";
    new_bottom_div.className = "text_area";
    new_discuss_div_button.className = "btn";
    new_discuss_div_button_span1.className = "material-icons";
    new_discuss_div_button_span2.className = "text";
    new_textarea_top.className = "input";
    new_textarea_middle_top.className = "input";
    new_textarea_middle_bottom.className = "input";
    new_textarea_bottom.className = "input";

    new_lable_top.style.position = "relative";
    new_lable_top.style.bottom = "-25px";
    new_lable_top.style.fontSize = "18px";
    new_lable_top.style.fontWeight = "bold";
    new_lable_top.style.color = "#555";
    new_lable_middle_top.style.position = "relative";
    new_lable_middle_top.style.bottom = "-25px";
    new_lable_middle_top.style.fontSize = "18px";
    new_lable_middle_top.style.fontWeight = "bold";
    new_lable_middle_top.style.color = "#555";
    new_lable_middle_bottom.style.position = "relative";
    new_lable_middle_bottom.style.bottom = "-25px";
    new_lable_middle_bottom.style.fontSize = "18px";
    new_lable_middle_bottom.style.fontWeight = "bold";
    new_lable_middle_bottom.style.color = "#555";
    new_lable_bottom.style.position = "relative";
    new_lable_bottom.style.bottom = "-25px";
    new_lable_bottom.style.fontSize = "18px";
    new_lable_bottom.style.fontWeight = "bold";
    new_lable_bottom.style.color = "#555";

    new_lable_top.innerHTML = "案由:";
    new_lable_middle_top.innerHTML = "說明:";
    new_lable_middle_bottom.innerHTML = "決議事項:";
    new_lable_bottom.innerHTML = "執行情況:";
    new_discuss_div_button_span2.innerHTML = "del";

    new_textarea_top.value = '';
    new_textarea_middle_top.value = '';
    new_textarea_middle_bottom.value = '';
    new_textarea_bottom.value = '';

    new_textarea_top.required = true;
    new_textarea_middle_top.required = true;
    new_textarea_middle_bottom.required = true;
    new_textarea_bottom.required = true;

    new_textarea_top.rows = 5;
    new_textarea_middle_top.rows = 5;
    new_textarea_middle_bottom.rows = 5;
    new_textarea_bottom.rows = 5;


    area_container.appendChild(new_discuss_div);
    area_container.appendChild(new_discuss_div_button);
    new_discuss_div_button.appendChild(new_discuss_div_button_span2);
    new_discuss_div.appendChild(new_top_div);
    new_discuss_div.appendChild(new_middle_top_div);
    new_discuss_div.appendChild(new_middle_bottom_div);
    new_discuss_div.appendChild(new_bottom_div);
    new_top_div.appendChild(new_lable_top);
    new_top_div.appendChild(new_textarea_top);
    new_middle_top_div.appendChild(new_lable_middle_top);
    new_middle_top_div.appendChild(new_textarea_middle_top);
    new_middle_bottom_div.appendChild(new_lable_middle_bottom);
    new_middle_bottom_div.appendChild(new_textarea_middle_bottom);
    new_bottom_div.appendChild(new_lable_bottom);
    new_bottom_div.appendChild(new_textarea_bottom);


    new_discuss_div_button.addEventListener("click", delete_area);
    area_count += 1;


}

function delete_area() {
    console.clear();

    area_count -= 1;
    var idOfButton = this.id;
    var idOfArea = parseInt(idOfButton.substr(6, idOfButton.lenth));

    var i = idOfArea;
    for (i; i < area_count; i++) {
        const this_discuss_div = document.getElementById(i);
        const next_discuss_div = document.getElementById(i + 1);

        const this_textarea_Top = document.getElementById(i + 'textareaTop');
        const next_textarea_Top = document.getElementById((i + 1) + 'textareaTop');
        this_textarea_Top.value = next_textarea_Top.value;

        const this_textarea_middle_top = document.getElementById(i + 'textareaMiddleTop');
        const next_textarea_middle_top = document.getElementById((i + 1) + 'textareaMiddleTop');
        this_textarea_middle_top.value = next_textarea_middle_top.value;

        const this_textarea_middle_bottom = document.getElementById(i + 'textareaMiddleBottom');
        const next_textarea_middle_bottom = document.getElementById((i + 1) + 'textareaMiddleBottom');
        this_textarea_middle_bottom.value = next_textarea_middle_bottom.value;

        const this_textarea_bottom = document.getElementById(i + 'textareaBottom');
        const next_textarea_bottom = document.getElementById((i + 1) + 'textareaBottom');
        this_textarea_bottom.value = next_textarea_bottom.value;
    }

    last = document.getElementById(area_count);
    area_container.removeChild(last);
    last_btn = document.getElementById('button' + area_count);
    last_textarea_top = document.getElementById(area_count + 'textareaTop');
    last_textarea_middle_top = document.getElementById(area_count + 'textareaMiddleTop');
    last_textarea_middle_bottom = document.getElementById(area_count + 'textareaMiddleBottom');
    last_textarea_bottom = document.getElementById(area_count + 'textareaBottom');
    area_container.removeChild(last_btn);
    area_container.removeChild(last_textarea_top);
    area_container.removeChild(last_textarea_middle_top);
    area_container.removeChild(last_textarea_middle_bottom);
    area_container.removeChild(last_textarea_bottom);
    console.log(area_count);

    print_all_txt();

}


function add_doc() {



}

/////////////// 附件 Start ////////////////////

var file = document.getElementById("attachment1");
var fileName = document.getElementById("file_name0");

function handle_file() {
    fileName.value = file.value;

    $("#submit_file").removeAttr("disabled");

}

function add_item() {
    var myitem = document.getElementById("file_name0").value;
    var newP = document.createElement("li");
    var textNode = document.createTextNode(myitem);

    newP.id = "file_list_ol" + delete_file_index;
    newP.appendChild(textNode);
    document.getElementById("attachment_container").appendChild(newP);

    $("#submit_file").attr("disabled", true);
    $("#file_delete_btn").removeAttr("disabled");

    delete_file_index += 1;
    return false;
}

function file_delete1() {
    console.clear();
    delete_file_index -= 1;
    file_list_ol = document.getElementById('file_list_ol' + delete_file_index);
    $('#file_list_ol' + delete_file_index).remove();
}

/////////////// 附件 End ////////////////////
document.getElementById("send_meeting_btn").style.left = "400px";
document.getElementById("send_meeting_btn").style.bottom = "75px";
