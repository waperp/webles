$(document).ready(function () {
    $("#select2-new-servicios-confrmvsmai").select2({
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
                            text: 'fa '+item.conicotdesc,
                            id: 'fa '+item.conicotdesc
                        }
                    })
                };
            },
            cache: true
        }
    });
    $("#select2-new-servicios-tipo").select2({
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
        var data = $("#select2-new-servicios-tipo").val();
        if (data == 0) {
            $('#select2-new-servicios-confrmscode').select2("enable", [false]);
            $('#select2-new-servicios-confrmscode').val(null).trigger('change');
            $('.administracion').show();
            $('.confrsdpubl').hide();
            $('.confrmvsmai').show();



        } else if (data == 1) {

            $('#select2-new-servicios-confrmscode').select2("enable", [true]);
            $('.administracion').hide();
            $('.confrsdpubl').show();
            $('.confrmvsmai').hide();


        }
    }).on('select2:select', function (e) {
        var data = e.params.data.id;
        if (data == 0) {
            $('#select2-new-servicios-confrmscode').select2("enable", [false]);
            $('#select2-new-servicios-confrmscode').val(null).trigger('change');
            $('.administracion').show();
            $('.confrsdpubl').hide();
            $('.confrmvsmai').show();



        } else if (data == 1) {

            $('#select2-new-servicios-confrmscode').select2("enable", [true]);
            $('.administracion').hide();
            $('.confrsdpubl').show();
            $('.confrmvsmai').hide();


        }
    });
    $("#select2-new-servicios-tipo").trigger('change');
    $("#select2-new-servicios-confrmscode").select2({
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
    $('#select2-new-servicios-confrmscode').select2("enable", [false]);
    $("#form-new-servicios").submit(function (e) {
        var _token = $('input[name=_token]').val();
        e.preventDefault();
        var confrsttitl = $('#new-servicios-confrsttitl').val();
        var confrstdesc = $('#new-servicios-confrstdesc').val();
        var confrsscode = $('#new-servicios-confrsscode').val();
        var confrsdpubl = $('#new-servicios-confrsdpubl').val();
        var confrmvsmai = $('#select2-new-servicios-confrmvsmai').val();

        var confrsvbigi = $('#new-servicios-confrsvbigi').prop('files')[0];
        var confrmscode = $('#select2-new-servicios-confrmscode').val();
        var confrmyadmf = $("input[name='new-servicios-confrmyadmf']:checked").val();
        var contypscod0 = $("input[name='new-servicios-contypscod0']:checked").val();
        var tipo = $('#select2-new-servicios-tipo').val();
        debugger
        var formData = new FormData();

        formData.append("confrsttitl", confrsttitl);
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
        debugger
        $.ajax({
            url: '/storeServicios',
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
                $('#datatable-' + convertToSlug(gestionar_servicios.confrmttitl)).DataTable().ajax.reload();
                $('#modal-new-' + convertToSlug(gestionar_servicios.confrmttitl)).modal('hide');
                $('#modal-' + convertToSlug(gestionar_servicios.confrmttitl)).modal('show');

            },
        });
    });
    $("#select2-new-servicios-subform").select2({
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