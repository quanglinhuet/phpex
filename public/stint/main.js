function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(150)
                .height(150);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
function submitck(){
    var name = document.getElementById('myEntry').value;
    document.cookie = "row="+name+';';
    document.getElementById('entry-form').submit();
}
function prevF() {
    document.cookie = "titleadd="+document.getElementById('titleid').value;
    document.cookie ="descriptionadd="+document.getElementById('descriptionid').value;
    document.cookie = "imageadd="+document.getElementById('imageid').value;
}

