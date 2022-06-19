const input_meeting_area = document.getElementById('input_meeting_area');
const text_area = document.getElementById('meeting_items');

var area_count = 0;
var last = 0;
$(document).ready(() => {
    setInterval(hideBtnText, 100);

    $('#add_btn').hover(() => {
        $('#add_btn').width(200);
        $('#add_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#add_btn > .text').hide();
        $('#add_btn').width(50);
    });

    $('#add_btn').click(addTextArea);
});

function hideBtnText() {
    if ($('#add_btn').width() < 80) {
        $('#add_btn > .text').hide();
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
    const new_text_area = document.createElement("textarea");
    const new_text_area_button = document.createElement("button");
    new_text_area_button.id = 'button' + area_count;
    new_text_area.id = area_count;
    new_text_area.className = "textarea";
    new_text_area_button.className = "delete_btn";

    new_text_area.value = "案由:\n說明:\n決議事項:\n執行情況: ";
    input_meeting_area.appendChild(new_text_area);
    input_meeting_area.appendChild(new_text_area_button);


    new_text_area_button.addEventListener("click", delete_area);
    /*new_text_area.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            enter_text(this.id);
        }
    })*/
    area_count += 1;

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
        const this_text_area = document.getElementById(i);
        const next_text_area = document.getElementById(i + 1);
        this_text_area.value = next_text_area.value;
    }

    last = document.getElementById(area_count);
    input_meeting_area.removeChild(last);
    last_btn = document.getElementById('button' + area_count);
    input_meeting_area.removeChild(last_btn);
    console.log(l)

    print_all_txt();

}

/*function print_all_txt(id) {

    var i = 0;
    for (i; i < area_count - 1; i++) {
        const this_text_area = document.getElementById(i);
        console.log(this_text_area.value);
    }

}*/

///////////////////////////////////////////////////////////////////////
