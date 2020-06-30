$(document).ready(function () {
    $("#select2-edit-servicios-tipo").select2({
        placeholder: "Filtrar",
        width: '200px',
        templateResult: formatState,
        allowClear: true,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectGestionarMenuSubformServicios/",
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
        var data = $("#select2-edit-servicios-tipo").val();
        if (data == 0) {
            $('#select2-edit-servicios-confrmscode').select2("enable", [false]);
            $('#select2-edit-servicios-confrmscode').val(null).trigger('change');
            $('.administracion').show();
            $('.confrsdpubl').hide();
            $('.confrmvsmai').show();
        } else if (data == 1) {
            $('#select2-edit-servicios-confrmscode').select2("enable", [true]);
            $('.administracion').hide();
            $('.confrsdpubl').show();
            $('.confrmvsmai').hide();
        }
    }).on('select2:select', function (e) {
        var data = e.params.data.id;
        if (data == 0) {
            $('#select2-edit-servicios-confrmscode').select2("enable", [false]);
            $('#select2-edit-servicios-confrmscode').val(null).trigger('change');
            $('.administracion').show();
            $('.confrsdpubl').hide();
            $('.confrmvsmai').show();



        } else if (data == 1) {

            $('#select2-edit-servicios-confrmscode').select2("enable", [true]);
            $('.administracion').hide();
            $('.confrsdpubl').show();
            $('.confrmvsmai').hide();


        }
    });
    $("#select2-edit-servicios-confrmscode").select2({
        placeholder: "Filtrar",
        width: '100%',
        templateResult: formatState,
        allowClear: true,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectServiciosSubMenu/",
            dataType: 'json',
            delay: 250,
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
    });
    $('#select2-edit-servicios-confrmscode').select2("enable", [false]);

    $("#select2-edit-servicios-confrmvsmai").select2({
        placeholder: "Filtrar Icono",
        width: '100%',
        templateResult: formatState1,
        templateSelection: formatState1_1,
        escapeMarkup: function (text) { return text; },
        ajax: {
            url: "/icons",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                var query = {
                    search: params.term,
                    type: 'public'
                }
                return query;
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: 'fa ' + item.conicotdesc,
                            id: 'fa ' + item.conicotdesc
                        }
                    })
                };
            },
            cache: true
        }
    });
    $("#form-edit-servicios").submit(function (e) {
        var _token = $('input[name=_token]').val();
        e.preventDefault();
        var confrsttitl = $('#edit-servicios-confrsttitl').val();
        var confrstdesc = $('#edit-servicios-confrstdesc').val();
        var confrsscode = $('#edit-servicios-confrsscode').val();
        var confrmscode_id = $('#edit-servicios-confrmscode').val();
        var confrsdpubl = $('#edit-servicios-confrsdpubl').val();
        var confrsvbigi = $('#edit-servicios-confrsvbigi').prop('files')[0];
        var confrmvsmai = $('#select2-edit-servicios-confrmvsmai').val();


        var confrmscode = $('#select2-edit-servicios-confrmscode').val();
        var confrmyadmf = $("input[name='edit-servicios-confrmyadmf']:checked").val();
        var contypscod0 = $("input[name='edit-servicios-contypscod0']:checked").val();
        var tipo = $('#select2-edit-servicios-tipo').val();

        var formData = new FormData();
        debugger
        formData.append("confrsttitl", confrsttitl);
        formData.append("confrmscode_id", confrmscode_id);
        formData.append("confrmvsmai", confrmvsmai);
        formData.append("confrmscode", confrmscode);
        formData.append("confrstdesc", confrstdesc);
        formData.append("confrsscode", confrsscode);
        formData.append("confrsvbigi", confrsvbigi);
        formData.append("confrsdpubl", confrsdpubl);
        formData.append("confrmyadmf", confrmyadmf);
        formData.append("contypscod0", contypscod0);
        formData.append("tipo", tipo);
        // formData.append('_method', 'patch');



        $.ajax({
            url: '/updateServicios',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': _token
            },
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            data: formData,
            success: function (data) {

                $('#datatable-' + convertToSlug(gestionar_servicios.confrmttitl)).DataTable().ajax.reload();

                $('#modal-edit-' + convertToSlug(gestionar_servicios.confrmttitl)).modal('hide');
                $('#modal-' + convertToSlug(gestionar_servicios.confrmttitl)).modal('show');

            },
        });
    });
    $("#select2-edit-servicios").select2({
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
                    confrmsfcod: 2
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
    });
});