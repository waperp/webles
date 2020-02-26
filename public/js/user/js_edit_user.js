$(document).ready(function () {
    
    $("#select2-edit-user-subform").select2({
        placeholder: "Filtrar",
        width: '100%',
        templateResult: formatState,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectUserSubform/",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.contyptdesc,
                            id: item.contypscode
                        }
                    })
                };
            },
            cache: true
        }
    }).on("change", function () {
        $("#datatable-" + convertToSlug(modal_usuarios.confrmttitl)).DataTable().ajax.reload();
    });
    $("#form-edit-user").submit(function (e) {
        var _token = $('input[name=_token]').val();
        e.preventDefault();
        var huremptfnam = $('#edit-user-huremptfnam').val();
        var secconnuuid = $('#edit-user-secconnuuid').val();
        var secusrtmail = $('#edit-user-secusrtmail').val();
        var secusrtpass = $('#confirm-edit-user-secusrtpass').val();
        var hurempvimgh = $('#edit-user-hurempvimgh').prop('files')[0];
        var contypscode = $('#select2-edit-user-subform').val();
        var hurempbgend = $("input[name='hurempbgend']:checked").val();
    
        var formData = new FormData();
    
        formData.append("huremptfnam", huremptfnam);
        formData.append("secconnuuid", secconnuuid);
        formData.append("secusrtmail", secusrtmail);
        formData.append("secusrtpass", secusrtpass);
        formData.append("hurempvimgh", hurempvimgh);
        formData.append("hurempbgend", hurempbgend);
        formData.append("contypscode", contypscode);
        formData.append('_method', 'patch');
    
    
        debugger
        $.ajax({
            url: '/update_user',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': _token
            },
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            data: formData,
            success: function (data) {
                debugger
                if (data == true) {
                    $('#datatable-' + convertToSlug(modal_usuarios.confrmttitl)).DataTable().ajax.reload();
                    $('#modal-edit-' + convertToSlug(modal_usuarios.confrmttitl)).modal('hide');
                    $("#select2-edit-user-subform").val(0);
                    $("#select2-edit-user-subform").trigger('change');
                    $('#edit-user-huremptfnam').val(null);
                    $('#edit-user-secusrtmail').val(null);
                    $('#edit-user-secconnuuid').val(null);
                    $("#edit-user-hurempvimgh").val(null);
                    $('#confirm-edit-user-secusrtpass').val(null);
                    $('#edit-user-secusrtpass').val(null);
                    $("#edit-user-hurempvimgh").parent().css("background-image", "");
    
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'EL correo ingresado ya existe!',
                        footer: 'Intente de nuevo por favor'
                    })
                }
    
            },
        });
    });
});
