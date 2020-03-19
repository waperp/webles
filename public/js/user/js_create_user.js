$(document).ready(function () {
    $("#select2-new-user-subform").select2({
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
    $("#form-new-user").submit(function (e) {
        var _token = $('input[name=_token]').val();
        e.preventDefault();
        var huremptfnam = $('#new-user-huremptfnam').val();
        var secusrtmail = $('#new-user-secusrtmail').val();
        var secusrtpass = $('#confirm-new-user-secusrtpass').val();
        var hurempvimgh = $('#new-user-hurempvimgh').prop('files')[0];
        var contypscode = $('#select2-new-user-subform').val();
        var hurempbgend = $("input[name='hurempbgend']:checked").val();
        var formData = new FormData();
    
        formData.append("huremptfnam", huremptfnam);
        formData.append("secusrtmail", secusrtmail);
        formData.append("secusrtpass", secusrtpass);
        formData.append("hurempvimgh", hurempvimgh);
        formData.append("hurempbgend", hurempbgend);
        formData.append("contypscode", contypscode);
        // formData.append('_method', 'patch');  
    
    
        debugger
        $.ajax({
            url: '/secusr',
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
                    $('#modal-new-' + convertToSlug(modal_usuarios.confrmttitl)).modal('hide');
                    $("#select2-new-user-subform").val(0);
                    $("#select2-new-user-subform").trigger('change');
                    $('#new-user-huremptfnam').val(null);
                    $('#new-user-secusrtmail').val(null);
                    $('#new-user-secconnuuid').val(null);
                    $("#new-user-hurempvimgh").val(null);
                    $('#confirm-new-user-secusrtpass').val(null);
                    $('#new-user-secusrtpass').val(null);
                    $("#new-user-hurempvimgh").parent().css("background-image", "");
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
