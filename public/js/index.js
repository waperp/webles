$(document).ready(function () {
    $("#edit-perfil-image-preview").css("background-image", "url('images/" + $('#edit-perfil-image-src').val() + "')");
    $("#edit-perfil-image-preview").css("background-size", "cover");
    $("#edit-perfil-image-preview").css("background-position", "center center");
$.uploadPreview({
    input_field: "#edit-perfil-image-upload", // Default: .image-upload
    preview_box: "#edit-perfil-image-preview", // Default: .image-preview
    label_field: "#edit-perfil-image-label", // Default: .image-label
    label_default: "Elija Una Foto", // Default: Choose File
    label_selected: "Cambiar Foto", // Default: Cambiar Foto
    no_label: false // Default: false
});
 $("#form-edit-perfil-user").validate({
    rules: {
        confirmSecusrtpass: {
            equalTo: "#secusrtpass"
        }
    },
    messages: {
        confirmSecusrtpass: {
            equalTo: "por favor ingrese la misma contraseña"
        },
        
    }
});
// if ()) {
//     $('#xs_contact_submit').attr("disabled", false);	
// }
});
