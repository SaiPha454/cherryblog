
function load(event){
    var profilePreview=document.getElementById('editProfile_preview');
    profilePreview.src=URL.createObjectURL(event.files[0]);
}
