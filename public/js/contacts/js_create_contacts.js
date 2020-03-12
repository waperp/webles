$(document).ready(function () {

    $("#select2-new-contactos-confrmsfcod").select2({
        placeholder: "Filtrar",
        width: '100%',
        templateResult: formatState,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectSubform/",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    confrmsfcod: 4
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
        $("#datatable-" + convertToSlug(gestionar_contactos.confrmttitl)).DataTable().ajax.reload();
    });
    $("#form-new-contactos").submit(function (e) {
        var _token = $('input[name=_token]').val();
        e.preventDefault();
        var confrsttitl = $('#new-contactos-confrsttitl').val();
        var confrstdesc = $('#new-contactos-confrstdesc').val();
        var confrsscode = $('#new-contactos-confrsscode').val();
        var confrsvbigi = $('#new-contactos-confrsvbigi').prop('files')[0];
        var confrmscode = $('#select2-new-contactos-confrmsfcod').val();
        debugger
    
        var formData = new FormData();
    
        formData.append("confrsttitl", confrsttitl);
        formData.append("confrmscode", confrmscode);
        formData.append("confrstdesc", confrstdesc);
        formData.append("confrsscode", confrsscode);
        formData.append("confrsvbigi", confrsvbigi);
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
                debugger
                $('#datatable-' + convertToSlug(gestionar_contactos.confrmttitl)).DataTable().ajax.reload();
                $('#modal-new-' + convertToSlug(gestionar_contactos.confrmttitl)).modal('hide');
                $('#modal-' + convertToSlug(gestionar_contactos.confrmttitl)).modal('show');
            },
        });
    });
});

