function filePreview(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.preview').empty();
            $('.preview').append('<img src="' + e.target.result + '" width="200" height="200"/>');

        };
        reader.readAsDataURL(input.files[0]);
    }
}



$(function(){


    $("#file").change(function() {
        filePreview(this);
    });
})