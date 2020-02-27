$(document).ready(function () {
    $("#select2-edit-menu-principal-confrmvsmai").select2({
        placeholder: "Filtrar",
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
                            id: 'fa '+item.conicotdesc,
                        }
                    })
                };
            },
            cache: true
        }
    });
    $("#select2-edit-menu-principal-confrmvsmai").val(null).trigger('change');
    $("#select2-edit-menu-principal-type-menu").select2({
        placeholder: "Filtrar",
        width: '100%',
        templateResult: formatState,
        allowClear: true,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectGestionarMenuSubform/",
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
    }).on('select2:select', function (e) {
        var data = e.params.data.id;
        if (data == 0) {
            $('#select2-edit-menu-principal-confrmsfcod').select2("enable", [false]);
            $('#select2-edit-menu-principal-confrmsfcod').val(null).trigger('change');
        } else if (data == 1) {
            $('#select2-edit-menu-principal-confrmsfcod').select2("enable", [true]);
        }
    });
    $("#select2-edit-menu-principal-confrmsfcod").select2({
        placeholder: "Filtrar",
        width: '100%',
        templateResult: formatState,
        allowClear: true,

        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectGestionarMenuSubMenu/",
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
    });
    $('#select2-edit-menu-principal-confrmsfcod').select2("enable", [false]);
    $("#form-edit-menu-principal").submit(function (e) {
        var _token = $('input[name=_token]').val();
        e.preventDefault();
        var confrmttitl = $('#edit-menu-principal-confrmttitl').val();
        var secconnuuid = $('#edit-menu-principal-secconnuuid').val();
        var confrmtdesc = $('#edit-menu-principal-confrmtdesc').val();
        var confrmvsmai = $('#select2-edit-menu-principal-confrmvsmai').val();
        var confrmsfcod = $('#select2-edit-menu-principal-confrmsfcod').val();
        var tipoMenu = $('#select2-edit-menu-principal-type-menu').val();
        var confrmyadmf = $("input[name='edit-menu-principal-confrmyadmf']:checked").val();
        var contypscod0 = $("input[name='edit-menu-principal-contypscod0']:checked").val();
        var formData = new FormData();
    
        formData.append("confrmttitl", confrmttitl);
        formData.append("secconnuuid", secconnuuid);
        formData.append("confrmtdesc", confrmtdesc);
        formData.append("confrmvsmai", confrmvsmai);
        formData.append("confrmyadmf", confrmyadmf);
        formData.append("contypscod0", contypscod0);
        formData.append("confrmsfcod", confrmsfcod);
        formData.append("tipoMenu", tipoMenu);
        formData.append('_method', 'patch');
        
        $.ajax({
            url: '/confrm/' + secconnuuid,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': _token
            },
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            data: formData,
            success: function (data) {
                
                $('#edit-menu-principal-confrmttitl').val(null);
                $('#edit-menu-principal-confrmtdesc').val(null);
                $('#select2-edit-menu-principal-confrmvsmai').val(null).trigger('change');
                $('#select2-edit-menu-principal-confrmsfcod').val(null).trigger('change');
                $('#select2-edit-menu-principal-type-menu').val(null).trigger('change');
                $("input[name='edit-menu-principal-confrmyadmf']").prop('checked', false);
                $("input[name='edit-menu-principal-contypscod0']").prop('checked', false);
                $('#datatable-' + convertToSlug(gestionar_menu.confrmttitl)).DataTable().ajax.reload();
                $('#modal-edit-' + convertToSlug(gestionar_menu.confrmttitl)).modal('hide');
                $('#modal-' + convertToSlug(gestionar_menu.confrmttitl)).modal('show');
    
    
            },
        });
    });
    
});