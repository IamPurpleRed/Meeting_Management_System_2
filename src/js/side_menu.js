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

    $('#std_group .add').click(() => {
        if (clicking) {
            $(clicking).attr("class", "item");
        }
        if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        var PageToSendTo = "components/add_user.php?";
        var MyVariable = '學生代表';
        var VariablePlaceholder = "mt=";
        var UrlToSend = PageToSendTo + VariablePlaceholder + MyVariable;

        xmlhttp.open("GET", UrlToSend, false);
        xmlhttp.send();
        console.log(xmlhttp.responseText);

        document.getElementsByName('insertContent')[0].id = 'content2';
        $("#content2").html(xmlhttp.responseText);
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

    $('#assistant_group .add').click(() => {
        if (clicking) {
            $(clicking).attr("class", "item");
        }
        if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        var PageToSendTo = "components/add_user.php?";
        var MyVariable = '系助理';
        var VariablePlaceholder = "mt=";
        var UrlToSend = PageToSendTo + VariablePlaceholder + MyVariable;

        xmlhttp.open("GET", UrlToSend, false);
        xmlhttp.send();
        console.log(xmlhttp.responseText);

        document.getElementsByName('insertContent')[0].id = 'content2';
        $("#content2").html(xmlhttp.responseText);
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

    $('#school_teacher_group .add').click(() => {
        if (clicking) {
            $(clicking).attr("class", "item");
        }
        if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        var PageToSendTo = "components/add_user.php?";
        var MyVariable = '系上老師';
        var VariablePlaceholder = "mt=";
        var UrlToSend = PageToSendTo + VariablePlaceholder + MyVariable;

        xmlhttp.open("GET", UrlToSend, false);
        xmlhttp.send();
        console.log(xmlhttp.responseText);

        document.getElementsByName('insertContent')[0].id = 'content2';
        $("#content2").html(xmlhttp.responseText);
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

    $('#outside_teacher_group .add').click(() => {
        if (clicking) {
            $(clicking).attr("class", "item");
        }
        if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        var PageToSendTo = "components/add_user.php?";
        var MyVariable = '校外老師';
        var VariablePlaceholder = "mt=";
        var UrlToSend = PageToSendTo + VariablePlaceholder + MyVariable;

        xmlhttp.open("GET", UrlToSend, false);
        xmlhttp.send();
        console.log(xmlhttp.responseText);

        document.getElementsByName('insertContent')[0].id = 'content2';
        $("#content2").html(xmlhttp.responseText);
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

    $('#expert_group .add').click(() => {
        if (clicking) {
            $(clicking).attr("class", "item");
        }
        if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        var PageToSendTo = "components/add_user.php?";
        var MyVariable = '業界專家';
        var VariablePlaceholder = "mt=";
        var UrlToSend = PageToSendTo + VariablePlaceholder + MyVariable;

        xmlhttp.open("GET", UrlToSend, false);
        xmlhttp.send();
        console.log(xmlhttp.responseText);

        document.getElementsByName('insertContent')[0].id = 'content2';
        $("#content2").html(xmlhttp.responseText);
    });
});
