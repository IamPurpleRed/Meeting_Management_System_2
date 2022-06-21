const discuss_meeting_area = document.getElementById('discuss_meeting_area');
const text_area = document.getElementById('meeting_items');

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

    $('#add_attachment_btn').hover(() => {
        $('#add_attachment_btn').width(150);
        $('#add_attachment_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#add_attachment_btn > .text').hide();
        $('#add_attachment_btn').width(50);
    });
});

function hideBtnText() {
    if ($('#add_discussion_btn').width() < 180) {
        $('#add_discussion_btn > .text').hide();
    }

    if ($('#add_attachment_btn').width() < 130) {
        $('#add_attachment_btn > .text').hide();
    }
}


$('input:radio[name="row1_choose"]').click(show_select1);
$('input:radio[name="row2_choose"]').click(show_select2);
$('input:radio[name="row3_choose"]').click(show_select3);
$('input:radio[name="row4_choose"]').click(show_select4);
$('input:radio[name="row5_choose"]').click(show_select5);

function show_select1() {
    var checkValue = $('input:radio[name="row1_choose"]:checked').val();
    if (checkValue == 1) {
        $("#row1_role").removeAttr("disabled");
    }
    //alert(checkValue);
}

function show_select2() {
    var checkValue = $('input:radio[name="row2_choose"]:checked').val();
    if (checkValue == 1) {
        $("#row2_role").removeAttr("disabled");
    }
    //alert(checkValue);
}

function show_select3() {
    var checkValue = $('input:radio[name="row3_choose"]:checked').val();
    if (checkValue == 1) {
        $("#row3_role").removeAttr("disabled");
    }
    //alert(checkValue);
}

function show_select4() {
    var checkValue = $('input:radio[name="row4_choose"]:checked').val();
    if (checkValue == 1) {
        $("#row4_role").removeAttr("disabled");
    }
    //alert(checkValue);
}

function show_select5() {
    var checkValue = $('input:radio[name="row5_choose"]:checked').val();
    if (checkValue == 1) {
        $("#row5_role").removeAttr("disabled");
    }
    //alert(checkValue);
}



////////////////////////////////////泓銘部分//////////////////////////////////





function addTextArea() {
    const new_discuss_div = document.createElement("div");
    const new_discuss_div_button = document.createElement("button");
    const new_input_a = document.createElement("input");
    const new_input_b = document.createElement("input");
    const new_input_c = document.createElement("input");
    const new_input_d = document.createElement("input");
    const new_lable_e = document.createElement("span");
    const new_lable_f = document.createElement("span");
    const new_lable_g = document.createElement("span");
    const new_lable_h = document.createElement("span");


    new_discuss_div_button.id = 'button' + area_count;
    new_discuss_div.id = area_count;
    new_input_a.id = area_count + 'a';
    new_input_b.id = area_count + 'b';
    new_input_c.id = area_count + 'c';
    new_input_d.id = area_count + 'd';
    new_lable_e.id = area_count + 'e';
    new_lable_f.id = area_count + 'f';
    new_lable_g.id = area_count + 'g';
    new_lable_h.id = area_count + 'h';

    new_discuss_div.className = "discuss_area";
    new_discuss_div_button.className = "delete_btn";
    new_input_a.className = "input1";
    new_input_b.className = "input2";
    new_input_c.className = "input3";
    new_input_d.className = "input4";
    new_lable_e.className = "label1";
    new_lable_f.className = "label2";
    new_lable_g.className = "label3";
    new_lable_h.className = "label4";

    new_lable_e.textContent = "案由:";
    new_lable_f.textContent = "說明:";
    new_lable_g.textContent = "決議事項:";
    new_lable_h.textContent = "執行情況:";

    discuss_meeting_area.appendChild(new_discuss_div);
    discuss_meeting_area.appendChild(new_discuss_div_button);
    new_discuss_div.appendChild(new_lable_e);
    new_discuss_div.appendChild(new_input_a);
    new_discuss_div.appendChild(new_lable_f);
    new_discuss_div.appendChild(new_input_b);
    new_discuss_div.appendChild(new_lable_g);
    new_discuss_div.appendChild(new_input_c);
    new_discuss_div.appendChild(new_lable_h);
    new_discuss_div.appendChild(new_input_d);


    new_discuss_div_button.addEventListener("click", delete_area);
    area_count += 1;



    /*const new_text_area = document.createElement("textarea");
    const new_text_area_button = document.createElement("button");
    new_text_area_button.id = 'button' + area_count;
    new_text_area.id = area_count;
    new_text_area.className = "textarea";
    new_text_area_button.className = "delete_btn";

    new_text_area.value = "案由:\n說明:\n決議事項:\n執行情況: ";
    input_meeting_area.appendChild(new_text_area);
    input_meeting_area.appendChild(new_text_area_button);


    new_text_area_button.addEventListener("click", delete_area);
    area_count += 1;*/

}

function delete_area() {

    console.clear();


    area_count -= 1;
    var idOfButton = this.id;
    var idOfArea = parseInt(idOfButton.substr(6, idOfButton.lenth));
    // console.log("x" + idOfButton + "x");
    // console.log("y" + idOfArea + "y");
    //console.log("y" + area_count + "y");

    var i = idOfArea;
    for (i; i < area_count; i++) {
        const this_discuss_div = document.getElementById(i);
        const next_discuss_div = document.getElementById(i + 1);

        const this_input_a = document.getElementById(i + 'a');
        const next_input_a = document.getElementById((i + 1) + 'a');
        this_input_a.value = next_input_a.value;

        const this_input_b = document.getElementById(i + 'b');
        const next_input_b = document.getElementById((i + 1) + 'b');
        this_input_b.value = next_input_b.value;

        const this_input_c = document.getElementById(i + 'c');
        const next_input_c = document.getElementById((i + 1) + 'c');
        this_input_c.value = next_input_c.value;

        const this_input_d = document.getElementById(i + 'd');
        const next_input_d = document.getElementById((i + 1) + 'd');
        this_input_d.value = next_input_d.value;
    }

    last = document.getElementById(area_count);
    discuss_meeting_area.removeChild(last);
    last_btn = document.getElementById('button' + area_count);
    last_inpt_a = document.getElementById(area_count + 'a');
    last_inpt_b = document.getElementById(area_count + 'b');
    last_inpt_c = document.getElementById(area_count + 'c');
    last_inpt_d = document.getElementById(area_count + 'd');
    discuss_meeting_area.removeChild(last_btn);
    discuss_meeting_area.removeChild(last_inpt_a);
    discuss_meeting_area.removeChild(last_inpt_b);
    discuss_meeting_area.removeChild(last_inpt_c);
    discuss_meeting_area.removeChild(last_inpt_d);
    console.log(area_count);

    print_all_txt();

}

/*function print_all_txt(id) {

    var i = 0;
    for (i; i < area_count - 1; i++) {
        const this_text_area = document.getElementById(i);
        console.log(this_text_area.value);
    }

}*/
