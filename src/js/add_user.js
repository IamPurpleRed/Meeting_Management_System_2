$(document).ready(() => {
    setInterval(hideBtnText, 100);

    $('#add_btn').hover(() => {
        $('#add_btn').width(100);
        $('#add_btn > .text').delay(500).fadeIn();
    }, () => {
        $('#add_btn > .text').hide();
        $('#add_btn').width(50);
    });

    $('#photo_area > .btn').hover(() => {
        $('#photo_area > .btn').width(180);
        $('#photo_area > .btn > .text').delay(500).fadeIn();
    }, () => {
        $('#photo_area > .btn > .text').hide();
        $('#photo_area > .btn').width(50);
    });
});

$("#userPhotoFile").change(function(){

  uploadUserPhoto(this);

});

function hideBtnText() {
    if ($('#add_btn').width() < 80) {
        $('#add_btn > .text').hide();
    }
    if ($('#photo_area > .btn').width() < 160) {
        $('#photo_area > .btn > .text').hide();
    }
}

function uploadUserPhoto(input) {
    if(input.files && input.files[0]){

    var reader = new FileReader();

    reader.onload = function (e) {

       $("#previewFile").attr('src', e.target.result);

    }

    reader.readAsDataURL(input.files[0])
  }
}
