$(document).ready(function () {
    $("#select2-new-redes-sociales-subform").select2({
        placeholder: "Filtrar",
        templateResult: formatState,
        width:'100%',
        ajax: {
            url: "/selectSubform/",
            dataType: 'json',
            delay: 250, data: function (params) {
                return {
                    confrmsfcod: 3
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.confrmttitl,
                            id: item.confrmscode
                        }
                    })
                };
            },
            cache: true
        }
    }).on("change", function () {
        $("#datatable-" + convertToSlug(modal_redes_sociales.confrmttitl)).DataTable().ajax.reload();
    });

    $("#form-new-redes-sociales").submit(function (e) {
        var _token = $('input[name=_token]').val();
        e.preventDefault();
        var confrsttitl = $('#new-rd-confrsttitl').val();
        var confrstdesc = $('#new-rd-confrstdesc').val();
        var confrsscode = $('#new-rd-confrsscode').val();
        var confrsdpubl = $('#new-rd-confrsdpubl').val();
        var confrsvbigi = $('#new-rd-confrsvbigi').prop('files')[0];
        var confrmscode = $('#select2-new-redes-sociales-subform').val();
        debugger
        var formData = new FormData();
    
        formData.append("confrsttitl", confrsttitl);
        formData.append("confrmscode", confrmscode);
        formData.append("confrstdesc", confrstdesc);
        formData.append("confrsscode", confrsscode);
        formData.append("confrsvbigi", confrsvbigi);
        formData.append("confrsdpubl", confrsdpubl);
        // formData.append('_method', 'patch');  
    
    
    
        $.ajax({
            url: '/confrs',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': _token
            },
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            data: formData,
            success: function (data) {
                $('.reset-input').val(null);
                $('#select2-new-redes-sociales-subform').val(null).trigger('change');
                $('#datatable-' + convertToSlug(modal_redes_sociales.confrmttitl)).DataTable().ajax.reload();
                $('#modal-new-' + convertToSlug(modal_redes_sociales.confrmttitl)).modal('hide');
            },
        });
    });
});