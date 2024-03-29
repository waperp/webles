$(document).ready(function () {
    $("#select2-edit-quienes-somos-subform").select2({
        placeholder: "Filtrar",
        width:'100%',
        templateResult: formatState,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectSubform/",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    confrmsfcod: 1
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
        $("#datatable-" + convertToSlug(modal_quienes_somos.confrmttitl)).DataTable().ajax.reload();
    });
    $("#form-edit-quienes-somos").submit(function (e) {
        var _token = $('input[name=_token]').val();
        e.preventDefault();
        var confrsttitl = $('#edit-confrsttitl').val();
        var confrstdesc = $('#edit-confrstdesc').val();
        var confrsscode = $('#edit-confrsscode').val();
        var confrmscode = $('#select2-edit-quienes-somos-subform').val();
        var confrsvbigi = $('#edit-confrsvbigi').prop('files')[0];
        var formData = new FormData();
    
        formData.append("confrsttitl", confrsttitl);
        formData.append("confrstdesc", confrstdesc);
        formData.append("confrsscode", confrsscode);
        formData.append("confrmscode", confrmscode);
        formData.append("confrsvbigi", confrsvbigi);
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
    
                $('#datatable-' + convertToSlug(modal_quienes_somos.confrmttitl)).DataTable().ajax.reload();
                $('#modal-edit-' + convertToSlug(modal_quienes_somos.confrmttitl)).modal('hide');
            },
        });
    });
});