// $(document).ready(function(){
//     var formInput = document.getElementById('formInput');
//     console.log(data);
//     if(formInput){
//         document.getElementById('formInput').innerHTML = "abc";
//     }
// });

// review file image
function LoadImage(_this, idImage) {
    const [file] = _this.files;
    if (file) {
        $(idImage).attr('src', URL.createObjectURL(file));
        $(idImage).show();
    }
}
