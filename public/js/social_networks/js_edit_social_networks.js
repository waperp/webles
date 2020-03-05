$(document).ready(function () {

    $("#select2-edit-redes-sociales-subform").select2({
        placeholder: "Filtrar",
        width:'100%',
        templateResult: formatState,
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
    $("#form-edit-redes-sociales").submit(function (e) {
        var _token = $('input[name=_token]').val();
        $('.submit-btn').attr("disabled", "true");

        e.preventDefault();
        var confrsttitl = $('#edit-rd-confrsttitl').val();
        var confrstdesc = $('#edit-rd-confrstdesc').val();
        var confrsdpubl = $('#edit-rd-confrsdpubl').val();
        var confrsscode = $('#edit-rd-confrsscode').val();
        var confrsvbigi = $('#edit-rd-confrsvbigi').prop('files')[0];
        var confrmscode = $('#select2-edit-redes-sociales-subform').val();
    
        var formData = new FormData();
    
        formData.append("confrsttitl", confrsttitl);
        formData.append("confrstdesc", confrstdesc);
        formData.append("confrsscode", confrsscode);
        formData.append("confrmscode", confrmscode);
        formData.append("confrsvbigi", confrsvbigi);
        formData.append("confrsdpubl", confrsdpubl);
        formData.append('_method', 'patch');
    
        $.ajax({
            url: '/confrs/' + confrsscode,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': _token
            },
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            data: formData,
            success: function (data) {
                $('.submit-btn').attr("disabled", "false");
    
                $('#datatable-' + convertToSlug(modal_redes_sociales.confrmttitl)).DataTable().ajax.reload();
                $('#modal-edit-' + convertToSlug(modal_redes_sociales.confrmttitl)).modal('hide');
            },
        });
    });
});